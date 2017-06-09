<?php
$ROOT = (!isset($ROOT)) ? "../../../../" : $ROOT;
require_once($ROOT . "modulos/solicitudes/librerias/Configuracion.cnf.php");
Sesion::init();
/** Variables **/
$cadenas = new Cadenas();
$fechas = new Fechas();
$paises = new Paises();
$regiones = new Regiones();
$ciudades = new Ciudades();
$sectores = new Sectores();
$validaciones = new Validaciones();
$usuario=Sesion::usuario();
/** Valores **/
$valores['aforo']=time();
$valores['solicitud']=$validaciones->recibir("solicitud");
$valores['observacion']=$validaciones->recibir("_observación");
$valores['fecha']=$fechas->hoy();
$valores['hora']=$fechas->ahora();
$valores['creador']=$usuario['usuario'];

$html="<div class=\"i100x100_bloqueado\" style=\"float: left;\"></div>";
$html.="<div class=\"notificacion\"><p>Para generar la legalización pertinente y asignar el número de matrícula a la solicitud seleccionada es necesario que los funcionarios del área comercial hayan realizado las labores pertinentes al aforo.  Si el aforo no ha sido generado por favor contacte al área comercial para verificar las motivaciones y falta de respuesta en el proceso. El presente mensaje indica la falta de aprobación del aforo y hasta que este no haya sido aprobado resultara imposible continuar con el proceso de matrícula. Los documentos correspondientes a este procedimiento están adjuntos a la presente solicitud.</p></div>";
/** Campos **/
$f->campos['continuar']=$f->button("continuar".$f->id, "button","Continuar");
/** Celdas **/
$f->celdas['info']=$f->celda("",$html,"","notificacion");
/** Filas **/
$f->fila["info"]=$f->fila($f->celdas['info'],"notificacion");
/** Compilando **/
$f->filas($f->fila['info']);
/** Botones **/
$f->botones($f->campos['continuar'], "inferior-derecha");
/** JavaScripts **/
$f->JavaScript("MUI.titleWindow($('".($f->ventana)."'),\"Advertencia: Aforo\");");
$f->JavaScript("MUI.resizeWindow($('".($f->ventana)."'),{width: 480,height:240});");
$f->JavaScript("MUI.centerWindow($('".$f->ventana."'));");
$f->eClick("continuar".$f->id,"MUI.closeWindow($('".$f->ventana."'));location.reload(true);");
?>