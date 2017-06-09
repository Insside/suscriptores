<?php
$ROOT = (!isset($ROOT)) ? "../../../" : $ROOT;
require_once($ROOT . "modulos/suscriptores/librerias/Configuracion.cnf.php");
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
$depurador = new Depurador();
$suscriptores = new Suscriptores();
$lecturas = new Lecturas();
$consumos = new Consumos();

$suscriptor = $_REQUEST["suscriptor"];
$todas = $lecturas->todas($suscriptor, "asc");
//$depurador->vector($todas);
?>
<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title>V3: Column and line mix - jsFiddle demo by amcharts</title>
    <script type='text/javascript' src='/js/lib/dummy.js'></script>
    <link rel="stylesheet" type="text/css" href="/css/result-light.css">
    <script type='text/javascript' src="../../../plugins/iCharts/amcharts/amcharts.js"></script>
    <script type='text/javascript' src="../../../plugins/iCharts/amcharts/serial.js"></script>
    <style type='text/css'>
      #chartdiv .pointer{display:none}
    </style>
  </head>
  <body>
    <div id="chartdiv" style="width: 100%; height: 362px;"></div>
    <script type='text/javascript'>
      //<![CDATA[
      var chart;

      var chartData = [
<?php
for ($i = 0; $i < (count($todas)); $i++) {
  $lectura = $todas[$i];
  $consumo = $lecturas->consumo($lectura['suscriptor'], $lectura['fecha']);
  if ($i > 0) {
    echo("{\"date\":\"" . $lectura['fecha'] . "\", \"value\":" . (int) ($consumo) . ",\"lectura\":" . $lectura['lectura'] . "}");
  }
  if ($i > 0 && $i < (count($todas) - 1)) {
    echo(",\n");
  }
}
?>
      ];


      AmCharts.ready(function() {
        // SERIAL CHART
        chart = new AmCharts.AmSerialChart();
        chart.pathToImages = "http://www.amcharts.com/lib/3/images/";
        chart.dataProvider = chartData;
        chart.dataDateFormat = "YYYY-MM-DD";
        chart.categoryField = "date";


        // AXES
        // category
        var categoryAxis = chart.categoryAxis;
        categoryAxis.parseDates = true; // as our data is date-based, we set parseDates to true
        categoryAxis.minPeriod = "DD"; // our data is daily, so we set minPeriod to DD
        categoryAxis.gridAlpha = 0.1;
        categoryAxis.minorGridAlpha = 0.1;
        categoryAxis.axisAlpha = 0;
        categoryAxis.minorGridEnabled = true;
        categoryAxis.inside = true;

        // value
        var valueAxis = new AmCharts.ValueAxis();
        valueAxis.tickLength = 0;
        valueAxis.axisAlpha = 0;
        valueAxis.showFirstLabel = false;
        valueAxis.showLastLabel = false;
        chart.addValueAxis(valueAxis);

        // GRAPH
        var graph = new AmCharts.AmGraph();
        graph.dashLength = 3;
        graph.lineColor = "#00CC00";
        graph.valueField = "value";
        graph.dashLength = 3;
        graph.bullet = "round";
        graph.balloonText = "[[category]]<br><span style='font-size:14px;'>Lectura: <b>[[lectura]]</b><br>Consumo: <b>[[value]]m³</b></span>";
        chart.addGraph(graph);

        // CURSOR
        var chartCursor = new AmCharts.ChartCursor();
        chart.addChartCursor(chartCursor);

        // SCROLLBAR
        var chartScrollbar = new AmCharts.ChartScrollbar();
        chart.addChartScrollbar(chartScrollbar);

        // HORIZONTAL GREEN RANGE
        var guide = new AmCharts.Guide();
        guide.value = 10;
        guide.toValue = 20;
        guide.fillColor = "#00CC00";
        guide.inside = true;
        guide.fillAlpha = 0.2;
        guide.lineAlpha = 0;
        valueAxis.addGuide(guide);

        // TREND LINES
        // first trend line
//        var trendLine = new AmCharts.TrendLine();
//        // note,when creating date objects 0 month is January, as months are zero based in JavaScript.
//        trendLine.initialDate = new Date(2012, 0, 2, 12); // 12 is hour - to start trend line in the middle of the day
//        trendLine.finalDate = new Date(2012, 0, 11, 12);
//        trendLine.initialValue = 10;
//        trendLine.finalValue = 19;
//        trendLine.lineColor = "#CC0000";
//        chart.addTrendLine(trendLine);

//        // second trend line
//        trendLine = new AmCharts.TrendLine();
//        trendLine.initialDate = new Date(2012, 0, 17, 12);
//        trendLine.finalDate = new Date(2013, 0, 22, 12);
//        trendLine.initialValue = 16;
//        trendLine.finalValue = 10;
//        trendLine.lineColor = "#CC0000";
//        chart.addTrendLine(trendLine);

        // WRITE
        chart.write("chartdiv");
      });
    </script>
  </body>
</html>