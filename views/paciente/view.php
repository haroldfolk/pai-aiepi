<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Paciente */

$this->title = $model->id_paciente;
$this->params['breadcrumbs'][] = ['label' => 'Pacientes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="paciente-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_paciente], ['class' => 'btn btn-primary']) ?>

    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_paciente',
            'nombre',
            'apellidos',
            'sexo',
            'fecha_de_nacimiento',
            'id_centro',
        ],
    ]) ?>
<h2>Nro Carnet de Vacunacion: <?=$carnet?></h2>
</div>
