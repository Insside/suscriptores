<?php

$ROOT = (!isset($ROOT)) ? "../../../../../" : $ROOT;
require_once($ROOT . "modulos/aplicacion/librerias/Configuracion.cnf.php");
$transaccion = isset($_REQUEST['transaccion']) ? $_REQUEST['transaccion'] : time();
$solicitud = $_REQUEST['solicitud'];

$f = new Forms($transaccion);
echo($f->apertura());
$etiquetas = array("Solicitante", "Solicitud", "Seguridad");
$valores = array("solicitante", "solicitud", "seguridad");
$ruta = "modulos/suscriptores/formularios/solicitud/visualizar/";
$urls[0] = $ruta . "solicitante.xhr.php?transaccion=" . $transaccion . "&solicitud=" . $solicitud;
$urls[1] = $ruta . "solicitud.xhr.php?transaccion=" . $transaccion . "&solicitud=" . $solicitud;
$urls[2] = $ruta . "seguridad.xhr.php?transaccion=" . $transaccion . "&solicitud=" . $solicitud;
echo($f->Tabs("solicitudes", $etiquetas, $valores, $urls));
echo($f->generar());
echo($f->cierre());
?>