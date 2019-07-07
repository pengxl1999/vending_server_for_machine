<?php


namespace app\controllers;

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

class BuyController extends Controller
{
    public $enableCsrfValidation = false;
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
     * 购买药品
     * @param int $medId
     * @return string|Response
     */
    public function actionIndex($medId = -1) {
        BuyStatus::$hasRx = false;
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
     * 确认付款
     * @return string
     */
    public function actionConfirm($medId)    //medId不为-1，新增药品；operation不为-1，0增加、1减少或2删除
    {
        $medicine = Medicine::findOne(['m_id' => $medId]);

        return $this->render('confirm', [
            'medId' => $medId,
            'medicine' => $medicine,
            //'searchModel' => $searchModel,
            //'dataProvider' => $dataProvider,
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
        date_default_timezone_set("Asia/Shanghai");

        $qrPayRequestBuilder = new \AlipayTradePrecreateContentBuilder();
        $qrPayRequestBuilder->setOutTradeNo($order);
        $qrPayRequestBuilder->setSubject("语音智能药品售货机-支付宝-当面付-扫码支付");
        $qrPayRequestBuilder->setTimeExpress("2m");
        $qrPayRequestBuilder->setSellerId(2088102177887755);
        $qrPayRequestBuilder->setTotalAmount($totalAmount);

        //获取config
        $config = Yii::$app->params['alipay'];
        $qrPay = new \AlipayTradeService($config);
        $qrPayResult = $qrPay->qrPay($qrPayRequestBuilder);


        switch ($qrPayResult->getTradeStatus()) {
            case "SUCCESS":
                $response = $qrPayResult->getResponse();
                $qrcode = $qrPay->create_erweima($response->qr_code);
                echo $qrcode;
                print_r($response);
                break;
            case "FAILED":
                echo "支付失败！";
                break;
            case "UNKNOWN":
                echo "系统异常！";
                break;
            default:
                echo "不支持的交易状态！";
                break;
        }
    }

    public function actionQrcode() {

        return $this->render('qrcode');
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