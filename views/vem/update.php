<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Vem */

$this->title = 'Update Vem: ' . $model->vem_id;
$this->params['breadcrumbs'][] = ['label' => 'Vems', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->vem_id, 'url' => ['view', 'id' => $model->vem_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="vem-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
