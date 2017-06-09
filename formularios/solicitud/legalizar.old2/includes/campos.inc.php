<?php

/** Campos * */
$f->campos['solicitud'] = $f->text("solicitud", $v['solicitud'], "10", "required primario", true);

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
?>