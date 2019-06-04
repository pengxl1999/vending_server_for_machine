<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PharmacistAppointmentSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pharmacist-appointment-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'pa_id') ?>

    <?= $form->field($model, 'p_id') ?>

    <?= $form->field($model, 'time') ?>

    <?= $form->field($model, 'image') ?>

    <?= $form->field($model, 'reason') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
