<?php
$cadenas = new Cadenas();
$fechas = new Fechas();
$componentes = new Componentes();
$estratos = new Estratos();
$tuberias = new Tuberias();
$sectores = new Sectores();
$ciudades = new Ciudades();
$regiones = new Regiones();
$paises = new Paises();
$suscriptores=new Suscriptores();
$validaciones=new Validaciones();
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

/** Valores */
$v['suscriptor']=$validaciones->recibir("suscriptor");
$v['documento']=$validaciones->recibir("documento");
$v['identificacion']=$validaciones->recibir("identificacion");
$v['nombres']=$validaciones->recibir("nombres");
$v['apellidos']=$validaciones->recibir("apellidos");
$v['direccion']=$validaciones->recibir("direccion");
$v['referencia']=$validaciones->recibir("referencia");
$v['estrato']=$validaciones->recibir("estrato");
$v['predial']=$validaciones->recibir("predial");
$v['latitud']=$validaciones->recibir("latitud");
$v['longitud']=$validaciones->recibir("longitud");
$v['correo']=$validaciones->recibir("correo");
$v['telefonos']=$validaciones->recibir("telefonos");
$v['creado']=$validaciones->recibir("creado");
$v['actualizado']=$validaciones->recibir("actualizado");
$v['creador']=$validaciones->recibir("creador");
$v['actualizador']=$validaciones->recibir("actualizador");
$v['diametro']=$validaciones->recibir("diametro");
$v['acueducto']=$validaciones->recibir("acueducto");
$v['alcantarillado']=$validaciones->recibir("alcantarillado");
$v['credito']=$validaciones->recibir("credito");
$v['certificado']=$validaciones->recibir("certificado");
$v['factura']=$validaciones->recibir("factura");
$v['conexion']=$validaciones->recibir("conexion");
$v['sexo']=$validaciones->recibir("sexo");
$v['nacimiento']=$validaciones->recibir("nacimiento");
$v['manzana']=$validaciones->recibir("manzana");
$v['seccion']=$validaciones->recibir("seccion");
$v['sector']=$validaciones->recibir("sector");
$v['ciudad']=$validaciones->recibir("ciudad");
$v['region']=$validaciones->recibir("region");
$v['pais']=$validaciones->recibir("pais");
$v['ciclo']=$validaciones->recibir("ciclo");
$v['ruta']=$validaciones->recibir("ruta");
$v['uso']=$validaciones->recibir("uso");
$v['habitaciones']=$validaciones->recibir("habitaciones");
$v['habitantes']=$validaciones->recibir("habitantes");
$f=new Forms($transaccion);
/** Campos * */
$f->oculto("accion","registrar");
$f->campos['suscriptor'] = $f->text("suscriptor", $v['suscriptor'], "10", "required primario", true);
$f->campos['documento'] = $componentes->combo_documentos('documento', $v['documento']);
$f->campos['identificacion'] = $f->text("identificacion", $v['identificacion'], "17", "", false);
$f->campos['nombres'] = $f->text("nombres", $v['nombres'], "128", "required", false);
$f->campos['apellidos'] = $f->text("apellidos", $v['apellidos'], "128", "required", false);
$f->campos['direccion'] = $f->text("direccion", $cadenas->condenzar($v['direccion']), "128", "required", false);
$f->campos['referencia'] = $f->text("referencia", $v['referencia'], "128", "", false);
$f->campos['estrato'] = $estratos->combo('estrato', $v['estrato']);
$f->campos['predial'] = $f->text("predial", $v['predial'], "30", "required", false);
$f->campos['latitud'] = $f->text("latitud", $v['latitud'], "30", "", false);
$f->campos['longitud'] = $f->text("longitud", $v['longitud'], "30", "", false);
$f->campos['correo'] = $f->text("correo", $v['correo'], "128", "", false);
$f->campos['telefonos'] = $f->text("telefonos", $v['telefonos'], "128", "", false);
$f->campos['creado'] = $f->text("creado", $v['creado'], "10", "", false);
$f->campos['actualizado'] = $f->text("actualizado", $v['actualizado'], "10", "", true);
$f->campos['creador'] = $f->text("creador", $v['creador'], "10", "", true);
$f->campos['actualizador'] = $f->text("actualizador", $v['actualizador'], "10", "", true);
$f->campos['diametro'] = $tuberias->combo('diametro', $v['diametro']);
$f->campos['acueducto'] = $componentes->combo_sino('acueducto', $v['alcantarillado']);
$f->campos['alcantarillado'] = $componentes->combo_sino('alcantarillado', $v['alcantarillado']);
$f->campos['credito'] = $componentes->combo_tipo_credito('credito', $v['credito']);
$f->campos['certificado'] = $f->text("certificado", $v['certificado'], "16", "", false);
$f->campos['factura'] = $f->text("factura", $v['factura'], "16", "", false);
$f->campos['conexion'] = $f->text("conexion", $v['conexion'], "128", "", false);
$f->campos['sexo'] = $componentes->combo_sexo("sexo",$v['sexo']);
$f->campos['nacimiento'] =$f->calendario("nacimiento",$v['nacimiento'],"-1","2");
$f->campos['manzana'] = $f->text("manzana", $v['manzana'], "2", "", false);
$f->campos['seccion'] = $f->text("seccion", $v['seccion'], "2", "", false);
$f->campos['sector'] = $sectores->combo('sector', $v['ciudad'], $v['sector']);
$f->campos['ciudad'] = $ciudades->combo("ciudad", $v['ciudad'], $v['region'], $v['pais'], "", true);
$f->campos['region'] = $regiones->combo("region", $v['region'], $v['pais'], "w150", true);
$f->campos['pais'] = $paises->combo("pais", $v['pais'], "w100px", true);
$f->campos['ciclo'] = $f->text("ciclo", $v['ciclo'], "1", "", false);
$f->campos['ruta'] = $f->text("ruta", $v['ruta'], "4", "", false);
$f->campos['uso'] = $f->text("uso", $v['uso'], "2", "", false);
$f->campos['habitaciones'] = $f->text("habitaciones", $v['habitaciones'], "3", "", false);
$f->campos['habitantes'] = $f->text("habitantes", $v['habitantes'], "3", "", false);
$f->campos['cancelar'] = $f->button("cancelar" . $transaccion, "button", "Cancelar");
$f->campos['actualizar'] = $f->button("actualizar" . $transaccion, "submit", "Actualizar");
/** Celdas * */
$f->celdas["suscriptor"] = $f->celda("Suscriptor:", $f->campos['suscriptor'], "", "w100px");
$f->celdas["documento"] = $f->celda("Documento:", $f->campos['documento']);
$f->celdas["identificacion"] = $f->celda("Identificación:", $f->campos['identificacion'], "", "w100px");
$f->celdas["nombres"] = $f->celda("Nombres:", $f->campos['nombres']);
$f->celdas["apellidos"] = $f->celda("Apellidos:", $f->campos['apellidos']);
$f->celdas["direccion"] = $f->celda("Dirección del Predio:", $f->campos['direccion']);
$f->celdas["referencia"] = $f->celda("Referencia:", $f->campos['referencia']);
$f->celdas["estrato"] = $f->celda("Estrato:", $f->campos['estrato']);
$f->celdas["predial"] = $f->celda("Predial:", $f->campos['predial']);
$f->celdas["latitud"] = $f->celda("Latitud:", $f->campos['latitud']);
$f->celdas["longitud"] = $f->celda("Longitud:", $f->campos['longitud']);
$f->celdas["correo"] = $f->celda("Correo electrónico:", $f->campos['correo']);
$f->celdas["telefonos"] = $f->celda("Telefonos:", $f->campos['telefonos']);
$f->celdas["creado"] = $f->celda("Creado:", $f->campos['creado']);
$f->celdas["actualizado"] = $f->celda("Actualizado:", $f->campos['actualizado']);
$f->celdas["creador"] = $f->celda("Creador:", $f->campos['creador']);
$f->celdas["actualizador"] = $f->celda("Actualizador:", $f->campos['actualizador']);
$f->celdas["diametro"] = $f->celda("Diametro:", $f->campos['diametro']);
$f->celdas["acueducto"] = $f->celda("Acueducto:", $f->campos['acueducto']);
$f->celdas["alcantarillado"] = $f->celda("Alcantarillado:", $f->campos['alcantarillado']);
$f->celdas["credito"] = $f->celda("Credito:", $f->campos['credito']);
$f->celdas["certificado"] = $f->celda("Certificado:", $f->campos['certificado']);
$f->celdas["factura"] = $f->celda("Factura:", $f->campos['factura']);
$f->celdas["conexion"] = $f->celda("Conexion:", $f->campos['conexion']);
$f->celdas["sexo"] = $f->celda("Sexo:", $f->campos['sexo']);
$f->celdas["nacimiento"] = $f->celda("Fecha de nacimiento:", $f->campos['nacimiento']);
$f->celdas["manzana"] = $f->celda("Manzana:", $f->campos['manzana']);
$f->celdas["seccion"] = $f->celda("Seccion:", $f->campos['seccion']);
$f->celdas["sector"] = $f->celda("Sector:", $f->campos['sector']);
$f->celdas["ciudad"] = $f->celda("Ciudad:", $f->campos['ciudad']);
$f->celdas["region"] = $f->celda("Region:", $f->campos['region']);
$f->celdas["pais"] = $f->celda("Pais:", $f->campos['pais']);
$f->celdas["ciclo"] = $f->celda("Ciclo:", $f->campos['ciclo']);
$f->celdas["ruta"] = $f->celda("Ruta:", $f->campos['ruta']);
$f->celdas["uso"] = $f->celda("Uso:", $f->campos['uso']);
$f->celdas["habitaciones"] = $f->celda("Habitaciones:", $f->campos['habitaciones']);
$f->celdas["habitantes"] = $f->celda("Habitantes:", $f->campos['habitantes']);
/** Filas * */
$f->fila["perfil1"] = $f->fila($f->celdas["suscriptor"] . $f->celdas["predial"] . $f->celdas["estrato"]);
$f->fila["perfil2"] = $f->fila($f->celdas["documento"] . $f->celdas["identificacion"] . $f->celdas["nombres"] . $f->celdas["apellidos"]);
$f->fila["perfil3"] = $f->fila($f->celdas["sexo"] . $f->celdas["nacimiento"] . $f->celdas["telefonos"] . $f->celdas["correo"]);
$f->fila["perfil4"] = $f->fila($f->celdas["direccion"] . $f->celdas["referencia"]);
$f->fila["perfil5"] = $f->fila($f->celdas["pais"] . $f->celdas["region"] . $f->celdas["ciudad"] . $f->celdas["sector"]);

