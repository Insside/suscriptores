<?php 
$ROOT = (!isset($ROOT)) ? "../../../" : $ROOT;
require_once($ROOT . "modulos/suscriptores/librerias/Configuracion.cnf.php");
$legalizaciones =new Legalizaciones();
?>
<style>
 #complementos{padding: 0px;}
 #complementos p{font-size: 14px; line-height: 12px; }
 #complementos .numero{font-size: 50px; line-height: 36px; color: #375D81; text-align: right;font-weight: bold; padding: 10px; background-color: #f2f2f2;}
 #complementos .critico{font-size: 50px; line-height: 36px; color: red; text-align: right;font-weight: bold; padding: 10px; background-color: #f2f2f2;}

 #complementos h2{font-size: 14px; line-height: 12px; text-align: center; padding: 5px; background-color: #cccccc;}
</style>
<!--<h2>Legalizaciones Pendientes</h2>
<p class="critico"><?php  echo($legalizaciones->conteo("pendientes")); ?></p>
<br>-->
<h2>Legalizaciones Realizadas</h2>
<p class="numero"><?php  echo($legalizaciones->conteo("realizadas")); ?></p>
<br>
<h2>Total Registrado</h2>
<p class="numero"><?php  echo($legalizaciones->conteo("total")); ?></p>

