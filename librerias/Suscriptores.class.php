<?php

$ROOT = (!isset($ROOT)) ? "../../../" : $ROOT;
require_once($ROOT . "modulos/suscriptores/librerias/Configuracion.cnf.php");
require_once($ROOT . "modulos/suscriptores/librerias/Suscriptores_Georeferencias.class.php");
require_once($ROOT . "modulos/usuarios/librerias/Usuarios_Permisos.class.php");


class Suscriptores {

  var $tabla = "suscriptores";
  var $indice = "suscriptor";
  var $sesion;
  var $fechas;
  var $georeferencias;
  var $formularios;

  function Suscriptores() {
    $this->inicializar();
    $this->sesion = new Sesion();
    $this->fechas = new Fechas();
    $this->permisos = new Usuarios_Permisos();
    $this->georeferencias = new Suscriptores_Georeferencias();
    $this->formularios = new Forms(time());

}

  //function crear($permiso,$descripcion,$creador){$db=new MySQL(Sesion::getConexion());$existencia=$db->sql_query("SELECT * FROM `aplicacion_permisos` WHERE `permiso`='".$permiso."' ;");if($db->sql_numrows($existencia)==0){$sql="INSERT INTO `aplicacion_permisos` SET ";$sql.="`permiso`='".$permiso."',";$sql.="`descripcion`='".$descripcion."',";$sql.="`creador`='".$creador."',";$sql.="`fecha`='".date('Y-m-d',time())."',";$sql.="`hora`='".date('H:i:s',time())."';";$consulta=$db->sql_query($sql);}$db->sql_close();}
  //function actualizar($permiso,$descripcion){$db=new MySQL(Sesion::getConexion());$sql="UPDATE `aplicacion_permisos` SET ";$sql.="`descripcion`='".$descripcion."',";$sql.="`fecha`='".date('Y-m-d',time())."',";$sql.="`hora`='".date('H:i:s',time())."'";$sql.=" WHERE `permiso`='".$permiso."'";$sql.=";";$consulta=$db->sql_query($sql);$db->sql_close();}
  //function eliminar($permiso){$db=new MySQL(Sesion::getConexion());$sql="DELETE FROM `aplicacion_permisos` WHERE `permiso`='".$permiso."';";$consulta=$db->sql_query($sql);$db->sql_close();}
  function consultar($suscriptor) {
    $db = new MySQL(Sesion::getConexion());
    $sql = "SELECT * FROM `suscriptores` WHERE `suscriptor`='" . $suscriptor . "' ;";
    $consulta = $db->sql_query($sql);
    $fila = $db->sql_fetchrow($consulta);
    $db->sql_close();
    return($fila);
  }

  /**
   * Retorna un numero de matricula es decir de suscriptor consecutivo y libre para ser asignado a un nuevo suscriptor
   * @param type $serie
   * @return type
   */
  function disponible($serie) {
    $db = new MySQL(Sesion::getConexion());
    $sql = "SELECT `suscriptores`.`suscriptor` AS `matricula` FROM `suscriptores` WHERE `suscriptores`.`suscriptor` < 50000 ORDER BY `suscriptores`.`suscriptor` DESC LIMIT 1;";
    $consulta = $db->sql_query($sql);
    $fila = $db->sql_fetchrow($consulta);
    $db->sql_close();
    return(($fila['matricula'] + 1));
  }

