<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PharmacistAppointment */

$this->title = 'Create Pharmacist Appointment';
$this->params['breadcrumbs'][] = ['label' => 'Pharmacist Appointments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pharmacist-appointment-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
