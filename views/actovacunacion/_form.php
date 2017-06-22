<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\jui\DatePicker;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ActoDeVacunacion */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="jumbotron">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'fecha')->widget(DatePicker::classname(), [
        //'language' => 'ru',
        'dateFormat' => 'yyyy-MM-dd',
    ]) ?>

    <?= $form->field($model, 'observaciones')->textInput(['maxlength' => true]) ?>



    <?= $form->field($model, 'id_personal')->dropDownList($listapersonal) ?>

<?php
echo Html::label('Vacunas para la edad ',null,['class'=>'h1']);
foreach ($vacunasarray as $item){
    echo '<br>';
    echo Html::a('Vacunar '.$item->nombre, Url::to(['vacunar', 'idvacuna' => $item->id_vacuna]),['class'=>'btn btn-default']);
//   echo Html::button($item,['class'=>'btn btn-warning']);
   echo '<br>';
}
?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
