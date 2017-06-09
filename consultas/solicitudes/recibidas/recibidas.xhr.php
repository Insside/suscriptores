<?php
$ROOT = (!isset($ROOT)) ? "../../../../../" : $ROOT;
require_once($ROOT . "modulos/solicitudes/librerias/Configuracion.cnf.php");
$sesion=new Sesion();
$validaciones=new Validaciones();
/*
 * Copyright (c) 2013, Alexis
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without
 * modification, are permitted provided that the following conditions are met:
 *
 * * Redistributions of source code must retain the above copyright notice, this
 *   list of conditions and the following disclaimer.
 * * Redistributions in binary form must reproduce the above copyright notice,
 *   this list of conditions and the following disclaimer in the documentation
 *   and/or other materials provided with the distribution.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS"
 * AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE
 * IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE
 * ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT HOLDER OR CONTRIBUTORS BE
 * LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR
 * CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF
 * SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS
 * INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN
 * CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE)
 * ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE
 * POSSIBILITY OF SUCH DAMAGE.
 */
$usuario=Sesion::usuario();
$v['uid']=$usuario['usuario'];
$v['criterio']=$validaciones->recibir("criterio");
$v['valor']=$validaciones->recibir("valor");
$v['fechainicial']=$validaciones->recibir("fechainicial");
$v['fechafinal']=$validaciones->recibir("fechafinal");
$v['transaccion']=$validaciones->recibir("transaccion");
$v['url']="modulos/suscriptores/consultas/solicitudes/recibidas/recibidas.json.php?"
        . "uid=".$v['uid']
        . "&criterio=".$v['criterio']
        . "&valor=".$v['valor']
        . "&fechainicial=".$v['fechainicial']
        . "&fechafinal=".$v['fechafinal']
        . "&transaccion=".$v['transaccion'];
?>
<script type="text/javascript">

  function filterGrid() {
    tabla.filter($('filter').value);
  }
  function clearFilter() {
    tabla.clearFilter();
  }
  function onGridSelect(evt) {
    //var str = 'row: ' + evt.row + ' indices: ' + evt.indices;
    //str += ' id: ' + evt.target.getDataByRow(evt.row).proveedor;
    //$(codigo<?php echo($v['transaccion'] ); ?>) = evt.target.getDataByRow(evt.row).proveedor;
  }
  function buscarClick(button, grid) {
    parent.MUI.Suscriptores_Buscar('');
  }
  function imprimirClick(button, grid) {
    MUI.Distribucion_Instalaciones_Imprimir();
  }
  function Eliminar_Click<?php echo($v['transaccion'] ); ?>(button, grid) {
    var indices = tabla.getSelectedIndices();
    if (indices.length == 0) {
      //MUI.Proveedores_Advertencia_Seleccion();
      return;
    }
    var str = '';
    for (var i = 0; i < indices.length; i++) {
      str += 'row: ' + indices[i] + ' data: ' + tabla.getDataByRow(indices[i]).proveedor + '\n';
      solicitud = tabla.getDataByRow(indices[i]).solicitud;
      MUI.Suscriptores_Solicitud_Eliminar(solicitud);
    }
  }
  function Trasferir_Click<?php echo($v['transaccion'] ); ?>(button, grid) {
    var indices = tabla.getSelectedIndices();
    if (indices.length == 0) {
      //MUI.Proveedores_Advertencia_Seleccion();
      return;
    }
    var str = '';
    for (var i = 0; i < indices.length; i++) {
      str += 'row: ' + indices[i] + ' data: ' + tabla.getDataByRow(indices[i]).proveedor + '\n';
      var solicitud = tabla.getDataByRow(indices[i]).solicitud;
      MUI.Solicitudes_Trasferir(solicitud);
    }
  }
  function Responsabilidades_Click<?php echo($v['transaccion'] ); ?>(button, grid) {
    var indices = tabla.getSelectedIndices();
    if (indices.length == 0) {
      //MUI.Proveedores_Advertencia_Seleccion();
      return;
    }
    var str = '';
    for (var i = 0; i < indices.length; i++) {
      str += 'row: ' + indices[i] + ' data: ' + tabla.getDataByRow(indices[i]).proveedor + '\n';
      var solicitud = tabla.getDataByRow(indices[i]).solicitud;
      var creador = tabla.getDataByRow(indices[i]).creador;
      var responsable = tabla.getDataByRow(indices[i]).responsable;
      var equipo = tabla.getDataByRow(indices[i]).equipo;
      MUI.Solicitudes_Responsables(solicitud);
    }
  }

  var cmu = [
    {header: "solicitud", dataIndex: 'solicitud', dataType: 'string', width: 75, align: 'center', hidden: true},
    {header: "creador", dataIndex: 'creador', dataType: 'string', width: 75, align: 'center', hidden: true},
    {header: "responsable", dataIndex: 'responsable', dataType: 'string', width: 75, align: 'center', hidden: true},
    {header: "equipo", dataIndex: 'equipo', dataType: 'string', width: 75, align: 'center', hidden: true},
    {header: "Solicitud", dataIndex: 'codigo', dataType: 'string', width: 100, align: 'center', clave: true},
    {header: "<a href=\"#\" onClick=\"MUI.Notificacion('Servicio');\">S</a>", dataIndex: 'servicio', dataType: 'number', align: 'center', width: 25},
    {header: "<a href=\"#\" onClick=\"MUI.Notificacion('Causal');\">C</a>", dataIndex: 'causal', dataType: 'number', align: 'center', width: 30},
    //{header: "Suscriptor", dataIndex: 'suscriptor', dataType: 'number', align: 'center', width: 100},
    {header: "Detalles", dataIndex: 'detalles', dataType: 'string', width: 450},
    {header: "Fecha", dataIndex: 'radicacion', dataType: 'date', align: 'center',width: 90},
    {header: "<a href=\"#\" onClick=\"MUI.Notificacion('Estados');\">Estados</a>", dataIndex: 'estados', dataType: 'string', width: 120, align: 'center'}
  ];
  window.addEvent("domready", function() {
    tabla = new MUI.Grid('itable', {
      columnModel: cmu,
      buttons: [
        {name: 'Radicar', bclass: 'new', onclick: MUI.Suscriptores_Solicitud_Crear},
        {name: 'Eliminar', bclass: 'pEliminar', onclick: Eliminar_Click<?php echo($v['transaccion'] ); ?>},
        {name: 'Buscar', bclass: 'pBuscar', onclick: MUI.Suscriptores_Recibidas_Buscar},
        {name: 'Filtrar', bclass: 'pFiltrar', onclick: MUI.Suscriptores_Recibidas_Filtrar},
        {name: 'Información', bclass: 'pInformacion', onclick: Responsabilidades_Click<?php echo($v['transaccion'] ); ?>}
      ],
      url: "<?php echo($v['url']); ?>",
      perPageOptions: [20, 40, 80, 160, 320, 640],
      perPage: 20,
      page: 1,
      pagination: true,
      serverSort: true,
      showHeader: true,
      alternaterows: true,
      sortHeader: true,
      resizeColumns: true,
      multipleSelection: true,
      width: $('central').getSize().x,
      height: $('central').getSize().y
    });

    tabla.addEvent('click', onGridSelect);
  });
</script>
<?php echo("<div id=\"itable\" style=\"width:100%\" ></div>"); ?>
