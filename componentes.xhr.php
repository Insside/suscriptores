<?php

$ROOT = (!isset($ROOT)) ? "../../" : $ROOT;
require_once($ROOT . "modulos/suscriptores/librerias/Configuracion.cnf.php");
require_once($ROOT . "modulos/suscriptores/librerias/Suscriptores_Menus.class.php");

$usuario=Sesion::usuario();
$menus = new Suscriptores_Menus();
echo($menus->menu("0000001000",$usuario['usuario']));

?>