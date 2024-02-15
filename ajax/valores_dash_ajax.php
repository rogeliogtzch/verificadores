<?php
ini_set('display_errors',1);  error_reporting(E_ALL);
require_once "../controladores/verificadores_controlador.php";
require_once "../modelos/verificadores_modelo.php";
class visuales{

    public $valpills;
/*******************************************/
/*****************FUNCIÓN Impresion **********/
/*******************************************/
function actualiza(){
    $valor1 = $this->valpills;
    $respuesta= Verficadores::ctrConstActpills($valor1);
    //return $respuesta;
    echo json_encode($respuesta, JSON_FORCE_OBJECT);
                }

///////////////////////////////////////////////////////////
}  //////Fin de la Clase
/*////////////////////ENTREGA POST AJAX//////////////////////////////////*/
if (isset($_POST["Actpills"])) {
    $detalle = new visuales();
    $detalle -> valpills = $_POST;
    $detalle -> actualiza();
            }else{
            $fallo= "falta";
            echo "Fallo";
            return $fallo;
			
        }