<?php
/* @var $this yii\web\View */
use yii\grid\GridView;
use yii\widgets\Pjax;

?>
<h1 class="alert alert-info">Bienvenido al Cuaderno de AIEPI</h1>

<p>

</p><?php Pjax::begin(); ?>    <?= GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
//        ['class' => 'yii\grid\SerialColumn'],

        'id_control',


        ['class' => 'yii\grid\ActionColumn', 'template' => '{view} {update}'],
    ],
]); ?>
<?php Pjax::end(); ?>