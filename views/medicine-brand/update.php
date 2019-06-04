<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MedicineBrand */

$this->title = 'Update Medicine Brand: ' . $model->mb_id;
$this->params['breadcrumbs'][] = ['label' => 'Medicine Brands', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->mb_id, 'url' => ['view', 'id' => $model->mb_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="medicine-brand-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
