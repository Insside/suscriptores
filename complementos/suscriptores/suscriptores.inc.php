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
$f->campos['nombre']=$f->text("nombre".$transaccion,"",64,"required");
$f->campos['buscar']=$f->button("buscar".$transaccion,"button","Buscar / Filtrar");
// Celdas
$f->celdas['nombre']=$f->celda("Texto:",$f->campos['nombre']);
// Filas
$f->fila["nombre"]=$f->fila($f->celdas['nombre']);
//Compilacion
$f->filas($f->fila['nombre']);
$f->botones($f->campos['buscar']);
?>
<script type="text/javascript">
  if ($('buscar<?php echo($transaccion); ?>')) {
    $('buscar<?php echo($transaccion); ?>').addEvent('click', function(e) {
      MUI.Suscriptores_Buscar($('nombre<?php echo($transaccion); ?>').value);
    });
  }
</script>

