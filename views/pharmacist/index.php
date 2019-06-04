<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PharmacistSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pharmacists';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pharmacist-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Pharmacist', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'u_id',
            'p_id',
            'name',
            'location',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
