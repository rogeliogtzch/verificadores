<?php
//ini_set('display_errors',1);  error_reporting(E_ALL);
require_once "../controladores/verificadores_controlador.php";
require_once "../modelos/verificadores_modelo.php";

$item = null;
$listado= Verficadores::ctrListarurlsverif($item);
//echo $cadenajson;


$aprocesar = json_encode($listado);
echo $aprocesar;

