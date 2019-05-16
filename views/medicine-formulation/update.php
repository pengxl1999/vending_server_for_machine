<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MedicineFormulation */

$this->title = 'Update Medicine Formulation: ' . $model->mft_id;
$this->params['breadcrumbs'][] = ['label' => 'Medicine Formulations', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->mft_id, 'url' => ['view', 'id' => $model->mft_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="medicine-formulation-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
