<?php


namespace app\controllers;


use app\models\Information;
use app\models\InformationSearch;
use app\models\MedicineSearch;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;

class QuestionController extends Controller
{
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

    public function actionQa() {
        $post = Yii::$app->request->post();
        $result = "";
        $voice = "";
        $flag = false;
        if(isset($post['info_search'])) {       //判断是否搜索
            $search = $post['info_search'];
            $information = Information::findOne(['info_question' => $search]);
            if($information != null) {
                $flag = true;
                $result = $information->info_result;
                $voice = $information->info_voice;
            }
        }
        return $this->render('qa', [
            'result' => $result,
            'voice' => $voice,
            'flag' => $flag,
        ]);
    }
}