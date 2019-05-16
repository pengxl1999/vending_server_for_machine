<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\VemSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Vems';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vem-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Vem', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'vem_id',
            'vem_name',
            'vem_location',
            'vem_type',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
