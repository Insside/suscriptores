<?php
$f->fila["r0"] = $f->fila("<h2>4. Referencias Complementarias:</h2>");
$f->fila["r1"] = $f->fila($f->celdas["factura"] . $f->celdas["credito"]);
$f->fila["r2"] = $f->fila("<h2>5. Distribucción Toma Lecturas:</h2>");
$f->fila["r3"] = $f->fila($f->celdas["manzana"].$f->celdas["seccion"].$f->celdas["ciclo"].$f->celdas["ruta"]);
$f->fila["referencias"] =$f->fila["r0"].$f->fila["r1"].$f->fila["r2"].$f->fila["r3"];
?>