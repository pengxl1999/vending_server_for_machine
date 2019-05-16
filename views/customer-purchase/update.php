<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CustomerPurchase */

$this->title = 'Update Customer Purchase: ' . $model->cp_id;
$this->params['breadcrumbs'][] = ['label' => 'Customer Purchases', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->cp_id, 'url' => ['view', 'id' => $model->cp_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="customer-purchase-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
