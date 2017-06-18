<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ActoDeVacunacion */

$this->title = 'Update Acto De Vacunacion: ' . $model->id_acto;
$this->params['breadcrumbs'][] = ['label' => 'Acto De Vacunacions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_acto, 'url' => ['view', 'id' => $model->id_acto]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="acto-de-vacunacion-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
