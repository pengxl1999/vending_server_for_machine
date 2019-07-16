<?php

/* @var $this yii\web\View */
use yii\helpers\Html;

$this->title = 'Vending Machine';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>欢迎！</h1>

        <p class="lead">您可以通过说出药品信息来查询药品！点击立即购买以开始。</p>

        <p><a class="btn btn-lg btn-success" href="./index.php?r=buy%2Findex" onclick="window.android.askForMedicineName()">立即购买</a></p>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2>使用方法</h2>

                <p>点击立即购买进入购买界面，此时机器会询问您所需要购买的药品。在机器提问完毕后，您可以说出需要购买的药品信息，包括但不限于学名、别名、英文名、适应症。稍等片刻，屏幕上将会显示您所需要的药品。如果您对识别结果不够满意，您还可以通过手动输入药品名称来进行搜索。</p>

                <p><a class="btn btn-default" href="">详细信息 &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>其他功能</h2>

                <p>使用其他功能，请点此返回菜单。</p>

                <p><a class="btn btn-default" onclick="window.android.backToMenu()">返回菜单 &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>关于我们</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/extensions/">Yii Extensions &raquo;</a></p>
            </div>
        </div>

    </div>
</div>