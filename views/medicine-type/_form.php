<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MedicineType */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="medicine-type-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'mt_id')->textInput() ?>

    <?= $form->field($model, 'mt_name')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
