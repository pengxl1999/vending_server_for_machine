<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Vem */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="vem-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'vem_id')->textInput() ?>

    <?= $form->field($model, 'vem_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'vem_location')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'vem_type')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
