<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\RangoEdad */

$this->title = 'Create Rango Edad';
$this->params['breadcrumbs'][] = ['label' => 'Rango Edads', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rango-edad-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
