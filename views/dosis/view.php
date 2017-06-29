<?php

use app\models\MetodoAplicacion;
use app\models\Vacuna;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Dosis */

$this->title = 'Dosis : '.$model->descripcion;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Doses'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dosis-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id_dosis], ['class' => 'btn btn-primary']) ?>
<!--        --><?php //echo Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id_dosis], [
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
            'id_dosis',
            'descripcion',
            'meses_minimo',
            'meses_maximo',
//            \app\models\Vacuna::findOne(['id_vacuna'=>'id_vacuna'])->nombre,
            [
                'attribute'=> 'Vacuna',
                'value'=>function($model){
                    return Vacuna::findOne(['id_vacuna'=>$model->id_vacuna])->nombre;
                }
            ],
            [
                'attribute'=> 'Metodo',
                'value'=>function($model){
                    return MetodoAplicacion::findOne(['id_metodo'=>$model->id_metodo])->tipo;
                }
            ],


        ],
    ]) ?>

</div>
