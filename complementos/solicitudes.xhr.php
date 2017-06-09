<?php 
$ROOT = (!isset($ROOT)) ? "../../../" : $ROOT;
require_once($ROOT . "modulos/suscriptores/librerias/Configuracion.cnf.php");
$suscriptores =new Suscriptores();
?>
<style>
 #complementos{padding: 0px;}
 #complementos p{font-size: 14px; line-height: 12px; }
 #complementos .numero{font-size: 50px; line-height: 36px; color: #375D81; text-align: right;font-weight: bold; padding: 10px; background-color: #f2f2f2;}
 #complementos .critico{font-size: 50px; line-height: 36px; color: red; text-align: right;font-weight: bold; padding: 10px; background-color: #f2f2f2;}

 #complementos h2{font-size: 14px; line-height: 12px; text-align: center; padding: 5px; background-color: #cccccc;}
</style>
<!--
<h2>Solicitudes Pendientes</h2>
<p class="critico"><?php  echo($suscriptores->solicitudes("pendientes")); ?></p>
<br>
-->
<h2>Solicitudes Legalizadas</h2>
<p class="numero"><?php  echo($suscriptores->solicitudes("legalizadas")); ?></p>
<br>
<h2>Solicitudes Recibidas</h2>
<p class="numero"><?php  echo($suscriptores->solicitudes("recibidas")); ?></p>

