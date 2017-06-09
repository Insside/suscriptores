<?php

$ROOT = (!isset($ROOT)) ? "../../../../../" : $ROOT;
require_once($ROOT . "modulos/aplicacion/librerias/Configuracion.cnf.php");
$transaccion = isset($_REQUEST['transaccion']) ? $_REQUEST['transaccion'] : time();
$solicitud = $_REQUEST['solicitud'];

$f = new Forms($transaccion);
echo($f->apertura());
$etiquetas = array("Matricula", "Seguridad");
$valores = array("matricula", "seguridad");
$ruta = "modulos/suscriptores/formularios/solicitud/legalizar/";
$urls[0] = $ruta . "matricula.xhr.php?transaccion=" . time() . "&solicitud=" . $solicitud;
$urls[1] = $ruta . "seguridad.xhr.php?transaccion=" . time() . "&solicitud=" . $solicitud;
echo($f->Tabs("solicitudes", $etiquetas, $valores, $urls));
echo($f->generar());
echo($f->cierre());
?>
