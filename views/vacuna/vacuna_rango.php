<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\VacunaRango */
/* @var $form ActiveForm */
?>
<div class="vacuna_rango">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'id_rango') ?>
        <?= $form->field($model, 'id_vacuna') ?>
    
        <div class="form-group">
            <?= Html::submitButton(Yii::t('app', 'Submit'), ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- vacuna_rango -->
