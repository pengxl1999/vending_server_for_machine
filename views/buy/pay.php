<?php

use app\models\CustomerCarSearch;
use yii\data\ActiveDataProvider;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\web\View;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CustomerCarSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '我的购物车';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="customer-car-index">
    <p>
        <?= Html::a('返回', ['index'], ['class' => 'btn btn-primary', 'style' => 'font-size: large']) ?>
    </p>
    <h1><strong style="font-size: xx-large"><?= Html::encode($this->title) ?></strong></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

</div>

<footer class="footer" style="height: 80px">
    <p class="pull-left" style="margin-left: 20px; margin-top:10px; color: #496f89;">合计：￥
        <?php echo number_format(\app\controllers\BuyController::$money, 2); ?>
    </p>
    <?= Html::a('去结算', ['buy/addr', 'cart' => -1, 'mMoney' => \app\controllers\BuyController::$money], ['class' => 'btn btn-default pull-right',
        'style' => 'margin-right:20px;']); ?>
</footer>