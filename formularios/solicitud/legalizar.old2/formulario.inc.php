<?php
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
$_PATH=dirname(__FILE__);
require_once($_PATH."/includes/variables.inc.php");
require_once($_PATH."/includes/campos.inc.php");
require_once($_PATH."/includes/celdas.inc.php");
require_once($_PATH."/includes/perfil.inc.php");
require_once($_PATH."/includes/predio.inc.php");
require_once($_PATH."/includes/clasificacion.inc.php");
require_once($_PATH."/includes/referencias.inc.php");
require_once($_PATH."/includes/servicios.inc.php");
/** <TabbedPane> **/
$tp = new TabbedPane(array("pagesHeight" => "390px"));
$tp->addTab("Perfil",null, $f->fila["perfil"]);
//$tp->addTab("Predio",null, $f->fila["predio"]);
//$tp->addTab("Clasificación",null, $f->fila["clasificacion"]);
//$tp->addTab("Servicios",null, $f->fila["servicios"]);
//$tp->addTab("Referencias",null, $f->fila["referencias"]);
/** Compilando * */
$f->filas($tp->getPane());
/** </TabbedPane> **/
/** Botones * */
$f->botones($f->campos['ayuda'], "inferior-izquierda");
$f->botones($f->campos['georeferenciar'], "inferior-izquierda");
$f->botones($f->campos['guardar'], "inferior-derecha");
$f->botones($f->campos['cancelar'], "inferior-derecha");
/** JavaScripts * */
$f->windowTitle("Modificar / Suscriptor / {$v["nombre"]}","3.2");
$f->JavaScript("MUI.resizeWindow($('" . ($f->ventana) . "'),{width:640,height:480});");
$f->JavaScript("MUI.centerWindow($('" . $f->ventana . "'));");
$f->eClick("cancelar" . $f->id, "MUI.closeWindow($('" . $f->ventana . "'));");
?>