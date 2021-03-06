<?php

/**
 * Este archivo retorna el resultado de una consulta sobre el listadod e suscriptores en formto JSON
 * responde a una variable llamada busqueda que define el patron del dato a buscar y una variable llamada
 * criterio que de ser recibida delimita la busqueda del patron la los registros consultando un campo
 * especifico de los mismos
 * */
$ROOT = (!isset($ROOT)) ? "../../../../" : $ROOT;
require_once($ROOT . "modulos/suscriptores/librerias/Configuracion.cnf.php");
$cadenas = new Cadenas();
$sectores = new Sectores();
$ciudades = new Ciudades();

//------ Variables Reibidas
/* @var $criterio type String Representa en campo a buscar */
/* @var $buscar type String Representa el dato a buscar */
$criterio = @$_REQUEST['criterio'];
$buscar = @$_REQUEST['buscar'];
$pagina = @$_REQUEST['page'];
$cantidad = $_REQUEST["perpage"];
//---- Definiendo la expresión SQL de busqueda
if (!empty($criterio) && !empty($buscar)) {
  $buscar = "WHERE `" . $criterio . "` LIKE '%" . $buscar . "%'";
} else if (!empty($buscar)) {
  $buscar = "WHERE `sector` LIKE '%" . $buscar . "%' OR `ciudad` LIKE '%" . $buscar . "%' OR `nombre` LIKE '%" . $buscar . "%' OR `tipo` LIKE '%" . $buscar . "%' ";
} else {
  $buscar = "";
}
//----------------------------------------------------
$page = 1;
$perpage = 50;
$n = 0;
$pagination = false;

if (!empty($pagina)) {
  $pagination = true;
  $page = intval($pagina);
  $perpage = intval($cantidad);
  $n = ( $page - 1 ) * $perpage;
}
//$sorton = @$_REQUEST["sorton"];
//$sortby = @$_REQUEST["sortby"];
$db = new MySQL(Sesion::getConexion());
$acentos = $db->sql_query("SET NAMES 'utf8'");
$sql['sql'] = "SELECT * FROM `sectores` " . $buscar . " ;";
//echo($sql['sql']);
$result = $db->sql_query($sql['sql']);
$fila = $db->sql_fetchrow($result);
$total = $db->sql_numrows();

$limit = "";

if ($pagination) {
  $limit = "LIMIT $n, $perpage";
}
$result = $db->sql_query("
 SELECT * FROM `sectores` " . $buscar . " ORDER BY `sector` DESC " . $limit . "");

$ret = array();
while ($fila = $db->sql_fetchrow($result)) {
  $ciudad = $ciudades->consultar($fila['ciudad']);
  $fila['ciudad'] = $ciudad['nombre'];
  $fila['nombre'] = $cadenas->capitalizar($fila['nombre']);
  $tipo = $sectores->consultar_tipo($fila['tipo']);
  $fila['tipo'] = $tipo["nombre"];
  array_push($ret, $fila);
}
$db->sql_close();
$ret = array("page" => $page, "total" => $total, "data" => $ret);
echo json_encode($ret);
?>