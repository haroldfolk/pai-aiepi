<?php

use app\models\Personal;
use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $model app\models\CentroDeSalud */

$this->title = $model->nombre;
$this->params['breadcrumbs'][] = ['label' => 'Centro De Saluds', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="centro-de-salud-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_centro], ['class' => 'btn btn-primary']) ?>

<!--        --><?php //echo Html::a('Delete', ['delete', 'id' => $model->id_centro], [
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
            'id_centro',
            'nombre',
            'direccion',
            'telefono',
        ],
    ]) ?>
<h1>Personal del Centro</h1>
    <?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => new ActiveDataProvider([
            'query' => Personal::find()->where(['id_centro'=>$model->id_centro]),
        ]),
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_personal',
            'nombre',
            'apellido',
            'sexo',
            'turno',
            // 'direccion',
            // 'telefono',
            // 'id_centro',
            // 'id_cargo',

//            ['class' => 'yii\grid\ActionColumn','template'=>'{view}{update}'],
        ],
    ]); ?>
    <?php Pjax::end(); ?></div>

</div>
