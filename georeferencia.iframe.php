<?php 
$ROOT = (!isset($ROOT)) ? "../../" : $ROOT;
require_once($ROOT . "modulos/suscriptores/librerias/Configuracion.cnf.php");


//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\ Datos Recibidos
$suscriptor = $suscriptores->consultar(@$_REQUEST['suscriptor']);
//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\ ANALIZA SI SE VA A ACTUALIZAR UNA GEOREFERENCIACION
if (isset($_REQUEST['accion']) && $_REQUEST['accion'] == "localizar-suscriptor") {
 if ((isset($_REQUEST['latitude']) && !empty($_REQUEST['latitude'])) && (isset($_REQUEST['longitude']) && !empty($_REQUEST['longitude']))) {
  if (isset($_REQUEST['suscriptor']) && !empty($_REQUEST['suscriptor'])) {
   $suscriptores->geolocalizar($_REQUEST['suscriptor'], $_REQUEST['latitude'], $_REQUEST['longitude']);
  }
 }
}
?>



<html>
 <head>
  <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
  <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
  <title>Google Maps JavaScript API v3 Example: Common Loader</title>
  <!--MOCHAUI-->
  <script type="text/javascript" src="../../../scripts/mootools-1.3.2-core-nocompat-yc.js"></script>
  <script type="text/javascript" src="../../../scripts/mootools-1.3.2-more-yc.js"></script>
  <!--MOCHAUI-->
  <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
  <script type="text/javascript" src="utilidad.js"></script>
  <script type="text/javascript">
   var infowindow;
   var map;

   function initialize() {
    var mapTypeIds = [];
    for (var type in google.maps.MapTypeId) {
     mapTypeIds.push(google.maps.MapTypeId[type]);
    }
    mapTypeIds.push("OSM");
<?php  if (isset($suscriptor['latitud']) && isset($suscriptor['longitud'])) { ?>
     var myLatlng =new google.maps.LatLng(<?php  echo($suscriptor['latitud']); ?>,<?php  echo($suscriptor['longitud']); ?>);
<?php  } else { ?>
     var myLatlng =new google.maps.LatLng(3.8996076534756807, -76.30204269184878);
<?php  } ?>
    var map =new google.maps.Map(document.getElementById("map_canvas"), {center: myLatlng, zoom: 20, mapTypeId: google.maps.MapTypeId.ROADMAP, mapTypeControlOptions: {mapTypeIds: mapTypeIds}});
    //var map =new google.maps.Map(document.getElementById("map_canvas"),{   center:myLatlng,zoom: 11,mapTypeId: "OSM",mapTypeControlOptions: {mapTypeIds: mapTypeIds}});
    map.mapTypes.set("OSM", new google.maps.ImageMapType({getTileUrl: function(coord, zoom) {
      return "http://www.buga.com.co/mapa/tiles/" + zoom + "/" + coord.x + "_" + coord.y + ".png";
     }, tileSize: new google.maps.Size(256, 256), name: "Buga", maxZoom: 20}));
    var marker = createMarker(map, myLatlng);
    infoWindow =new google.maps.InfoWindow();
    google.maps.event.addListener(marker, 'click', function() {
     openInfoWindow(marker);
    });
    google.maps.event.addListener(marker, 'dragend', function() {
     openInfoWindow(marker);
    });

    /*downloadUrl("mapa.xml.php", function(data) {
     var markers = data.documentElement.getElementsByTagName("marker");
     var marker = createMarker(myLatlng);
     for (var i = 0; i < markers.length; i++) {
     var lat=parseFloat(markers[i].getAttribute("lat"));
     var lng=parseFloat(markers[i].getAttribute("lng"));
     var latlng =new google.maps.LatLng(lat,lng);
     var marker = createMarker(markers[i],latlng);
     }
     });
     */
   }

   function openInfoWindow(marker) {
    var markerLatLng = marker.getPosition();
    infoWindow.setContent(['<table class="informacion"><tr><td>Latitud:</td><td>', markerLatLng.lat(), '</td></tr>', '<tr><td>Longitud:</td><td>', markerLatLng.lng(), '</td></tr>', '</table>'].join(''));
    var latitude = document.getElementById("latitude");
    var longitude = document.getElementById("longitude");
    latitude.value = markerLatLng.lat();
    longitude.value = markerLatLng.lng();
    infoWindow.open(map, marker);
   }

   function createMarker(mapa, latlng) {
    return(new google.maps.Marker({
     position: mapa.getCenter()
         , map: mapa
         , title: 'Pulsa aquí'
         , icon: 'http://gmaps-samples.googlecode.com/svn/trunk/markers/green/blank.png'
         , cursor: 'default'
         , draggable: true
    }));
   }

   //function openInfoWindow(marker) {
   //  var markerLatLng = marker.getPosition();
   //  popup.setContent(['&lt;b&gt;La posicion del marcador es:&lt;/b&gt;&lt;br/&gt;',markerLatLng.lat(),', ',markerLatLng.lng(),'&lt;br/&gt;&lt;br/&gt;Arr&amp;aacute;strame y haz click para actualizar la posici&amp;oacute;n.'].join(''));
   //  popup.open(map, marker);
   //}

   function html(datos) {
    var identificacion = datos.getAttribute("identificacion");
    var nombres = datos.getAttribute("nombres");
    var apellidos = datos.getAttribute("apellidos");
    var direccion = datos.getAttribute("direccion");
    var telefono = datos.getAttribute("telefono");
    var movil = datos.getAttribute("movil");

    var html = '<table class="informacion" border="0" cellspacing="0" cellpadding="0">';
    html += "<tr><td align='right'><b>Identificación</b>:</td><td>" + identificacion + "</td></tr>";
    html += "<tr><td align='right'><b>Nombre</b>:</td><td>" + nombres + " " + apellidos + "</td></tr>";
    html += "<tr><td align='right'><b>Dirección</b>:</td><td>" + direccion + "</td></tr>";
    html += "<tr><td align='right'><b>Telefonos</b>:</td><td>" + telefono + " | " + movil + "</td></tr>";
    html += '</table>';
    return html;
   }

   function buscar(direccion) {
    var geocoder =new google.maps.Geocoder();// Creamos el Objeto Geocoder
    geocoder.geocode({'address': "Buga, " + direccion}, geocodeResult);// Hacemos la petición indicando la dirección e invocamos la función
   }

   function geocodeResult(results, status) {
    // Verificamos el estatus
    if (status == 'OK') {
     // Si hay resultados encontrados, centramos y repintamos el mapa
     // esto para eliminar cualquier pin antes puesto
     var mapTypeIds = [];
     for (var type in google.maps.MapTypeId) {
      mapTypeIds.push(google.maps.MapTypeId[type]);
     }
     mapTypeIds.push("OSM");
     var myLatlng =new google.maps.LatLng(3.8996076534756807, -76.30204269184878);
     var map =new google.maps.Map(document.getElementById("map_canvas"), {center: myLatlng, zoom: 20, mapTypeId: google.maps.MapTypeId.ROADMAP, mapTypeControlOptions: {mapTypeIds: mapTypeIds}});
     //var map =new google.maps.Map(document.getElementById("map_canvas"),{   center:myLatlng,zoom: 11,mapTypeId: "OSM",mapTypeControlOptions: {mapTypeIds: mapTypeIds}});
     //map.mapTypes.set("OSM", new google.maps.ImageMapType({getTileUrl: function(coord, zoom) {return "http://geoportal.igac.gov.co/arcgis/rest/services/VISOR_PRINCIPAL/Imagenes/MapServer/tile/" + zoom + "/" + coord.x + "/" + coord.y + ".png";},tileSize: new google.maps.Size(256, 256),name: "Aguas De Buga E.S.P",maxZoom: 18}));
     map.mapTypes.set("OSM", new google.maps.ImageMapType({getTileUrl: function(coord, zoom) {
       return "http://www.buga.com.co/mapa/tiles/" + zoom + "/" + coord.x + "_" + coord.y + ".png";
      }, tileSize: new google.maps.Size(256, 256), name: "Buga", maxZoom: 20}));


     // fitBounds acercará el mapa con el zoom adecuado de acuerdo a lo buscado
     var latitude = document.getElementById("latitude");
     var longitude = document.getElementById("longitude");
     latitude.value = results[0].geometry.location.lat();
     longitude.value = results[0].geometry.location.lng();
     map.fitBounds(results[0].geometry.viewport);
     // Dibujamos un marcador con la ubicación del primer resultado obtenido
     var markerOptions = {position: results[0].geometry.location}
     var marker = createMarker(map, results[0].geometry.location);


     infoWindow =new google.maps.InfoWindow();
     google.maps.event.addListener(marker, 'click', function() {
      openInfoWindow(marker);
     });
     google.maps.event.addListener(marker, 'dragend', function() {
      openInfoWindow(marker);
     });

    } else {
     // En caso de no haber resultados o que haya ocurrido un error
     // lanzamos un mensaje con el error
     alert("Geocoding no tuvo éxito debido a: " + status);
    }
   }
  </script>
  <style>
   .informacion{font-size: 12px;}
   .button a.send {background: url("/images/icones.png") no-repeat scroll 0 -436px transparent;padding: 6px 12px 5px 32px;}
   body {font-size: 12px;margin: 0;padding: 0;}
   .h{float: left;}
   .mooBar_ajaxBox {background: url(ajax-load.gif) no-repeat center center;}
   #page {width: 640px;margin: 0 auto;overflow: hidden;zoom: 1;}
   .divider { border-bottom: 2px solid #ccc; clear: both; }
   #ajaxBtn {padding-top: 10px;clear: both;overflow: hidden;}
   #ajaxBtn a { float: right; padding: 5px 10px; border-bottom: 2px solid #17282B; border-right: 2px solid #17282B; border-top: 2px solid #B4D523; border-left: 2px solid #B4D523; background-color: #5F9A29; color: white; text-decoration: none;margin-left: 10px;}
   #ajaxBtn a:hover {background-color: #B4D523;}
   .topbar a { background-color: #3399cc; text-decoration: none; color: white; padding: 0px 10px; font-size: 16px; }
   .topbar a:hover { background-color: #375D81; }
   .mooBar_realTime_body, .topbar a {-webkit-border-radius: 5px 5px 5px;-moz-border-radius: 5px 5px 5px;border-radius: 5px 5px 5px;}
   .topbar_link a{}
   .filtro{background-color: #CCC;}
   #latitude{width: 40px;}
   #longitude{width: 40px;}
  </style>
 </head>
 <body onLoad="initialize()">
  <form action="" name="fomulario" id="formulario" method="post" target="_self">
   <input name="accion" type="hidden" value="localizar-suscriptor">
   <input name="suscriptor" type="hidden" value="<?php  echo($suscriptor['suscriptor']); ?>">
   <table width="100%" align="center">
    <tr><td align="center" class="filtro">

      <table>
       <tr>
        <td><p style="font-size:12px"><b>[ <?php  echo(str_replace("-", "", $suscriptor['predial'])); ?>]</b>:</p></td><td><input type="text" maxlength="100" id="address" name="address" placeholder="Dirección" value="<?php  echo($suscriptor['direccion']); ?>"></td>
        <td><p style="font-size:12px"><b>Latitud:</b></p></td><td><input type="text" maxlength="100" id="latitude" name="latitude"></td>
        <td><p style="font-size:12px"><b>Longitud:</b></p></td><td><input type="text" maxlength="100" id="longitude" name="longitude"></td>
        <td><input name="filtrar" type="button" value="Buscar" onClick="buscar(address.value);" /><input name="Registrar" type="submit" value="Registrar"></td>
       </tr>
      </table>

     </td></tr>
   </table>
   <div id="map_canvas" style="width:100%; height:100%;"></div>
  </form>
 </body>
</html>