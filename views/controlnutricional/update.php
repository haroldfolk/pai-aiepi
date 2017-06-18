<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ControlNutricional */

$this->title = 'Update Control Nutricional: ' . $model->id_control;
$this->params['breadcrumbs'][] = ['label' => 'Control Nutricionals', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_control, 'url' => ['view', 'id' => $model->id_control]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="control-nutricional-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
