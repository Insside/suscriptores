<?php

$info["clasificacion"] = ""
        . "<p>La clasificación de la domiciliaria se establece según el uso y "
        . "estratificación asignado a la misma acatando la normativa de SSPD-"
        . "20101300048765 del 14-12-2010 contemplada en el Anexo páginas #72, #353, #386"
        . "y tiene repercusiones sobre el cargo fijo si este tuviese aplicabilidad. "
        . "Los códigos de los estratos se establecen según las clases de estrato "
        . "según su uso contenidas en el Decreto 229 de 2002.</p>";

$estratos = new Estratos();
$usos = new Usos();
if (!isset($v['uso']) || empty($v['uso'])) {
    $v['uso'] = "01";
}
$ugl = $usos->getList(array());
$egl = $estratos->getList(array("uso" => $v['uso']));
/** Campos * */
$f->campos['uso'] = $f->getSelect(array("id" => "uso" . $f->id, "values" => $ugl, "label" => "nombre", "option" => "uso", "onChange" => "changeUso" . $f->id."()","selected"=>$v['uso']));
$f->campos['estrato'] = $f->getSelect(array("id" => "estrato" . $f->id, "values" => $egl, "label" => "nombre", "option" => "estrato","selected"=>$v['estrato']));
/** Celdas * */
$f->celdas["info-clasificacion"] = $f->celda("", $info["clasificacion"]);
$f->celdas["uso"] = $f->celda("Clase de Uso:", $f->campos['uso']);
$f->celdas["estrato"] = $f->celda("Estrato / Uso:", $f->campos['estrato'],"","w250px");
/** Filas * */
$f->fila["fc0"] = $f->fila("<h2>Utilización & Estratificación</h2>");
$f->fila["fc1"] = $f->fila($f->celdas["info-clasificacion"]);
$f->fila["fc2"] = $f->fila($f->celdas["uso"] . $f->celdas["estrato"]);
/** Final * */
$f->fila["clasificacion"] = $f->fila($f->fila["fc0"] . $f->fila["fc1"] . $f->fila["fc2"]);
$f->JavaScript(""
        . "function changeUso" . $f->id . "(){"
        . "     var fid='" . $f->id . "';"
        . "      var select=$('estrato'+fid);"
        . "     var uso=$('uso'+fid).getElement(':selected').value;"
        . "     new Request.JSON({"
        . "          url:'modulos/suscriptores/jsons/estratos.json.php',"
        . "          data:'uso='+uso,"
        . "          onRequest: function(){"
        . "             select.empty();"
        . "          },onComplete: function(json) {"
        . "             if($('estrato'+fid)){"
        . "                 var length=json.length;"
        . "                 for(var i=0;i<length;i++){"
        . "                     var option=new Element('option', {'value':json[i].estrato,'text':json[i].nombre});"
        . "                     select.append(option);"
        . "                 }"
        . "             }else{"
        . "                     console.log('Indefinida: estratos'+fid);"
        . "             }"
        . "          }"
        . "      }).send();"
        . "}"
        . "");
?>