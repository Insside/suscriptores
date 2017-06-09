<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Suscriptores_Usos
 *
 * @author Insside
 */

if (!class_exists('Suscriptores_Usos')) {
    if (!class_exists('Aplicacion_Usos')) {
        require_once(ROOT."modulos/aplicacion/librerias/Aplicacion_Usos.class.php");
    }
    class Suscriptores_Usos extends Aplicacion_Usos {

    }

}
//$su=new Suscriptores_Usos();
//$uso=$su->consultar("01");
//echo($uso["nombre"]);
?>