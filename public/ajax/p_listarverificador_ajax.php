<?php
//ini_set('display_errors',1);  error_reporting(E_ALL);
require_once "../controladores/p_verificadores_controlador.php";
require_once "../modelos/p_verificadores_modelo.php";

$item = null;
$listado= Verficadores::ctrListarVerificadores($item);
//echo $cadenajson;


$aprocesar = json_encode($listado);
echo $aprocesar;

