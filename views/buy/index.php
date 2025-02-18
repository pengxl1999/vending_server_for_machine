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
    <p>
        <?= Html::a('返回', ['site/index', 'machine'=> $_SESSION['machine']], ['class' => 'btn btn-primary', 'style' => 'font-size: large']) ?>
    </p>

    <h1><strong style="font-size: xx-large"><?= Html::encode($this->title) ?></strong></h1>
    <?php //echo $this->render('_search', ['model' => $searchModel]); ?>

    <br/>
    <form id='search_form' action="./index.php?r=buy/index" method="post">
        <input type="text" name="search_med" id='search_med' placeholder="搜索药品" style="font-size: x-large" value=""/>
        <input type="submit" value="搜索" class="btn btn-primary" style="font-size:x-large; margin-left: 15px" />
        <a class="btn btn-primary" style="font-size:x-large; margin-left: 15px" onclick="window.android.voiceInput()">语音输入</a>
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
                    return Html::img('images/medicine/'.$model->img, ['alt' => $model->name]);
                },
                'headerOptions' => ['style' => 'text-align: center; font-size: x-large; width: 150px'],
                'contentOptions' => ['align' => 'center', 'style' => 'font-size: x-large; vertical-align: middle; width: 150px'],
            ],
            //'img',
            [
                'header' => "名称",
                'class' => 'yii\grid\ActionColumn',
                'template'=> '{name}',
                'headerOptions' => ['style' => 'text-align: center; font-size: x-large; width: 150px'],
                'contentOptions' => ['style' => 'text-align: center; font-size: x-large; vertical-align: middle; width: 150px'],
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
                'contentOptions' => ['align' => 'center', 'style' => 'font-size:x-large; vertical-align: middle'],
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
                'contentOptions' => ['align' => 'center', 'width' => '100', 'style' => 'font-size:x-large; vertical-align: middle'],
            ],
            //'money',

            //['class' => 'yii\grid\ActionColumn'],
            [
                'header' => "购买",
                'class' => 'yii\grid\ActionColumn',
                'template'=> '{buyNow}{addToCart}',
                'headerOptions' => ['style' => 'text-align:center; font-size:x-large'],
                'contentOptions' => ['align' => 'center', 'width' => '50', 'style' => 'vertical-align: middle'],
                'buttons' => [
                    'buyNow' => function ($url, $model) {
                        return Html::a('立即购买', ['buy/confirm', 'medId' => $model->m_id], ['class' => "btn btn-sm btn-success",
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
