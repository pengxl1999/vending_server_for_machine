<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\VemStatus */

$this->title = 'Update Vem Status: ' . $model->vemc_id;
$this->params['breadcrumbs'][] = ['label' => 'Vem Statuses', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->vemc_id, 'url' => ['view', 'id' => $model->vemc_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="vem-status-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
