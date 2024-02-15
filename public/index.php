<?php

require_once "controladores/p_plantilla_controlador.php";
require_once "controladores/p_ruta_controlador.php";
require_once "controladores/p_urls_controlador.php";

require_once "controladores/p_verificadores_controlador.php";
require_once "modelos/p_verificadores_modelo.php";



$plantilla = new ControladorPlantilla();
$plantilla -> ctrPlantilla();