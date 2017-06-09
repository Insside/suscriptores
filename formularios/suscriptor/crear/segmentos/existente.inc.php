<?php

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
$valores['info']="<div id='i100x100_seguro' style=\"float: left;\"/></div><p><b>Error</b>: "
        . "<u>el suscriptor que intenta registrar ya existe</u> verifique numero que ha ingresado y de ser el mismo "
        . "esta acción resulta improcedente, por tal motivo debera presionar <u>cancelar</u>"
        . "si se debe a un error en la digitación, inténtelo nuevamente. Para proceder con la verificacion presione <u>reintentar</u>. Si desea  salir "
        . "del presente formato presione <u>cancelar</u>.</p>";
$valores['suscriptor']=$validaciones->recibir("suscriptor");
$valores['advertencia']="";
/** Campos **/
$f->campos['info']=$valores['info'];
$f->campos['suscriptor']=$f->text("suscriptor",$valores['suscriptor'], "10","required", false);
$f->campos['ayuda'] = $f->button("ayuda" . $f->id, "button","Ayuda");
$f->campos['cancelar'] = $f->button("cancelar" . $f->id, "button","Cancelar");
$f->campos['continuar'] = $f->button("continuar" . $f->id, "submit","Reintentar");
/** Celdas **/
$f->celdas["info"] = $f->celda("", $f->campos['info'],"","sinfondo");
$f->celdas["suscriptor"] = $f->celda("Suscriptor:", $f->campos['suscriptor']);
/** Filas **/
$f->fila["fila1"] = $f->fila($f->celdas["info"]);
$f->fila["fila2"] = $f->fila($f->celdas["suscriptor"]);
/** Compilando **/
$f->filas($f->fila['fila1']);
$f->filas($f->fila['fila2']);
/** Botones **/
$f->botones($f->campos['ayuda'], "inferior-izquierda");
$f->botones($f->campos['cancelar'], "inferior-derecha");
$f->botones($f->campos['continuar'], "inferior-derecha");
/** JavaScripts **/
$f->JavaScript("MUI.titleWindow($('" . ($f->ventana) . "'), \"Verificar Existencia\");");
$f->JavaScript("MUI.resizeWindow($('" . ($f->ventana) . "'), {width: 480, height:230});");
$f->JavaScript("MUI.centerWindow($('" . $f->ventana . "'));");
$f->eClick("cancelar" . $f->id, "MUI.closeWindow($('" . $f->ventana . "'));");
?>

