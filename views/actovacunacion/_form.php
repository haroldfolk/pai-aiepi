<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ActoDeVacunacion */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="acto-de-vacunacion-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'fecha')->widget(\yii\jui\DatePicker::classname(), [
        //'language' => 'ru',
        'dateFormat' => 'yyyy-MM-dd',
    ]) ?>

    <?= $form->field($model, 'observaciones')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_paciente')->dropDownList($listapacientes) ?>

    <?= $form->field($model, 'id_personal')->dropDownList($listapersonal) ?>

    <?= $form->field($model, 'id_control')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
