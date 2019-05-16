<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CustomerPurchaseSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Customer Purchases';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="customer-purchase-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Customer Purchase', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'cp_id',
            'c_id',
            'm_id',
            'cp_time',
            'status',
            //'v_id',
            //'num',
            //'img',
            //'pa_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
