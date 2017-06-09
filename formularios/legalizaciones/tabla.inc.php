<?php
$ROOT = (!isset($ROOT)) ? "../../../../../" : $ROOT;
require_once($ROOT . "modulos/solicitudes/librerias/Configuracion.cnf.php");
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
$v['inicio']=$validaciones->recibir("inicio");
$v['final']=$validaciones->recibir("final");
$v['transaccion']=$validaciones->recibir("transaccion");
$v['url']="modulos/suscriptores/formularios/legalizaciones/legalizaciones.json.php?"
        . "uid=".$v['uid']
        . "&criterio=".$v['criterio']
        . "&valor=".$v['valor']
        . "&inicio=".$v['inicio']
        . "&final=".$v['final']
        . "&transaccion=".$v['transaccion']."&time=".time();

/** Creación de la tabla **/
$tabla = new Grid(array("id" =>"Grid_". time(), "url" => $v['url']));
//$tabla->boton('btnCrear', 'Radicar', '', "MUI.Solicitudes_Solicitud_Crear", "new");
//$tabla->boton('btnVer', 'Acceder', 'solicitud', "MUI.Solicitudes_Solicitud_Consultar", "pAbrir");
//$tabla->boton('btnModificar', 'Modificar', 'usuario', "MUI.Usuarios_Usuario_Modificar", "edit");
//$tabla->boton('btnTrasferir', 'Trasferir', 'solicitud', "MUI.Solicitudes_Trasferir", "edit");

$tabla->boton('btnFiltrar', 'Filtrar', '', "MUI.Solicitudes_Legalizaciones_Filtrar", "filtrar");
$tabla->boton('btnImprimir', 'Imprimir', 'matricula','MUI.Suscriptores_Constancia_Matricula', "imprimir");
$tabla->columna('cSolicitud', 'Solicitud', 'solicitud', 'string', '90', 'center', 'true');
$tabla->columna('ccSolicitud', 'Solicitud', 'csolicitud', 'string', '90', 'center', 'false');
$tabla->columna('cMatricula', 'Matricula', 'matricula', 'string', '90', 'center', 'true');
$tabla->columna('cMatricula', 'Matricula', 'cmatricula', 'string', '90', 'center', 'false');
$tabla->columna('cDetalles', 'Detalles (Suscriptor + Dirección De Instalación )', 'detalles', 'string', '440', 'left', 'false');
$tabla->columna('cUso', '#U', 'uso', 'string', '50', 'center', 'false');
$tabla->columna('cEstrato', '#E', 'estrato', 'string', '50', 'center', 'false');
$tabla->columna('cRadicacion', 'Radicación', 'radicacion', 'date', '90', 'center', 'false');
$tabla->columna('cAforo', 'Aforo', 'aforo', 'date', '90', 'center', 'false');
$tabla->columna('cLegalizacion', 'Legalización', 'legalizacion', 'date', '90', 'center', 'false');
$tabla->columna('cInstalacion', 'Instalación', 'instalacion', 'date', '90', 'center', 'false');
$tabla->columna('cDhta', 'DHTA', 'dhta', 'string', '90', 'center', 'false');
$tabla->columna('cDhtl', 'DHTL', 'dhtl', 'string', '90', 'center', 'false');
$tabla->columna('cDht', 'DHT', 'dht', 'string', '90', 'center', 'false');
$tabla->columna('cDhti', 'DHTI', 'dhti', 'string', '90', 'center', 'false');
$tabla->columna('cCreador', 'Creador', 'creador', 'string', '90', 'center', 'false');
$tabla->columna('cActualizador', 'Actualizador', 'actualizador', 'string', '90', 'center', 'false');
$tabla->generar();
?>