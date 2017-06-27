<?php
use yii\helpers\Html;
use yii\helpers\Url;

echo Html::label('Vacunas para la edad ',null,['class'=>'h1']);
foreach ($dosisParaPaciente as $item){

   echo '<br>';
    echo Html::a('Vacunar '.$item->descripcion, Url::to(['confirmarvacuna', 'idActo'=>$model->id_acto,'idDosis' => $item->id_dosis]),['class'=>'btn btn-default']);
//   echo Html::button($item,['class'=>'btn btn-warning']);
    echo '<br>';
    echo '<br>';


}
?>

echo Html::a('Salir al inicio', Url::to(['index']),['class'=>'btn btn-default']);


?>