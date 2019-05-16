<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\VemType */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="vem-type-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'vt_id')->textInput() ?>

    <?= $form->field($model, 'vt_name')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
