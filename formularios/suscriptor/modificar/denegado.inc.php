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
$solicitud = $_REQUEST['solicitud'];
$f->oculto("solicitud", $solicitud);
$html = "<div class=\"i100x100_advertencia\" style=\"float: left;\"></div>";
$html.="<div class=\"notificacion\"><p><b>Modificar Suscriptor.</b><br>";
$html.="Sus permisos definidos en el sistema no le permiten ejecutar esta acción "
        . "si necesita elevar sus privilegios en el sistema para poder modificar la información "
        . "correspondiente a la matricula del suscriptor seleccionado debera contactar al departamento "
        . "de sistemas, o al asesor responsable de la administración del sistema."
        . "</p></hr>"
        . "<p>Para realizar esta acción cuando menos uno de sus <i>Roles</i> en el sistema, debera tener "
        . "asignado entre sus privilegios el permiso <b>SUSCRIPTORES-SUSCRIPTOR-MODIFICAR</b>, "
        . "solicite la asignacción de este permiso e intentelo nuevamente.";
$html.="</p></div>";
$f->campos['solicitud'] = $f->campo("solicitud", $solicitud);
$f->campos['cerrar'] = $f->button("cerrar" . $f->id, "button", "Cerrar");
// Celdas
$f->celdas['info'] = $f->celda("", $html, "", "notificacion");
// Filas
$f->fila["info"] = $f->fila($f->celdas['info'], "notificacion");
//Compilacion
$f->filas($f->fila['info']);
$f->botones($f->campos['cerrar'],"inferior-derecha");
/** JavaScript **/
$f->JavaScript("MUI.titleWindow($('" . ($f->ventana) . "'),\"Notificación:  <span style='color:red;'>Acceso Restringido</span> <span style='color:#cccccc;'>v1.0</span>\");");
$f->JavaScript("MUI.resizeWindow($('" . ($f->ventana) . "'),{width:480,height:260});");
$f->JavaScript("MUI.centerWindow($('" . $f->ventana . "'));");
$f->eClick("cerrar" . $f->id, "MUI.closeWindow($('" . $f->ventana . "'));");
?>