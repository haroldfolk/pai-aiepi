<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ControlNutricional */

$this->title = $model->id_control;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Control Nutricionals'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="control-nutricional-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id_control], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id_control], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_control',
            'peso',
            'talla',
            'fecha',
            'id_paciente',
            'id_personal',
        ],
    ]) ?>

</div>
