<?php 
$ROOT=(!isset($ROOT))?"../../../":$ROOT;
require_once($ROOT."modulos/suscriptores/librerias/Configuracion.cnf.php");

class Instalaciones {

  var $sesion,$fechas,$tabla;

  function Instalaciones() {
    $this->sesion=new Sesion();
    $this->fechas=new Fechas();
    $this->tabla="distribucion_instalaciones";
  }

  function crear($matricula) {
    $instalacion=time();
    $creador=$this->sesion->getValue("usuario");
    $creador=(empty($creador))?"1367669996":$creador;
    $db=new MySQL(Sesion::getConexion());
    $sql="INSERT INTO `distribucion_instalaciones` SET ";
    $sql.="`instalacion`='".$instalacion."',";
    $sql.="`fecha`='".$this->fechas->hoy()."',";
    $sql.="`hora`='".$this->fechas->ahora()."',";
    $sql.="`suscriptor`='".$matricula."',";
    $sql.="`creador`='".$creador."';";
    $resultado=$consulta=$db->sql_query($sql);
    $db->sql_close();
    return($instalacion);
  }

  function actualizar($instalacion,$campo,$valor,$servicio="distribucion") {
    $db=new MySQL(Sesion::getConexion());
    if($servicio=="distribucion"){
      $sql="UPDATE `distribucion_instalaciones` SET ";
    }elseif($servicio=="alcantarillado"){
      $sql="UPDATE `alcantarillado_instalaciones` SET ";
    }else{
      echo("Instalaciones: El servicio indicado es desconocido...");
    }
    $sql.="`".$campo."`='".$valor."' ";
    $sql.=" WHERE `instalacion`='".$instalacion."'";
    $sql.=";";
    $consulta=$db->sql_query($sql);
    $db->sql_close();
    return($consulta);
  }

  function consultar($instalacion,$servicio="distribucion") {
    $db=new MySQL(Sesion::getConexion());
    if($servicio=="distribucion"){
      $consulta=$db->sql_query("SELECT * FROM `distribucion_instalaciones` WHERE `instalacion` = '".$instalacion."'");
    }elseif($servicio=="alcantarillado"){
      $consulta=$db->sql_query("SELECT * FROM `alcantarillado_instalaciones` WHERE `instalacion` = '".$instalacion."'");
    }else{
      echo("Instalaciones: El servicio indicado para la instalacion a consultar es desconocido...");
    }
    $fila=$db->sql_fetchrow($consulta);
    $db->sql_close();
    return($fila);
  }

  /**
   * Permite consultar los datos de una instalacion utilizando el numero de suscriptor como clave de consulta.
   * @param type $suscriptor
   * @return type
   */
  function suscriptor($suscriptor) {
    $db=new MySQL(Sesion::getConexion());
    $consulta=$db->sql_query("SELECT * FROM `distribucion_instalaciones` WHERE `suscriptor` = '".$suscriptor."'");
    $fila=$db->sql_fetchrow($consulta);
    $db->sql_close();
    return($fila);
  }

  /**
   * Indicado el numero de matricula, retorna la peticion que dio origen al proceso.
   * @param type $instalacion
   * @return type
   */
  function solicitud($matricula) {
    $db=new MySQL(Sesion::getConexion());
    $consulta=$db->sql_query("SELECT * FROM `solicitudes_solicitudes` WHERE `matricula` = '".$matricula."'");
    $fila=$db->sql_fetchrow($consulta);
    $db->sql_close();
    return($fila);
  }

  /**
   * Permite conocer el numero total de instalaciones realizadas, pendientes por realizar o registradas en el sistema
   * @param type $opcion
   * @return type
   */
  function conteo($opcion="total",$servicio="distribucion") {
    $db=new MySQL(Sesion::getConexion());
    if($servicio=="distribucion"){
      if($opcion=="realizadas"){
        $sql="SELECT Count(`instalacion`) AS `conteo` FROM `distribucion_instalaciones` WHERE ((`orden` IS NOT NULL )AND(`orden`<>'') )";
      }else if($opcion=="pendientes"){
        $sql="SELECT Count(`instalacion`) AS `conteo` FROM `distribucion_instalaciones` WHERE((`orden` IS NULL ) OR (`orden`='') )";
      }else if($opcion=="total"){
        $sql="SELECT Count(`instalacion`) AS `conteo` FROM `distribucion_instalaciones`";
      }
    }else if($servicio=="alcantarillado"){
      if($opcion=="realizadas"){
        $sql="SELECT Count(`instalacion`) AS `conteo` FROM `alcantarillado_instalaciones` WHERE ((`orden` IS NOT NULL )AND(`orden`<>'') )";
      }else if($opcion=="pendientes"){
        $sql="SELECT Count(`instalacion`) AS `conteo` FROM `alcantarillado_instalaciones` WHERE((`orden` IS NULL ) OR (`orden`='') )";
      }else if($opcion=="total"){
        $sql="SELECT Count(`instalacion`) AS `conteo` FROM `alcantarillado_instalaciones`";
      }
    }
    $consulta=$db->sql_query($sql);
    $fila=$db->sql_fetchrow($consulta);
    return($fila['conteo']);
  }

  function combo_tipo($name,$selected) {
    $componentes=new Componentes();
    $etiquetas=array("COMPLETA","PARCIAL");
    $valores=array("COMPLETA","PARCIAL");
    return($componentes->combo($name,$etiquetas,$valores,$selected));
  }

}

$instalaciones=new Instalaciones();
//print_r($instalaciones->suscriptor('32974'));
?>