<?php
$sino=array("0"=>array("option"=>"SI","label"=>"Si"),"1"=>array("option"=>"NO","label"=>"No"));

/** Campos **/
$f->campos['acueducto'] = $f->getSelect(array("id" => "acueducto" . $f->id, "values" => $sino, "label" => "label", "option" => "option", "onChange" => "changeAcueducto" . $f->id."()","selected"=>$v['acueducto']));
$f->campos['diametro'] = $tuberias->combo('diametro', $v['diametro']);
$f->campos['alcantarillado'] =$f->getSelect(array("id" => "alcantarillado" . $f->id, "values" => $sino, "label" => "label", "option" => "option", "onChange" => "changeAlcantarillado" . $f->id."()","selected"=>$v['alcantarillado']));
$f->campos['conexion'] = $suscriptores->combo_conexion('conexion', $v['conexion']);
/** Celdas **/
$f->celdas["diametro"] = $f->celda("Diametro:", $f->campos['diametro']);
$f->celdas["acueducto"] = $f->celda("Acueducto:", $f->campos['acueducto']);
$f->celdas["alcantarillado"] = $f->celda("Alcantarillado:", $f->campos['alcantarillado']);
$f->celdas["conexion"] = $f->celda("Conexion:", $f->campos['conexion']);
/** Filas **/
$f->fila["fs0"] = $f->fila("<h2>Servicios Contratados:</h2>");
$f->fila["fs1"] = $f->fila($f->celdas["acueducto"] . $f->celdas["diametro"]);
$f->fila["fs2"] = $f->fila($f->celdas["alcantarillado"]);
$f->fila["fs3"] = $f->fila($f->celdas["conexion"]);
/** Final **/
$f->fila["servicios"] = $f->fila["fs0"] . $f->fila["fs1"] . $f->fila["fs2"] . $f->fila["fs3"];
$f->JavaScript(""
        . "function changeAcueducto".$f->id."(){}"
        . "function changeAlcantarillado".$f->id."(){}"
        . "");
?>