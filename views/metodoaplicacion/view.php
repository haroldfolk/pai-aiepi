<?php


use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\MetodoAplicacion */

$this->title = 'Metodo : '.$model->tipo;
$this->params['breadcrumbs'][] = ['label' => 'Metodo Aplicacions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="metodo-aplicacion-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_metodo], ['class' => 'btn btn-primary']) ?>
<!--        --><?php //echo Html::a('Delete', ['delete', 'id' => $model->id_metodo], [
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
            'id_metodo',
            'tipo',
            'descripcion',
        ],
    ]) ?>

</div>
