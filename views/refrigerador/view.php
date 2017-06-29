<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Refrigerador */

$this->title = 'Refrigerador : '.$model->modelo;
$this->params['breadcrumbs'][] = ['label' => 'Refrigeradors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="refrigerador-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
<!--        --><?php //echo Html::a('Update', ['update', 'id' => $model->id_refrigerador], ['class' => 'btn btn-primary']) ?>
<!--        --><?php //echo Html::a('Delete', ['delete', 'id' => $model->id_refrigerador], [
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
            'id_refrigerador',
            'modelo',
            'marca',
            'descripcion',
            'id_centro',
        ],
    ]) ?>

</div>
