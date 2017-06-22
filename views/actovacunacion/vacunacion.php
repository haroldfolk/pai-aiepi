<?php
/**
 * Created by PhpStorm.
 * User: Harold Salces
 * Date: 22/6/2017
 * Time: 05:58
 */
use yii\helpers\Html;
use yii\helpers\Url;

?>
<h1>Vacunas  a Colocar</h1>
<?php
foreach ($vacunasarray as $item){

   if (!in_array($item->id_vacuna,$vacunasyacolocadas)){
    echo Html::a('Vacunar '.$item->nombre, Url::to(['vacunar', 'id_vacuna' => $item->id_vacuna,'id_acto'=>$id_acto]),['class'=>'btn btn-default']);
//   echo Html::button($item,['class'=>'btn btn-warning']);
    echo '<br>';
   }
   echo  "No hay mas vacunas";
}
?>
