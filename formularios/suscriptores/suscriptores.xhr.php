<?php
$ROOT = (!isset($ROOT)) ? "../../../../" : $ROOT;
require_once($ROOT . "modulos/solicitudes/librerias/Configuracion.cnf.php");
$sesion=new Sesion();
$validaciones=new Validaciones();
/*
 * Copyright (c) 2013, Alexis
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without
 * modification, are permitted provided that the following conditions are met:
 *
 * * Redistributions of source code must retain the above copyright notice, this
 *   list of conditions and the following disclaimer.
 * * Redistributions in binary form must reproduce the above copyright notice,
 *   this list of conditions and the following disclaimer in the documentation
 *   and/or other materials provided with the distribution.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS"
 * AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE
 * IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE
 * ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT HOLDER OR CONTRIBUTORS BE
 * LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR
 * CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF
 * SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS
 * INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN
 * CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE)
 * ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE
 * POSSIBILITY OF SUCH DAMAGE.
 */
$usuario=Sesion::usuario();
$v['uid']=$usuario['usuario'];
$v['criterio']=$validaciones->recibir("criterio");
$v['valor']=$validaciones->recibir("valor");
$v['fechainicial']=$validaciones->recibir("fechainicial");
$v['fechafinal']=$validaciones->recibir("fechafinal");
$v['transaccion']=$validaciones->recibir("transaccion");
$v['url']="modulos/suscriptores/formularios/suscriptores/suscriptores.json.php?"
        . "uid=".$v['uid']
        . "&criterio=".$v['criterio']
        . "&valor=".$v['valor']
        . "&fechainicial=".$v['fechainicial']
        . "&fechafinal=".$v['fechafinal']
        . "&transaccion=".$v['transaccion']."&time=".time();

/** Creación de la tabla **/
$tabla = new Grid(array("id" =>"Grid_". time(), "url" => $v['url']));
$tabla->boton('btnCrear', 'Registrar', '', "MUI.Suscriptores_Suscriptor_Crear", "new");
$tabla->boton('btnVer', 'Acceder', 'suscriptor', 'MUI.Suscriptores_Suscriptor_Visualizar', "pAbrir");
$tabla->boton('btnModificar', 'Modificar', 'suscriptor', "MUI.Suscriptores_Suscriptor_Modificar", "edit");
//$tabla->boton('btnTrasferir', 'Trasferir', 'solicitud', "MUI.Solicitudes_Trasferir", "edit");
//$tabla->boton('btnEliminar', 'Eliminar', 'solicitud', "MUI.Solicitudes_Solicitud_Eliminar", "pEliminar");
$tabla->boton('btnFiltrar', 'Filtrar', '', "MUI.Comercial_Complementos_Suscriptores_Filtrar", "pBuscar");
//$tabla->boton('btnResponsables', 'Información', 'solicitud', "MUI.Solicitudes_Responsables", "pInformacion");
$tabla->columna('cSuscriptor', 'Suscriptor', 'suscriptor', 'string', '90', 'center', 'false');
$tabla->columna('cNombre', 'Nombre', 'nombre', 'string', '300', 'left', 'false');
$tabla->columna('cDireccion', 'Dirección', 'direccion', 'string', '200', 'left', 'false');
$tabla->columna('cTelefonos', 'Teléfonos ', 'telefonos', 'string', '90', 'left', 'false');
$tabla->columna('cEstrato', 'Estrato ', 'estrato', 'string', '45', 'left', 'false');
//$tabla->columna('cEquipo', 'Equipo', 'equipo', 'string', '90', 'center', 'true');
//$tabla->columna('cCodigo', 'Solicitud', 'codigo', 'string', '90', 'center', 'false');
//$tabla->columna('cDetalles', 'Detalles (Servicio+Categoria+Causal+Suscriptor)', 'detalles', 'string', '570', 'left', 'false');
//$tabla->columna('cRespuesta-Dias', '<a href=\"#\" onClick=\"MUI.Notificacion(\'Dias Habiles Trascurridos\');\">DHT</a>', 'respuesta-dht', 'string', '40', 'center', 'false');
//$tabla->columna('cEstados', 'Estados', 'estados', 'string', '90', 'center', 'false');
//$tabla->columna('cFecha', 'Radicación', 'radicacion', 'date', '90', 'center', 'false');
//$tabla->columna('cEquipo', 'Equipo', 'equipo', 'string', '90', 'center', 'false');
//$tabla->columna('cCreador', 'Creador', 'creador', 'string', '90', 'center', 'false');
//$tabla->columna('cRespuesta', 'Respuesta', 'respuesta', 'string', '110', 'center', 'false');
//$tabla->columna('cRespuesta-Tipo','<a href=\"#\" onClick=\"MUI.Notificacion(\'Tipo de Respuesta\');\">TR</a>', 'respuesta-tipo', 'string', '45', 'center', 'false');
//$tabla->columna('cRespuesta-Fecha', '<a href=\"#\" onClick=\"MUI.Notificacion(\'Fecha de Respuesta\');\">FR</a>', 'respuesta-fecha', 'string', '90', 'center', 'false');
//$tabla->columna('cNotificacion', 'Notificación', 'notificacion', 'string', '90', 'center', 'false');
//$tabla->columna('cNotificacionFecha','<a href=\"#\" onClick=\"MUI.Notificacion(\'Fecha de Notificación de Ejecución\');\">FNE</a>', 'notificacion-fecha', 'date', '90', 'center', 'false');
//$tabla->columna('cNotificacionTipo','<a href=\"#\" onClick=\"MUI.Notificacion(\'Tipo de Notificación\');\">TN</a>', 'notificacion-tipo', 'date', '45', 'center', 'false');
$tabla->generar();
?>
