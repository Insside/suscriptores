<?php
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
?>
<script type="text/javascript">
  function filterGrid() {
    datagrid.filter($('filter').value);
  }
  function clearFilter() {
    datagrid.clearFilter();
  }
  function onGridSelect(evt) {
    var str = 'row: ' + evt.row + ' indices: ' + evt.indices;
    str += ' id: ' + evt.target.getDataByRow(evt.row).id;
  }
  function buscarClick(button, grid) {
    MUI.Suscriptores_Buscador();
  }
  var cmu = [
    {header: "Sector", dataIndex: 'sector', dataType: 'number', width: 80, class: "right"},
    {header: "Ciudad", dataIndex: 'ciudad', dataType: 'string', width: 150},
    {header: "Nombre", dataIndex: 'nombre', dataType: 'string', width: 400},
    {header: "Tipo", dataIndex: 'tipo', dataType: 'string', width: 150}
  ];
  window.addEvent("domready", function() {
    //$('filterbt').addEvent("click", filterGrid);
    //$('clearfilterbt').addEvent("click", clearFilter);
    datagrid = new MUI.Grid('mygrid', {
      columnModel: cmu,
      buttons: [
        {name: 'Nuevo', bclass: 'new', onclick: MUI.Suscriptores_Sector_Nuevo}
        //{name: 'Buscar', bclass: 'pBuscar', onclick: buscarClick}
        //{separator: true},
        // {name: 'Duplicate', bclass: 'duplicate', onclick: gridButtonClick}
      ],
      url: "modulos/suscriptores/consultas/jsons/sectores.json.php?criterio=<?php echo(@$_REQUEST['criterio']); ?>&buscar=<?php echo(@$_REQUEST['buscar']); ?>",
      perPageOptions: [200, 400, 800],
      perPage: 200,
      page: 1,
      pagination: true,
      serverSort: true,
      showHeader: true,
      alternaterows: true,
      sortHeader: false,
      resizeColumns: true,
      multipleSelection: true,
      width: $('central').getSize().x,
      height: $('central').getSize().y
    });

    datagrid.addEvent('click', onGridSelect);
  });
</script>
<div id="mygrid" style="width:100%" ></div>
<script type="text/javascript">
  // Estas funciones son invocadas desde la barra de tareas
  function tBuscar(texto) {
    MUI.Suscriptores_Buscar(texto);
    return(false);
  }
</script>