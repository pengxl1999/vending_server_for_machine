<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CustomerCarSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Customer Cars';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="customer-car-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Customer Car', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'cc_id',
            'c_id',
            'cc_medicine',
            'cc_num',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
