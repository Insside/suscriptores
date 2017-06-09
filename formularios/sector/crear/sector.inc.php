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
$ciudades = new Ciudades();
$fechas = new Fechas();
$sectores = new Sectores();
/** Campos * */
$f->campos['sector'] = $f->text("sector", $sectores->codigo(), "3", "required primario", true);
$f->campos['ciudad'] = $ciudades->combo('ciudad', '76111', '076', 'CO');
$f->campos['nombre'] = $f->text("nombre", @$_REQUEST['nombre'], "64", "required", false);
$f->campos['tipo'] = $sectores->tipos("tipo", "");
$f->campos['fecha'] = $f->text("fecha", $fechas->hoy(), "10", "", true);
$f->campos['hora'] = $f->text("hora", $fechas->ahora(), "8", "", true);
$f->campos['creador'] = $f->text("creador", @$_SESSION['usuario'], "10", "", true);
$f->campos['cancelar'] = $f->button("cancelar" . $transaccion, "button", "Cancelar");
$f->campos['crear'] = $f->button("crear" . $transaccion, "submit", "Crear");
/** Celdas * */
$f->celdas["sector"] = $f->celda("Sector:", $f->campos['sector']);
$f->celdas["ciudad"] = $f->celda("Ciudad:", $f->campos['ciudad']);
$f->celdas["nombre"] = $f->celda("Nombre:", $f->campos['nombre']);
$f->celdas["tipo"] = $f->celda("Tipo:", $f->campos['tipo']);
$f->celdas["fecha"] = $f->celda("Fecha:", $f->campos['fecha']);
$f->celdas["hora"] = $f->celda("Hora:", $f->campos['hora']);
$f->celdas["creador"] = $f->celda("Creador:", $f->campos['creador']);
/** Filas * */
$f->fila["fila1"] = $f->fila($f->celdas["sector"] . $f->celdas["ciudad"]);
$f->fila["fila2"] = $f->fila($f->celdas["nombre"]);
$f->fila["fila3"] = $f->fila($f->celdas["tipo"]);
$f->fila["fila4"] = $f->fila($f->celdas["fecha"] . $f->celdas["hora"] . $f->celdas["creador"]);
/** Compilando * */
$f->filas($f->fila['fila1']);
$f->filas($f->fila['fila2']);
$f->filas($f->fila['fila3']);
$f->filas($f->fila['fila4']);

$f->botones($f->campos['crear']);
$f->botones($f->campos['cancelar']);
?>
<script type="text/javascript">
  MUI.titleWindow($('<?php echo($f->ventana); ?>'), "Nuevo Sector v.1");
  MUI.resizeWindow($('<?php echo($f->ventana); ?>'), {width: 350, height: 270, top: 0, left: 0});
  MUI.centerWindow($('<?php echo($f->ventana); ?>'));
  if ($('cancelar<?php echo($transaccion); ?>')) {
    $('cancelar<?php echo($transaccion); ?>').addEvent('click', function(e) {
      MUI.closeWindow($('<?php echo($f->ventana); ?>'));
    });
  }
</script>