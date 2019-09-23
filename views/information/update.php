<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Information */

$this->title = 'Update Information: ' . $model->info_id;
$this->params['breadcrumbs'][] = ['label' => 'Informations', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->info_id, 'url' => ['view', 'id' => $model->info_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="information-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
