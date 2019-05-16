<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MedicineMan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="medicine-man-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'mm_id')->textInput() ?>

    <?= $form->field($model, 'mm_name')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
