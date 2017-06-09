<?php 
/*
 * BUSCADOR DE SUSCRIPTORES V.0.1
 * Este complemento permite filtrar y buscar suscriptores visualizando el resultado en la parte
 * central de la aplicación posee una vista basica y una avanzada, en la vista basica busca un
 * conjunto de caracteres sin definicion (texto, numero, fecha) sobre todos los datos de los suscriptores
 * existentes, en la vista avanzada permite definir explisitamente el dato y valor a buscar en
 * referencia explisita. Cargar este complemento permite generar la lista filtrada de suscriptores.
 * por lo tanto su utilizacion se restringe al modulo sobre el cual aplica.
 *
 * @copyright   Copyright (C) 2013-2018 iMIS V.2
 * @author     Jose Alexis Correa Valencia<jalexiscv@gmail.com>
 * @license     iMIS V.2
 * @package    Suscriptores
 */
//\\//\\ Cargando Librerias
$ROOT = (!isset($ROOT)) ? "../../../" : $ROOT;
$configuracion = $ROOT . "modulos/suscriptores/librerias/Configuracion.cnf.php";
require_once($configuracion);
//\\//\\ Inicializando Variables
$sesion =new Sesion();
$transaccion = @$_REQUEST['transaccion'];
$accion = @$_REQUEST['accion'];
$formulario =new Forms($transaccion);
//\\//\\ Permisos requeridos para acceder al componente.
$permiso = $sesion->getValue('SUSCRIPTORES-BUSCADOR');
if ($permiso) {
 /**
  * En este segmento se efectua la construccion del html que representa el formulario que se desea
  * visualizar, incluye el html, ccs e instrucciones en javascript necesarias
  */
 require_once($ROOT . "modulos/suscriptores/estilos/estilos.css.php");
 echo($formulario->apertura());
 $formulario->campos['busqueda'] = $formulario->text("busqueda", @$_REQUEST['busqueda'], 32, 'required');
 $formulario->campos['buscar'] = $formulario->button("buscar", "submit", "Buscar");
 $formulario->campos['avanzada'] = $formulario->button("avanzada", "button", "Avanzada");
 $formulario->celdas['busqueda'] = $formulario->celda("Busqueda Normal", $formulario->campos['busqueda']);
 $formulario->fila($formulario->celdas['busqueda']);
 $formulario->botones($formulario->campos['buscar']);
 //$formulario->botones($formulario->campos['avanzada']);
 echo($formulario->generar());
 echo($formulario->cierre());
 echo($formulario->JavaScript("MUI.Suscriptores_Legalizaciones_Buscar('" . @$_REQUEST['busqueda'] . "');"));
} else {
 /**
  * En este segmento se evalua la presentacion de una advertencia debido a que el usuario que ha intenado
  * acceder a este archivo, no posee el permiso necesario para dar uso al a las funcionalidades de este en
  * conformidad con las politicas del sistema.
  * */
 echo("Acceso Denegado");
}
?>
<div style="display: block; padding-top: 10px;">
 <p style="font-size: 12px; line-height: 11px;">Este complemento le permite realizar
  búsquedas generalizadas en los datos de los suscriptores existentes en el sistema. El valor ingresado será
  buscado en cada uno de los campos que conforman el perfil de cada uno de los suscriptores
  registrados.</p>
</div>