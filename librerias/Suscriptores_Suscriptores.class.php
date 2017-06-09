<?php

$ROOT = (!isset($ROOT)) ? "../../../" : $ROOT;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Suscriptores_Suscriptores
 *
 * @author Insside
 */
if (!class_exists('Suscriptores_Suscriptores')) {

    class Suscriptores_Suscriptores {

        public function crear($datos = array()) {
            if (is_array($datos)) {
                $db = new MySQL(Sesion::getConexion());
                $sql = "INSERT INTO `suscriptores` SET "
                        . "`suscriptor`='" . $datos['suscriptor'] . "',"
                        . "`documento`='" . $datos['documento'] . "',"
                        . "`identificacion`='" . $datos['identificacion'] . "',"
                        . "`nombres`='" . $datos['nombres'] . "',"
                        . "`apellidos`='" . $datos['apellidos'] . "',"
                        . "`direccion`='" . $datos['direccion'] . "',"
                        . "`referencia`='" . $datos['referencia'] . "',"
                        . "`uso`='" . $datos['uso'] . "',"
                        . "`estrato`='" . $datos['estrato'] . "',"
                        . "`predial`='" . $datos['predial'] . "',"
                        . "`latitud`='" . $datos['latitud'] . "',"
                        . "`longitud`='" . $datos['longitud'] . "',"
                        . "`correo`='" . $datos['correo'] . "',"
                        . "`telefonos`='" . $datos['telefonos'] . "',"
                        . "`diametro`='" . $datos['diametro'] . "',"
                        . "`acueducto`='" . $datos['acueducto'] . "',"
                        . "`alcantarillado`='" . $datos['alcantarillado'] . "',"
                        . "`credito`='" . $datos['credito'] . "',"
                        . "`certificado`='" . $datos['certificado'] . "',"
                        . "`factura`='" . $datos['factura'] . "',"
                        . "`conexion`='" . $datos['conexion'] . "',"
                        . "`sexo`='" . $datos['sexo'] . "',"
                        . "`nacimiento`='" . $datos['nacimiento'] . "',"
                        . "`manzana`='" . $datos['manzana'] . "',"
                        . "`seccion`='" . $datos['seccion'] . "',"
                        . "`sector`='" . $datos['sector'] . "',"
                        . "`ciudad`='" . $datos['ciudad'] . "',"
                        . "`region`='" . $datos['region'] . "',"
                        . "`pais`='" . $datos['pais'] . "',"
                        . "`ciclo`='" . $datos['ciclo'] . "',"
                        . "`ruta`='" . $datos['ruta'] . "',"
                        . "`creador`='" . $datos['creador'] . "',"
                        . "`habitaciones`='" . $datos['habitaciones'] . "',"
                        . "`habitantes`='" . $datos['habitantes'] . "',"
                        . "`v3D`='" . $datos['v3D'] . "',"
                        . "`estado`='" . $datos['estado'] . "',"
                        . "`ubicacion`='" . $datos['ubicacion'] . "',"
                        . "`creado`='" . $datos['creado'] . "',"
                        . "`actualizado`='" . $datos['actualizado'] . "',"
                        . "`actualizador`='" . $datos['actualizador'] . "'"
                        . ";";
                $db->sql_query($sql);
                $db->sql_close();
            } else {
                echo("Error: Suscriptores::crear se esperaba un vector.");
            }
        }

        public function actualizar($suscriptor, $campo, $valor) {
            $db = new MySQL(Sesion::getConexion());
            $sql = "UPDATE `suscriptores` "
                    . "SET `" . $campo . "`='" . $valor . "' "
                    . "WHERE `suscriptor`='" . $suscriptor . "';";
            $db->sql_query($sql);
            $db->sql_close();
        }

        public function eliminar($suscriptor) {
            $db = new MySQL(Sesion::getConexion());
            $sql = "DELETE FROM `suscriptores` "
                    . "WHERE `suscriptor`='" . $suscriptor . "';";
            $db->sql_query($sql);
            $db->sql_close();
        }

        public function consultar($suscriptor) {
            $db = new MySQL(Sesion::getConexion());
            $sql = "SELECT * FROM `suscriptores` "
                    . "WHERE `suscriptor`='" . $suscriptor . "';";
            $consulta = $db->sql_query($sql);
            $fila = $db->sql_fetchrow($consulta);
            $db->sql_close();
            return($fila);
        }

    }

}
?>