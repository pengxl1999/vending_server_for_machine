<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Pharmacist */

$this->title = 'Update Pharmacist: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Pharmacists', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->u_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pharmacist-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
