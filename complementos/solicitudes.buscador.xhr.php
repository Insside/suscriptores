<?php 
$ROOT = (!isset($ROOT)) ? "../../../" : $ROOT;
require_once($ROOT . "modulos/comercial/librerias/Configuracion.cnf.php");
/*
 * BUSCADOR DE SUSCRIPTORES V.0.1
 * Este complemento permite filtrar y buscar suscriptores visualizando el resultado en la parte
 * central de la aplicación posee una vista basica y una avanzada, en la vista basica busca un
 * conjunto de caracteres sin definicion (texto, numero, fecha) sobre todos los datos de los suscriptores
 * existentes, en la vista avanzada permite definir explisitamente el dato y valor a buscar en
 * referencia explisita. Cargar este complemento permite generar la lista filtrada de suscriptores.
 * por lo tanto su utilizacion se restringe al modulo sobre el cual aplica.
 * @copyright   Copyright (C) 2013-2018 iMIS V.2
 * @author     Jose Alexis Correa Valencia<jalexiscv@gmail.com>
 * @license     iMIS V.2
 * @package    Suscriptores
 */
/** Cargando Librerias **/
$transaccion = isset($_REQUEST['transaccion']) ? $_REQUEST['transaccion'] : time();
$f = new Forms($transaccion);
echo($f->apertura());
if (!isset($_REQUEST['trasmision'])) {
  require_once($ROOT . "modulos/suscriptores/complementos/solicitudes/solicitudes.inc.php");
} else {
  require_once($ROOT . "modulos/suscriptores/complementos/solicitudes/solicitudes.inc.php");
  require_once($ROOT . "modulos/suscriptores/complementos/solicitudes/solicitudes.procesador.inc.php");
}
echo($f->generar());
echo($f->cierre());
?>