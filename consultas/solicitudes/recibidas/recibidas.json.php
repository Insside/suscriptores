<?php

$ROOT = (!isset($ROOT)) ? "../../../../../" : $ROOT;
require_once($ROOT . "modulos/suscriptores/librerias/Configuracion.cnf.php");
require_once($ROOT . "modulos/comercial/librerias/Comercial_Aforos.class.php");
$sesion = new Sesion();
$automatizaciones = new Automatizaciones();
$usuarios = new Usuarios();
$suscriptores = new Suscriptores();
$cadenas = new Cadenas();
$fechas = new Fechas();
$solicitudes = new Solicitudes();
$respuestas = new Respuestas();
$notificaciones = new Solicitudes_Notificaciones();
$legalizaciones = new Legalizaciones();
$usuario = Sesion::usuario();
$validaciones = new Validaciones();
$aforos=new Comercial_Aforos();
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

/** Variables Recibidas * */
$v['criterio'] = $validaciones->recibir("criterio");
$v['valor'] = $validaciones->recibir("valor");
$v['fechainicial'] = $validaciones->recibir("fechainicial");
$v['fechafinal'] = $validaciones->recibir("fechafinal");
$v['transaccion'] = $validaciones->recibir("transaccion");
$v['page'] = $validaciones->recibir("page");
$v['perpage'] = $validaciones->recibir("perpage");
/** Verificaciones * */
$s['fechainicial'] = $sesion->getValue("fechainicial");
$s['fechafinal'] = $sesion->getValue("fechafinal");

$v['fechainicial'] = empty($s['fechainicial']) ? "2012-01-01" : $s['fechainicial'];
$v['fechafinal'] = empty($s['fechafinal']) ? $fechas->hoy() : $s['fechafinal'];

/* * Variables Definidas * */
if (!empty($v['page'])) {
  $pagination = true;
  $page = intval($v['page']);
  $perpage = intval($v['perpage']);
  $n = ( $page - 1 ) * $perpage;
  $limite = "LIMIT $n, $perpage";
} else {
  $pagination = false;
  $page = 1;
  $perpage = 20;
  $n = 0;
  $limite = "LIMIT $n, $perpage";
}
/**
 * En este segmento se evalua si se esta recibiendo o no un criterio y un valor a buscar segun el criterio
 * adicionalmente se contempla la propiedad y responsabilidad del usuario activo sobre los registros visualizados.
 * 
 * */
if (!empty($v['criterio']) && !empty($v['valor'])) {
  $buscar = "WHERE((`radicacion` BETWEEN '" . $v['fechainicial'] . "' AND '" . $v['fechafinal'] . "')AND(`" . $v['criterio'] . "` LIKE '%" . $v['valor'] . "%')AND( `creador`='" . $usuario['usuario'] . "' OR `responsable`='" . $usuario['usuario'] . "'))";
} else {
  $buscar = "WHERE((`radicacion` BETWEEN '" . $v['fechainicial'] . "' AND '" . $v['fechafinal'] . "')AND(`creador`='" . $usuario['usuario'] . "' OR `responsable`='" . $usuario['usuario'] . "'))";
}
$db = new MySQL(Sesion::getConexion());
$consulta = $db->sql_query(""
        . "SELECT * "
        . "FROM `solicitudes_solicitudes` " . $buscar . " "
        . "ORDER BY `radicacion` "
        . "DESC;");
$total = $db->sql_numrows($consulta);
$sql = ""
        . "SELECT * "
        . "FROM `solicitudes_solicitudes` " . $buscar . " "
        . "ORDER BY `radicacion` "
        . "DESC " . $limite;
