<?php

use app\models\MedicineSearch;
use yii\data\ActiveDataProvider;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\web\View;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MedicineSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '购买药品';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="medicine-index">

    <h1><strong style="font-size: large"><?= Html::encode($this->title) ?></strong></h1>
    <?php //echo $this->render('_search', ['model' => $searchModel]); ?>

    <br/>
    <form action="./index.php?r=buy/index" method="post">
        <input type="text" name="search_med" placeholder="搜索药品" style="font-size: medium"/>
        <input type="submit" value="搜索" class="btn btn-primary" />
    </form>

    <br/>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            //'m_id',
            [
                'label' => '图片',
                'enableSorting' => false,
                'format' => 'raw',
                'value' => function($model) {
                    return Html::img('images/medicine/'.$model->img, ['alt' => $model->name, 'width' => '80']);
                },
                'headerOptions' => ['style' => 'text-align:center', 'width' => '80'],
                'contentOptions' => ['align' => 'center', 'width' => '80'],
            ],
            //'img',
            [
                'header' => "名称",
                'class' => 'yii\grid\ActionColumn',
                'template'=> '{name}',
                'headerOptions' => ['style' => 'text-align:center'],
                'contentOptions' => ['align' => 'center'],
                'buttons' => [
                    'name' => function ($url, $model) {
                        //$_SESSION['medId'] = $model->m_id;
                        return Html::a($model->name, ['buy/detail', 'medId' => $model->m_id]);
                    },
                ],
            ],
            [
                'label' => '适应症',
                'enableSorting' => false,
                'value' => function($model) {
                    return $model->symptom;
                },
                'headerOptions' => ['style' => 'text-align:center'],
                'contentOptions' => ['align' => 'center'],  
            ],
            //'name',
            //'commodity_name',
            //'common_name',
            //'other_name',
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
            [
                'label' => '价格',
                'enableSorting' => true,
                'value' => function($model) {
                    return $model->money;
                },
                'headerOptions' => ['style' => 'text-align:center', 'width' => '60'],
                'contentOptions' => ['align' => 'center', 'width' => '60'],
            ],
            //'money',

            //['class' => 'yii\grid\ActionColumn'],
            [
                'header' => "购买",
                'class' => 'yii\grid\ActionColumn',
                'template'=> '{buyNow}{addToCart}',
                'headerOptions' => ['style' => 'text-align:center', 'width' => '50'],
                'contentOptions' => ['align' => 'center', 'width' => '50'],
                'buttons' => [
                    'buyNow' => function ($url, $model) {
                        //$_SESSION['medId'] = $model->m_id;
                        return Html::a('立即购买', ['buy/cart', 'medId' => $model->m_id], ['class' => "btn btn-sm btn-success",
                            'style' => 'font-size:x-small']);
                    },
                    'addToCart' => function ($url, $model) {
                        //$_SESSION['medId'] = $model->m_id;
                        return Html::a('加入购物车', ['buy/index', 'medId' => $model->m_id], ['class' => "btn btn-sm btn-info",
                            'style' => 'font-size:x-small; margin-top:5px']);
                    }
                ],
            ],
        ],
    ]); ?>


</div>
