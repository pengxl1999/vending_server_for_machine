<?php
/**
 *选择收货的地址（售货机地址）
 */
use app\models\Medicine;
use app\models\VemSearch;
use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\DetailView;

/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $dataProvider1 yii\data\ActiveDataProvider */
/* @var $searchModel app\models\VemSearch */

$this->title = '选择取货地点';
$this->params['breadcrumbs'][] = ['label' => '我的购物车', 'url' => ['cart']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div>
    <p>
        <?= Html::a('返回', ['cart'], ['class' => 'btn btn-primary']) ?>
    </p>
    <h1><strong style="font-size: large">您的购买信息</strong></h1>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'options' => ['id' => 'grid'],
        'columns' => [
            [
                'class' => 'yii\grid\SerialColumn',
                'headerOptions' => ['style' => 'text-align:center', 'width' => '20'],
                'contentOptions' => ['style' => 'text-align:center', 'width' => '20'],
            ],
            //'cc_id',
            //'c_id',
            [
                'label' => '图片',
                'enableSorting' => false,
                'format' => 'raw',
                'value' => function($model) {
                    $medicine = \app\models\Medicine::findOne(['m_id' => $model->cc_medicine]);
                    return Html::img('images/medicine/'.$medicine->img, ['alt' => $medicine->name, 'width' => '80']);
                },
                'headerOptions' => ['style' => 'text-align:center', 'width' => '80'],
                'contentOptions' => ['align' => 'center'],
            ],
            [
                'label' => '药品名称',
                'enableSorting' => false,
                'value' => function($model) {
                    $medicine = \app\models\Medicine::findOne(['m_id' => $model->cc_medicine]);
                    $medicineTypeId = $medicine->type;
                    if($medicineTypeId == 1) {
                        \app\controllers\BuyController::$hasRx = true;
                    }
                    return $medicine->name;
                },
                'headerOptions' => ['style' => 'text-align:center', 'width' => '200'],
                'contentOptions' => ['align' => 'center', 'width' => '200'],
            ],
            [
                'label' => '价格',
                'enableSorting' => false,
                'value' => function($model) {
                    $medicine = \app\models\Medicine::findOne(['m_id' => $model->cc_medicine]);
                    return $medicine->money;
                },
                'headerOptions' => ['style' => 'text-align:center'],
                'contentOptions' => ['style' => 'text-align:center'],
            ],
            //'cc_medicine',
            [
                'label' => '数量',
                'enableSorting' => false,
                'value' => function($model) {
                    $medicine = \app\models\Medicine::findOne(['m_id' => $model->cc_medicine]);
                    \app\controllers\BuyController::$money += $medicine->money * $model->cc_num;
                    return $model->cc_num;
                },
                'headerOptions' => ['style' => 'text-align:center', 'width' => '50'],
                'contentOptions' => ['style' => 'text-align:center', 'width' => '50'],
            ],
            //'cc_num',
        ],
    ]); ?>

    <?php
        if(\app\controllers\BuyController::$hasRx == true && \app\controllers\BuyController::$isUploaded == false) {
            echo '
                <div>
                    <p>您的订单中包含处方药，请上传处方！</p>
                    <a class="btn btn-default" onclick="window.android.getImageForBuying()">上传图片</a>
                </div>
                ';
        }
        else if(\app\controllers\BuyController::$hasRx == true && \app\controllers\BuyController::$isUploaded == true){
            echo '
                <div>
                    <p>处方图片上传成功！下单成功后，请前往“我的订单”页面查看审核状态</p>
                </div>
            ';
        }
    ?>

</div>


<div class="vem-index">

    <h1><strong style="font-size: large"><?= Html::encode($this->title) ?></strong></h1>
    <?= GridView::widget([
        'dataProvider' => $dataProvider1,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'class' => 'yii\grid\SerialColumn',
                'headerOptions' => ['style' => 'text-align:center', 'width' => '30'],
                'contentOptions' => ['style' => 'text-align:center', 'width' => '30'],
            ],

            //'vem_id',
            [
                'header' => '药店名称',
                'attribute' => 'vem_name',
                'headerOptions' => ['style' => 'text-align:center', 'width' => '120'],
                'contentOptions' => ['style' => 'text-align:center', 'width' => '120'],
            ],
            [
                'header' => '地址',
                'attribute' => 'vem_location',
                'headerOptions' => ['style' => 'text-align:center'],
                'contentOptions' => ['style' => 'text-align:center'],
            ],
            //'vem_type',

            [
                'header' => '操作',
                'headerOptions' => ['style' => 'text-align:center', 'width' => '30'],
                'contentOptions' => ['style' => 'text-align:center', 'width' => '30'],
                'class' => 'yii\grid\ActionColumn'
            ],
        ],
    ]); ?>

</div>
<script>
    function getResultFromAndroid(isSuccess) {
        if(isSuccess) {
            window.location.href += '&isUploaded=true';
        }
        else {
            alert('上传失败！请重新上传！');
        }
    }
</script>