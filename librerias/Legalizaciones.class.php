<?php 



$ROOT=(!isset($ROOT))?"../../../":$ROOT;
require_once($ROOT."modulos/suscriptores/librerias/Configuracion.cnf.php");



class Legalizaciones {

  function conteo($opcion) {
    $db=new MySQL(Sesion::getConexion());
    if($opcion=="realizadas"){
      $sql=" WHERE (`legalizado` = 'SI' AND `causal`='211' AND `radicacion`>='2013-07-05' )";
    }elseif($opcion=="pendientes"){
      $sql=" WHERE ( `causal`='211' AND `legalizado`='NO' AND `radicacion`>='2013-07-05' )";
    }elseif($opcion=="total"){
      $sql=" WHERE ( `causal`='211' AND `radicacion`>='2013-07-05' )";
    }
    $sql="SELECT Count(`solicitud`) AS `conteo` FROM `solicitudes_solicitudes` ".$sql.";";
    $consulta=$db->sql_query($sql);
    $fila=$db->sql_fetchrow($consulta);
    return(intval($fila['conteo']));
  }
  /** Esta funcion verifica si una solicitud se encuentra legalizada
   * 
   * **/
  function estado($solicitud){
    $db=new MySQL(Sesion::getConexion());
    $sql="SELECT Count(`solicitud`) AS `conteo` FROM `solicitudes_solicitudes` WHERE (`solicitud`='".$solicitud."' AND `legalizado` = 'SI');";
    $consulta=$db->sql_query($sql);
    $fila=$db->sql_fetchrow($consulta);
    $db->sql_close();
    if($fila['conteo']=="1"){
      return("verde");
    }else{
      return("rojo");
    }
  }

}

$legalizaciones=new Legalizaciones();
