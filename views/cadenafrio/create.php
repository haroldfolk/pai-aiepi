<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\CadenaDeFrio */

$this->title = 'Create Cadena De Frio';
$this->params['breadcrumbs'][] = ['label' => 'Cadena De Frios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cadena-de-frio-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,'listar'=>$listar,'listap'=>$listap
    ]) ?>

</div>
