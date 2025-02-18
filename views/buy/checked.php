<?php

use app\models\Medicine;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $medicine app\models\Medicine */
/* @var $medId */
/* @var $order*/
/* @var $status*/

$this->title = '确认购买';
$this->params['breadcrumbs'][] = $this->title;
\app\models\BuyStatus::$totalAmount = $medicine->money;
\app\models\BuyStatus::$medId = $medId;
\app\models\BuyStatus::$order = $order;
\app\models\BuyStatus::$status = $status;
?>

<meta http-equiv="refresh" content="2" />
<div class="customer-car-index">
    <p>
        <?= Html::a('返回', ['index'], ['class' => 'btn btn-primary', 'style' => 'font-size: large']) ?>
    </p>
    <h1><strong style="font-size: xx-large"><?= Html::encode($this->title) ?></strong></h1>

    <br/>

    <div>
        <p>处方图片上传成功！请稍候……</p>
    </div>

    <br/>
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
