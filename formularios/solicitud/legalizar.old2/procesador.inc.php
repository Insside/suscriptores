<?php
$cadenas = new Cadenas();
$fechas=new Fechas();
$suscriptores=new Suscriptores();
$v=new Validaciones();
/* 
 * Copyright (c) 2015,Alexis
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms,with or without
 * modification,are permitted provided that the following conditions are met:
 *
 * * Redistributions of source code must retain the above copyright notice,this
 *   list of conditions and the following disclaimer.
 * * Redistributions in binary form must reproduce the above copyright notice,
 *   this list of conditions and the following disclaimer in the documentation
 *   and/or other materials provided with the distribution.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS"
 * AND ANY EXPRESS OR IMPLIED WARRANTIES,INCLUDING,BUT NOT LIMITED TO,THE
 * IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE
 * ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT HOLDER OR CONTRIBUTORS BE
 * LIABLE FOR ANY DIRECT,INDIRECT,INCIDENTAL,SPECIAL,EXEMPLARY,OR
 * CONSEQUENTIAL DAMAGES (INCLUDING,BUT NOT LIMITED TO,PROCUREMENT OF
 * SUBSTITUTE GOODS OR SERVICES; LOSS OF USE,DATA,OR PROFITS; OR BUSINESS
 * INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY,WHETHER IN
 * CONTRACT,STRICT LIABILITY,OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE)
 * ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE,EVEN IF ADVISED OF THE
 * POSSIBILITY OF SUCH DAMAGE.
 */
$suscriptor =$v->recibir('suscriptor');
$nombres = $cadenas->condenzar($cadenas->capitalizar($v->recibir('nombres')));
$apellidos = $cadenas->condenzar($cadenas->capitalizar($v->recibir('apellidos')));
$direccion = $cadenas->condenzar($cadenas->capitalizar($v->recibir('direccion')));
$referencia = $cadenas->condenzar($cadenas->capitalizar($v->recibir('referencia')));
//$nombre = $nombres . " " . $apellidos;
$suscriptores->actualizar($suscriptor,"credito",$v->recibir('credito'));
$suscriptores->actualizar($suscriptor,"predial",$v->recibir('predial'));
$suscriptores->actualizar($suscriptor,"uso",$v->recibir('uso'.$f->id));
$suscriptores->actualizar($suscriptor,"estrato",$v->recibir('estrato'.$f->id));
$suscriptores->actualizar($suscriptor,"documento",$v->recibir('documento'));
$suscriptores->actualizar($suscriptor,"identificacion",$v->recibir('identificacion'));
$suscriptores->actualizar($suscriptor,"nombres",$nombres);
$suscriptores->actualizar($suscriptor,"apellidos",$apellidos);
$suscriptores->actualizar($suscriptor,"sexo",$v->recibir('sexo'));
$suscriptores->actualizar($suscriptor,"nacimiento",$v->recibir('nacimiento'));
$suscriptores->actualizar($suscriptor,"telefonos",$v->recibir('telefonos'));
$suscriptores->actualizar($suscriptor,"direccion",$direccion);
$suscriptores->actualizar($suscriptor,"referencia",$referencia);
$suscriptores->actualizar($suscriptor,"sector",$v->recibir('sector'));
$suscriptores->actualizar($suscriptor,"latitud",$v->recibir('latitud'));
$suscriptores->actualizar($suscriptor,"longitud",$v->recibir('longitud'));
$suscriptores->actualizar($suscriptor,"creado",$v->recibir('creado'));
$suscriptores->actualizar($suscriptor,"creador",$v->recibir('creador'));

$suscriptores->actualizar($suscriptor,"ubicacion",$v->recibir('ubicacion'));
/** Tab2 **/
$suscriptores->actualizar($suscriptor,"acueducto",$v->recibir('acueducto'.$f->id));
$suscriptores->actualizar($suscriptor,"alcantarillado",$v->recibir('alcantarillado'.$f->id));
$suscriptores->actualizar($suscriptor,"diametro",$v->recibir('diametro'));
$suscriptores->actualizar($suscriptor,"conexion",$v->recibir('conexion'));
/** Tab3 **/
$suscriptores->actualizar($suscriptor,"factura",$v->recibir('factura'));
$suscriptores->actualizar($suscriptor,"creditos",$v->recibir('creditos'));
$suscriptores->actualizar($suscriptor,"manzana",$v->recibir('manzana'));
$suscriptores->actualizar($suscriptor,"seccion",$v->recibir('seccion'));
$suscriptores->actualizar($suscriptor,"ciclo",$v->recibir('ciclo'));
$suscriptores->actualizar($suscriptor,"ruta",$v->recibir('ruta'));

$suscriptores->actualizar($suscriptor,"actualizado",$fechas->hoy());
$suscriptores->actualizar($suscriptor,"actualizador",$v->recibir('actualizador'));
/** JavaScript **/
$f->windowClose();
?>