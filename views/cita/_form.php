<?php

use app\models\Paciente;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\jui\DatePicker;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CitaProxima */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cita-proxima-form">

    <?php $form = ActiveForm::begin();
    $paciente = Paciente::find()->all();
    $listan=ArrayHelper::map($paciente,'id_paciente','nombre');
    ?>

    <?= $form->field($model, 'fecha_programada')->widget(DatePicker::classname(), [
        //'language' => 'ru',
        'dateFormat' => 'yyyy-MM-dd',
    ]) ?>

    <?= $form->field($model, 'motivo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_paciente')->dropDownList($listan) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
