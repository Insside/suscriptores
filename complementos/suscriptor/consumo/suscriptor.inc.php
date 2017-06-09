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
$suscriptores = new Suscriptores();
$cadenas = new Cadenas();
$lecturas = new Lecturas();
$suscriptor = $suscriptores->consultar(@$_REQUEST['suscriptor']);

$actual = $lecturas->actual($suscriptor['suscriptor']);

$f->campos['suscriptor'] = $f->campo("suscriptor", $suscriptor['suscriptor'], "codigo");
$f->campos['nombres'] = $f->campo("nombres", $cadenas->capitalizar($suscriptor['nombres']), "");
$f->campos['apellidos'] = $f->campo("apellidos", $cadenas->capitalizar($suscriptor['apellidos']), "");
$f->campos['direccion'] = $f->campo("direccion", $cadenas->capitalizar($suscriptor['direccion']), "");
$f->campos['telefonos'] = $f->campo("telefonos", $suscriptor['telefonos'], "");
$f->campos['extras'] = "<div>"
        . "<ul>"
        . "<li><b>Nombre</b>: " . $cadenas->capitalizar($suscriptor['nombres'] . " " . $suscriptor['apellidos']) . "</li>"
        . "<li><b>Dirección</b>: " . $cadenas->capitalizar($suscriptor['direccion']) . "</li>"
        . "</ul>"
        . "</div>";
$f->campos['consumos'] = "<div>"
        . "<ul>"
        . "<li><b>Factura</b>: <a href=\"modulos/facturacion/consultas/factura.xhr.php?suscriptor=" . $suscriptor['suscriptor'] . "&facturacion=" . $actual['fecha'] . "\" target=\"_blank\">" . $actual['fecha'] . "</a></li>"
        . "<li><b>Historial</b>: " . "Generar" . "</li>"
        . "</ul>"
        . "</div>";
//$f->campos['buscar'] = $f->button("buscar" . $transaccion, "button", "Buscar / Filtrar");
// Celdas
$f->celdas['suscriptor'] = $f->celda("Suscriptor:", $f->campos['suscriptor']);
$f->celdas['nombres'] = $f->celda("Nombres:", $f->campos['nombres']);
$f->celdas['apellidos'] = $f->celda("Apellidos:", $f->campos['apellidos']);
$f->celdas['direccion'] = $f->celda("Dirección:", $f->campos['direccion']);
$f->celdas['telefonos'] = $f->celda("Teléfonos:", $f->campos['telefonos']);
$f->celdas['extras'] = $f->celda("Información Complementaria:", $f->campos['extras']);
$f->celdas['consumos'] = $f->celda("Consumos:", $f->campos['consumos']);
// Filas
$f->fila["suscriptor"] = $f->fila($f->celdas['suscriptor']);
$f->fila["nombres"] = $f->fila($f->celdas['nombres']);
$f->fila["apellidos"] = $f->fila($f->celdas['apellidos']);
$f->fila["direccion"] = $f->fila($f->celdas['direccion']);
$f->fila["telefonos"] = $f->fila($f->celdas['telefonos']);
$f->fila["extras"] = $f->fila($f->celdas['extras']);
$f->fila["consumos"] = $f->fila($f->celdas['consumos']);
//Compilacion
$f->filas($f->fila['suscriptor']);
//$f->filas($f->fila['nombres']);
//$f->filas($f->fila['apellidos']);
//$f->filas($f->fila['direccion']);
//$f->filas($f->fila['telefonos']);
$f->filas($f->fila['extras']);
$f->filas($f->fila['consumos']);
//$f->botones($f->campos['buscar']);
?>
<script type="text/javascript">
  if ($('buscar<?php echo($transaccion); ?>')) {
    $('buscar<?php echo($transaccion); ?>').addEvent('click', function(e) {
      MUI.Suscriptores_Solicitudes_Buscar($('nombre<?php echo($transaccion); ?>').value);
    });
  }
</script>