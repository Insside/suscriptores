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
$f =new Forms($transaccion);
//\\//\\ Permisos requeridos para acceder al componente.
$permiso = $sesion->getValue('SUSCRIPTORES-BUSCADOR');
if ($permiso) {
 /**
  * En este segmento se efectua la construccion del html que representa el formulario que se desea
  * visualizar, incluye el html, ccs e instrucciones en javascript necesarias
  */
 require_once($ROOT . "modulos/suscriptores/estilos/estilos.css.php");
 echo($f->apertura());
 $f->campos['busqueda'] = $f->text("busqueda", @$_REQUEST['busqueda'], 32, 'required');
 $f->campos['buscar'] = $f->button("buscar", "submit", "Buscar");
 $f->campos['avanzada'] = $f->button("avanzada", "button", "Avanzada");
 $f->celdas['busqueda'] = $f->celda("Busqueda Normal", $f->campos['busqueda']);
 $f->fila($f->celdas['busqueda']);
 $f->botones($f->campos['buscar']);
 $f->botones($f->campos['avanzada']);
 echo($f->generar());
 echo($f->cierre());
 echo($f->JavaScript("MUI.Suscriptores_Solicitudes_Buscar('" . @$_REQUEST['busqueda'] . "');"));
$f->eClick("avanzada", "MUI.Suscriptores_Solicitudes_Buscador_Avanzado();");
} else {
 /**
  * En este segmento se evalua la presentacion de una advertencia debido a que el usuario que ha intenado
  * acceder a este archivo, no posee el permiso necesario para dar uso al a las funcionalidades de este en
  * conformidad con las politicas del sistema.
  * */
 echo("Acceso Denegado");
}

echo($f->generar());
echo($f->cierre());
?>
<div style="display: block; padding-top: 10px;">
 <p style="font-size: 12px; line-height: 11px;">Este complemento le permite realizar
  búsquedas generalizadas en los datos de los suscriptores existentes en el sistema. El valor ingresado será
  buscado en cada uno de los campos que conforman el perfil de cada uno de los suscriptores
  registrados.</p>
</div>