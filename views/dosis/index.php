<?php

use app\models\Vacuna;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\DosisSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Doses');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dosis-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Dosis'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_dosis',
            'descripcion',
            'meses_minimo',
            'meses_maximo',
            'id_vacuna',
//             'id_metodo',
//            [
//                'attribute'=> 'Vacuna',
//                'value'=>function($model,$key){
//                    return Vacuna::findOne(['id_vacuna'=>$model->id_vacuna])->nombre;
//                }
//            ],
            ['class' => 'yii\grid\ActionColumn','template'=>' {view}{update}'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
