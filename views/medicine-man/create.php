<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MedicineMan */

$this->title = 'Create Medicine Man';
$this->params['breadcrumbs'][] = ['label' => 'Medicine Men', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="medicine-man-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
