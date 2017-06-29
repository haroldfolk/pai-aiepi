<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Acto De Vacunacions');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="acto-de-vacunacion-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
<!--        --><?php //echo Html::a(Yii::t('app', 'Create Acto De Vacunacion'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php Pjax::begin(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProviderPaciente,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_paciente',
            'nombre',
            'apellidos',
            'sexo',
            'fecha_de_nacimiento',
            // 'id_centro',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
