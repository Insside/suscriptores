<?php

$ROOT = (!isset($ROOT)) ? "../../../../../" : $ROOT;
require_once($ROOT . "modulos/suscriptores/librerias/Configuracion.cnf.php");
require_once($ROOT . "modulos/comercial/librerias/Comercial_Aforos.class.php");
Sesion::init();
$validaciones=new Validaciones();
$aforos=new Comercial_Aforos();
$solicitudes=new Solicitudes();
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

$transaccion =$validaciones->recibir("transaccion");
$trasmision=$validaciones->recibir("trasmision");
$solicitud = $solicitudes->consultar($validaciones->recibir("solicitud"));
$aforo= $aforos->solicitud($solicitud['solicitud']);
$estado=$aforos->estado($aforo['aforo']);

$f = new Forms($transaccion);
//print_r($_REQUEST);
echo($f->apertura());
if (empty($trasmision)) {
  if ($aforo) {
    require_once($ROOT . "modulos/suscriptores/formularios/solicitud/legalizar/formulario.inc.php");
  }else{
    require_once($ROOT . "modulos/suscriptores/formularios/solicitud/legalizar/aforo.inc.php");
  }
} else {
  require_once($ROOT . "modulos/suscriptores/formularios/solicitud/legalizar/procesador.inc.php");
}
echo($f->generar());
echo($f->controles());
echo($f->cierre());
?>