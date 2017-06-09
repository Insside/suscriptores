<?php
$ROOT = (!isset($ROOT)) ? "../../../../../../" : $ROOT;
require_once($ROOT . "modulos/suscriptores/librerias/Configuracion.cnf.php");
require_once($ROOT . "librerias/iGoogle/iMap.class.php");
$validaciones=new Validaciones();
$suscriptores=new Suscriptores();
$cordenadas=new Suscriptores_Georeferencias();
/* 
 * Copyright (c) 2015, Jose Alexis Correa Valencia <sguergachi at gmail.com>
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
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS )"AS IS"
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
$suscriptor=$suscriptores->consultar($validaciones->recibir("suscriptor"));
$localizacion=$cordenadas->cordenadas($suscriptor['suscriptor']);
//print_r($_REQUEST);
//print_r($localizacion);


// Create iMap object.
$map = new iMap();

// Set map's center position by latitude and longitude coordinates. 
$map->setCenter($localizacion['latitud'],$localizacion['longitud']);
// Set the default map type.
$map->setMapTypeId(iMap::MAP_TYPE_ID_ROADMAP);

// Enable full screen mode.
$map->setFullScreen(true);

// Set default zoom level.
$map->setZoom(18);

// Make zoom control compact.
$map->setZoomControlStyle(iMap::ZOOM_CONTROL_STYLE_SMALL);

// Define locations and add markers with custom icons and attached info windows.
$locations = array(
    array($suscriptor['nombres']." ".$suscriptor['apellidos'], $localizacion['latitud'],$localizacion['longitud'], '#FF7B6F', 'http://armdex.com/maps/eifel-tower.jpg', 120, 160)
);
foreach ($locations as $i => $location) {
    $map->addMarker($location[1], $location[2], array(
        'title' => $location[0], 
        'icon' => 'http://200.110.168.178/insside/modulos/mapas/icons/persona.png', 
        'html' => '', 
        'infoCloseOthers' => true
    ));
}

// Display the map.
$map->show();

?>