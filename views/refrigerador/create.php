<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Refrigerador */

$this->title = 'Create Refrigerador';
$this->params['breadcrumbs'][] = ['label' => 'Refrigeradors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="refrigerador-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,'lista'=>$lista
    ]) ?>

</div>