$f->fila["seguridad1"] = $f->fila($f->celdas["creado"] . $f->celdas["actualizado"]);
$f->fila["seguridad2"] = $f->fila($f->celdas["creador"] . $f->celdas["actualizador"]);

$f->fila["facturacion1"] = $f->fila($f->celdas["factura"] . $f->celdas["uso"] . $f->celdas["credito"]);
$f->fila["facturacion2"] = $f->fila($f->celdas["manzana"] . $f->celdas["seccion"]);
$f->fila["facturacion3"] = $f->fila($f->celdas["ciclo"] . $f->celdas["ruta"]);

$f->fila["fila12"] = $f->fila($f->celdas["habitaciones"]);
$f->fila["fila13"] = $f->fila($f->celdas["certificado"] . $f->celdas["habitantes"]);
$f->fila['georeferencia1'] = $f->fila($f->celdas["latitud"] . $f->celdas["longitud"]);

$f->fila["servicios1"] = $f->fila($f->celdas["acueducto"] . $f->celdas["diametro"]);
$f->fila["servicios2"] = $f->fila($f->celdas["alcantarillado"]);
$f->fila["servicios3"] = $f->fila($f->celdas["conexion"]);
/** Compilando * */
$f->filas("<div id=\"perfil" . $transaccion . "\">");
$f->filas($f->fila['perfil1']);
$f->filas($f->fila['perfil2']);
$f->filas($f->fila['perfil3']);
$f->filas($f->fila['perfil4']);
//$f->filas($f->fila['perfil5']);
$f->filas("</div>");

