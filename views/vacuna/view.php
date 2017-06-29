<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Vacuna */

$this->title = 'Vacuna: '.$model->nombre;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Vacunas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vacuna-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id_vacuna], ['class' => 'btn btn-primary']) ?>
<!--        --><?php //echo Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id_vacuna], [
//            'class' => 'btn btn-danger',
//            'data' => [
//                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
//                'method' => 'post',
//            ],
//        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_vacuna',
            'nombre',
            'nro_dosis',
            'unidad_de_medida',
            'descripcion',
//            'id_metodo',
        ],
    ]) ?>

</div>
