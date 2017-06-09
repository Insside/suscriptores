<?php

$ROOT = (!isset($ROOT)) ? "../../../" : $ROOT;
/**
 * Description of Suscriptores_Suscriptor
 * Esta clase retorna los datos asociados a la solicitud con la cual fue creada
 * o legalizada una matricula.
 * @author Insside
 */
if (!class_exists('Suscriptores_Matricula_Solicitud')) {
    require_once($ROOT . "modulos/solicitudes/librerias/Solicitudes_Solicitudes.class.php");

    class Suscriptores_Matricula_Solicitud {

        /** Properties * */
        private $key;
        private $properties;

        /** Methods * */
        public function Suscriptores_Matricula_Solicitud($key) {
            $ss = new Solicitudes_Solicitudes();
            $this->key = $key;
            $this->properties =$ss->getByMatricula($this->key);
        }

        /** Getters * */
        public function getAll(){
            return($this->properties);
        }
        private function getValue($key) {
            return($this->properties[$key]);
        }

        public function getSolicitud() {
            return($this->getValue("solicitud"));
        }

        public function getDane() {
            return($this->getValue("dane"));
        }

        public function getServicio() {
            return($this->getValue("servicio"));
        }

        public function getRadicado() {
            return($this->getValue("radicado"));
        }

        public function getRadicacion() {
            return($this->getValue("radicacion"));
        }

        public function getCategoria() {
            return($this->getValue("categoria"));
        }

        public function getTrasferido() {
            return($this->getValue("trasferido"));
        }

        public function getCausal() {
            return($this->getValue("causal"));
        }

        public function getAsunto() {
            return($this->getValue("asunto"));
        }

        public function getDetalle() {
            return($this->getValue("detalle"));
        }

        public function getSuscriptor() {
            return($this->getValue("suscriptor"));
        }

        public function getFactura() {
            return($this->getValue("factura"));
        }

        public function getNotificado() {
            return($this->getValue("notificado"));
        }

        public function getNotificacion() {
            return($this->getValue("notificacion"));
        }

        public function getSspd() {
            return($this->getValue("sspd"));
        }

        public function getEjecucion() {
            return($this->getValue("ejecucion"));
        }

        public function getOrden() {
            return($this->getValue("orden"));
        }

        public function getFecha() {
            return($this->getValue("fecha"));
        }

        public function getNombres() {
            return($this->getValue("nombres"));
        }

        public function getApellidos() {
            return($this->getValue("apellidos"));
        }

        public function getDocumentos() {
            return($this->getValue("documentos"));
        }

        public function getIdentificacion() {
            return($this->getValue("identificacion"));
        }

        public function getNacimiento() {
            return($this->getValue("nacimiento"));
        }

        public function getSexo() {
            return($this->getValue("sexo"));
        }

        public function getTelefono() {
            return($this->getValue("telefono"));
        }

        public function getMovil() {
            return($this->getValue("movil"));
        }

        public function getCorreo() {
            return($this->getValue("correo"));
        }

        public function getPais() {
            return($this->getValue("pais"));
        }

        public function getRegion() {
            return($this->getValue("region"));
        }

        public function getCiudad() {
            return($this->getValue("ciudad"));
        }

        public function getSector() {
            return($this->getValue("sector"));
        }

        public function getDireccion() {
            return($this->getValue("direccion"));
        }

        public function getReferencia() {
            return($this->getValue("referencia"));
        }

        public function getExpiracion() {
            return($this->getValue("expiracion"));
        }

        public function getInstalacion() {
            return($this->getValue("instalacion"));
        }

        public function getEstrato() {
            return($this->getValue("estrato"));
        }

        public function getDiametro() {
            return($this->getValue("diametro"));
        }

        public function getLegalizado() {
            return($this->getValue("legalizado"));
        }

        public function getMatricula() {
            return($this->getValue("matricula"));
        }

        public function getAforado() {
            return($this->getValue("aforado"));
        }

        public function getCreador() {
            return($this->getValue("creador"));
        }

        public function getResponsable() {
            return($this->getValue("responsable"));
        }

        public function getOrigen() {
            return($this->getValue("origen"));
        }

        public function getEquipo() {
            return($this->getValue("equipo"));
        }

        public function getCredito() {
            return($this->getValue("credito"));
        }

        /** Setters * */
        private function setValue($key, $value) {
            $this->properties[$key] = $value;
        }

        public function setSolicitud($value) {
            $this->setValue("solicitud", $value);
        }

        public function setDane($value) {
            $this->setValue("dane", $value);
        }

        public function setServicio($value) {
            $this->setValue("servicio", $value);
        }

        public function setRadicado($value) {
            $this->setValue("radicado", $value);
        }

        public function setRadicacion($value) {
            $this->setValue("radicacion", $value);
        }

        public function setCategoria($value) {
            $this->setValue("categoria", $value);
        }

        public function setTrasferido($value) {
            $this->setValue("trasferido", $value);
        }

        public function setCausal($value) {
            $this->setValue("causal", $value);
        }

        public function setAsunto($value) {
            $this->setValue("asunto", $value);
        }

        public function setDetalle($value) {
            $this->setValue("detalle", $value);
        }

        public function setSuscriptor($value) {
            $this->setValue("suscriptor", $value);
        }

        public function setFactura($value) {
            $this->setValue("factura", $value);
        }

        public function setNotificado($value) {
            $this->setValue("notificado", $value);
        }

        public function setNotificacion($value) {
            $this->setValue("notificacion", $value);
        }

        public function setSspd($value) {
            $this->setValue("sspd", $value);
        }

        public function setEjecucion($value) {
            $this->setValue("ejecucion", $value);
        }

        public function setOrden($value) {
            $this->setValue("orden", $value);
        }

        public function setFecha($value) {
            $this->setValue("fecha", $value);
        }

        public function setNombres($value) {
            $this->setValue("nombres", $value);
        }

        public function setApellidos($value) {
            $this->setValue("apellidos", $value);
        }

        public function setDocumentos($value) {
            $this->setValue("documentos", $value);
        }

        public function setIdentificacion($value) {
            $this->setValue("identificacion", $value);
        }

        public function setNacimiento($value) {
            $this->setValue("nacimiento", $value);
        }

        public function setSexo($value) {
            $this->setValue("sexo", $value);
        }

        public function setTelefono($value) {
            $this->setValue("telefono", $value);
        }

        public function setMovil($value) {
            $this->setValue("movil", $value);
        }

        public function setCorreo($value) {
            $this->setValue("correo", $value);
        }

        public function setPais($value) {
            $this->setValue("pais", $value);
        }

        public function setRegion($value) {
            $this->setValue("region", $value);
        }

        public function setCiudad($value) {
            $this->setValue("ciudad", $value);
        }

        public function setSector($value) {
            $this->setValue("sector", $value);
        }

        public function setDireccion($value) {
            $this->setValue("direccion", $value);
        }

        public function setReferencia($value) {
            $this->setValue("referencia", $value);
        }

        public function setExpiracion($value) {
            $this->setValue("expiracion", $value);
        }

        public function setInstalacion($value) {
            $this->setValue("instalacion", $value);
        }

        public function setEstrato($value) {
            $this->setValue("estrato", $value);
        }

        public function setDiametro($value) {
            $this->setValue("diametro", $value);
        }

        public function setLegalizado($value) {
            $this->setValue("legalizado", $value);
        }

        public function setMatricula($value) {
            $this->setValue("matricula", $value);
        }

        public function setAforado($value) {
            $this->setValue("aforado", $value);
        }

        public function setCreador($value) {
            $this->setValue("creador", $value);
        }

        public function setResponsable($value) {
            $this->setValue("responsable", $value);
        }

        public function setOrigen($value) {
            $this->setValue("origen", $value);
        }

        public function setEquipo($value) {
            $this->setValue("equipo", $value);
        }

        public function setCredito($value) {
            $this->setValue("credito", $value);
        }

        /**
         * (PHP 4 >= 4.0.6, PHP 5, PHP 7)<br/>
         * Method syncUp <<sincronizar>> 
         * Este metodo sincroniza los datos modificados en el objeto
         * con la información almacenada en la base de datos.
         * Se ejecuta como una acción sin parametros adicionales.
         * */
        public function syncUp() {
            $cb = new Solicitudes_Solicitudes();
            foreach ($this->properties as $key => $value) {
                $cb->actualizar($this->key, $key, $value);
            }
        }

    }

}
?>