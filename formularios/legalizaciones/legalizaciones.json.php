<?php

$ROOT = (!isset($ROOT)) ? "../../../../" : $ROOT;
require_once($ROOT . "modulos/suscriptores/librerias/Configuracion.cnf.php");
header('Content-Type: application/json');
$automatizaciones = new Automatizaciones();
$usuarios = new Usuarios();
$validaciones = new Validaciones();
$suscriptores = new Suscriptores();
$aforos = new Suscriptores_Aforos();
$instalaciones = new Instalaciones();
$fechas = new Fechas();
$cadenas=new Cadenas();
/*
 * Copyright (c) 2015, Alexis
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
$usuario = Sesion::usuario();
/** Variables Recibidas * */
$v['criterio'] = $validaciones->recibir("criterio");
$v['valor'] = $validaciones->recibir("valor");
$v['inicio'] = $validaciones->recibir("inicio");
$v['final'] = $validaciones->recibir("final");
$v['transaccion'] = $validaciones->recibir("transaccion");
$v['page'] = $validaciones->recibir("page");
$v['perpage'] = $validaciones->recibir("perpage");
/** Verificaciones * */
/**
 * Se evalua el comportamiento en caso de no recibir el periodo inicial y final de la consulta para lo 
 * cual se presuponen la fecha de la primera solicitud y la ultima que se hallan registrado por
 * el usuario activo en el sistema de atencion de solicitudes.
 */
$v['inicio'] = empty($v['inicio']) ? "0000-00-00" : $v['inicio'];
$v['final'] = empty($v['final']) ? "2018-01-01" : $v['final'];

/* * Variables Definidas * */
if (!empty($v['page'])) {
    $pagination = true;
    $page = intval($v['page']);
    $perpage = intval($v['perpage']);
    $n = ( $page - 1 ) * $perpage;
    $limit = "LIMIT $n, $perpage";
} else {
    $pagination = false;
    $page = 1;
    $perpage = 20;
    $n = 0;
    $limit = "LIMIT $n, $perpage";
}

$db = new MySQL(Sesion::getConexion());
/**
 * En este segmento se evalua si se esta recibiendo o no un criterio y un valor a buscar segun el 
 * criterio adicionalmente se contempla la propiedad y responsabilidad del usuario activo sobre los 
 * registros visualizados. En terminos de criterios existe un criterio especial que se utiliza para
 * identificar una peticion en la que solo se desean ver aquellas solicitudes que se encuentran 
 * pendientes de respuesta, ese criterio es "estado", donde no existe ningun campo denominado 
 * estado pero se usa para definir si los registros se muestran como se hace habitualmente o 
 * solamente aquellos que correspondan a peticiones a la espera de respuesta.
 * Nota: $where debe existir ya que en un segmento posterior a este se una como criterio para
 * establecer el numero total de registros que se obtendran establecida la estructura de la
 * consulta.
 * */
if (!empty($v['criterio']) && !empty($v['valor'])) {
    if ($v['criterio'] == "estado" && $v['valor'] == 'pendientes') {
        $where = "WHERE("
                . "(`causal`='211' AND `legalizado`='SI')AND"
                . "(`solicitudes_solicitudes`.`solicitud`=`solicitudes_respuestas`.`solicitud`)AND"
                . "(`solicitudes_solicitudes`.`creador`='" . $usuario['usuario'] . "' OR `solicitudes_solicitudes`.`responsable`='" . $usuario['usuario'] . "')"
                . ")";
    } else {
        $where = "WHERE("
                . "(`causal`='211' AND `legalizado`='SI')AND"
                . "(`solicitudes_solicitudes`.`radicacion` BETWEEN '" . $v['inicio'] . "' AND '" . $v['final'] . "')AND"
                . "(`" . $v['criterio'] . "` LIKE '%" . $v['valor'] . "%')"
                . "AND( `solicitudes_solicitudes`.`creador`='" . $usuario['usuario'] . "' OR `solicitudes_solicitudes`.`responsable`='" . $usuario['usuario'] . "'))";
    }
} else {
    $where = "WHERE"
            . "("
            . "(`causal`='211' AND `legalizado`='SI')AND"
            . "(`solicitudes_solicitudes`.`radicacion` BETWEEN '" . $v['inicio'] . "' AND '" . $v['final'] . "')AND"
            . "(`solicitudes_solicitudes`.`creador`='" . $usuario['usuario'] . "' OR `solicitudes_solicitudes`.`responsable`='" . $usuario['usuario'] . "')"
            . ")";
}


/**
 * En este segmento se realiza una consulta para obtener un preconteo del numero de datos 
 * totales, que se retornara como resultado. Este dato se visualiza en la parte inferior de la tabla 
 * grafica generada, y debe ser retornado en el JSON bajo el indice "total".
 */
$sql['preconteo'] = ("SELECT * FROM `solicitudes_solicitudes` " . $where . ";");
$preconteo = $db->sql_query($sql['preconteo']);
$total = $db->sql_numrows($preconteo);
/**
 * Consulta real que generara resultados
 * 
 */