  function crear($datos) {
    $db = new MySQL(Sesion::getConexion());
    $sql = "INSERT INTO `suscriptores` SET `suscriptor`='" . $datos['suscriptor'] . "';";
    $db->sql_query($sql);
    $db->sql_close();
    $this->actualizar($datos['suscriptor'], 'documento', $datos['documento']);
    $this->actualizar($datos['suscriptor'], 'identificacion', $datos['identificacion']);
    $this->actualizar($datos['suscriptor'], 'nombres', $datos['nombres']);
    $this->actualizar($datos['suscriptor'], 'apellidos', $datos['apellidos']);
    $this->actualizar($datos['suscriptor'], 'direccion', $datos['direccion']);
    $this->actualizar($datos['suscriptor'], 'referencia', $datos['referencia']);
    $this->actualizar($datos['suscriptor'], 'estrato', $datos['estrato']);
    $this->actualizar($datos['suscriptor'], 'predial', $datos['predial']);
    $this->actualizar($datos['suscriptor'], 'latitud', $datos['latitud']);
    $this->actualizar($datos['suscriptor'], 'longitud', $datos['longitud']);
    $this->actualizar($datos['suscriptor'], 'correo', $datos['correo']);
    $this->actualizar($datos['suscriptor'], 'telefonos', $datos['telefonos']);
    $this->actualizar($datos['suscriptor'], 'creado', $datos['creado']);
    $this->actualizar($datos['suscriptor'], 'actualizado', $datos['actualizado']);
    $this->actualizar($datos['suscriptor'], 'creador', $datos['creador']);
    $this->actualizar($datos['suscriptor'], 'actualizador', $datos['actualizador']);
    $this->actualizar($datos['suscriptor'], 'diametro', $datos['diametro']);
    $this->actualizar($datos['suscriptor'], 'acueducto', $datos['acueducto']);
    $this->actualizar($datos['suscriptor'], 'alcantarillado', $datos['alcantarillado']);
    $this->actualizar($datos['suscriptor'], 'credito', $datos['credito']);
    $this->actualizar($datos['suscriptor'], 'certificado', $datos['certificado']);
    $this->actualizar($datos['suscriptor'], 'factura', $datos['factura']);
    $this->actualizar($datos['suscriptor'], 'conexion', $datos['conexion']);
    $this->actualizar($datos['suscriptor'], 'sexo', $datos['sexo']);
    $this->actualizar($datos['suscriptor'], 'nacimiento', $datos['nacimiento']);
    $this->actualizar($datos['suscriptor'], 'manzana', $datos['manzana']);
    $this->actualizar($datos['suscriptor'], 'seccion', $datos['seccion']);
    $this->actualizar($datos['suscriptor'], 'sector', $datos['sector']);
    $this->actualizar($datos['suscriptor'], 'ciudad', $datos['ciudad']);
    $this->actualizar($datos['suscriptor'], 'region', $datos['region']);
    $this->actualizar($datos['suscriptor'], 'pais', $datos['pais']);
    $this->actualizar($datos['suscriptor'], 'ciclo', $datos['ciclo']);
    $this->actualizar($datos['suscriptor'], 'ruta', $datos['ruta']);
    $this->actualizar($datos['suscriptor'], 'uso', $datos['uso']);
    $this->actualizar($datos['suscriptor'], 'habitaciones', $datos['habitaciones']);
    $this->actualizar($datos['suscriptor'], 'habitantes', $datos['habitantes']);
  }

  function actualizar($suscriptor, $campo, $valor) {
    $db = new MySQL(Sesion::getConexion());
    $sql = "UPDATE `suscriptores` SET `" . $campo . "`='" . $valor . "' WHERE `suscriptor`='" . $suscriptor . "';";
    $consulta = $db->sql_query($sql);
    $db->sql_close();
  }

  //\\//\\//\\//\\//\\//\\ - F u n c i o n e s D e U t i l i d a d -	//\\//\\//\\//\\//\\//\\
  function geoestado($suscriptor) {
    $georeferencia = $this->georeferencias->suscriptor($suscriptor);
    if (isset($georeferencia['latitud_decimal']) && !empty($georeferencia['latitud_decimal'])) {
      if (isset($georeferencia['longitud_decimal']) && !empty($georeferencia['longitud_decimal'])) {
        return(true);
      }
    }
    return(false);
  }

  function geolocalizar($suscriptor, $latitud, $longitud) {
    $latitud = substr($latitud, 0, 20);
    $longitud = substr($longitud, 0, 20);
    $db = new MySQL(Sesion::getConexion());
    $sql = "UPDATE `suscriptores` SET `latitud`=$latitud, `longitud`=$longitud WHERE `suscriptor`='" . $suscriptor . "';";
    $consulta = $db->sql_query($sql);
    $db->sql_close();
  }

