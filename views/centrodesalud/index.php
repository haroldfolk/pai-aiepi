<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Centro De Saluds';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="centro-de-salud-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Centro De Salud', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_centro',
            'nombre',
            'direccion',
            'telefono',

            ['class' => 'yii\grid\ActionColumn','template'=>'{update}{view}'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
