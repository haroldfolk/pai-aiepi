<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\VacunaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="vacuna-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_vacuna') ?>

    <?= $form->field($model, 'nombre') ?>

    <?= $form->field($model, 'nro_dosis') ?>

    <?= $form->field($model, 'unidad_de_medida') ?>

    <?= $form->field($model, 'descripcion') ?>

    <?php // echo $form->field($model, 'id_metodo') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
