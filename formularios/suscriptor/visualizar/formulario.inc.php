<?php
$ROOT = (!isset($ROOT)) ? "../../../../../" : $ROOT;
require_once($ROOT . "modulos/suscriptores/librerias/Configuracion.cnf.php");

/* 
 * Copyright (c) 2014, Jose Alexis Correa Valencia
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

/** Valores **/

/** Campos **/
require_once($ROOT . "modulos/suscriptores/formularios/suscriptor/visualizar/segmentos/perfil.inc.php");
require_once($ROOT . "modulos/suscriptores/formularios/suscriptor/visualizar/segmentos/mapa.inc.php");
//require_once($ROOT . "modulos/suscriptores/formularios/suscriptor/visualizar/segmentos/solicitudes.inc.php");
$f->campos['cerrar'] = $f->button("cerrar" . $f->id, "button", "Cerrar");
$f->campos['actualizar'] = $f->button("actualizar" . $f->id, "button", "Modificar");
/** <TabbedPane> **/
$tp = new TabbedPane(array("pagesHeight" => "410px"));
$tp->addTab("Perfil", null, $f->fila["perfil"]);
$tp->addTab("Mapa",null, $f->fila["mapa"]);
/** Compilando * */
$f->filas($tp->getPane());
/** </TabbedPane> **/
/** Botones **/
$f->botones($f->campos["cerrar"],"inferior-derecha");
$f->botones($f->campos["actualizar"],"inferior-izquierda");
/** JavaScripts **/
$f->JavaScript("MUI.titleWindow($('" . $f->ventana . "'),'".$valores['nombre']." Suscriptor <span class=\"versionamiento\"> v.1.6</span>');");
$f->JavaScript("MUI.resizeWindow($('" . ($f->ventana) . "'), {width: 800, height:500});");
$f->JavaScript("MUI.centerWindow($('" . $f->ventana . "'));");
$f->eClick("cerrar" . $f->id, "MUI.closeWindow($('" . $f->ventana . "'));");
$f->eClick("actualizar" . $f->id, "MUI.closeWindow($('" . $f->ventana . "'));;MUI.Suscriptores_Suscriptor_Modificar('".$suscriptor['suscriptor']."');");
?>

