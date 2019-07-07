<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PharmacistAppointment */

$this->title = 'Update Pharmacist Appointment: ' . $model->pa_id;
$this->params['breadcrumbs'][] = ['label' => 'Pharmacist Appointments', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->pa_id, 'url' => ['view', 'id' => $model->pa_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pharmacist-appointment-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
