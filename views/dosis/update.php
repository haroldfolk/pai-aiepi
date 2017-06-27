<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Dosis */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Dosis',
]) . $model->id_dosis;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Doses'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_dosis, 'url' => ['view', 'id' => $model->id_dosis]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="dosis-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
