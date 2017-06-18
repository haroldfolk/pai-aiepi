<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Refrigerador */

$this->title = 'Update Refrigerador: ' . $model->id_refrigerador;
$this->params['breadcrumbs'][] = ['label' => 'Refrigeradors', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_refrigerador, 'url' => ['view', 'id' => $model->id_refrigerador]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="refrigerador-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
