<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\InformationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Informations';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="information-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Information', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'info_id',
            'info_question',
            'info_result',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
