<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\VemStatusSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="vem-status-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'vemc_id') ?>

    <?= $form->field($model, 'vem_id') ?>

    <?= $form->field($model, 'm_id') ?>

    <?= $form->field($model, 'num') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
