<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Information */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="information-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'info_id')->textInput() ?>

    <?= $form->field($model, 'info_question')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'info_result')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
