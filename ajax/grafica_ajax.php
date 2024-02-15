<?php
require_once "../controladores/verificadores_controlador.php";
require_once "../modelos/verificadores_modelo.php";
class Grafica
{
    public $crear;
    public $crearval;
    
    /*******************************************/
    /*******************FUNCIÓN LOGIN **********/
    /*******************************************/
    static function Nombres($crear)
    {
        
        $valor1 = $crear;
        $respuesta= Verficadores::ctrNombresGraph($valor1);
        echo json_encode($respuesta);
    }

     /*******************************************/
    /*******************FUNCIÓN LOGIN **********/
    /*******************************************/
    static function Valores($crear)
    {
        
        $valor1 = $crear;
        $respuesta= Verficadores::ctrValoresGraph($valor1);
        echo json_encode($respuesta);
    }


    
}
/*////////////////////VALIDACION POST AJAX//////////////////////////////////*/
                //validacion de usuario contraseña
//echo var_dump($_POST);
        if (isset($_POST["graph"])) {

if ($_POST["graph"] ==null) {
    echo 'vacio';   
                                            }  else{
            $verificadores = new Grafica();
            $crear = $_POST;
            $verificadores -> Nombres($crear);
                                            }
        } 
        

        if (isset ($_POST["graphval"])) {
           
                    $verificadores = new Grafica();
                    $crearval = $_POST;
                    $verificadores -> Valores($crearval);
                                                    }