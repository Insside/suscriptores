<?php
error_reporting(E_ALL);
define("PATH", dirname(__FILE__));
define('ROOT', PATH . "/../../../../../");
require_once(ROOT . "modulos/suscriptores/librerias/Configuracion.cnf.php");
require_once(ROOT . "modulos/suscriptores/librerias/Suscriptores_Usos.class.php");
require_once(ROOT . "modulos/suscriptores/librerias/Suscriptores_Suscriptor.class.php");
require_once(ROOT . "modulos/suscriptores/librerias/Suscriptores_Matricula_Solicitud.class.php");
require_once(ROOT . "librerias/pdf/fpdf.php");
require_once(ROOT . "librerias/pdf/fpdi.php");

/** Clases * */
$v = new Validaciones();
$ss = new Suscriptores_Suscriptor($v->recibir("matricula"));
$sms = new Suscriptores_Matricula_Solicitud($v->recibir("matricula"));
$su = new Suscriptores_Usos();
$se=new Suscriptores_Estratos(); 
/** Variables * */
$suscriptor = $ss->getAll(); 
$solicitud = $sms->getAll();
/* * * Margenes ** */
$pdf = new FPDI();
$pdf->setSourceFile("matricula.pdf");
$tid = $pdf->importPage(1);
$size = $pdf->getTemplateSize($tid);

// create a page (landscape or portrait depending on the imported page size)
if ($size['w'] > $size['h']) {
    $pdf->AddPage('L', array($size['w'], $size['h']));
} else {
    $pdf->AddPage('P', array($size['w'], $size['h']));
}
//$pdf ->useTemplate($tid, null, null,300,300, true);
$pdf->useTemplate($tid);
$pdf->SetFont('Helvetica', 'B', 13);
$pdf->SetTextColor(0, 0, 0);

/* * * Datos ** */
$d["solicitud"] = $solicitud["solicitud"];
$d["matricula"] = $suscriptor["suscriptor"];
$d["propietario"] = strtoupper(utf8_decode($suscriptor["nombres"] . " " . $suscriptor["apellidos"]));
$d["identificacion"] = strtoupper($suscriptor["documento"] . " " . $suscriptor["identificacion"]);
$d["direccion"] = strtoupper($suscriptor["direccion"] . " " . $suscriptor["referencia"]);
$d["regional"] = "GUADALAJARA DE BUGA, VALLE DEL CAUCA, COLOMBIA";
$d["uso"] = $su->consultar($suscriptor["uso"]);
$d["estrato"] =$se->consultar($suscriptor["estrato"]);
$d["predial"] = $suscriptor["predial"];
$d["ciudad"] = "GUADALAJARA DE BUGA";
$d["sector"] = strtoupper(utf8_decode(@$sector["nombre"]));
$d["region"] = "VALLE DEL CAUCA";
$d["pais"] = "COLOMBIA";
$d["diametro"] = $suscriptor["diametro"] . " PULGADA";
$d["conexion"] = $suscriptor["conexion"];
$d["aprovacion"] = $suscriptor["creado"];
$d["alcantarillado"] = $suscriptor["alcantarillado"];
if ($suscriptor["credito"] > 1) {
    $d["credito"] = $suscriptor["credito"] . " MESES";
} else {
    $d["credito"] = "NO";
}
/* * * Posicionando ** */
campo($pdf, array("x" => 154, "y" => 29, "tamano" => 21, "texto" => $d["solicitud"]));
campo($pdf, array("x" => 112, "y" => 143.5, "tamano" => 15, "texto" => $d["matricula"]));
campo($pdf, array("x" => 70, "y" => 154.5, "tamano" => 15, "texto" => $d["propietario"]));
campo($pdf, array("x" => 85, "y" => 162.5, "tamano" => 15, "texto" => $d["identificacion"]));
campo($pdf, array("x" => 147, "y" => 162.5, "tamano" => 15, "texto" => $d["uso"]["uso"]." - ".$d["uso"]["nombre"]));
campo($pdf, array("x" => 66, "y" => 170.5, "tamano" => 12, "texto" => $d["direccion"]));
campo($pdf, array("x" => 34, "y" => 179, "tamano" => 12, "texto" => $d["regional"]));
campo($pdf, array("x" => 38, "y" => 187, "tamano" => 15, "texto" =>$d["estrato"]["nombre"]));
campo($pdf, array("x" => 146, "y" => 187, "tamano" => 15, "texto" => $d["predial"]));
campo($pdf, array("x" => 145, "y" => 178.4, "tamano" => 14, "texto" => $d["sector"]));
//campo($pdf,array("x"=>36.5,"y"=>187,"tamano"=>14,"texto"=>$d["region"]));
//campo($pdf,array("x"=>120.5,"y"=>187,"tamano"=>14,"texto"=>$d["pais"]));
campo($pdf, array("x" => 65, "y" => 195, "tamano" => 14, "texto" => $d["diametro"]));
campo($pdf, array("x" => 153, "y" => 195, "tamano" => 14, "texto" => $d["conexion"]));
campo($pdf, array("x" => 65, "y" => 203.5, "tamano" => 14, "texto" => $d["aprovacion"]));
campo($pdf, array("x" => 128, "y" => 203.5, "tamano" => 14, "texto" => $d["alcantarillado"]));
campo($pdf, array("x" => 173, "y" => 203.5, "tamano" => 14, "texto" => $d["credito"]));


campo($pdf, array("x" => 16.5, "y" => 255.6, "tamano" => 12, "texto" => $d["propietario"]));
campo($pdf, array("x" => 16.5, "y" => 259.1, "tamano" => 12, "texto" => $d["identificacion"]));

function campo($pdf, $p = array()) {
    $pdf->SetFont('Helvetica', 'B', $p["tamano"]);
    $pdf->SetXY($p["x"], $p["y"]);
    $pdf->Write(0, $p["texto"]);
}

$pdf->Output();
?>