//echo($sql);
$consulta = $db->sql_query($sql);
$ret = array();
while ($fila = $db->sql_fetchrow($consulta)) {
  $nombre = $cadenas->capitalizar($fila['nombres'] . " " . $fila['apellidos']);
  $direccion = (!empty($fila['instalacion'])) ? $fila['instalacion'] : $fila['direccion'];
  $detalles = $cadenas->capitalizar($direccion) . " <i>Tels: " . $fila['telefono'] . " " . $fila['movil'] . "</i>";
  $servicio = $servicios->consultar($fila['servicio']);
  $servicio = "<a href=\"#\" title=\"Estado\" onclick=\"parent.MUI.Notificacion('" . $servicio['nombre'] . "');\"><img src=\"imagenes/16x16/" . ($servicio['icono']) . "\" width=\"16\" height=\"16\"/>";
  $asunto = $asuntos->consultar($fila['asunto']);
  //$estado = (!empty($fila['radicada'])) ? "verde" : "rojo";
  $fila['estado'] = ""; // "<a href=\"#\" title=\"Estado\" onclick=\"MUI.Notificacion('" . @$fila['radicada'] . "');\"><img src=\"imagenes/16x16/" . ($estado) . ".png\" width=\"16\" height=\"16\"/>";
  $fila['detalles'] = "<span>" . $fila['suscriptor'] . " - <b>" . $nombre . "</b> <i>" . $detalles . "</i><span>";
  $fila['servicio'] = $servicio;


//  if ($fila['causal'] == "211") {
//    $fila['codigo'] = "<a href=\"#\" onClick=\""
//            . "MUI.Solicitudes_Solicitud_Consultar('" . $fila['solicitud'] . "');"
//            . "MUI.Suscriptores_Solicitud_Consultar('" . $fila['solicitud'] . "');"
//            . "\">" . $fila['solicitud'] . "</a>";
//  } else {
  $fila['codigo'] = "<a href=\"#\" onClick=\"MUI.Suscriptores_Solicitud_Consultar('" . $fila['solicitud'] . "');\">" . $fila['solicitud'] . "</a>";
//  }



  $estado['solicitud'] = $solicitudes->estado_solicitud($fila['solicitud']);
  $estado['tiempo'] = $solicitudes->estado_tiempo($fila['solicitud']);
  $estado['respuesta'] = $respuestas->estado_respuesta($fila['solicitud']);
  $estado['notificacion'] = $notificaciones->estado_notificacion($fila['solicitud']);
  $estado['adjuntos'] = $solicitudes->estado_adjuntos($fila['solicitud']);
  $estado['legalizacion'] = $legalizaciones->estado($fila['solicitud']);
  $estado['aforo'] = "";

//  if ($fila['causal'] == "211") {
//    $estado = ($fila['legalizado'] == "SI") ? "verde" : "rojo";
//    $fila['estados'] = "<a href=\"#\" title=\"Estado\" onclick=\"MUI.Notificacion('" . @$fila['radicada'] . "');\"><img src=\"imagenes/16x16/" . ($estado) . ".png\" width=\"16\" height=\"16\"/>";
//  } else {



  $aforo_solicitud = $aforos->solicitud($fila['solicitud']);
  $aforo_estado = $aforos->estado($aforo_solicitud['aforo']);

  if ($aforo_estado) {
    $ae = "i016x016_aforoverde";
  } else {
    $ae = "i016x016_afororojo";
  }


  $fila['estados'] = ""
          . "<a href=\"#\" onClick=\"#\"><div class=\"i016x016_" . strtolower(@$servicio['nombre']) . "\"></div></a>"
          . "<a href=\"#\" onClick=\"#\"><div class=\"i016x016_solicitud" . strtolower($estado['solicitud']). "\"></div></a>"
          . "<a href=\"#\" onClick=\"#\"><div class=\"i016x016_respuesta" .strtolower($estado['respuesta']). "\"></div></a>"
          . "<a href=\"#\" onClick=\"#\"><div class=\"i016x016_notificacion" .strtolower($estado['notificacion']) . "\"></div></a>"
          . "<a href=\"#\" onClick=\"#\"><div class=\"i016x016_tiempo" . strtolower($estado['tiempo']) . "\"></div></a>"
          . "<a href=\"#\" onClick=\"#\"><div class=\"i016x016_adjuntos" .strtolower($estado['adjuntos']). "\"></div></a>"
          . "<a href=\"#\" onClick=\"#\"><div class=\"" . $ae . "\"></div></a>"
          . "<a href=\"#\" onClick=\"#\"><div class=\"i016x016_legalizacion" . strtolower($estado['legalizacion']). "\"></div></a>"
          . "";
//  }

  $json['solicitud'] = $fila['solicitud'];
  $json['creador'] = $fila['creador'];
  $json['responsable'] = $fila['responsable'];
  $json['equipo'] = $fila['equipo'];
  $json['codigo'] = $fila['codigo'];
  $json['servicio'] = $fila['servicio'];
  $json['causal'] = $fila['causal'];
  $json['detalles'] = $fila['detalles'];
  $json['radicacion'] = $fila['radicacion'];
  $json['estados'] = $fila['estados'];

  $fila['opciones'] = "<a href=\"#\" onClick=\"MUI.Raiz_Creador('" . $fila['creador'] . "');\"><div class=\"icono16x16creador\"></div></a>";
  array_push($ret, $json);
}

$db->sql_close();
echo json_encode(array("sql" => $sql, "uid" => $usuario['usuario'], "page" => $page, "total" => $total, "data" => $ret));
?>