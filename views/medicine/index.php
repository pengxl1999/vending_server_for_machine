<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MedicineSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Medicines';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="medicine-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Medicine', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'm_id',
            'name',
            'commodity_name',
            'common_name',
            'other_name',
            //'english_name',
            //'type',
            //'composition',
            //'usage',
            //'symptom',
            //'attention',
            //'interaction',
            //'dose',
            //'number',
            //'guarantee',
            //'fomulation',
            //'brand',
            //'cert',
            //'manufacturer',
            //'img',
            //'money',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
