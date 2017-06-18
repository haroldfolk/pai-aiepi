<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CadenaDeFrio */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cadena-de-frio-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'fecha')->textInput() ?>

    <?= $form->field($model, 'temperatura')->textInput() ?>

    <?= $form->field($model, 'turno')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_personal')->textInput() ?>

    <?= $form->field($model, 'id_refrigerador')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
