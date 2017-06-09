<?php
$ROOT = (!isset($ROOT)) ? "../../../../" : $ROOT;
require_once($ROOT . "modulos/suscriptores/librerias/Configuracion.cnf.php");
$cadenas = new Cadenas();
$automatizaciones = new Automatizaciones();
$validaciones=new Validaciones();
/**
 * Este archivo retorna el resultado de una consulta sobre el listadod e suscriptores en formto JSON
 * responde a una variable llamada busqueda que define el patron del dato a buscar y una variable llamada
 * criterio que de ser recibida delimita la busqueda del patron la los registros consultando un campo
 * especifico de los mismos
 * */

//------ Variables Reibidas
/* @var $criterio type String Representa en campo a buscar */
/* @var $buscar type String Representa el dato a buscar */
$criterio =$validaciones->recibir("criterio");
$valor =$validaciones->recibir("valor");
$pagina =$validaciones->recibir("page");
$cantidad =$validaciones->recibir("perpage");
//---- Definiendo la expresión SQL de busqueda
if (!empty($criterio)) {
  $buscar = "WHERE(`".$criterio."` LIKE '%".$valor."%')";
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
$sql['sql'] = "SELECT * FROM `suscriptores` " . $buscar . " ;";
//echo($sql['sql']);
$result = $db->sql_query($sql['sql']);
$fila = $db->sql_fetchrow($result);
$total = $db->sql_numrows();

$limit = "";

if ($pagination) {
  $limit = "LIMIT $n, $perpage";
}
$result = $db->sql_query("
 SELECT
*
FROM `suscriptores` " . $buscar . "
ORDER BY `suscriptor` ASC " . $limit . "");

$ret = array();
while ($fila = $db->sql_fetchrow($result)) {
  //$suscriptor = "<a href=\"#\" onClick=\"MUI.Suscriptores_Suscriptor_Visualizar('" . $fila['suscriptor'] . "');\">" . $fila['suscriptor'] . "</a>";
  $suscriptor['suscriptor']=$fila['suscriptor'];
  $suscriptor['nombre'] = $cadenas->capitalizar($fila['nombres'] . " " . $fila['apellidos']);
  $suscriptor['direccion']= $cadenas->capitalizar($fila['direccion'] . " " . $fila['referencia']);
  $suscriptor['telefonos']=$fila['telefonos'];
  $suscriptor['estrato']=$fila['estrato'];
  $suscriptor['creado']=$fila['creado'];
 // $fila['gis'] = (isset($fila['latitud']) && isset($fila['longitud'])) ? "<img src=\"imagenes/16x16/geo-16x16.png\" width=\"16\" height=\"16\" >" : "";
   array_push($ret, $suscriptor);
}
$db->sql_close();
$ret = array("page" => $page, "total" => $total, "data" => $ret);
echo json_encode($ret);
?>