<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\VemTypeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Vem Types';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vem-type-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Vem Type', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'vt_id',
            'vt_name',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
