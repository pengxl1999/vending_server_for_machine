<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CustomerAppointmentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Customer Appointments';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="customer-appointment-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Customer Appointment', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ca_id',
            'c_id',
            'm_id',
            'ca_time',
            'status',
            //'v_id',
            //'deadline',
            //'num',
            //'img',
            //'pa_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