if (!empty($v['criterio']) && !empty($v['valor']) && $v['criterio'] == "estado" && $v['valor'] == 'pendientes') {
    $sql['consulta'] = "SELECT * FROM `solicitudes_solicitudes` " . $where . " ORDER BY `matricula` DESC " . $limit;
} else {
    $sql['consulta'] = ("SELECT * FROM `solicitudes_solicitudes` " . $where . " ORDER BY `matricula` DESC " . $limit);
}

$consulta = $db->sql_query($sql['consulta']);
$ret = array();
while ($fila = $db->sql_fetchrow($consulta)) {
    $suscriptor = $suscriptores->consultar($fila['matricula']);
    $aforo = $aforos->solicitud($fila["solicitud"]);
    $instalacion = $instalaciones->suscriptor($fila['matricula']);
    /** Json Filas* */
    $nombre = "<b>" . $cadenas->capitalizar($suscriptor['nombres'] . " " . $suscriptor['apellidos']) . "</b> ";
    $direccion = "<i>" . $suscriptor['direccion'] . "</i>";
    $jfila['solicitud'] = $fila['solicitud'];
    $jfila['csolicitud'] = "<a href=\"#\" title=\"Estado\" onclick=\"MUI.Suscriptores_Solicitud_Consultar('" . $fila['solicitud'] . "');\">" . $fila['solicitud'] . "</a>";
    $jfila['matricula'] = $fila['matricula'];
    $jfila['cmatricula'] = "<a href=\"#\" onClick=\"MUI.Suscriptores_Suscriptor_Visualizar('" . $fila['matricula'] . "');\">" . $fila['matricula'] . "</a>";
    $jfila['detalles'] = $nombre . $direccion;
    $jfila['radicacion'] = $fila['radicacion'];
    $jfila['uso'] = $suscriptor['uso'];
    $jfila['estrato'] = $suscriptor['estrato'];
    $jfila['aforo'] = $aforo["fecha"];
    $jfila['legalizacion'] = $suscriptor["creado"];
    $jfila['instalacion'] = $instalacion["realizado"];
    $jfila['dhta'] = $fechas->trascurrido($fila['radicacion'], $jfila['aforo']);
    $jfila['dhtl'] = $fechas->trascurrido($jfila['aforo'], $jfila['legalizacion']);
    $jfila['dht'] = $fechas->trascurrido($fila['radicacion'], $jfila['legalizacion']);
    $jfila['dhti'] = $fechas->trascurrido($fila['radicacion'], $jfila['instalacion']);
    $jfila['creador'] =$suscriptor["creador"];
    $jfila['actualizador'] =$suscriptor["actualizador"];
//  $suscriptor = $suscriptores->consultar($fila['matricula']);
//  $nombre = $cadenas->capitalizar($suscriptor['nombres'] . " " . $suscriptor['apellidos']);
//  $servicio = $servicios->consultar($fila['servicio']);
//  $servicio = "<a href=\"#\" title=\"Estado\" onclick=\"MUI.Notificacion('" . $servicio['nombre'] . "');\"><img src=\"imagenes/16x16/" . ($servicio['icono']) . "\" width=\"16\" height=\"16\"/>";
//  $asunto = $asuntos->consultar($fila['asunto']);
//  $detalles = "<b>" . $nombre . "</b> <i>" . $suscriptor['direccion'] . "</i>";
//  $instalacion['datos'] = $instalaciones->suscriptor($suscriptor['suscriptor']);
//  $instalacion['mensaje'] = (!empty($instalacion['datos']['realizado'])) ? ($instalacion['datos']['realizado']) : ("Pendiente");
//  $instalacion['estado'] = (!empty($instalacion['datos']['realizado'])) ? ("verde") : ("rojo");
//  $jfila['solicitud'] = "&nbsp;<a href=\"#\" title=\"Estado\" onclick=\"MUI.Suscriptores_Solicitud_Consultar('" . @$fila['solicitud'] . "');\">" . $fila['solicitud'] . "</a>";
//  $jfila['matricula'] = "&nbsp;<a href=\"#\" onClick=\"MUI.Suscriptores_Suscriptor_Visualizar('" . $fila['matricula'] . "');\">" . $fila['matricula'] . "</a>";
//  $jfila['detalles'] = $detalles;
//  $jfila['radicacion'] = $fila['radicacion'];
//  La fecha de la legalización es la fecha donde realmente, el encargado pueda
//  dar creacion a la matricula tras las radicación de la solicitud y el aforo.
//  $jfila['legalizacion'] =$suscriptor["creado"]; 
//  $jfila['aforacion'] =$aforo["fecha"];
//  $jfila['imprimir'] = "<a href=\"#\" onClick=\"MUI.Suscriptores_Constancia_Matricula('" . $fila['matricula'] . "');\"><img src=\"imagenes/16x16/imprimir.png\" width=\"16\" height=\"16\"/></a>";
//  $jfila['instalacion'] = "<a href=\"#\" title=\"Estado\" onclick=\"MUI.Notificacion('" . $instalacion['mensaje'] . "');\"><img src=\"imagenes/16x16/" . ($instalacion['estado']) . "-16x16.png\" width=\"16\" height=\"16\"/>";
    array_push($ret, $jfila);
}

$db->sql_close();
echo json_encode(array("sql" => $cadenas->condenzar($sql['consulta']), "uid" => $usuario['usuario'], "page" => $page, "total" => $total, "data" => $ret));
?>