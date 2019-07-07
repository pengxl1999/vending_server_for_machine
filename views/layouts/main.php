<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>

<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        //'brandLabel' => Yii::$app->name,
        'brandLabel' => 'Vending Machine',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right', 'style' => 'font-size: large'],
    ]);
    NavBar::end();
    ?>

    <div class="container" style="font-size: medium">
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>

    <?php
    if(Yii::$app->controller->getRoute() === 'buy/confirm' && (!\app\models\BuyStatus::$hasRx || \app\models\BuyStatus::$isUploaded)) {
        echo '
            <div class="footer" style="z-index: 888; position: fixed; bottom: 0;height: 80px; width: 100%" >
                <p class="pull-left" style="margin-left: 70px; margin-top:10px; color: #496f89; font-size: large">合计：￥' .
            number_format(\app\models\BuyStatus::$totalAmount, 2) .
            '</p>' .
            Html::a('支付', ['pay', 'mMoney' => \app\models\BuyStatus::$totalAmount], ['class' => 'btn btn-success pull-right',
                'style' => 'margin-right: 70px; font-size: large; width: 80px']) .
            '</div>'
        ;
    }
    else if(Yii::$app->controller->getRoute() === 'buy/confirm'){
        echo '
            <div class="footer" style="z-index: 888; position: fixed; bottom: 0;height: 80px; width: 100%" >
                <p class="pull-left" style="margin-left: 70px; margin-top:10px; color: #496f89; font-size: large">合计：￥' .
            number_format(\app\models\BuyStatus::$totalAmount, 2) .
            '</p>
                <p style="font-size: large; margin-right: 70px; margin-top: 10px" class="pull-right">请上传处方照片</p>
            </div>'
        ;
    }
    ?>

</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
