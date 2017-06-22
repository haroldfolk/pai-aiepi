<?php

use yii\helpers\Html;
use yii\jui\DatePicker;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ControlNutricional */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="control-nutricional-form">

    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'fecha')->widget(DatePicker::classname(), [
        //'language' => 'ru',
        'dateFormat' => 'yyyy-MM-dd',
    ]) ?>
    <?= $form->field($model, 'peso')->textInput() ?>

    <?= $form->field($model, 'talla')->textInput() ?>

    <?= $form->field($model, 'nro_de_carnet')->textInput([ 'disabled' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
