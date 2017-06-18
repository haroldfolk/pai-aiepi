<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\CentroDeSalud */

$this->title = 'Create Centro De Salud';
$this->params['breadcrumbs'][] = ['label' => 'Centro De Saluds', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="centro-de-salud-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
