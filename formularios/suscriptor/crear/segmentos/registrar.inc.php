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
$suscriptores->crear($v);


$valores['info']="<div id='i100x100_confirmado' style=\"float: left;\"/></div><p>El suscriptor ha sido "
        . "creado satisfactoriamente,  para actualizar los datos adicionales a "
        . "esta matricula como georeferenciación y demás parámetros adicionales deberá localizar y actualizar el "
        . "perfil mediante el procedimiento habitual. Como constancia de este procedimiento se registra una observación "
        . "de que se conservara para finalidades revisión y control.</p>";
$f->campos['info']=$valores['info'];
$f->campos['finalizar'] = $f->button("finalizar" . $f->id, "button", "Finalizar");
$f->celdas["info"] = $f->celda("",$f->campos['info'],"","sinfondo");
$f->fila["f1"] = $f->fila($f->celdas["info"]);
$f->filas($f->fila['f1']);
$f->botones($f->campos['finalizar'],"inferior-derecha");
/** JavaScripts **/
$f->JavaScript("MUI.titleWindow($('" . ($f->ventana) . "'), \"Suscriptor Registrado!\");");
$f->JavaScript("MUI.resizeWindow($('" . ($f->ventana) . "'), {width: 480, height:170});");
$f->JavaScript("MUI.centerWindow($('" . $f->ventana . "'));");
$f->eClick("finalizar" . $f->id, "MUI.closeWindow($('" . $f->ventana . "'));");
?>