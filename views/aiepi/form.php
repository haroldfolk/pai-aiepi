<?php

use app\models\CentroDeSalud;
use app\models\Dosis;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\jui\DatePicker;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PaiForm */
/* @var $form ActiveForm */

?>
<div class="aiepi-form">

    <?php $form = ActiveForm::begin();
    $centro= CentroDeSalud::find()->all();
    ?>

        <?= $form->field($model, 'fechainicio')->widget(DatePicker::classname(), [
            //'language' => 'ru',
            'dateFormat' => 'yyyy-MM-dd',
        ]) ?>
        <?= $form->field($model, 'fechafin')->widget(DatePicker::classname(), [
            //'language' => 'ru',
            'dateFormat' => 'yyyy-MM-dd',
        ]) ?>
        <?= $form->field($model, 'sexo')->dropDownList(['H' => 'Hombres', 'M' => 'Mujeres']) ?>
    <?= $form->field($model, 'edadinicio')->textInput()?>
    <?= $form->field($model, 'edadfin')->textInput()?>
    <?= $form->field($model, 'idcentro')->dropDownList(ArrayHelper::map($centro,'id_centro','nombre')) ?>
        <div class="form-group">
            <?= Html::submitButton(Yii::t('app', 'Submit'), ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- pai-form -->
