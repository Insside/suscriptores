<?php
$ROOT = (!isset($ROOT)) ? "../../../" : $ROOT;
require_once($ROOT . "modulos/suscriptores/librerias/Configuracion.cnf.php");
header('Content-Type: application/json');
$db = new MySQL(Sesion::getConexion());
if (isset($_REQUEST["uso"])) {
    $sql = "SELECT * FROM `aplicacion_estratos` WHERE `uso` ='" . $_REQUEST["uso"] . "' ORDER BY `estrato`";
} else {
    $sql = "SELECT * FROM `aplicacion_estratos` ORDER BY `estrato`";
}
$consulta = $db->sql_query($sql);
$estratos = array();
while ($fila = $db->sql_fetchrow($consulta)) {
    array_push($estratos, $fila);
}
echo(json_encode($estratos));
?>