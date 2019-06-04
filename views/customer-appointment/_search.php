<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CustomerAppointmentSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="customer-appointment-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ca_id') ?>

    <?= $form->field($model, 'ca_order') ?>

    <?= $form->field($model, 'c_id') ?>

    <?= $form->field($model, 'm_id') ?>

    <?= $form->field($model, 'ca_time') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'v_id') ?>

    <?php // echo $form->field($model, 'deadline') ?>

    <?php // echo $form->field($model, 'num') ?>

    <?php // echo $form->field($model, 'img') ?>

    <?php // echo $form->field($model, 'pa_id') ?>

    <?php // echo $form->field($model, 'money') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
