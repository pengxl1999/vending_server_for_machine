<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\VemType */

$this->title = 'Create Vem Type';
$this->params['breadcrumbs'][] = ['label' => 'Vem Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vem-type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
