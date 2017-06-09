<?php
$ROOT = (!isset($ROOT)) ? "../../../../" : $ROOT;
require_once($ROOT . "modulos/externo/librerias/Configuracion.cnf.php");
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
$suscriptores = new Suscriptores();
$cadenas = new Cadenas();
$validaciones = new Validaciones();

$suscriptor = @$_REQUEST['suscriptor'];
if (!empty($suscriptor) && $validaciones->numero($suscriptor)) {
  $suscriptor = $suscriptores->consultar($suscriptor);
}
/** Campos * */
$f->campos['info1'] = "<div id='i100x100_seguro' style=\"float: left;\"/></div><p>Por favor proporcione el código del suscriptor para continuar, este dato es necesario para radicar o consultar el estado de sus solicitudes, y demás información administrada por este sistema. Consultado el código verifique si el nombre de suscriptor y/o dirección domiciliaria corresponden antes de realizar cualquier transacción.</p>";
$f->campos['info2'] = "<div id='i100x100_seguro' style=\"float: left;\"/></div><p>El código del suscriptor ingresado no corresponde con ninguno existente en la base de datos, por favor inténtelo nuevamente.</p>";
$f->campos['info3'] = "<div id='i100x100_seguro' style=\"float: left;\"/></div><p>Confirme si los datos visualizados corresponden al suscriptor o dirección del bien inmueble del que desea consultar o radicar su solicitud, una vez confirmados los datos presione continuar o cancelar para intentarlo nuevamente</p>";
$f->campos['suscriptor'] = $f->text("suscriptor", @$_REQUEST['suscriptor'], "10", "required", false);
$f->campos['dato_suscriptor'] = "<p style=\"font-size:36px;line-height:30px;font-weight: bold;\">" . $cadenas->capitalizar(@$suscriptor['nombres'] . " " . @$suscriptor['apellidos']) . "</p>";
$f->campos['dato_direccion'] = "<p style=\"font-size:36px;line-height:30px;font-weight: bold;\">" . $cadenas->capitalizar(@$suscriptor['direccion']) . "</p>";
$f->campos['cancelar'] = $f->button("cancelar" . $f->id, "button", "Cancelar");
$f->campos['consultar'] = $f->button("consultar" . $f->id, "submit", "Consultar");
$f->campos['radicar'] = $f->button("radicar" . $f->id, "button", "Continuar");
/** Celdas * */
$f->celdas["info1"] = $f->celda("", $f->campos['info1']);
$f->celdas["suscriptor"] = $f->celda("Código Del Suscriptor:", $f->campos['suscriptor']);
$f->celdas["dato_suscriptor"] = $f->celda("Suscriptor:", $f->campos['dato_suscriptor']);
$f->celdas["dato_direccion"] = $f->celda("Dirección:", $f->campos['dato_direccion']);
$f->celdas["info2"] = $f->celda("", $f->campos['info2']);
$f->celdas["info3"] = $f->celda("", $f->campos['info3']);
/** Filas * */
$f->fila["fila1"] = $f->fila($f->celdas["info1"]);
$f->fila["fila2"] = $f->fila($f->celdas["suscriptor"]);
$f->fila["fila3"] = $f->fila($f->celdas["info2"]);
$f->fila["fila4"] = $f->fila($f->celdas["info3"]);
$f->fila["fila5"] = $f->fila($f->celdas["dato_suscriptor"]);
$f->fila["fila6"] = $f->fila($f->celdas["dato_direccion"]);
/** Compilando * */
if (isset($_REQUEST['trasmision'])) {
  if (empty($suscriptor['suscriptor'])) {
    $f->filas($f->fila['fila3']);
  } else {
    $f->filas($f->fila['fila4']);
    $f->filas($f->fila['fila5']);
    $f->filas($f->fila['fila6']);
  }
} else {
  $f->filas($f->fila['fila1']);
  $f->filas($f->fila['fila2']);
}

if (!isset($_REQUEST['trasmision'])) {
  $f->botones($f->campos['consultar']);
} else {
  if (!empty($suscriptor['suscriptor'])) {
    $f->botones($f->campos['radicar']);
  }
}

$f->botones($f->campos['cancelar']);
?>
<script type="text/javascript">
  if ($('suscriptor')) {
    new OverText('suscriptor', {positionOptions: {offset: {x: 0, y: 50}}});
  }
  MUI.titleWindow($('<?php echo($f->ventana); ?>'), "Consultar Consumos V.0.5");
<?php if (isset($_REQUEST['trasmision']) && !empty($suscriptor['suscriptor'])) { ?>
    MUI.resizeWindow($('<?php echo($f->ventana); ?>'), {width: 480, height: 310, top: 0, left: 0});
<?php } elseif (isset($_REQUEST['trasmision']) && empty($suscriptor['suscriptor'])) { ?>
    MUI.resizeWindow($('<?php echo($f->ventana); ?>'), {width: 480, height: 180, top: 0, left: 0});
<?php } else { ?>
    MUI.resizeWindow($('<?php echo($f->ventana); ?>'), {width: 480, height: 250, top: 0, left: 0});
<?php } ?>
  MUI.centerWindow($('<?php echo($f->ventana); ?>'));

  if ($('cancelar<?php echo($f->id); ?>')) {
    $('cancelar<?php echo($f->id); ?>').addEvent('click', function(e) {
      MUI.closeWindow($('<?php echo($f->ventana); ?>'));
    });
  }

  if ($('radicar<?php echo($f->id); ?>')) {
    $('radicar<?php echo($f->id); ?>').addEvent('click', function(e) {
      MUI.Facturacion_Consumos_Suscriptor('<?php echo($suscriptor['suscriptor']); ?>');
      MUI.closeWindow($('<?php echo($f->ventana); ?>'));
    });
  }
</script>