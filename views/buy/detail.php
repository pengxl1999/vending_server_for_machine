<?php

use app\models\Medicine;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Medicine */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => '购买药品', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="medicine-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('返回', ['index'], ['class' => 'btn btn-primary']) ?>
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
