<?php
if(!defined("ROOT")){define('ROOT', dirname(__FILE__) . '/../../../');}
if(!defined("ROOT_MODULE_USUARIOS")){define('ROOT_MODULE_USUARIOS', dirname(__FILE__) . '/../');}
$ROOT = (!isset($ROOT)) ? ROOT:$ROOT;
require_once($ROOT . "librerias/Configuracion.cnf.php");
Sesion::init();
require_once($ROOT . "librerias/Cadenas.class.php");
require_once($ROOT . "librerias/Sectores.class.php");
require_once($ROOT . "librerias/Componentes.class.php");
require_once($ROOT . "librerias/Forms.class.php");
// Propio Modulo
require_once($ROOT . "modulos/suscriptores/librerias/Lecturas.class.php");
require_once($ROOT . "modulos/suscriptores/librerias/Consumos.class.php");
require_once($ROOT . "modulos/suscriptores/librerias/Suscriptores.class.php");
require_once($ROOT . "modulos/suscriptores/librerias/Suscriptores_Georeferencias.class.php");
require_once($ROOT . "modulos/suscriptores/librerias/Suscriptores_Permisos.class.php");
require_once($ROOT . "modulos/suscriptores/librerias/Legalizaciones.class.php");
require_once($ROOT . "modulos/suscriptores/librerias/Instalaciones.class.php");
require_once($ROOT . "modulos/suscriptores/librerias/Suscriptores_Usos.class.php");
require_once($ROOT . "modulos/suscriptores/librerias/Suscriptores_Estratos.class.php");
require_once($ROOT . "modulos/suscriptores/librerias/Suscriptores_Aforos.class.php");
require_once($ROOT . "modulos/suscriptores/librerias/Suscriptores_Suscriptores.class.php");
require_once($ROOT . "modulos/suscriptores/librerias/Suscriptores_Suscriptor.class.php");
require_once($ROOT . "modulos/suscriptores/librerias/Suscriptores_Matricula_Solicitud.class.php");
//Otros Modulos
require_once($ROOT . "modulos/aplicacion/librerias/Aplicacion_Menus.class.php");
require_once($ROOT . "modulos/solicitudes/librerias/Solicitudes.class.php");
require_once($ROOT . "modulos/solicitudes/librerias/Asuntos.class.php");
require_once($ROOT . "modulos/solicitudes/librerias/Causales.class.php");
require_once($ROOT . "modulos/solicitudes/librerias/Categorias.class.php");
require_once($ROOT . "modulos/solicitudes/librerias/Servicios.class.php");
require_once($ROOT . "modulos/usuarios/librerias/Usuarios.class.php");
require_once($ROOT . "modulos/usuarios/librerias/Usuarios_Permisos.class.php");
require_once($ROOT . "modulos/distribucion/librerias/Distribucion.class.php");
?>