//$f->filas("<div id=\"georeferencia" . $transaccion . "\">");
//$f->filas($f->fila['georeferencia1']);
//$f->filas("</div>");
//
//$f->filas("<div id=\"servicios" . $transaccion . "\">");
//$f->filas($f->fila['servicios1']);
//$f->filas($f->fila['servicios2']);
//$f->filas($f->fila['fila12']);
//$f->filas($f->fila['fila13']);
//$f->filas("</div>");
//
//$f->filas("<div id=\"facturacion" . $transaccion . "\">");
//$f->filas($f->fila['facturacion1']);
//$f->filas($f->fila['facturacion2']);
//$f->filas($f->fila['facturacion3']);
//$f->filas("</div>");
//
//$f->filas("<div id=\"consumos" . $transaccion . "\">");
//$f->filas("</div>");
//
//$f->filas("<div id=\"seguridad" . $transaccion . "\">");
//$f->filas($f->fila['seguridad1']);
//$f->filas($f->fila['seguridad2']);
//$f->filas("</div>");

$f->botones($f->campos['cancelar'],"inferior-derecha");

//if($sesion->getValue("SUSCRIPTORES-SUCRIPTOR-U")){
$f->botones($f->campos['actualizar'],"inferior-derecha");
//}
/** JavaScripts **/
$f->JavaScript("MUI.titleWindow($('" . ($f->ventana) . "'), \"Registrar Datos del Suscriptor\");");
$f->JavaScript("MUI.resizeWindow($('" . ($f->ventana) . "'), {width: 640, height:280});");
$f->JavaScript("MUI.centerWindow($('" . $f->ventana . "'));");
$f->eClick("cancelar" . $f->id, "MUI.closeWindow($('" . $f->ventana . "'));");
?>