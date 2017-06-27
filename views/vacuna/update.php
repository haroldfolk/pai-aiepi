<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Vacuna */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Vacuna',
]) . $model->id_vacuna;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Vacunas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_vacuna, 'url' => ['view', 'id' => $model->id_vacuna]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="vacuna-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
