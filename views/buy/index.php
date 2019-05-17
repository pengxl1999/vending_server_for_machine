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

    <h1><strong style="font-size: xx-large"><?= Html::encode($this->title) ?></strong></h1>
    <?php //echo $this->render('_search', ['model' => $searchModel]); ?>

    <br/>
    <form id='search_form' action="./index.php?r=buy/index" method="post">
        <input type="text" name="search_med" id='search_med' placeholder="搜索药品" style="font-size: large" value=""/>
        <input type="submit" value="搜索" class="btn btn-primary" style="font-size:large; margin-left: 15px" />
    </form>

    <br/>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel,
        'rowOptions' => ['height' => '200'],
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],
            //'m_id',
            [
                'label' => '图片',
                'enableSorting' => false,
                'format' => 'raw',
                'value' => function($model) {
                    return Html::img('images/medicine/'.$model->img, ['alt' => $model->name, 'width' => '150']);
                },
                'headerOptions' => ['style' => 'text-align:center; font-size:x-large', 'width' => '150'],
                'contentOptions' => ['align' => 'center', 'width' => '150', 'style' => 'font-size:x-large'],
            ],
            //'img',
            [
                'header' => "名称",
                'class' => 'yii\grid\ActionColumn',
                'template'=> '{name}',
                'headerOptions' => ['style' => 'text-align:center; font-size:x-large'],
                'contentOptions' => ['align' => 'center', 'style' => 'font-size:x-large'],
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
                'headerOptions' => ['style' => 'text-align:center; font-size:x-large'],
                'contentOptions' => ['align' => 'center', 'style' => 'font-size:x-large'],
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
                'headerOptions' => ['style' => 'text-align:center; font-size:x-large', 'width' => '100'],
                'contentOptions' => ['align' => 'center', 'width' => '100', 'style' => 'font-size:x-large'],
            ],
            //'money',

            //['class' => 'yii\grid\ActionColumn'],
            [
                'header' => "购买",
                'class' => 'yii\grid\ActionColumn',
                'template'=> '{buyNow}{addToCart}',
                'headerOptions' => ['style' => 'text-align:center; font-size:x-large'],
                'contentOptions' => ['align' => 'center', 'width' => '50'],
                'buttons' => [
                    'buyNow' => function ($url, $model) {
                        return Html::a('立即购买', ['buy/cart', 'medId' => $model->m_id], ['class' => "btn btn-sm btn-success",
                            'style' => 'font-size:x-large']);
                    },
                ],
            ],
        ],
    ]); ?>


</div>

<script>
    function searchMedicineByVoice(arg) {
        var form = document.getElementById('search_form');
        var med = document.getElementById('search_med');
        med.value = arg;
        form.submit();
    }
</script>
