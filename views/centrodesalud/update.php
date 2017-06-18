<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CentroDeSalud */

$this->title = 'Update Centro De Salud: ' . $model->id_centro;
$this->params['breadcrumbs'][] = ['label' => 'Centro De Saluds', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_centro, 'url' => ['view', 'id' => $model->id_centro]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="centro-de-salud-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
