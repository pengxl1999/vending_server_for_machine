<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\VemStatus */

$this->title = 'Create Vem Status';
$this->params['breadcrumbs'][] = ['label' => 'Vem Statuses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vem-status-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
