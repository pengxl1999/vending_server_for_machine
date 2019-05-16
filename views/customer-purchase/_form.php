<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CustomerPurchase */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="customer-purchase-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'cp_id')->textInput() ?>

    <?= $form->field($model, 'c_id')->textInput() ?>

    <?= $form->field($model, 'm_id')->textInput() ?>

    <?= $form->field($model, 'cp_time')->textInput() ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'v_id')->textInput() ?>

    <?= $form->field($model, 'num')->textInput() ?>

    <?= $form->field($model, 'img')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pa_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
