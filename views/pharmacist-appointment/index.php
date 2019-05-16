<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PharmacistAppointmentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pharmacist Appointments';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pharmacist-appointment-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Pharmacist Appointment', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'pa_id',
            'p_id',
            'time',
            'image',
            'reason',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
