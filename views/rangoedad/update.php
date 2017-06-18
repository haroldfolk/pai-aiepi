<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\RangoEdad */

$this->title = 'Update Rango Edad: ' . $model->id_rango;
$this->params['breadcrumbs'][] = ['label' => 'Rango Edads', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_rango, 'url' => ['view', 'id' => $model->id_rango]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="rango-edad-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
