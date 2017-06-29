<?php

use app\models\Paciente;
use app\models\Personal;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\jui\DatePicker;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ControlNutricional */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="control-nutricional-form">

    <?php $form = ActiveForm::begin();
    $paciente = Paciente::find()->all();
    $listan=ArrayHelper::map($paciente,'id_paciente','nombre');
    $personal = Personal::find()->all();
    $listap=ArrayHelper::map($personal,'id_personal','nombre');?>
    <?= $form->field($model, 'peso')->textInput() ?>

    <?= $form->field($model, 'talla')->textInput() ?>

    <?= $form->field($model, 'fecha')->widget(DatePicker::classname(), [
        //'language' => 'ru',
        'dateFormat' => 'yyyy-MM-dd',
    ]) ?>
<!--    --><?php //echo $form->field($model, 'id_paciente')->dropDownList($listan) ?>

    <?= $form->field($model, 'id_personal')->dropDownList($listap) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
