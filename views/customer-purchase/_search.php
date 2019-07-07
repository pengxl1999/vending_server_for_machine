<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CustomerPurchaseSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="customer-purchase-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'cp_id') ?>

    <?= $form->field($model, 'c_id') ?>

    <?= $form->field($model, 'm_id') ?>

    <?= $form->field($model, 'cp_time') ?>

    <?= $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'v_id') ?>

    <?php // echo $form->field($model, 'num') ?>

    <?php // echo $form->field($model, 'img') ?>

    <?php // echo $form->field($model, 'pa_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
