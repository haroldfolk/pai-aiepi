<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DosisSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dosis-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_dosis') ?>

    <?= $form->field($model, 'descripcion') ?>

    <?= $form->field($model, 'meses_minimo') ?>

    <?= $form->field($model, 'meses_maximo') ?>

    <?= $form->field($model, 'id_vacuna') ?>

    <?php // echo $form->field($model, 'id_metodo') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
