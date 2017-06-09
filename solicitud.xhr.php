<?php 
$ROOT = (!isset($ROOT)) ? "../../" : $ROOT;
require_once($ROOT . "modulos/suscriptores/librerias/Configuracion.cnf.php");

//\\//\\//\\//\\ Variables Generadas //\\//\\//\\//\\
$sesion =new Sesion();
$fechas =new Fechas();
$componentes =new Componentes();
$sectores =new Sectores();
$servicios =new Servicios();
$asuntos =new Asuntos();
$estratos =new imis\Estratos();
$tuberias =new imis\Tuberias();
//\\//\\//\\//\\ Variables Recibidas //\\//\\//\\//\\
$transaccion = @$_REQUEST['transaccion'];
$accion = @$_REQUEST['accion'];
$formulario['id'] = "f" . $transaccion;
$formulario['ventana'] = "v" . $transaccion;
$formulario['contenedor'] = "c" . $transaccion;
$formulario['interno'] = "i" . $transaccion;
//\\//\\//\\//\\ Variables Declaradas //\\//\\//\\//\\
$valor['radicado'] = isset($_REQUEST['_radicado']) ? $_REQUEST['_radicado'] : time();
$valor['radicacion'] = isset($_REQUEST['_radicacion']) ? $_REQUEST['_radicacion'] : $fechas->hoy();
// Paso 2
$pais = (isset($_REQUEST['_pais'])) ? $_REQUEST['_pais'] : 'Colombia';
$region = (isset($_REQUEST['_region'])) ? $_REQUEST['_region'] : 'Valle Del Cauca';
$ciudad = (isset($_REQUEST['_ciudad'])) ? $_REQUEST['_ciudad'] : 'Guadalajara De Buga';
$direccion = (isset($_REQUEST['_direccion'])) ? $_REQUEST['_direccion'] : '';
$referencia = (isset($_REQUEST['_referencia'])) ? $_REQUEST['_referencia'] : '';

//Campos a ser generados
// Paso1
$campo['radicado'] = '<input type="text"value="' . $valor['radicado'] . '" name="radicado" id="radicado" class="campo verificado require" readonly="true">';
$campo['radicacion'] = '<input value="' . $valor['radicacion'] . '" id="radicacion" name="radicacion" type="text" class="campo verificado" data-validators="validate-date dateFormat:\'%Y-%m-%d\'"/>';
$campo['documentos'] = $componentes->combo_documentos("documentos", @$_REQUEST['_documentos']);
$campo['identificacion'] = '<input type="text"value="' . @$_REQUEST['_identificacion'] . '" name="identificacion" id="identificacion" class="campo required validate-numeric">';
$campo['nombres'] = '<input type="text"value="' . @$_REQUEST['_nombres'] . '" name="nombres" id="nombres" class="campo required">';
$campo['apellidos'] = '<input type="text"value="' . @$_REQUEST['_apellidos'] . '" name="apellidos" id="apellidos" class="campo required">';

