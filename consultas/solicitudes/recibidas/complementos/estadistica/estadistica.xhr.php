<?php
$ROOT = (!isset($ROOT)) ? "../../../../../../../" : $ROOT;
require_once($ROOT . "modulos/solicitudes/librerias/Configuracion.cnf.php");
/** Clases **/
$sesion=new Sesion();
$solicitudes=new Solicitudes();
$validaciones=new Validaciones();
/** Variables **/
$usuario=Sesion::usuario();
$inicio=$validaciones->recibir('inicio');
$final=$validaciones->recibir('final');
/** Evaluacion **/
$inicio = empty($inicio) ? $solicitudes->fecha_mas_antigua($usuario['usuario']) : $inicio;
$final = empty($final) ? $solicitudes->fecha_mas_reciente($usuario['usuario']) : $final;

$sr=$solicitudes->estadistica_solicitudes_usuario_total($inicio,$final, $usuario['usuario']);
$ss=$solicitudes->estadistica_solicitudes_usuario_solucionadas($inicio,$final, $usuario['usuario']); 

$sp=$sr-$ss;
if($sr>0){
$spp=round(((int) $sp * 100 / $sr), 2);
$ssp=round(((int)$ss * 100 / $sr), 2); 
}else{
  $spp=100;
  $ssp=100;
}
?>

<h2>Solicitudes Pendientes</h2>
<p class="critico"><?php echo($sp); ?></p>
<p class="critico_porcentual"><?php echo($spp); ?>%</p>
<br>
<h2>Solicitudes Resueltas</h2>
<p class="numero"><?php echo($ss); ?></p>
<p class="numero_porcentual"><?php echo($ssp); ?>%</p>
<br>
<h2>Total Visualizadas</h2>
<p class="numero"><?php echo($sr); ?></p>
<p class="numero_porcentual">100%</p>
<p class="nota">
  Las solicitudes visualizadas corresponden a las que han sido creadas por usted mismo, le han sido asignadas o le pertenecen a su equipo de trabajo.
  <br>
  Las presentes estadísticas corresponden a la labor registrada por el usuario activo, por lo tanto se aclara no
  representan la totalidad de las solicitudes registradas en el sistema.
</p>