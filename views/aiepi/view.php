<?php
/* @var $this yii\web\View */
?>
<h1>Resumen de Cuaderno AIEPI </h1>
<h3 class="alert-info">Para edades entre <?=$model->edadinicio?> y <?=$model->edadfin?> del sexo <?=$model->sexo=='H'? 'Hombres':'Mujeres'?></h3>
<h2>Clasificacion Peso</h2>
<br>
<p>
  <h2 class="alert alert-danger">Obesidad : <?=$OB?></h2>
    <h2 class="alert alert-warning">SobrePeso :<?=$SO?></h2>
<h2 class="alert alert-success">Peso Normal :<?=$NO?></h2>
<h2 class="alert alert-warning">Desnutricion Moderada :<?=$DM?></h2>
<h2 class="alert alert-danger">Desnutricion Critica :<?=$DC?></h2>
</p>
<h2>Clasificacion Talla</h2>
<br>
<p>
<h2 class="alert alert-info">Talla Normal: <?=$TN?></h2>
<h2 class="alert alert-warning">Talla Baja: <?=$TB?></h2>
</p>