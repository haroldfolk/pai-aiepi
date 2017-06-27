<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Dosis */

$this->title = Yii::t('app', 'Create Dosis');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Doses'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dosis-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