$campo['telefono'] = '<input type="text"value="' . @$_REQUEST['_telefono'] . '" name="telefono" id="telefono" class="campo">';
$campo['movil'] = '<input type="text"value="' . @$_REQUEST['_movil'] . '" name="movil" id="movil" class="campo">';
$campo['correo'] = '<input type="text"value="' . @$_REQUEST['_correo'] . '" name="correo" id="correo" class="campo validate-email">';
// Paso 2
//$campo['pais'] = '<input type="text"value="' . $pais . '" name="pais" id="pais" class="campo verificado" readonly="true">';
//$campo['region'] = '<input type="text"value="' . $region . '" name="region" id="region" class="campo verificado" readonly="true">';
//$campo['ciudad'] = '<input type="text"value="' . $ciudad . '" name="ciudad" id="ciudad" class="campo verificado"readonly="true">';
$campo['sector'] = $sectores->combo('sector', @$_REQUEST['_sector']);
$campo['direccion'] = '<input type="text"value="' . $direccion . '" name="direccion" id="direccion" class="campo minLength:6">';
$campo['referencia'] = '<input type="text"value="' . $referencia . '" name="referencia" id="referencia" class="campo">';
$campo['categorias'] = '<input type="text" id="categoria" name="categoria" value="04: Petición" readonly="true" class="campo verificado">';
$campo['servicio'] = $servicios->combo('servicio', @$_REQUEST['_servicio'], "");
$campo['causal'] = '<input type="text" id="causal" name="causal" value="211: Solicitud De Prestacion Del Servicio" readonly="true" class="campo verificado">';
$campo['asunto'] = $asuntos->combo("asunto", ((isset($_REQUEST['_asunto'])) ? $_REQUEST['_asunto'] : ""), ((isset($_REQUEST['_servicio'])) ? $_REQUEST['_servicio'] : "01"), '04', ' 211');
//Paso 3
$campo['direccioninstalacion'] = '<input type="text"value="' . @$_REQUEST['_direccioninstalacion'] . '" name="direccioninstalacion" id="direccioninstalacion" class="campo minLength:6">';
$campo['sectorinstalacion'] = $sectores->combo('sectorinstalacion', @$_REQUEST['_sectorinstalacion']);
$campo['estrato'] = $estratos->combo('estrato', @$_REQUEST['_estrato']);
$campo['diametro'] = $tuberias->combo('diametro', @$_REQUEST['_diametro']);
//\\//\\//\\//\\ Marco Creación Formulario //\\//\\//\\//\\
if (empty($accion)) {
 echo('<div id="' . $formulario['contenedor'] . '" class="formulario mediano">');
 echo('<form name="' . $formulario['id'] . '" id="' . $formulario['id'] . '" action="modulos/suscriptores/solicitud.xhr.php?transaccion=' . $transaccion . '" method="post">');
 echo('<div id="' . $formulario['interno'] . '">');
}
$numero = count($_REQUEST);
$tags = array_keys($_REQUEST);
$valores = array_values($_REQUEST);
for ($i = 0; $i < $numero; $i++) {
 echo('<input name="_' . str_replace("_", "", $tags[$i]) . '" id="_' . str_replace("_", "", $tags[$i]) . '" type="hidden" value="' . $valores[$i] . '" />');
}
?>
<?php  if (empty($accion) || $accion == "paso1") { ?>
 <input name="accion" id="accion" type="hidden" value="paso2" />
 <div id="encabezado"><b>Paso [1/4]:</b> Perfil Del Solicitante</div>
 <table width="620" align="center">
  <tr height="12px">
   <td><label>Radicado De Recibido:</label></td>
   <td><label>Fecha Radicación:</label></td>
   <td><label>Identificación:</label></td>
  </tr>
  <tr>
   <td><?php  echo($campo['radicado']); ?></td>
   <td><?php  echo($campo['radicacion']); ?></td>
   <td><?php  echo($campo['documentos']); ?><?php  echo($campo['identificacion']); ?></td>
  </tr>

 </table>
 <table width="620" align="center">
  <tr height="12px"><td colspan="2" align="left"><label>Nombres:</label></td><td align="left"><label>Apellidos:</label></td></tr>
  <tr><td colspan="2" align="left"><div id="div_nombres"><?php  echo($campo['nombres']); ?></div></td><td align="left"><div id="div_apellidos"><?php  echo($campo['apellidos']); ?></div></td></tr>
 </table>
 <table width="620" align="center">
  <tr height="12px">
   <td colspan="2" align="left"><label>Teléfono:</label></td>
   <td align="left"><label>movil:</label></td>
   <td align="left" colspan="3"><label>Correo electrónico:</label></td>
  </tr>
  <tr>
   <td colspan="2" align="left"><?php  echo($campo['telefono']); ?></td>
   <td><?php  echo($campo['movil']); ?></td>
   <td align="left"><?php  echo($campo['correo']); ?></td>
  </tr>
 </table>
 <table width="620" align="center">
  <tr><td align="left"><label>Dirección:</label></td><td align="left"><label>Referencia :</label></td></tr>
  <tr><td align="left"><?php  echo($campo['direccion']); ?></td><td align="left"><?php  echo($campo['referencia']); ?></td></tr>
 </table>
 <table width="620" align="center">
  <tr><td align="center">
    <input name="cancelar"  id="cancelar" type="button" value="Cancelar"/>
    <input name="enviar"  id="enviar" type="submit" value="Continuar"/></td>
  </tr>
 </table>
<?php  } elseif ($accion == 'paso2') { ?>
 <input name="accion" id="accion" type="hidden" value="paso3" />
 <div id="encabezado"><b>Paso [2/4]: </b>Información Técnica Del Servicio Solicitado</div>
 <table width="620" align="center">
  <tr>
   <td align="left" width="120"><label>Tipo Solicitud:</label></td>
   <td align="left" width="140"><label>Servicio Relacionado :</label></td>
   <td align="left"><label>Causal:</label></td>
  </tr>
  <tr>
   <td align="left"><?php  echo($campo['categorias']); ?></td>
   <td align="left"><?php  echo($campo['servicio']); ?></td>
   <td align="left"><?php  echo($campo['causal']); ?></td>
  </tr>
 </table>
 <table width="620" align="center">
  <tr>
   <td align="left"><label>Asunto:</label></td>
   <td align="left"><label>Dirección Instalación:</label></td>
  </tr>
  <tr>
   <td align="left"><div id="divAsunto"><?php  echo($campo['asunto']); ?></d></td>
   <td align="left"><?php  echo(@$campo['direccioninstalacion']); ?></td>
  </tr>
 </table>


 <table width="620" align="center">
  <tr>
   <td align="left"><label>Sector / Barrio :</label></td>
   <td align="left"><label>Estrato:</label></td>
   <td align="left"><label>Diametro Solicitado :</label></td>
  </tr>
  <tr>
   <td align="left"><?php  echo(@$campo['sectorinstalacion']); ?></td>
   <td align="left"><?php  echo(@$campo['estrato']); ?></td>
   <td align="left"><?php  echo(@$campo['diametro']); ?></td>
  </tr>
  <tr><td align="left" colspan="3"><label>Observaciones:</label></td></tr>
  <tr><td align="left" colspan="3">
    <textarea cols="40" rows="2" name="detalle" id="detalle" style="width:100%"><?php  echo(@$_REQUEST['_detalle']); ?></textarea>
   </td></tr>
  <tr><td align="center" colspan="3" height="44">
    <input name="anterior" id="anterior" type="submit" value="Anterior" onclick="$('accion').value = 'paso1';
      return(true);"/>
    <input name="enviar"  id="enviar" type="submit" value="Continuar" />
   </td></tr>
 </table>
 <script>
     // Evento de cambio de servicio, para generar cambio de asunto
     if ($('servicio')) {
      $('servicio').addEvent('change', function(e) {
       $("divAsunto").empty();
       /////////////////////
       var servicio = this.getElement(':selected').value;
       var categoria = '04';
       var causal = '211';
       var parametros = {'servicio': servicio, 'categoria': categoria, 'causal': causal};
       var datos = JSON.encode(parametros);
       new Request.JSON({
        url: 'modulos/solicitudes/consultas/jsons/asuntos.json.php',
        data: "datos=" + datos,
        onRequest: function() {
         MUI.Notificacion("Actualizando...");
        },
        onComplete: function(djson) {
         var objeto = djson.objeto;
         var dhtml = djson.html;
         new Element('div', {html: dhtml}).inject('divAsunto', 'top');
        }
       }).send();
       ////////////////////////
      });
     }
 </script>


























<?php  } elseif ($accion == 'paso3') { ?>
 <input name="accion" id="accion" type="hidden" value="paso4" />
 <div id="encabezado"><b>Paso [3/4]:</b>Confirmar Radicación</div>
 <table width="620" align="center">
  <tr><td align="left"><p>Tras realizar las verificaciones pertinentes su solicitud se encuentra lista para ser radicada, una vez concluido el proceso será posible consultar el estado de la solicitud digitando el código de radicación de la misma el cual visualizamos a continuación. Si desea modificar o verificar los datos puede hacerlo presionando el botón “Anterior” adjunto al botón “Radicar” con el cual podrá finalizar este proceso.</p></td></tr>
  <tr><td align="center"height="44">
    <input name="anterior" id="anterior" type="submit" value="Anterior" onclick="$('accion').value = 'paso2';
      return(true);" />
    <input name="enviar"  id="enviar" type="submit" value="Radicar"/>
   </td></tr>
 </table>
<?php  } elseif ($accion == 'paso4') { ?>
 <?php 
 // Almacenar en la base de datos
 $pqrs =new PQRS();
 $valor['solicitud'] = @$_REQUEST['_radicado'];
 $valor['dane'] = "0076111000";
 $valor['servicio'] = @$_REQUEST['_servicio'];
 $valor['radicado'] = @$_REQUEST['_radicado']; // El radicado es igual al codigo de la solicitud
 $valor['radicacion'] = @$_REQUEST['_radicacion'];
 $valor['categoria'] = '04';
 $valor['causal'] = '211';
 $valor['asunto'] = '01';
 $valor['detalle'] = @$_REQUEST['_detalle'];
 $valor['suscriptor'] = @$_REQUEST['_suscriptor'];
 $valor['factura'] = @$_REQUEST['_factura'];
 $valor['respuesta'] = @$_REQUEST['_respuesta'];
 $valor['contestacion'] = @$_REQUEST['_contestacion'];
 $valor['radicada'] = @$_REQUEST['_radicada'];
 $valor['notificado'] = @$_REQUEST['_notificado'];
 $valor['notificacion'] = @$_REQUEST['_notificacion'];
 $valor['sspd'] = @$_REQUEST['_sspd'];
 $valor['creador'] = intval($sesion->getValue('usuario'));
 $valor['fecha'] = $fechas->hoy();
 $valor['nombres'] = @$_REQUEST['_nombres'];
 $valor['apellidos'] = @$_REQUEST['_apellidos'];
 $valor['documentos'] = @$_REQUEST['_documentos'];
 $valor['identificacion'] = @$_REQUEST['_identificacion'];
 $valor['nacimiento'] = @$_REQUEST['_nacimiento'];
 $valor['sexo'] = @$_REQUEST['_sexo'];
 $valor['telefono'] = @$_REQUEST['_telefono'];
 $valor['movil'] = @$_REQUEST['_movil'];
 $valor['correo'] = @$_REQUEST['_correo'];
 $valor['pais'] = @$_REQUEST['_pais'];
 $valor['region'] = @$_REQUEST['_region'];
 $valor['ciudad'] = @$_REQUEST['_ciudad'];
 $valor['sector'] = @$_REQUEST['_sector'];
 $valor['direccion'] = @$_REQUEST['_direccion'];
 $valor['referencia'] = @$_REQUEST['_referencia'];
 $valor['expiracion'] = @$_REQUEST['_expiracion'];

 $pqrs->solicitudes_crear($valor['solicitud']);
 $numero = count($valor);
 $tags = array_keys($valor);
 $valores = array_values($valor);
 for ($i = 0; $i < $numero; $i++) {
  $pqrs->actualizar($valor['solicitud'], $tags[$i], $valores[$i]);
 }
 $pqrs->actualizar($valor['solicitud'], 'instalacion', @$_REQUEST['_direccioninstalacion']);
 ?>
 <input name="accion" id="accion" type="hidden" value="paso4" />
 <div id="encabezado"><b>Paso [3/4]:</b>Confirmar Radicación</div>
 <table width="620" align="center">
  <tr><td align="left"><p>Señor Usuario/Suscriptor Tenga en Cuenta los Términos para Responder las PQR. Aguas De Buga S.A. E.S.P deberá resolver la PQR presentada, dentro de los quince (15) días hábiles siguientes a su recibo, este término podrá ampliarse si hay lugar a la práctica de pruebas, situación que Aguas De Buga S.A. E.S.P le dará a conocer. En caso que usted no reciba respuesta de nuestra parte se aplicará lo relacionado con el silencio administrativo positivo. Recuerde conservar el código asignado a su solicitud, de haber proporcionado una dirección de correo electrónico una copia del código de su solicitud le ha sido enviada automáticamente.</p></td></tr>
  <tr><td align="center"><br><br><br><p style="font-size:50px; padding:10px"><?php  echo(@$_REQUEST['_radicado']); ?></p></td></tr>
  <tr><td align="center"height="44"></td></tr>
 </table>
<?php  } ?>
<?php 
if (empty($accion)) {
 echo('</div>');
 echo('</form>');
 echo('</div>');
}
?>
<?php  if (empty($accion)) { ?>
 <script type="text/javascript">
     var fv =new Form.Validator.Inline($('<?php  echo($formulario['id'] ); ?>'));
     // fv.addValidation("identificacion", "req", "Ingrese la ceula o nit del quien radica la solicitud.");


     if ($('cancelar')) {
      $('cancelar').addEvent('click', function(e) {
       $('<?php  echo($formulario['ventana'] ); ?>').retrieve('instance').close();
      });
     }
     new Form.Request($('<?php  echo($formulario['id'] ); ?>'), $('<?php  echo($formulario['interno'] ); ?>'), {
      requestOptions: {
       spinnerOptions: {
        message: 'Trasmitiendo datos...'
       }
      },
      onSend: function() {
       $('spinner').show();
      },
      onSuccess: function() {
       $('spinner').hide();
       if ($('<?php  echo($formulario['interno'] ); ?>') && MUI.options.standardEffects == true) {
        $('<?php  echo($formulario['interno'] ); ?>').setStyle('opacity', 0).get('morph').start({'opacity': 1});
       }
      }
     });
 </script>
<?php  } ?>