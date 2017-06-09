<?php 
/**
 * Este formulario permite actualizar el contenido textual de una solicitud.
 * Para poder utilizarlo se requiere que el usuario en sus roles asignados disponga del permiso
 * SUSCRIPTORES-SOLICITUDES-U
 */
$ROOT = (!isset($ROOT)) ? "../../../" : $ROOT;
require_once($ROOT . "modulos/suscriptores/librerias/Configuracion.cnf.php");
//\\//\\//\\//\\ Variables Generadas //\\//\\//\\//\\
$sesion =new Sesion();
$transaccion = @$_REQUEST['transaccion'];
$accion = @$_REQUEST['accion'];
$formulario =new Forms($transaccion);
?>
<?php  echo($formulario->apertura()); ?>
<?php  if (empty($accion) || $accion == "inicio") { ?>
 <?php  require_once($ROOT . "modulos/suscriptores/formularios/solicitud/legalizar/formulario.inc.php"); ?>
<?php  } elseif ($accion == "legalizar") { ?>
 <?php  require_once($ROOT . "modulos/suscriptores/formularios/solicitud/legalizar/fin.inc.php"); ?>
<?php  } ?>
<?php  echo($formulario->cierre()); ?>
<?php  if (empty($accion)) { ?>
 <script type="text/javascript">
  var fv =new Form.Validator.Inline($('<?php  echo($formulario->id); ?>'));
  new Form.Request($('<?php  echo($formulario->id); ?>'), $('<?php  echo($formulario->interno); ?>'), {
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

    if ($('<?php  echo($formulario->interno ); ?>') && MUI.options.standardEffects == true) {
     $('<?php  echo($formulario->interno ); ?>').setStyle('opacity', 0).get('morph').start({'opacity': 1});
    }
    //MUI.closeWindow($('<?php  echo($formulario->ventana); ?>'));
   }
  });
 </script>
<?php  } ?>