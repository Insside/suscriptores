<?php
$cadenas=new Cadenas();
$suscriptores = new Suscriptores();
$suscriptor = $suscriptores->consultar($validaciones->recibir("suscriptor"));
$valores = $suscriptor;
$valores['nombre']=$valores['nombres']." ".$valores['apellidos'];
/** Campos **/
$f->campos['suscriptor'] = $f->campo("suscriptor", $valores['suscriptor']);
$f->campos['documento'] = $f->campo("documento", $valores['documento']);
$f->campos['identificacion'] = $f->campo("identificacion", $valores['identificacion']);
$f->campos['nombres'] = $f->campo("nombres", $valores['nombres']);
$f->campos['apellidos'] = $f->campo("apellidos", $valores['apellidos']);
$f->campos['direccion'] = $f->campo("direccion", $valores['direccion']);
$f->campos['referencia'] = $f->campo("referencia", $valores['referencia']);
$f->campos['estrato'] = $f->campo("estrato", $valores['estrato']);
$f->campos['predial'] = $f->campo("predial", $valores['predial']);
$f->campos['latitud'] = $f->campo("latitud", $valores['latitud']);
$f->campos['longitud'] = $f->campo("longitud", $valores['longitud']);
$f->campos['correo'] = $f->campo("correo", $valores['correo']);
$f->campos['telefonos'] = $f->campo("telefonos", $valores['telefonos']);
$f->campos['actualizado'] = $f->campo("actualizado", $valores['actualizado']);
$f->campos['actualizador'] = $f->campo("actualizador", $valores['actualizador']);
$f->campos['diametro'] = $f->campo("diametro", $valores['diametro']);
$f->campos['acueducto'] = $f->campo("acueducto", $valores['acueducto']);
$f->campos['alcantarillado'] = $f->campo("alcantarillado", $valores['alcantarillado']);
$f->campos['credito'] = $f->campo("credito", $valores['credito']);
$f->campos['certificado'] = $f->campo("certificado", $valores['certificado']);
$f->campos['factura'] = $f->campo("factura", $valores['factura']);
$f->campos['conexion'] = $f->campo("conexion", $valores['conexion']);
$f->campos['sexo'] = $f->campo("sexo", $valores['sexo']);
$f->campos['nacimiento'] = $f->campo("nacimiento", $valores['nacimiento']);
$f->campos['manzana'] = $f->campo("manzana", $valores['manzana']);
$f->campos['seccion'] = $f->campo("seccion", $valores['seccion']);
$f->campos['sector'] = $f->campo("sector", $valores['sector']);
$f->campos['ciudad'] = $f->campo("ciudad", $valores['ciudad']);
$f->campos['region'] = $f->campo("region", $valores['region']);
$f->campos['pais'] = $f->campo("pais", $valores['pais']);
$f->campos['ciclo'] = $f->campo("ciclo", $valores['ciclo']);
$f->campos['ruta'] = $f->campo("ruta", $valores['ruta']);
$f->campos['uso'] = $f->campo("uso", $valores['uso']);
$f->campos['habitaciones'] = $f->campo("habitaciones", $valores['habitaciones']);
$f->campos['habitantes'] = $f->campo("habitantes", $valores['habitantes']);
$f->campos['creado'] = $f->campo("creado", $valores['creado']);
$f->campos['creador'] = $f->campo("creador", $valores['creador']);
/** Celdas * */
$f->celdas["suscriptor"] = $f->celda("Suscriptor:", $f->campos['suscriptor'], "csuscriptor", "w100px");
$f->celdas["documento"] = $f->celda("Documento:", $f->campos['documento']);
$f->celdas["identificacion"] = $f->celda("Identificacion:", $f->campos['identificacion']);
$f->celdas["nombres"] = $f->celda("Nombres:", $f->campos['nombres']);
$f->celdas["apellidos"] = $f->celda("Apellidos:", $f->campos['apellidos']);
$f->celdas["direccion"] = $f->celda("Dirección de Predio:", $f->campos['direccion']);
$f->celdas["referencia"] = $f->celda("Referencia:", $f->campos['referencia']);
$f->celdas["estrato"] = $f->celda("Estrato:", $f->campos['estrato']);
$f->celdas["predial"] = $f->celda("Predial:", $f->campos['predial']);
$f->celdas["latitud"] = $f->celda("Latitud:", $f->campos['latitud'], "clatitud", "w100px");
$f->celdas["longitud"] = $f->celda("Longitud:", $f->campos['longitud'], "clongitud", "w100px");
$f->celdas["correo"] = $f->celda("Correo Electrónico:", $f->campos['correo']);
$f->celdas["telefonos"] = $f->celda("Telefonos:", $f->campos['telefonos']);
$f->celdas["actualizado"] = $f->celda("Actualizado:", $f->campos['actualizado']);
$f->celdas["actualizador"] = $f->celda("Actualizador:", $f->campos['actualizador']);
$f->celdas["diametro"] = $f->celda("Diámetro Autorizado:", $f->campos['diametro']);
$f->celdas["acueducto"] = $f->celda("Acueducto:", $f->campos['acueducto']);
$f->celdas["alcantarillado"] = $f->celda("Alcantarillado:", $f->campos['alcantarillado']);
$f->celdas["credito"] = $f->celda("Credito:", $f->campos['credito']);
$f->celdas["certificado"] = $f->celda("Certificado:", $f->campos['certificado']);
$f->celdas["factura"] = $f->celda("Factura:", $f->campos['factura']);
$f->celdas["conexion"] = $f->celda("Conexion:", $f->campos['conexion']);
$f->celdas["sexo"] = $f->celda("Sexo:", $f->campos['sexo'], "csexo", "w100px");
$f->celdas["nacimiento"] = $f->celda("Nacimiento:", $f->campos['nacimiento']);
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
$f->celdas["creado"] = $f->celda("Creado:", $f->campos['creado'], "ccreado", "w100px");
$f->celdas["creador"] = $f->celda("Creador:", $f->campos['creador']);
/** Filas * */
$f->fila["fp1"] = $f->fila("<h2>1. Suscriptor:</h2>");
$f->fila["fp2"] = $f->fila($f->celdas["suscriptor"] . $f->celdas["creado"] . $f->celdas["predial"] . $f->celdas["estrato"]);
$f->fila["fp3"] = $f->fila("<h2>2. Perfil del Suscriptor:</h2>");
$f->fila["fp4"] = $f->fila($f->celdas["documento"] . $f->celdas["identificacion"] . $f->celdas["nombres"] . $f->celdas["apellidos"] . $f->celdas["sexo"] . $f->celdas["nacimiento"]);
$f->fila["fp5"] = $f->fila("<h2>3. Localización del Predio o Inmueble:</h2>");
$f->fila["fp6"] = $f->fila($f->celdas["direccion"] . $f->celdas["referencia"] );
$f->fila["fp7"] = $f->fila($f->celdas["telefonos"].$f->celdas["correo"] . $f->celdas["latitud"] . $f->celdas["longitud"]);
$f->fila["fp8"] = $f->fila("<h2>4. Servicios & Financiación</h2>");
$f->fila["fp9"] = $f->fila($f->celdas["acueducto"] . $f->celdas["alcantarillado"] . $f->celdas["diametro"] . $f->celdas["conexion"] . $f->celdas["credito"]);
/** Compilando * */
/** Compilando * */
$f->fila['perfil']=(
        $f->fila["fp1"].
        $f->fila['fp2'].
        $f->fila["fp3"].
        $f->fila['fp4'].
        $f->fila["fp5"].
        $f->fila['fp6'].
        $f->fila['fp7'].
        $f->fila['fp8'].
        $f->fila["fp9"]
    );
?>