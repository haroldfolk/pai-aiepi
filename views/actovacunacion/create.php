<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ActoDeVacunacion */

$this->title = 'Create Acto De Vacunacion';
$this->params['breadcrumbs'][] = ['label' => 'Acto De Vacunacions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="acto-de-vacunacion-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
