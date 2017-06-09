<?php

/** Campos * */
$f->campos['suscriptor'] = $f->getText(array("id" => "suscriptor", "type" => "text", "value" => $v['suscriptor'], "class" => "required primario", "readonly" => true, "maxlenght" => 10));
$f->campos['creado'] = $f->getText(array("id" => "creado", "type" => "text", "value" => $v['creado'], "maxlenght" => "10", "readonly" => true, "class" => "automatico"));
$f->campos['actualizado'] = $f->getText(array("id" => "actualizado", "type" => "text", "value" => $v['actualizado'], "maxlenght" => "10", "readonly" => true, "class" => "automatico"));
$f->campos['documento'] = $componentes->combo_documentos('documento', $v['documento']);
$f->campos['identificacion'] = $f->text("identificacion", $v['identificacion'], "17", "", false);
$f->campos['nombres'] = $f->text("nombres", $v['nombres'], "128", "", false);
$f->campos['apellidos'] = $f->text("apellidos", $v['apellidos'], "128", "", false);
/** Celdas * */
$f->celdas["suscriptor"] = $f->celda("Suscriptor:", $f->campos['suscriptor'], "", "w100px");
$f->celdas["creado"] = $f->celda("Fecha de Registro:", $f->campos['creado']);
$f->celdas["actualizado"] = $f->celda("Ultima Actualización:", $f->campos['actualizado']);
$f->celdas["documento"] = $f->celda("Documento:", $f->campos['documento']);
$f->celdas["identificacion"] = $f->celda("Identificación:", $f->campos['identificacion'], "", "w100px");
$f->celdas["nombres"] = $f->celda("Nombres:", $f->campos['nombres']);
$f->celdas["apellidos"] = $f->celda("Apellidos:", $f->campos['apellidos']);
/** Filas * */
$f->fila["fp0"] = $f->fila("<h2>Datos del Registro</h2>");
$f->fila["fp1"] = $f->fila($f->celdas["suscriptor"] . $f->celdas["creado"] . $f->celdas["actualizado"]);
$f->fila["fp2"] = $f->fila("<h2>Datos del Propietario / Suscriptor:</h2>");
$f->fila["fp3"] = $f->fila($f->celdas["documento"] . $f->celdas["identificacion"] .$f->celdas["nacimiento"].$f->celdas["sexo"]); 
$f->fila["fp4"] = $f->fila($f->celdas["nombres"] . $f->celdas["apellidos"]);
$f->fila["fp5"] = $f->fila($f->celdas["telefonos"] . $f->celdas["correo"]);
/** Agrupación Final **/
$f->fila['perfil'] = $f->fila["fp0"] . $f->fila["fp1"] . $f->fila["fp2"] . $f->fila["fp3"]. $f->fila["fp4"]. $f->fila["fp5"];
?>