<?php 
$solicitud = $solicitudes->consultar(@$_REQUEST['solicitud']);
$campo['solicitud'] = "<div class=\"dato\">" . $solicitud['solicitud'] . "</div>";
$campo['radicacion'] = "<div class=\"dato\">" . $solicitud['radicacion'] . "</div>";
$campo['nombre'] = "<div class=\"dato\">" . $cadenas->capitalizar($solicitud['nombres'] . " " . $solicitud['apellidos']) . "</div>";
$campo['nombres'] = "<div class=\"dato\">" . $solicitud['nombres'] . "</div>";
$campo['apellidos'] = "<div class=\"dato\">" . $solicitud['apellidos'] . "</div>";
$campo['identificacion'] = "<div class=\"dato\">" . $solicitud['documentos'] . " " . $solicitud['identificacion'] . "</div>";
$campo['telefono'] = "<div class=\"dato\">" . (!empty($solicitud['telefono']) ? $solicitud['telefono'] : "&nbsp;") . "</div>";
$campo['movil'] = "<div class=\"dato\">" . (!empty($solicitud['movil']) ? $solicitud['movil'] : "&nbsp;") . "</div>";
$campo['correo'] = "<div class=\"dato\">" . (!empty($solicitud['correo']) ? $solicitud['correo'] : "&nbsp;") . "</div>";
$campo['direccion'] = "<div class=\"dato\">" . $solicitud['direccion'] . "</div>";
$campo['referencia'] = "<div class=\"dato\">" . (!empty($solicitud['referencia']) ? $solicitud['referencia'] : "&nbsp;") . "</div>";
$campo['instalacion'] = "<div class=\"dato\">" . $solicitud['instalacion'] . "</div>";
$campo['estrato'] = "<div class=\"dato\">" . $solicitud['estrato'] . "</div>";
$campo['diametro'] = "<div class=\"dato\">" . $solicitud['diametro'] . " Pulgadas</div>";
$campo['cancelar'] = "<input type=\"button\" value = \"Cerrar\" id=\"cancelar" . $formulario->id . "\" name=\"cancelar" . $formulario->id . "\">";
$campo['editar'] = "<input type = \"button\" value=\"Editar\" id=\"edit" . $formulario->id . "\" name=\"edit" . $formulario->id . "\">";
$campo['legalizar'] = "<input type = \"button\" value=\"Legalizar\" id=\"legalizar" . $formulario->id . "\" name=\"legalizar" . $formulario->id . "\">";
?>
HOLAAA
<div id="divFormulario">
 <h2>1. Información Del Solicitante</h2>
 <div class="row">
  <div class="cell" style=""><div class="titular">Solicitud: </div><?php  echo($campo['solicitud']); ?></div>
  <div class="cell" style=""><div class="titular">Radicación: </div><?php  echo($campo['radicacion']); ?></div>
  <div class="cell" style=""><div class="titular">Identificación: </div><?php  echo($campo['identificacion']); ?></div>
  <div class="cell" style=""><div class="titular">Nombre Completo: </div><?php  echo($campo['nombre']); ?></div>
 </div>
 <div class="row">
  <div class="cell" style=""><div class="titular">Teléfonos: </div><?php  echo($campo['telefono']); ?></div>
  <div class="cell" style=""><div class="titular">Móvil: </div><?php  echo($campo['movil']); ?></div>
  <div class="cell" style=""><div class="titular">Correo Electrónico: </div><?php  echo($campo['correo']); ?></div>
 </div>
 <div class="row">
  <div class="cell" style=""><div class="titular">Dirección: </div><?php  echo($campo['direccion']); ?></div>
  <div class="cell" style=""><div class="titular">Referencia: </div><?php  echo($campo['referencia']); ?></div>
 </div>
 <h2>2. Datos De Instalación</h2>
 <div class="row">
  <div class="cell" style=""><div class="titular">Dirección De La Instalación </div><?php  echo($campo['instalacion']); ?></div>
  <div class="cell" style=""><div class="titular">Estrato </div><?php  echo($campo['estrato']); ?></div>
  <div class="cell" style=""><div class="titular">Diámetro </div><?php  echo($campo['diametro']); ?></div>
 </div>

 <script type="text/javascript">
  //MUI.resizeWindow($('<?php  echo($formulario->ventana); ?>'), {width: 640, height: 480});
 </script>