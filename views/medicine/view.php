<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Medicine */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Medicines', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="medicine-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->m_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->m_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'm_id',
            'name',
            'commodity_name',
            'common_name',
            'other_name',
            'english_name',
            'type',
            'composition',
            'usage',
            'symptom',
            'attention',
            'interaction',
            'dose',
            'number',
            'guarantee',
            'fomulation',
            'brand',
            'cert',
            'manufacturer',
            'img',
            'money',
        ],
    ]) ?>

</div>
