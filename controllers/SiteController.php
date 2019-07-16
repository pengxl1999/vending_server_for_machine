<?php

namespace app\controllers;

use app\models\CustomerCar;
use app\models\CustomerPurchase;
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

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
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
     * Displays homepage.
     * @param $machine
     * @return string
     */
    public function actionIndex($machine = 0)
    {
//        if(!Yii::$app->user->isGuest) {
//            if(!session_id())   session_start();
//            $username = Yii::$app->user->identity->username;
//            $user = User::findByUsername($username);
//            $_SESSION['userId'] = $user['id'];
//        }
        if(!session_id()) {
            session_start();
        }
        if($machine == 0) {
            $this->redirect(['errorpage', 'message' => '配置错误！请联系管理员！']);
        }
        $_SESSION['machine'] = $machine;
        return $this->render('index');
    }

    /*public function actionBuy($userId, $medId)
    {

    }*/

    public function actionErrorpage($message) {
        return $this->render('errorpage', [
            'message' => $message,
        ]);
    }
}
