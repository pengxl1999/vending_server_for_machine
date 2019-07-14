<?php


namespace app\controllers;

use AlipayTradeService;
use app\models\BuyStatus;
use app\models\CustomerCar;
use app\models\CustomerCarSearch;
use app\models\CustomerPurchase;
use app\models\CustomerPurchaseSearch;
use app\models\Medicine;
use app\models\MedicineSearch;
use app\models\SignInForm;
use app\models\User;
use app\models\Vem;
use app\models\VemSearch;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;

require "../vendor/alipay/f2fpay/model/builder/AlipayTradePrecreateContentBuilder.php";
require "../vendor/alipay/f2fpay/service/AlipayTradeService.php";
require "../vendor/phpqrcode/phpqrcode.php";

class BuyController extends Controller
{
    public static $money = 0;       //总金额
    public static $hasRx = false;       //是否有处方药
    public static $isUploaded = false;      //是否上传图片
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * @param $action
     * @return bool
     * @throws \yii\web\BadRequestHttpException
     */
    public function beforeAction($action)
    {
        $this->enableCsrfValidation = false;
        return parent::beforeAction($action);
    }

    /**
     * 购买药品
     * @param int $medId
     * @return string|Response
     */
    public function actionIndex($medId = -1) {
        self::$hasRx = false;
        if($medId !== -1) {
            $this->addMedToCart($medId);
        }

        $searchModel = new MedicineSearch();
        $post = Yii::$app->request->post();

        if(isset($post['search_med'])) {       //判断是否搜索
            $search = $post['search_med'];
            $dataProvider = $searchModel->searchByParams($search);
        } else {
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        }
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * 确认购买
     * @param $medId
     * @param $num
     * @param $isUploaded
     * @return string
     */
    public function actionConfirm($medId, $num = 1, $isUploaded = false)
    {
        BuyStatus::$hasRx = false;
        BuyStatus::$isUploaded = $isUploaded;
        $medicine = Medicine::findOne(['m_id' => $medId]);

        if($medicine->type === 1) {
            BuyStatus::$hasRx = true;
        }

        return $this->render('confirm', [
            'medicine' => $medicine,
            'num' => $num,
            'medId' => $medId,
        ]);
    }

    /**
     * 药品详细信息
     * @param $medId
     * @return string
     */
    public function actionDetail($medId) {
        return $this->render('detail', [
            'model' => Medicine::findOne($medId),
        ]);
    }


    /**
     * 支付宝二维码付款
     * @param $order
     * @param $totalAmount
     * @param $medId
     * @return string
     * @throws \Exception
     */
    public function actionPay($order, $totalAmount, $medId) {

        $customerPurchase = CustomerPurchase::findOne(['cp_order' => $order]);

        if($customerPurchase == null) {
            date_default_timezone_set("Asia/Shanghai");
            $qrPayRequestBuilder = new \AlipayTradePrecreateContentBuilder();
            $qrPayRequestBuilder->setOutTradeNo($order);
            $qrPayRequestBuilder->setSubject("语音智能药品售货机-支付宝-当面付-扫码支付");
            $qrPayRequestBuilder->setTimeExpress("5m");
            $qrPayRequestBuilder->setSellerId(2088102177887755);
            $qrPayRequestBuilder->setTotalAmount($totalAmount);

            $_SESSION['freshTime'] = 0;

            //获取config
            $config = Yii::$app->params['alipay'];
            $qrPay = new \AlipayTradeService($config);
            $qrPayResult = $qrPay->qrPay($qrPayRequestBuilder);
            $response = $qrPayResult->getResponse();

            switch ($qrPayResult->getTradeStatus()) {
                case "SUCCESS":
                    $qrcode = $this->createQrCode($response->qr_code);
                    //生成二维码
                    $customerPurchase = new CustomerPurchase();
                    $customerPurchase->cp_id = CustomerPurchase::getMaxId() + 1;
                    $customerPurchase->m_id = $medId;
                    $customerPurchase->c_id = 0;
                    $customerPurchase->cp_order = $order;
                    $customerPurchase->img = $qrcode;
                    $customerPurchase->status = 0;
                    if(!$customerPurchase->save(false)) {
                        echo "生成订单失败！请联系管理员！";
                        return null;
                    }
                    header('Content-type: image/png');
                    //echo $qrcode;
                    //print_r($response);
                    break;
                case "FAILED":
                    echo "生成二维码失败！请联系管理员！";
                    return null;
                case "UNKNOWN":
                    echo "未知错误！请联系管理员！";
                    return null;
                default:
                    echo "未知错误！请联系管理员！";
                    return null;
            }
        }

        switch ($customerPurchase->status) {
            case 0:
                $_SESSION['freshTime']++;
                if($_SESSION['freshTime'] > 60) {
                    $this->redirect(['buy/failed']);
                }
                $response = "请使用支付宝扫描上方二维码进行支付！";
                return $this->render('pay', [
                    'qrcode' => $customerPurchase->img,
                    'response' => $response,
                ]);
            case 1:
                $response = "扫码成功！请在手机支付宝上完成购买！";
                return $this->render('pay', [
                    'qrcode' => $customerPurchase->img,
                    'response' => $response,
                ]);
            case 2:
                $this->redirect(['buy/success']);
        }
        return null;
    }

    /*
     * 支付成功
     */
    public function actionSuccess() {
        return $this->render('success');
    }


    /**
     * 创建二维码
     * @param $content
     * @return string
     */
    public function createQrCode($content) {
        $errorCorrectionLevel = 'L';
        $matrixPointSize = 6;
        \QRcode::png($content, 'qrcode.png', $errorCorrectionLevel, $matrixPointSize, 2);
        $qrcode = 'qrcode.png';
        return $qrcode;
    }

    /**
     * 增加药品
     * @param $medId
     */
    public function addMedToCart($medId) {
        if(($cart = CustomerCar::findOne([
                'c_id' => $_SESSION['userId'],
                'cc_medicine' => $medId,
            ])) != null) {
            $cart->cc_num++;         //购物车存在同种药，则数量增加1
            $cart->save();
        }
        else {
            $cart = new CustomerCar();
            $cart['cc_id'] = CustomerCar::getMaxId() + 1;
            $cart['c_id'] = $_SESSION['userId'];      //用户id
            $cart['cc_medicine'] = $medId;      //药品id
            $cart['cc_num'] = 1;
            $cart->save();
        }
    }
}