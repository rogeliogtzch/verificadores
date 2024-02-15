<?php
ini_set('display_errors',1);  error_reporting(E_ALL);
require_once "../controladores/p_detalle_controlador.php";
require_once "../modelos/p_detalle_modelo.php";
class Detalle
{
    public $detalle;
    
    /*******************************************/
    /*******************FUNCIÓN LOGIN **********/
    /*******************************************/
    static function DetalleVerif($detalle)
    {
        
        $valor1 = $detalle;
        $respuesta= DetalleVerif::ctrDetalleVerificador($valor1);

       echo json_encode($respuesta);
    }

    
}
/*////////////////////VALIDACION POST AJAX//////////////////////////////////*/
                //validacion de usuario contraseña

        if (isset($_POST["idVerDet"])) {

if ($_POST["idVerDet"] ==null) {
    echo 'vacio';   
                                            }  else{
            $usuario = new Detalle();
            $detalle = $_POST;
            $usuario -> DetalleVerif($detalle);
                                            }
        }                