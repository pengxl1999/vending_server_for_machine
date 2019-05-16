<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\VemStatus */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="vem-status-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'vem_id')->textInput() ?>

    <?= $form->field($model, 'm_id')->textInput() ?>

    <?= $form->field($model, 'num')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
