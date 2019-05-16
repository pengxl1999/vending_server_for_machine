<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MedicineSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="medicine-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'm_id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'commodity_name') ?>

    <?= $form->field($model, 'common_name') ?>

    <?= $form->field($model, 'other_name') ?>

    <?php // echo $form->field($model, 'english_name') ?>

    <?php // echo $form->field($model, 'type') ?>

    <?php // echo $form->field($model, 'composition') ?>

    <?php // echo $form->field($model, 'usage') ?>

    <?php // echo $form->field($model, 'symptom') ?>

    <?php // echo $form->field($model, 'attention') ?>

    <?php // echo $form->field($model, 'interaction') ?>

    <?php // echo $form->field($model, 'dose') ?>

    <?php // echo $form->field($model, 'number') ?>

    <?php // echo $form->field($model, 'guarantee') ?>

    <?php // echo $form->field($model, 'fomulation') ?>

    <?php // echo $form->field($model, 'brand') ?>

    <?php // echo $form->field($model, 'cert') ?>

    <?php // echo $form->field($model, 'manufacturer') ?>

    <?php // echo $form->field($model, 'img') ?>

    <?php // echo $form->field($model, 'money') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
