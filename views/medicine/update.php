<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Medicine */

$this->title = 'Update Medicine: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Medicines', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->m_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="medicine-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
