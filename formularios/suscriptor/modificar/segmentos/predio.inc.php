<?php
$f->fila["p3"] = $f->fila("<h2>2. Información del Predio:</h2>");
$f->fila["p4"] = $f->fila($f->celdas["predial"] . $f->celdas["ubicacion"]);
$f->fila["p5"] = $f->fila($f->celdas["direccion"] . $f->celdas["referencia"] . $f->celdas["sector"]);
$f->fila["p6"] = $f->fila($f->celdas["pais"] . $f->celdas["region"] . $f->celdas["ciudad"]);

$f->fila["predio"]=$f->fila["p3"] . $f->fila["p4"] . $f->fila["p5"] . $f->fila["p6"];
?>