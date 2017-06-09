<?php

$ROOT = (!isset($ROOT)) ? "../../../" : $ROOT;
require_once($ROOT . "modulos/aplicacion/librerias/Configuracion.cnf.php");
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

$transaccion = isset($_REQUEST['transaccion']) ? $_REQUEST['transaccion'] : time();
$f = new Forms($transaccion);
echo($f->apertura());


$html['tabs'] = "<div class=\"toolbarTabs" . $transaccion . "\">";
$html['tabs'].="<ul id=\"featuresTabs" . $transaccion . "\" class=\"tab-menu\">";
$html['tabs'].="<li class=\"selected\"><a href=\"#\" title=\"Solicitante\" id=\"tabSolicitante" . $transaccion . "\">Solicitante</a></li>";
$html['tabs'].="<li><a href=\"#\" title=\"Solicitud\" id=\"tabSolicitud" . $transaccion . "\">Solicitud</a></li>";
//$html['tabs'].="<li><a href=\"#\" title=\"Respuesta\" id=\"tabRespuesta" . $transaccion . "\">Respuesta</a></li>";
//$html['tabs'].="<li><a href=\"#\" title=\"Seguridad\" id=\"tabSeguridad" . $transaccion . "\">Seguridad</a></li>";

$html['tabs'].="</ul>";
$html['tabs'].="<div class=\"clear\"></div>";
$html['tabs'].="</div>";
$f->filas($html['tabs']);

if (!isset($_REQUEST['trasmision'])) {
  require_once($ROOT . "modulos/suscriptores/formularios/solicitud/actualizar/solicitud.inc.php");
} else {
  require_once($ROOT . "modulos/suscriptores/formularios/solicitud/actualizar/solicitud.procesador.inc.php");
  require_once($ROOT . "modulos/suscriptores/formularios/solicitud/actualizar/solicitud.inc.php");
}

$html['js'] = "<script type=\"text/javascript\">";
$html['js'] .="MUI.initializeTabs('featuresTabs" . $transaccion . "');";
$html['js'] .="$('solicitante" . $transaccion . "').show();";
$html['js'] .="$('solicitud" . $transaccion . "').hide();";
$html['js'] .="$('respuesta" . $transaccion . "').hide();";
$html['js'] .="$('seguridad" . $transaccion . "').hide();";

$html['js'] .="if (\$('tabSolicitante" . $transaccion . "')) {";
$html['js'] .="$('tabSolicitante" . $transaccion . "').addEvent('click', function(e) {";
$html['js'] .="$('solicitante" . $transaccion . "').show();";
$html['js'] .="$('solicitud" . $transaccion . "').hide();";
$html['js'] .="$('respuesta" . $transaccion . "').hide();";
$html['js'] .="$('seguridad" . $transaccion . "').hide();";
$html['js'] .="if ($('" . $f->interno . "') && MUI.options.standardEffects == true) {";
$html['js'] .="$('" . $f->interno . "').setStyle('opacity', 0).get('morph').start({'opacity': 1});";
$html['js'] .="}";
$html['js'] .="  });";
$html['js'] .="}";

$html['js'] .="if (\$('tabSolicitud" . $transaccion . "')) {";
$html['js'] .="$('tabSolicitud" . $transaccion . "').addEvent('click', function(e) {";
$html['js'] .="$('solicitante" . $transaccion . "').hide();";
$html['js'] .="$('solicitud" . $transaccion . "').show();";
$html['js'] .="$('respuesta" . $transaccion . "').hide();";
$html['js'] .="$('seguridad" . $transaccion . "').hide();";
$html['js'] .="if ($('" . $f->interno . "') && MUI.options.standardEffects == true) {";
$html['js'] .="$('" . $f->interno . "').setStyle('opacity', 0).get('morph').start({'opacity': 1});";
$html['js'] .="}";
$html['js'] .="  });";
$html['js'] .="}";

$html['js'] .="if (\$('tabRespuesta" . $transaccion . "')) {";
$html['js'] .="$('tabRespuesta" . $transaccion . "').addEvent('click', function(e) {";
$html['js'] .="$('solicitante" . $transaccion . "').hide();";
$html['js'] .="$('solicitud" . $transaccion . "').hide();";
$html['js'] .="$('respuesta" . $transaccion . "').show();";
$html['js'] .="$('seguridad" . $transaccion . "').hide();";
$html['js'] .="if ($('" . $f->interno . "') && MUI.options.standardEffects == true) {";
$html['js'] .="$('" . $f->interno . "').setStyle('opacity', 0).get('morph').start({'opacity': 1});";
$html['js'] .="}";
$html['js'] .="  });";
$html['js'] .="}";

$html['js'] .="if (\$('tabSeguridad" . $transaccion . "')) {";
$html['js'] .="$('tabSeguridad" . $transaccion . "').addEvent('click', function(e) {";
$html['js'] .="$('solicitante" . $transaccion . "').hide();";
$html['js'] .="$('solicitud" . $transaccion . "').hide();";
$html['js'] .="$('respuesta" . $transaccion . "').hide();";
$html['js'] .="$('seguridad" . $transaccion . "').show();";
$html['js'] .="if ($('" . $f->interno . "') && MUI.options.standardEffects == true) {";
$html['js'] .="$('" . $f->interno . "').setStyle('opacity', 0).get('morph').start({'opacity': 1});";
$html['js'] .="}";
$html['js'] .="  });";
$html['js'] .="}";

$html['js'] .="</script>";
$f->filas($html['js']);

echo($f->generar());
echo($f->controles());
echo($f->cierre());
?>