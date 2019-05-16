<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CustomerCar */

$this->title = 'Update Customer Car: ' . $model->cc_id;
$this->params['breadcrumbs'][] = ['label' => 'Customer Cars', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->cc_id, 'url' => ['view', 'id' => $model->cc_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="customer-car-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
