<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = "错误！";
?>

<div class="site-error">

    <p>
        <?= Html::a('返回购买', ['buy/index'], ['class' => 'btn btn-primary', 'style' => 'font-size: large']) ?>
    </p>

    <h1><?= Html::encode($this->title) ?></h1>
    <br/>

    <div class="alert alert-danger">
        <?php echo $message; ?>
    </div>

    <p>
        The above error occurred while the Web server was processing your request.
    </p>
    <p>
        Please contact us if you think this is a server error. Thank you.
    </p>

</div>
