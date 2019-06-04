<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Medicine */

$this->title = 'Create Medicine';
$this->params['breadcrumbs'][] = ['label' => 'Medicines', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="medicine-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