  //function inicializar(){$sql="create table permisos(permiso char(32) not null,descripcion blob not null,fecha date not null,hora time not null,creador char(11),primary key(permiso));";$db=new MySQL(Sesion::getConexion());if(!$db->sql_tablaexiste("permisos")){$consulta=$db->sql_query($sql);}$db->sql_close();}
  //\\//\\//\\//\\//\\//\\ Estadisticas
  function conteo($sql) {
    $db = new MySQL(Sesion::getConexion());
    $sql = "SELECT Count(`suscriptor`) AS `conteo` FROM `suscriptores` " . $sql . ";";
    $consulta = $db->sql_query($sql);
    $fila = $db->sql_fetchrow($consulta);
    return(intval($fila['conteo']));
  }

  function geo_conteo() {
    return($this->conteo("WHERE `latitud` IS NOT NULL AND `longitud` IS NOT NULL"));
  }

  //\\Inicializarcion De Tablas & Componentes
  function inicializar() {
    
  }

  /**
   * Permite saber el numero de solicitudes de servicio recividas
   *
   */
  function solicitudes($opcion) {
    $db = new MySQL(Sesion::getConexion());
    if ($opcion == "recibidas") {
      $sql = " WHERE ( `causal`='211' AND `radicacion`>='2013-07-05' )";
    } elseif ($opcion == "pendientes") {
      $sql = " WHERE ( `causal`='211' AND `legalizado`<>'SI' AND `radicacion`>='2013-07-05' )";
    } elseif ($opcion == "legalizadas") {
      $sql = " WHERE ( `causal`='211' AND `legalizado`='SI' AND `radicacion`>='2013-07-05' )";
    }
    $sql = "SELECT Count(`solicitud`) AS `conteo` FROM `solicitudes_solicitudes` " . $sql . ";";
    $consulta = $db->sql_query($sql);
    $fila = $db->sql_fetchrow($consulta);
    return(intval($fila['conteo']));
  }

  function combo_campos($nombre, $seleccionado) {
    $componentes = new Componentes();
    $name = "sexo";
    $etiquetas = array("Suscriptor", "Identificación", "Nombre", "Apellidos", "Dirección", "Teléfono", "Predial");
    $valores = array("suscriptor", "identificacion", "nombre", "apellidos", "dirección", "telefonos", "predial");
    return($componentes->combo($nombre, $etiquetas, $valores, $seleccionado));
  }

  /**
   * Crea el HTML de un elemento SELECT que corresponde a la identificación de ubicación donde se 
   * encuentra el suscriptor, para lo cual debe seguir la siguiente estructura.
   * 1: Predios Rurales.
   * 2: Predios Urbanos.
   * @param type $nombre
   * @param type $seleccionado
   * @return type int 1|2
   */
  function combo_ubicaciones($nombre, $seleccionado) {
    $componentes = new Componentes();
    $etiquetas = array("1: Rural", "2: Urbano");
    $valores = array("1", "2");
    return($componentes->combo($nombre, $etiquetas, $valores, $seleccionado));
  }

  function combo_clasedeuso($nombre, $seleccionado) {
    $componentes = new Componentes();
    $etiquetas = array("R: Residencial", "NR: No residencial");
    $valores = array("R", "NR");
    return($componentes->combo($nombre, $etiquetas, $valores, $seleccionado));
  }

  function combo_conexion($nombre, $seleccionado) {
    $componentes = new Componentes();
    $etiquetas = array("Completa", "Parcial");
    $valores = array("COMPLETA", "PARCIAL");
    return($componentes->combo($nombre, $etiquetas, $valores, $seleccionado));
  }

  /**
   *  Retorna un elemento html tipo select que contiene los posibles criterios a usar en el componente de 
   * busqueda
   * 
   * @param type $nombre
   * @param type $seleccionado
   * @return type
   */
  function criterios($nombre, $seleccionado) {
    $etiquetas = array("Suscriptor", "Identidicación(cc)", "Nombres", "Apellidos", "Dirección");
    $valores = array("suscriptor", "identificacion", "nombres", "apellidos", "direccion");
    return($this->formularios->combo($nombre, $etiquetas, $valores, $seleccionado, ""));
  }

}

$suscriptores = new Suscriptores();
////echo("Suscriptores Conteo: ".$suscriptores->conteo(""));
?>