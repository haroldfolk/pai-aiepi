<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ActoDeVacunacion */

$this->title = $model->id_acto;
$this->params['breadcrumbs'][] = ['label' => 'Acto De Vacunacions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="acto-de-vacunacion-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_acto], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_acto], [
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
            'id_acto',
            'fecha',
            'observaciones',
            'id_paciente',
            'id_personal',
            'id_control',
        ],
    ]) ?>

</div>
