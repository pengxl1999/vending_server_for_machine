<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MedicineBrand */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="medicine-brand-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'mb_id')->textInput() ?>

    <?= $form->field($model, 'mb_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mb_img')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
