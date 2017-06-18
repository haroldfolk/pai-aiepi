<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ControlNutricional */

$this->title = 'Create Control Nutricional';
$this->params['breadcrumbs'][] = ['label' => 'Control Nutricionals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="control-nutricional-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
