<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MedicineTypeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Medicine Types';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="medicine-type-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Medicine Type', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'mt_id',
            'mt_name',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
