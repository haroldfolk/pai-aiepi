<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\CadenaDeFrio */

$this->title = 'Cadena de Frio';
$this->params['breadcrumbs'][] = ['label' => 'Cadena De Frios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cadena-de-frio-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
<!--        --><?php //echo Html::a('Update', ['update', 'id' => $model->nro_control], ['class' => 'btn btn-primary']) ?>
<!--        --><?php //echo Html::a('Delete', ['delete', 'id' => $model->nro_control], [
//            'class' => 'btn btn-danger',
//            'data' => [
//                'confirm' => 'Are you sure you want to delete this item?',
//                'method' => 'post',
//            ],
//        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'nro_control',
            'fecha',
            'temperatura',
            'turno',
            'id_personal',
            'id_refrigerador',
        ],
    ]) ?>
    <h3 align="center" class="alert alert-info" role="alert"><?php echo $mensaje?></h3>
</div>
