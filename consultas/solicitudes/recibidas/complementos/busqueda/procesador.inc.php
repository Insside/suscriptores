<?php
$sesion=new Sesion();
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
$valores['criterio']=$validaciones->recibir("criterio");
$valores['valor']=$validaciones->recibir("valor");

$valores['fechainicial']=$validaciones->recibir("fechainicial");
$valores['fechafinal']=$validaciones->recibir("fechafinal");
$sesion->setValue("fechainicial", $valores['fechainicial']);
$sesion->setValue("fechafinal", $valores['fechafinal']);


$f->JavaScript("
  var transaccion = (new Date()).valueOf();
  var uid=MUI.UID;
  MUI.updateContent({
    'element': $('central'),
    'title':'Solicitudes Recibidas (Propias / Asignadas)',
    'data':{
        'criterio':'".$valores['criterio']."',
        'valor':'".$valores['valor']."',
        'fechainicial':'".$valores['fechainicial']."',
        'fechafinal':'".$valores['fechafinal']."',
        'uid':uid,
        'transaccion':transaccion
     },
    'loadMethod': 'xhr',
    'url': 'modulos/suscriptores/consultas/solicitudes/recibidas/recibidas.xhr.php',
    'scrollbars':true,
    'headerToolbox': true, 
    'headerToolboxData':{'uid':uid,'transaccion':transaccion},
    'headerToolboxURL': 'modulos/suscriptores/consultas/solicitudes/recibidas/herramientas.xhr.php',
    'padding': {'top': 0, 'right': 0, 'bottom': 0, 'left': 0}
  });
  ");
?>