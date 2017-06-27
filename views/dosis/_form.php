<?php

use app\models\MetodoAplicacion;
use app\models\Vacuna;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Dosis */
/* @var $form yii\widgets\ActiveForm */
?>
<?php
$vacuna = Vacuna::find()->all();
$listav=ArrayHelper::map($vacuna,'id_vacuna','nombre');
$metodo = MetodoAplicacion::find()->all();
$listam=ArrayHelper::map($metodo,'id_metodo','tipo');
?>
<div class="dosis-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'descripcion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'meses_minimo')->textInput() ?>

    <?= $form->field($model, 'meses_maximo')->textInput() ?>

    <?= $form->field($model, 'id_vacuna')->dropDownList($listav) ?>

    <?= $form->field($model, 'id_metodo')->dropDownList($listam) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
