<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MedicineFormulation */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="medicine-formulation-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'mft_id')->textInput() ?>

    <?= $form->field($model, 'mtf_name')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
