<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CadenaDeFrio */

$this->title = 'Update Cadena De Frio: ' . $model->nro_control;
$this->params['breadcrumbs'][] = ['label' => 'Cadena De Frios', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nro_control, 'url' => ['view', 'id' => $model->nro_control]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cadena-de-frio-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
