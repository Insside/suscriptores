<?php

/** Almacenar en la base de datos * */
$fechas = new Fechas();
$solicitudes = new Solicitudes();
$cadenas = new Cadenas();
/** Valores * */
$valores['solicitud'] = @$_REQUEST['solicitud'];
//$valores['dane'] = "0076111000";
//$valores['servicio'] = @$_REQUEST['servicio'];
$valores['radicado'] = @$_REQUEST['radicado']; // El radicado es igual al codigo de la solicitud
$valores['radicacion'] = @$_REQUEST['radicacion'];
$valores['categoria'] = '04';
$valores['causal'] = '211';
$valores['asunto'] = @$_REQUEST['asunto'];
$valores['detalle'] = urlencode(@$_REQUEST['detalle']);
//$valores['suscriptor'] = @$_REQUEST['suscriptor'];
//$valores['factura'] = @$_REQUEST['factura'];
//$valores['respuesta'] = @$_REQUEST['respuesta'];
//$valores['contestacion'] = @$_REQUEST['contestacion'];
//$valores['radicada'] = @$_REQUEST['radicada'];
//$valores['notificado'] = @$_REQUEST['notificado'];
//$valores['notificacion'] = @$_REQUEST['notificacion'];
//$valores['sspd'] = @$_REQUEST['sspd'];
//$valores['creador'] = intval($sesion->getValue('usuario'));
//$valores['fecha'] = $fechas->hoy();
$valores['nombres'] = $cadenas->capitalizar(@$_REQUEST['nombres']);
$valores['apellidos'] = $cadenas->capitalizar(@$_REQUEST['apellidos']);
$valores['documentos'] = @$_REQUEST['documentos'];
$valores['identificacion'] = @$_REQUEST['identificacion'];
$valores['nacimiento'] = @$_REQUEST['nacimiento'];
$valores['sexo'] = @$_REQUEST['sexo'];
$valores['telefono'] = @$_REQUEST['telefono'];
$valores['movil'] = @$_REQUEST['movil'];
$valores['correo'] = @$_REQUEST['correo'];
//$valores['pais'] = @$_REQUEST['pais'];
//$valores['region'] = @$_REQUEST['region'];
//$valores['ciudad'] = @$_REQUEST['ciudad'];
$valores['sector'] = @$_REQUEST['sector'];
$valores['direccion'] = @$_REQUEST['direccion'];
//$valores['referencia'] = @$_REQUEST['referencia'];
//$valores['expiracion'] = @$_REQUEST['expiracion'];
$valores['instalacion'] = @$_REQUEST['instalacion'];
$valores['instalacionsector'] = @$_REQUEST['instalacionsector'];
$valores['estrato'] = @$_REQUEST['estrato'];
$valores['diametro'] = @$_REQUEST['diametro'];
////$valores['legalizado'] = @$_REQUEST['legalizado'];

$numero = count($valores);
$tags = array_keys($valores);
$datos = array_values($valores);
for ($i = 0; $i < $numero; $i++) {
  $solicitudes->actualizar($valores['solicitud'], $tags[$i], $datos[$i]);
}
?>