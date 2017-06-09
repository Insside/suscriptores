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

$cadenas = new Cadenas();
$fechas = new Fechas();
$paises = new Paises();
$regiones = new Regiones();
$ciudades = new Ciudades();
$sectores = new Sectores();
$componentes = new Componentes();
$servicios = new Servicios();
$solicitudes = new Solicitudes();
$categorias = new Categorias();
$asuntos = new Asuntos();
$estratos = new Estratos();
$tuberias = new Tuberias();

$f->oculto("accion", "solicitud-solicitud");
$f->oculto("categoria", "04");

/** Valores * */
$solicitudes = new Solicitudes();
$solicitud = @$_REQUEST['solicitud'];
$valores = $solicitudes->consultar($solicitud);

/** Campos * */
$f->campos['solicitud'] = $f->text("solicitud", $valores['solicitud'], "10", "required center primario", false);
$f->campos['dane'] = $f->text("dane", '76111000', "10", "center", true);
$f->campos['servicio'] = $servicios->combo("servicio", $valores['servicio']);
$f->campos['radicado'] = $f->text("radicado", $valores['radicado'], "20", "required center automatico", false);
$f->campos['radicacion'] = $f->text("radicacion", $valores['radicacion'], "10", "required center automatico", false);
$f->campos['categoria'] = $categorias->combo("categoria", $valores['categoria']);
$f->campos['causal'] = $f->text("causal", $valores['causal'], "3", "", true, true);
$f->campos['asunto'] = $asuntos->combo("asunto", $valores['asunto'], $valores['servicio'], $valores['categoria'], $valores['causal']);
$f->campos['detalle'] = $f->textarea("detalle", $valores['detalle'], "", 25, 80, true, false, false, 1000);
$f->campos['suscriptor'] = $f->text("suscriptor", $valores['suscriptor'], "10", "", false);
$f->campos['factura'] = $f->text("factura", $valores['factura'], "10", "", false);
$f->campos['respuesta'] = $f->text("respuesta", $valores['respuesta'], "1", "", false);
$f->campos['contestacion'] = $f->text("contestacion", $valores['contestacion'], "10", "", false);
$f->campos['radicada'] = $f->text("radicada", $valores['radicada'], "14", "", false);
$f->campos['notificado'] = $f->text("notificado", $valores['notificado'], "10", "", false);
$f->campos['notificacion'] = $f->text("notificacion", $valores['notificacion'], "1", "", false);
$f->campos['sspd'] = $f->text("sspd", $valores['sspd'], "10", "", false);
$f->campos['ejecucion'] = $f->text("ejecucion", $valores['ejecucion'], "10", "", false);
$f->campos['orden'] = $f->text("orden", $valores['orden'], "16", "", false);
$f->campos['fecha'] = $f->text("fecha", $valores['fecha'], "10", "", false);
$f->campos['nombres'] = $f->text("nombres", $valores['nombres'], "128", "", false);
$f->campos['apellidos'] = $f->text("apellidos", $valores['apellidos'], "128", "", false);
$f->campos['documentos'] = $componentes->combo_documentos('documentos', $valores['documentos']);
$f->campos['identificacion'] = $f->text("identificacion", $valores['identificacion'], "128", "", false);
$f->campos['nacimiento'] = $f->text("nacimiento", $valores['nacimiento'], "128", "", false);
$f->campos['sexo'] = $componentes->combo_sexo("sexo",$valores['sexo']);
$f->campos['telefono'] = $f->text("telefono", $valores['telefono'], "128", "", false);
$f->campos['movil'] = $f->text("movil", $valores['movil'], "128", "", false);
$f->campos['correo'] = $f->text("correo", $valores['correo'], "128", "", false);
$f->campos['pais'] = $f->text("pais", $valores['pais'], "128", "", false);
$f->campos['region'] = $f->text("region", $valores['region'], "128", "", false);
$f->campos['ciudad'] = $f->text("ciudad", $valores['ciudad'], "128", "", false);
$f->campos['sector'] = $f->text("sector", $valores['sector'], "128", "", false);
$f->campos['direccion'] = $f->text("direccion", $valores['direccion'], "128", "", false);
$f->campos['referencia'] = $f->text("referencia", $valores['referencia'], "128", "", false);
$f->campos['expiracion'] = $f->text("expiracion", $valores['expiracion'], "10", "", false);
$f->campos['instalacion'] = $f->text("instalacion", $valores['instalacion'], "128", "required capitalizar", false);
$f->campos['instalacionsector'] = $sectores->combo('instalacionsector', "76111", $valores['instalacionsector']);
$f->campos['estrato'] = $estratos->combo('estrato', $valores['estrato']);
$f->campos['diametro'] = $tuberias->combo('diametro', $valores['diametro']);
$f->campos['legalizado'] = $f->text("legalizado", $valores['legalizado'], "2", "", false);
$f->campos['matricula'] = $f->text("matricula", $valores['matricula'], "10", "", false);
$f->campos['tipoderespuesta'] = $f->text("tipoderespuesta", $valores['tipoderespuesta'], "2", "", false);
$f->campos['ordenservicio'] = $f->text("ordenservicio", $valores['ordenservicio'], "10", "", false);
$f->campos['ordencobro'] = $f->text("ordencobro", $valores['ordencobro'], "10", "", false);
$f->campos['creador'] = $f->text("creador", $valores['creador'], "10", "", false);
$f->campos['responsable'] = $f->text("responsable", $valores['responsable'], "10", "", false);
$f->campos['cancelar'] = $f->button("cancelar" . $f->id, "button", "Cancelar");
$f->campos['continuar'] = $f->button("continuar" . $f->id, "submit", "Actualizar");
/** Celdas * */
$f->celdas["solicitud"] = $f->celda("Código de Solicitud:", $f->campos['solicitud'], "w150");
$f->celdas["dane"] = $f->celda("Código Dane:", $f->campos['dane']);
$f->celdas["servicio"] = $f->celda("Servicio:", $f->campos['servicio']);
$f->celdas["radicado"] = $f->celda("Código de Radicado:", $f->campos['radicado'], "w200");
$f->celdas["radicacion"] = $f->celda("Fceha de Radicacion:", $f->campos['radicacion']);
$f->celdas["categoria"] = $f->celda("Categoria:", $f->campos['categoria']);
$f->celdas["causal"] = $f->celda("Causal:", $f->campos['causal']);
$f->celdas["asunto"] = $f->celda("Asunto:", $f->campos['asunto']);
$f->celdas["detalle"] = $f->celda("Detalle:", urldecode($f->campos['detalle']));
$f->celdas["suscriptor"] = $f->celda("Suscriptor:", $f->campos['suscriptor']);
$f->celdas["factura"] = $f->celda("Factura:", $f->campos['factura']);
$f->celdas["respuesta"] = $f->celda("Respuesta:", $f->campos['respuesta']);
$f->celdas["contestacion"] = $f->celda("Contestacion:", $f->campos['contestacion']);
$f->celdas["radicada"] = $f->celda("Radicada:", $f->campos['radicada']);
$f->celdas["notificado"] = $f->celda("Notificado:", $f->campos['notificado']);
$f->celdas["notificacion"] = $f->celda("Notificacion:", $f->campos['notificacion']);
$f->celdas["sspd"] = $f->celda("Sspd:", $f->campos['sspd']);
$f->celdas["ejecucion"] = $f->celda("Ejecucion:", $f->campos['ejecucion']);
$f->celdas["orden"] = $f->celda("Orden:", $f->campos['orden']);
$f->celdas["fecha"] = $f->celda("Fecha:", $f->campos['fecha']);
$f->celdas["nombres"] = $f->celda("Nombres:", $f->campos['nombres']);
$f->celdas["apellidos"] = $f->celda("Apellidos:", $f->campos['apellidos']);
$f->celdas["documentos"] = $f->celda("Documento:", $f->campos['documentos']);
$f->celdas["identificacion"] = $f->celda("Identificacion:", $f->campos['identificacion']);
$f->celdas["nacimiento"] = $f->celda("Nacimiento:", $f->campos['nacimiento']);
$f->celdas["sexo"] = $f->celda("Sexo:", $f->campos['sexo'], "csexo", "w100px");
$f->celdas["telefono"] = $f->celda("Teléfono :", $f->campos['telefono'], "", "w100px");
$f->celdas["movil"] = $f->celda("movil:", $f->campos['movil'], "", "w100px");
$f->celdas["correo"] = $f->celda("Correo:", $f->campos['correo']);
$f->celdas["pais"] = $f->celda("Pais:", $f->campos['pais']);
$f->celdas["region"] = $f->celda("Region:", $f->campos['region']);
$f->celdas["ciudad"] = $f->celda("Ciudad:", $f->campos['ciudad']);
$f->celdas["sector"] = $f->celda("Sector:", $f->campos['sector']);
$f->celdas["direccion"] = $f->celda("Direccion:", $f->campos['direccion']);
$f->celdas["referencia"] = $f->celda("Referencia:", $f->campos['referencia']);
$f->celdas["expiracion"] = $f->celda("Expiracion:", $f->campos['expiracion']);
$f->celdas["instalacion"] = $f->celda("Dirección Complementaria (Instalaciones Nuevas y/o relacionadas):", $f->campos['instalacion']);
$f->celdas["instalacionsector"] = $f->celda("Sector / Barrio / ... /:", $f->campos['instalacionsector'], "", "w150");
$f->celdas["estrato"] = $f->celda("Estrato:", $f->campos['estrato']);
$f->celdas["diametro"] = $f->celda("Diametro:", $f->campos['diametro']);
$f->celdas["legalizado"] = $f->celda("Legalizado:", $f->campos['legalizado']);
$f->celdas["matricula"] = $f->celda("Matricula:", $f->campos['matricula']);
$f->celdas["tipoderespuesta"] = $f->celda("Tipoderespuesta:", $f->campos['tipoderespuesta']);
$f->celdas["ordenservicio"] = $f->celda("Ordenservicio:", $f->campos['ordenservicio']);
$f->celdas["ordencobro"] = $f->celda("Ordencobro:", $f->campos['ordencobro']);
$f->celdas["creador"] = $f->celda("Creador:", $f->campos['creador']);
$f->celdas["responsable"] = $f->celda("Responsable:", $f->campos['responsable']);
/** Filas * */
$f->fila["t1"] = $f->fila("<h2>1.1. Codificación de la Solicitud:</h2>");
$f->fila["fila1"] = $f->fila($f->celdas["solicitud"] . $f->celdas["radicado"] . $f->celdas["dane"] . $f->celdas["radicacion"]);
$f->fila["t2"] = $f->fila("<h2>1.2. Perfil del Radicante:</h2>");
$f->fila["fila2"] = $f->fila($f->celdas["documentos"] . $f->celdas["identificacion"] . $f->celdas["nombres"] . $f->celdas["apellidos"] . $f->celdas["nacimiento"] . $f->celdas["sexo"]);
$f->fila["fila3"] = $f->fila($f->celdas["telefono"] . $f->celdas["movil"] . $f->celdas["direccion"] . $f->celdas["referencia"]);
$f->fila["t3"] = $f->fila("<h2>1.3. Criterios de la Solicitud:</h2>");
$f->fila["fila4"] = $f->fila($f->celdas["categoria"] . $f->celdas["servicio"] . $f->celdas["causal"]);
//$f->filas["fila3"] = $f->fila($f->celdas["asunto"] . $f->celdas["detalle"]);
//$f->filas["fila4"] = $f->fila($f->celdas["suscriptor"] . $f->celdas["factura"] . $f->celdas["respuesta"]);
//$f->filas["fila5"] = $f->fila($f->celdas["contestacion"] . $f->celdas["radicada"] . $f->celdas["notificado"]);
//$f->filas["fila6"] = $f->fila($f->celdas["notificacion"] . $f->celdas["sspd"] . $f->celdas["ejecucion"]);
//$f->filas["fila7"] = $f->fila($f->celdas["orden"] . $f->celdas["fecha"]);
//$f->filas["fila8"] = $f->fila("");
//$f->filas["fila9"] = $f->fila("");
//$f->filas["fila10"] = $f->fila($f->celdas["correo"] . $f->celdas["pais"]);
//$f->filas["fila11"] = $f->fila($f->celdas["region"] . $f->celdas["ciudad"] . $f->celdas["sector"]);
//$f->filas["fila12"] = $f->fila($f->celdas["expiracion"]);
//$f->filas["fila13"] = $f->fila($f->celdas["instalacion"] . $f->celdas["estrato"] . $f->celdas["diametro"]);
//$f->filas["fila14"] = $f->fila($f->celdas["legalizado"] . $f->celdas["matricula"] . $f->celdas["tipoderespuesta"]);
//$f->filas["fila15"] = $f->fila($f->celdas["ordenservicio"] . $f->celdas["ordencobro"] . $f->celdas["creador"]);
//$f->filas["fila16"] = $f->fila($f->celdas["responsable"]);
/** Compilando * */
$f->filas("<div id=\"solicitante" . $transaccion . "\">");
$f->filas($f->fila['t1']);
$f->filas($f->fila['fila1']);
$f->filas($f->fila['t2']);
$f->filas($f->fila['fila2']);
$f->filas($f->fila['fila3']);
$f->filas($f->fila['t3']);
$f->filas($f->fila['fila4']);
$f->filas("</div>");



