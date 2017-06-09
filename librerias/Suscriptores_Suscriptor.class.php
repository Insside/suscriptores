<?php

$ROOT = (!isset($ROOT)) ? "../../../" : $ROOT;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Suscriptores_Suscriptor
 *
 * @author Insside
 */
if (!class_exists('Suscriptores_Suscriptor')) {
    require_once($ROOT . "modulos/suscriptores/librerias/Suscriptores_Suscriptores.class.php");

    class Suscriptores_Suscriptor {

        /** Properties * */
        private $key;
        private $properties;

        /** Methods * */
        public function Suscriptores_Suscriptor($key) {
            $cb = new Suscriptores_Suscriptores();
            $this->key = $key;
            $this->properties = $cb->consultar($this->key);
        }

        /** Getters * */
        public function getAll() {
            return($this->properties);
        }

        private function getValue($key) {
            return($this->properties[$key]);
        }

        public function getSuscriptor() {
            return($this->getValue("suscriptor"));
        }

        public function getDocumento() {
            return($this->getValue("documento"));
        }

        public function getIdentificacion() {
            return($this->getValue("identificacion"));
        }

        public function getNombres() {
            return($this->getValue("nombres"));
        }

        public function getApellidos() {
            return($this->getValue("apellidos"));
        }

        public function getDireccion() {
            return($this->getValue("direccion"));
        }

        public function getReferencia() {
            return($this->getValue("referencia"));
        }

        public function getUso() {
            return($this->getValue("uso"));
        }

        public function getEstrato() {
            return($this->getValue("estrato"));
        }

        public function getPredial() {
            return($this->getValue("predial"));
        }

        public function getLatitud() {
            return($this->getValue("latitud"));
        }

        public function getLongitud() {
            return($this->getValue("longitud"));
        }

        public function getCorreo() {
            return($this->getValue("correo"));
        }

        public function getTelefonos() {
            return($this->getValue("telefonos"));
        }

        public function getDiametro() {
            return($this->getValue("diametro"));
        }

        public function getAcueducto() {
            return($this->getValue("acueducto"));
        }

        public function getAlcantarillado() {
            return($this->getValue("alcantarillado"));
        }

        public function getCredito() {
            return($this->getValue("credito"));
        }

        public function getCertificado() {
            return($this->getValue("certificado"));
        }

        public function getFactura() {
            return($this->getValue("factura"));
        }

        public function getConexion() {
            return($this->getValue("conexion"));
        }

        public function getSexo() {
            return($this->getValue("sexo"));
        }

        public function getNacimiento() {
            return($this->getValue("nacimiento"));
        }

        public function getManzana() {
            return($this->getValue("manzana"));
        }

        public function getSeccion() {
            return($this->getValue("seccion"));
        }

        public function getSector() {
            return($this->getValue("sector"));
        }

        public function getCiudad() {
            return($this->getValue("ciudad"));
        }

        public function getRegion() {
            return($this->getValue("region"));
        }

        public function getPais() {
            return($this->getValue("pais"));
        }

        public function getCiclo() {
            return($this->getValue("ciclo"));
        }

        public function getRuta() {
            return($this->getValue("ruta"));
        }

        public function getCreador() {
            return($this->getValue("creador"));
        }

        public function getHabitaciones() {
            return($this->getValue("habitaciones"));
        }

        public function getHabitantes() {
            return($this->getValue("habitantes"));
        }

        public function getV3D() {
            return($this->getValue("v3D"));
        }

        public function getEstado() {
            return($this->getValue("estado"));
        }

        public function getUbicacion() {
            return($this->getValue("ubicacion"));
        }

        public function getCreado() {
            return($this->getValue("creado"));
        }

        public function getActualizado() {
            return($this->getValue("actualizado"));
        }

        public function getActualizador() {
            return($this->getValue("actualizador"));
        }

        /** Setters * */
        private function setValue($key, $value) {
            $this->properties[$key] = $value;
        }

        public function setSuscriptor($value) {
            $this->setValue("suscriptor", $value);
        }

        public function setDocumento($value) {
            $this->setValue("documento", $value);
        }

        public function setIdentificacion($value) {
            $this->setValue("identificacion", $value);
        }

        public function setNombres($value) {
            $this->setValue("nombres", $value);
        }

        public function setApellidos($value) {
            $this->setValue("apellidos", $value);
        }

        public function setDireccion($value) {
            $this->setValue("direccion", $value);
        }

        public function setReferencia($value) {
            $this->setValue("referencia", $value);
        }

        public function setUso($value) {
            $this->setValue("uso", $value);
        }

        public function setEstrato($value) {
            $this->setValue("estrato", $value);
        }

        public function setPredial($value) {
            $this->setValue("predial", $value);
        }

        public function setLatitud($value) {
            $this->setValue("latitud", $value);
        }

        public function setLongitud($value) {
            $this->setValue("longitud", $value);
        }

        public function setCorreo($value) {
            $this->setValue("correo", $value);
        }

        public function setTelefonos($value) {
            $this->setValue("telefonos", $value);
        }

        public function setDiametro($value) {
            $this->setValue("diametro", $value);
        }

        public function setAcueducto($value) {
            $this->setValue("acueducto", $value);
        }

        public function setAlcantarillado($value) {
            $this->setValue("alcantarillado", $value);
        }

        public function setCredito($value) {
            $this->setValue("credito", $value);
        }

        public function setCertificado($value) {
            $this->setValue("certificado", $value);
        }

        public function setFactura($value) {
            $this->setValue("factura", $value);
        }

        public function setConexion($value) {
            $this->setValue("conexion", $value);
        }

        public function setSexo($value) {
            $this->setValue("sexo", $value);
        }

        public function setNacimiento($value) {
            $this->setValue("nacimiento", $value);
        }

        public function setManzana($value) {
            $this->setValue("manzana", $value);
        }

        public function setSeccion($value) {
            $this->setValue("seccion", $value);
        }

        public function setSector($value) {
            $this->setValue("sector", $value);
        }

        public function setCiudad($value) {
            $this->setValue("ciudad", $value);
        }

        public function setRegion($value) {
            $this->setValue("region", $value);
        }

        public function setPais($value) {
            $this->setValue("pais", $value);
        }

        public function setCiclo($value) {
            $this->setValue("ciclo", $value);
        }

        public function setRuta($value) {
            $this->setValue("ruta", $value);
        }

        public function setCreador($value) {
            $this->setValue("creador", $value);
        }

        public function setHabitaciones($value) {
            $this->setValue("habitaciones", $value);
        }

        public function setHabitantes($value) {
            $this->setValue("habitantes", $value);
        }

        public function setV3D($value) {
            $this->setValue("v3D", $value);
        }

        public function setEstado($value) {
            $this->setValue("estado", $value);
        }

        public function setUbicacion($value) {
            $this->setValue("ubicacion", $value);
        }

        public function setCreado($value) {
            $this->setValue("creado", $value);
        }

        public function setActualizado($value) {
            $this->setValue("actualizado", $value);
        }

        public function setActualizador($value) {
            $this->setValue("actualizador", $value);
        }

        /**
         * (PHP 4 >= 4.0.6, PHP 5, PHP 7)<br/>
         * Method syncUp <<sincronizar>> 
         * Este metodo sincroniza los datos modificados en el objeto
         * con la información almacenada en la base de datos.
         * Se ejecuta como una acción sin parametros adicionales.
         * */
        public function syncUp() {
            $cb = new Suscriptores();
            foreach ($this->properties as $key => $value) {
                $cb->actualizar($this->key, $key, $value);
            }
        }

    }

}
?>