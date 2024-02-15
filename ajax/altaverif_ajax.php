<?php
require_once "../controladores/verificadores_controlador.php";
require_once "../modelos/verificadores_modelo.php";
class Grafica
{
    public $alta;
    
    /*******************************************/
    /*******************FUNCIÓN LOGIN **********/
    /*******************************************/
    static function Registrosver($alta)
    {
        
        $valor1 = $alta;
        $respuesta= Verficadores::ctrConfigAltaVerificador($valor1);
        echo $respuesta;
    }

    
}
/*////////////////////VALIDACION POST AJAX//////////////////////////////////*/
                //validacion de usuario contraseña
//echo var_dump($_POST);
        if (isset($_POST["nombverif"])) {

if ($_POST["nombverif"] ==null) {
    echo 'vacio';   
                                            }  else{
            $verificadores = new Grafica();
            $alta = $_POST;
            $verificadores -> Registrosver($alta);
                                            }
        }                