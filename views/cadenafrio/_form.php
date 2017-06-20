<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;
/* @var $this yii\web\View */
/* @var $model app\models\CadenaDeFrio */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cadena-de-frio-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'fecha')->widget(\yii\jui\DatePicker::classname(), [
        //'language' => 'ru',
        'dateFormat' => 'yyyy-MM-dd',
    ]) ?>

    <?= $form->field($model, 'temperatura')->textInput() ?>

    <?= $form->field($model, 'turno')->dropDownList(['mañana' => 'mañana', 'tarde' => 'tarde']); ?>

    <?= $form->field($model, 'id_personal')->dropDownList($listap) ?>

    <?= $form->field($model, 'id_refrigerador')->dropDownList($listar) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
