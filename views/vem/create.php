<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Vem */

$this->title = 'Create Vem';
$this->params['breadcrumbs'][] = ['label' => 'Vems', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vem-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
