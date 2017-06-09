<?php

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

/**
 * Description of Suscriptores_Georeferencias
 *
 * @author Alexis
 */
class Suscriptores_Georeferencias {

  //put your code here
  function crear($datos) {
    $db = new MySQL(Sesion::getConexion());
    $sql = "INSERT INTO `suscriptores_georeferencias` SET ";
    $sql.="`georeferencia`='" . ($datos['georeferencia']) . "',";
    $sql.="`suscriptor`='" . ($datos['suscriptor']) . "',";
    $sql.="`latitud`='" . $datos['latitud'] . "',";
    $sql.="`latitud_grados`='" . number_format($datos['latitud_grados'], 2) . "',";
    $sql.="`latitud_minutos`='" . number_format($datos['latitud_minutos'], 2) . "',";
    $sql.="`latitud_segundos`='" . number_format($datos['latitud_segundos'], 2) . "',";
    $sql.="`latitud_decimal`='" . number_format($datos['latitud_decimal'], 16) . "',";
    $sql.="`longitud`='" . $datos['longitud'] . "',";
    $sql.="`longitud_grados`='" . number_format($datos['longitud_grados'], 2) . "',";
    $sql.="`longitud_minutos`='" . number_format($datos['longitud_minutos'], 2) . "',";
    $sql.="`longitud_segundos`='" . number_format($datos['longitud_segundos'], 2) . "',";
    $sql.="`longitud_decimal`='" . number_format($datos['longitud_decimal'], 16) . "',";
    $sql.="`fecha`='" . $datos['fecha'] . "',";
    $sql.="`hora`='" . $datos['hora'] . "',";
    $sql.="`creador`='" . $datos['creador'] . "';";
    echo($sql);
    $consulta = $db->sql_query($sql);
    $db->sql_close();
  }

  function cordenadas($suscriptor) {
    $db = new MySQL(Sesion::getConexion());
    $sql = "SELECT * FROM `suscriptores_georeferencias` "
            . "WHERE `suscriptor`='" . $suscriptor . "' "
            . "ORDER BY `georeferencia` DESC;";
    $consulta = $db->sql_query($sql);
    $fila = $db->sql_fetchrow($consulta);
    $db->sql_close();
    $retornar['latitud']=$fila["latitud_decimal"];
    $retornar['longitud']=$fila["longitud_decimal"];
    return($retornar);
  }

  function suscriptor($suscriptor) {
    $db = new MySQL(Sesion::getConexion());
    $sql = "SELECT * FROM `suscriptores_georeferencias` "
            . "WHERE `suscriptor`='" . $suscriptor . "' "
            . "ORDER BY `georeferencia` DESC;";
    $consulta = $db->sql_query($sql);
    $fila = $db->sql_fetchrow($consulta);
    $db->sql_close();
    return($fila);
  }

}
