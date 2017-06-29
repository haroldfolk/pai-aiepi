<?php

use yii\helpers\Html;
use yii\helpers\Url;


/* @var $this yii\web\View */
/* @var $model app\models\ActoDeVacunacion */

$this->title = Yii::t('app', 'Create Acto De Vacunacion');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Acto De Vacunacions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="acto-de-vacunacion-create">

    <h1>Acto de Vacunacion</h1>


    <?= $this->render('_form', [
        'model' => $model
    ]) ?>

</div>
