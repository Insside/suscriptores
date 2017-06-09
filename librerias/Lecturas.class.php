<?php

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

class Lecturas {

  function consultar($suscriptor, $fecha) {
    $db = new MySQL(Sesion::getConexion());
    $sql = "SELECT * FROM `facturacion_lecturas` WHERE(`suscriptor` ='" . $suscriptor . "' AND `fecha` ='" . $fecha . "');";
    $consulta = $db->sql_query($sql);
    $fila = $db->sql_fetchrow($consulta);
    return($fila);
  }

  function actual($suscriptor) {
    $db = new MySQL(Sesion::getConexion());
    $sql = "
   SELECT `suscriptor`,`lectura`,`fecha`
   FROM `facturacion_lecturas`
   WHERE `suscriptor` = '" . $suscriptor . "'
   ORDER BY `fecha` DESC;";
    $consulta = $db->sql_query($sql);
    $fila = $db->sql_fetchrow($consulta);
    $db->sql_close();
    return($fila);
  }

  function anterior($suscriptor) {
    $db = new MySQL(Sesion::getConexion());
    $sql = "SELECT * FROM `facturacion_lecturas` WHERE(`suscriptor` ='" . $suscriptor . "'')ORDER BY `fecha` DESC LIMIT 1;";
    $consulta = $db->sql_query($sql);
    $fila = $db->sql_fetchrow($consulta);
    $fila = $db->sql_fetchrow($consulta);
    return($fila);
  }

  function _anterior($suscriptor, $fecha) {
    $db = new MySQL(Sesion::getConexion());
    $sql = "SELECT * FROM `facturacion_lecturas` WHERE(`suscriptor` ='" . $suscriptor . "' AND `fecha` <'" . $fecha . "')ORDER BY `fecha` DESC LIMIT 1;";
    $consulta = $db->sql_query($sql);
    $fila = $db->sql_fetchrow($consulta);
    return($fila);
  }

  /**
   * Esta funcion consulta todas las lecturas registradas en la base de datos a nombre de un suscriptor y las retorna
   * con forma de vector compuesto.
   * @param type $suscriptor
   * @return type
   */
  function todas($suscriptor, $orden) {
    $db = new MySQL(Sesion::getConexion());
    $sql = "SELECT * FROM `facturacion_lecturas` WHERE `suscriptor` ='" . $suscriptor . "' ORDER BY  `fecha` " . strtoupper($orden) . ";";
    $consulta = $db->sql_query($sql);
    $filas = array();
    while ($fila = $db->sql_fetchrow($consulta)) {
      array_push($filas, $fila);
    }
    return($filas);
  }

  function consumo($suscriptor, $fecha) {
    $actual = $this->consultar($suscriptor, $fecha);
    $anterior = $this->anterior($suscriptor, $fecha);
    //echo($actual['lectura'] . "-" . $anterior['lectura']);
    return((int) $actual['lectura'] - (int) $anterior['lectura']);
  }

}

?>