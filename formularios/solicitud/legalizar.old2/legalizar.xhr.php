<?php

define("PATH", dirname(__FILE__));
define('ROOT', PATH . "/../../../../../");

require_once(ROOT . "modulos/suscriptores/librerias/Configuracion.cnf.php");
require_once(ROOT . "modulos/comercial/librerias/Comercial_Aforos.class.php");
Sesion::init();

$validaciones=new Validaciones();
$transaccion = $validaciones->recibir("transaccion");
$trasmision = $validaciones->recibir("trasmision");

$sp = new Suscriptores_Permisos();
$aforos = new Comercial_Aforos();
$solicitudes = new Solicitudes();

$solicitud = $solicitudes->consultar($validaciones->recibir("solicitud"));
$aforo = $aforos->solicitud($solicitud['solicitud']);
$estado = $aforos->estado($aforo['aforo']);

$f = new Forms($transaccion);
echo($f->apertura());

if (Sesion::Iniciada()) {
    if (empty($trasmision)) {
        if ($aforo) {
            require_once(PATH . "/formulario.inc.php");
        } else {
            require_once(PATH . "/aforo.inc.php");
        }
    } else {
        require_once(PATH . "/procesador.inc.php");
    }
} else {
    require_once(PATH . "/reconexion.inc.php");
}
echo($f->generar());
echo($f->controles());
echo($f->cierre());
?>