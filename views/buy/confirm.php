<?php

use app\models\CustomerCarSearch;
use yii\data\ActiveDataProvider;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CustomerCarSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $medicine app\models\Medicine */
/* @var $num */
/* @var $medId */

$this->title = '确认购买';
$this->params['breadcrumbs'][] = $this->title;
\app\models\BuyStatus::$totalAmount = $medicine->money;
\app\models\BuyStatus::$medId = $medId;
date_default_timezone_set("Asia/Shanghai");
\app\models\BuyStatus::$order = 'A'. date("YmdHis") . \app\models\Machine::$number;
?>
<div class="customer-car-index">
    <p>
        <?= Html::a('返回', ['index'], ['class' => 'btn btn-primary', 'style' => 'font-size: large']) ?>
    </p>
    <h1><strong style="font-size: xx-large"><?= Html::encode($this->title) ?></strong></h1>

    <br/>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php   //处方药需要上传处方
    if($medicine->type === 1 && !\app\models\BuyStatus::$isUploaded) {
        echo '
                <div>
                    <p>您的订单中包含处方药，请上传处方！</p>
                    <a class="btn btn-danger" onclick="window.android.getImageForBuying(
                        \'' . \app\models\BuyStatus::$order . '\')">上传图片</a>
                </div>
                ';
    }
    else if($medicine->type === 1 && \app\models\BuyStatus::$isUploaded) {
        echo '
            <div>
                <p>处方图片上传成功！请稍候……</p>
            </div>
            ';
    }
    echo '<br/>'
    ?>

    <?= DetailView::widget([
        'model' => $medicine,
        'attributes' => [
            [
                'label' => '图片',
                'format' => 'raw',
                'captionOptions' => ['style' => 'width: 100px'],
                'value' => function($model) {
                    return Html::img('image/medicine/'.$model->img, ['alt' => $model->name]);
                }
            ],
            'name',
            [
                'label' => '类型',
                'value' => function($model) {
                    $type = \app\models\MedicineType::findOne(['mt_id' => $model->type]);
                    return $type->mt_name;
                }
            ],
            'usage',
            'symptom',
            'attention',
            [
                'label' => '商标',
                'value' => function($model) {
                    $brand = \app\models\MedicineBrand::findOne(['mb_id' => $model->brand]);
                    return $brand->mb_name;
                }
            ],
            [
                'label' => '生产商',
                'value' => function($model) {
                    $man = \app\models\MedicineMan::findOne(['mm_id' => $model->manufacturer]);
                    return $man->mm_name;
                }
            ],
            //'img',
            'money',
        ],
    ]) ?>

</div>