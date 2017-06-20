<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RangoEdad */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="rango-edad-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_rango')->hiddenInput() ?>

    <?= $form->field($model, 'desde')->textInput() ?>

    <?= $form->field($model, 'hasta')->textInput() ?>

    <?= $form->field($model, 'observaciones')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
