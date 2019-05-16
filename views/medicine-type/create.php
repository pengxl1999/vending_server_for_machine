<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MedicineType */

$this->title = 'Create Medicine Type';
$this->params['breadcrumbs'][] = ['label' => 'Medicine Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="medicine-type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
