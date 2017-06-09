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
$componentes = new Componentes();
$estratos = new Estratos();
$tuberias = new Tuberias();
$sectores = new Sectores();
$ciudades = new Ciudades();
$regiones = new Regiones();
$paises = new Paises();
$suscriptores = new Suscriptores();
$suscriptor = $suscriptores->consultar(@$_REQUEST['suscriptor']);
$v = $suscriptor;
$nombre = $cadenas->capitalizar($v['nombres'] . " " . $v['apellidos']);

/** Campos * */
$f->oculto("suscriptor", $v['suscriptor']);
$f->campos['direccion'] = $f->text("direccion", $cadenas->condenzar($v['direccion']), "128", "", false);
$f->campos['referencia'] = $f->text("referencia", $v['referencia'], "128", "", false);
$f->campos['ubicacion'] = $suscriptores->combo_ubicaciones('ubicacion', $v['ubicacion']);
$f->campos['predial'] = $f->text("predial", $v['predial'], "30", "", false);
$f->campos['latitud'] = $f->text("latitud", $v['latitud'], "30", "", false);
$f->campos['longitud'] = $f->text("longitud", $v['longitud'], "30", "", false);
$f->campos['correo'] = $f->text("correo", $v['correo'], "128", "", false);
$f->campos['telefonos'] = $f->text("telefonos", $v['telefonos'], "128", "", false);
$f->campos['creador'] = $f->text("creador", $v['creador'], "10", "", true);
$f->campos['actualizador'] = $f->text("actualizador", $v['actualizador'], "10", "", true);
$f->campos['credito'] = $componentes->combo_tipo_credito('credito', $v['credito']);
$f->campos['certificado'] = $f->text("certificado", $v['certificado'], "16", "", false);
$f->campos['factura'] = $f->text("factura", $v['factura'], "16", "", false);
$f->campos['sexo'] = $componentes->combo_sexo("sexo", $v['sexo']);
$f->campos['nacimiento'] = $f->calendario("nacimiento", $v['nacimiento']);
$f->campos['manzana'] = $f->text("manzana", $v['manzana'], "2", "", false);
$f->campos['seccion'] = $f->text("seccion", $v['seccion'], "2", "", false);
$f->campos['sector'] = $sectores->combo('sector', $v['ciudad'], $v['sector']);
$f->campos['ciudad'] = $ciudades->combo("ciudad", $v['ciudad'], $v['region'], $v['pais'], "", true);
$f->campos['region'] = $regiones->combo("region", $v['region'], $v['pais'], "w150", true);
$f->campos['pais'] = $paises->combo("pais", $v['pais'], "w100px", true);
$f->campos['ciclo'] = $f->text("ciclo", $v['ciclo'], "1", "", false);
$f->campos['ruta'] = $f->text("ruta", $v['ruta'], "4", "", false);
$f->campos['habitaciones'] = $f->text("habitaciones", $v['habitaciones'], "3", "", false);
$f->campos['habitantes'] = $f->text("habitantes", $v['habitantes'], "3", "", false);
$f->campos['ayuda'] = $f->button("ayuda" . $f->id, "button", "Ayuda");
$f->campos['georeferenciar'] = $f->button("georeferenciar" . $f->id, "button", "Georeferenciar");
$f->campos['cancelar'] = $f->button("cancelar" . $f->id, "button", "Cancelar");
$f->campos['guardar'] = $f->button("guardar" . $f->id, "submit", "Modificar");
/** Celdas * */
$f->celdas["direccion"] = $f->celda("Dirección del Predio:", $f->campos['direccion']);
$f->celdas["referencia"] = $f->celda("Referencia:", $f->campos['referencia']);
$f->celdas["ubicacion"] = $f->celda("Ubicación:", $f->campos['ubicacion']);
$f->celdas["predial"] = $f->celda("Predial:", $f->campos['predial']);
$f->celdas["latitud"] = $f->celda("Latitud:", $f->campos['latitud']);
$f->celdas["longitud"] = $f->celda("Longitud:", $f->campos['longitud']);
$f->celdas["correo"] = $f->celda("Correo Electrónico:", $f->campos['correo']);
$f->celdas["telefonos"] = $f->celda("Teléfono:", $f->campos['telefonos']);
$f->celdas["creador"] = $f->celda("Creador:", $f->campos['creador']);
$f->celdas["actualizador"] = $f->celda("Actualizador:", $f->campos['actualizador']);
$f->celdas["credito"] = $f->celda("Creditos:", $f->campos['credito']);
$f->celdas["certificado"] = $f->celda("Certificado:", $f->campos['certificado']);
$f->celdas["factura"] = $f->celda("Código  de Facturación:", $f->campos['factura']);

$f->celdas["sexo"] = $f->celda("Sexo:", $f->campos['sexo']);
$f->celdas["nacimiento"] = $f->celda("Fecha de nacimiento:", $f->campos['nacimiento']);
$f->celdas["manzana"] = $f->celda("Manzana:", $f->campos['manzana']);
$f->celdas["seccion"] = $f->celda("Sección:", $f->campos['seccion']);
$f->celdas["sector"] = $f->celda("Sector / Barrio:", $f->campos['sector']);
$f->celdas["ciudad"] = $f->celda("Ciudad:", $f->campos['ciudad']);
$f->celdas["region"] = $f->celda("Region:", $f->campos['region']);
$f->celdas["pais"] = $f->celda("Pais:", $f->campos['pais']);
$f->celdas["ciclo"] = $f->celda("Ciclo:", $f->campos['ciclo']);
$f->celdas["ruta"] = $f->celda("Ruta:", $f->campos['ruta']);
$f->celdas["habitaciones"] = $f->celda("Habitaciones:", $f->campos['habitaciones']);
$f->celdas["habitantes"] = $f->celda("Habitantes:", $f->campos['habitantes']);
/** Filas * */


$_PATH=dirname(__FILE__);
require_once($_PATH."/segmentos/perfil.inc.php");
require_once($_PATH."/segmentos/predio.inc.php");
require_once($_PATH."/segmentos/clasificacion.inc.php");
require_once($_PATH."/segmentos/referencias.inc.php");
require_once($_PATH."/segmentos/servicios.inc.php");
/** <TabbedPane> **/
$tp = new TabbedPane(array("pagesHeight" => "390px"));
$tp->addTab("Perfil",null, $f->fila["perfil"]);
$tp->addTab("Predio",null, $f->fila["predio"]);
$tp->addTab("Clasificación",null, $f->fila["clasificacion"]);
$tp->addTab("Servicios",null, $f->fila["servicios"]);
$tp->addTab("Referencias",null, $f->fila["referencias"]);
/** Compilando * */
$f->filas($tp->getPane());
/** </TabbedPane> **/
/** Botones * */
$f->botones($f->campos['ayuda'], "inferior-izquierda");
$f->botones($f->campos['georeferenciar'], "inferior-izquierda");
$f->botones($f->campos['guardar'], "inferior-derecha");
$f->botones($f->campos['cancelar'], "inferior-derecha");
/** JavaScripts * */
$f->JavaScript("MUI.titleWindow($('" . ($f->ventana) . "'),\"Modificar Suscriptor <span style='color:red;'>" . $nombre . "</span> <span class='version'>v3.1</span>\");");
$f->JavaScript("MUI.resizeWindow($('" . ($f->ventana) . "'),{width:640,height:480});");
$f->JavaScript("MUI.centerWindow($('" . $f->ventana . "'));");
$f->eClick("cancelar" . $f->id, "MUI.closeWindow($('" . $f->ventana . "'));");
?>