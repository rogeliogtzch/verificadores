<?php

require_once "controladores/plantilla_controlador.php";
require_once "controladores/ruta_controlador.php";

require_once "controladores/verificadores_controlador.php";
require_once "modelos/verificadores_modelo.php";



$plantilla = new ControladorPlantilla();
$plantilla -> ctrPlantilla();