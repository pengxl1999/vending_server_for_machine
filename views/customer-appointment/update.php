<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CustomerAppointment */

$this->title = 'Update Customer Appointment: ' . $model->ca_id;
$this->params['breadcrumbs'][] = ['label' => 'Customer Appointments', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ca_id, 'url' => ['view', 'id' => $model->ca_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="customer-appointment-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
