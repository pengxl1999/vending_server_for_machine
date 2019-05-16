<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\VemType */

$this->title = 'Update Vem Type: ' . $model->vt_id;
$this->params['breadcrumbs'][] = ['label' => 'Vem Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->vt_id, 'url' => ['view', 'id' => $model->vt_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="vem-type-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
