<?php

$f->fila["seguridad1"] = $f->fila($f->celdas["creado"] . $f->celdas["actualizado"]);
$f->fila["seguridad2"] = $f->fila($f->celdas["creador"] . $f->celdas["actualizador"]);



$f->fila["fila12"] = $f->fila($f->celdas["habitaciones"]);
$f->fila["fila13"] = $f->fila($f->celdas["certificado"] . $f->celdas["habitantes"]);

$f->fila["mapa0"] = $f->fila("<h2>4. Geo Referencia Actual:</h2>");
$f->fila["mapa1"] = $f->fila($f->celdas["latitud"] . $f->celdas["longitud"].$f->fila["mapa"]);
$f->fila["mapa"]=$f->fila["mapa0"].$f->fila["mapa1"];

?>