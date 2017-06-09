<?php
$ROOT = (!isset($ROOT)) ? "../../" : $ROOT;
require_once($ROOT . "modulos/suscriptores/librerias/Configuracion.cnf.php");
$suscriptores=new Suscriptores();
$transaccion = isset($_REQUEST['transaccion']) ? $_REQUEST['transaccion'] : time();
$f = new Forms($transaccion);
echo($f->apertura());
/** Campos * */
$f->campos['activos'] ="<div style=\"font-size:55px; font-weight:bold; line-height:55px; text-align:center; color:#FE3233;background-color:#ffffff\">".$suscriptores->conteo("")."</div>";
$f->campos['georeferenciados'] = "<div style=\"font-size:55px; font-weight:bold; line-height:55px; text-align:center; color:#CCCCCC;background-color:#ffffff\">".$suscriptores->conteo("WHERE `latitud` IS NOT NULL AND `longitud` IS NOT NULL")."</div>";
/** Celdas * */
$f->celdas["activos"] = $f->celda("Suscriptores Activos:", $f->campos['activos']);
$f->celdas["georeferenciados"] = $f->celda("Geo-Referenciados:", $f->campos['georeferenciados']);
/** Filas * */
$f->fila["fila1"] = $f->fila($f->celdas["activos"]);
$f->fila["fila2"] = $f->fila($f->celdas["georeferenciados"]);
/** Compilando**/
$f->filas($f->fila["fila1"] );
$f->filas($f->fila["fila2"] );
echo($f->generar());
echo($f->cierre());
?>