$f->fila["t1"] = $f->fila("<h2>2.1. Contenido Textual de la Solicitud:</h2>");
$f->fila["fila1"] = $f->fila($f->celdas["asunto"]);
$f->fila["fila2"] = $f->fila($f->celdas["detalle"]);
$f->fila["t2"] = $f->fila("<h2>2.2. Lugar de la Instalación:</h2>");
$f->fila["fila3"] = $f->fila($f->celdas["instalacion"] . $f->celdas["instalacionsector"] . $f->celdas["estrato"] . $f->celdas["diametro"]);

$f->filas("<div id=\"solicitud" . $transaccion . "\">");
$f->filas($f->fila['t1']);
$f->filas($f->fila['fila1']);
$f->filas($f->fila['fila2']);
$f->filas($f->fila['t2']);
$f->filas($f->fila['fila3']);
$f->filas("</div>");

$f->filas("<div id=\"respuesta" . $transaccion . "\">");
$f->filas("</div>");

$f->filas("<div id=\"seguridad" . $transaccion . "\">");
$f->filas("</div>");

//$f->filas($f->filas['fila5']);
//$f->filas($f->filas['fila6']);
//$f->filas($f->filas['fila7']);
//$f->filas($f->filas['fila8']);
//$f->filas($f->filas['fila9']);
//$f->filas($f->filas['fila10']);
//$f->filas($f->filas['fila11']);
//$f->filas($f->filas['fila12']);
//$f->filas($f->filas['fila13']);
//$f->filas($f->filas['fila14']);
//$f->filas($f->filas['fila15']);
//$f->filas($f->filas['fila16']);
$f->botones($f->campos['continuar']);
$f->botones($f->campos['cancelar']);
?>
<script type="text/javascript">
  MUI.titleWindow($('<?php echo($f->ventana); ?>'), "Actualizar Solicitud <span class=\"versionamiento\">Solicitud v.1.5</span>");
  MUI.resizeWindow($('<?php echo($f->ventana); ?>'), {width: 800, height: 375, top: 0, left: 0});
  MUI.centerWindow($('<?php echo($f->ventana); ?>'));
  if ($('cancelar<?php echo($f->id); ?>')) {
    $('cancelar<?php echo($f->id); ?>').addEvent('click', function(e) {
      MUI.closeWindow($('<?php echo($f->ventana); ?>'));
    });
  }
</script>
