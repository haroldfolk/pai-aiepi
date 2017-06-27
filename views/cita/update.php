<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CitaProxima */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Cita Proxima',
]) . $model->id_cita;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Cita Proximas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_cita, 'url' => ['view', 'id' => $model->id_cita]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="cita-proxima-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
