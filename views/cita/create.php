<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\CitaProxima */

$this->title = Yii::t('app', 'Create Cita Proxima');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Cita Proximas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cita-proxima-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
