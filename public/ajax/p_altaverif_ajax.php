<?php
require_once "../controladores/p_verificadores_controlador.php";
require_once "../modelos/p_verificadores_modelo.php";
class Alta
{
    public $alta;
    
    /*******************************************/
    /*******************FUNCIÓN LOGIN **********/
    /*******************************************/
    static function Registro($alta)
    {
        
        $valor1 = $alta;
        $respuesta= Verficadores::ctrConfigAltaVerificador($valor1);
        echo $respuesta;
    }

    
}
/*////////////////////VALIDACION POST AJAX//////////////////////////////////*/
                //validacion de usuario contraseña
//echo var_dump($_POST);
        if (isset($_POST["usuact"])) {

if ($_POST["usuact"] ==null AND $_POST["gafverif"] ==null) {
    echo 'vacio';   
                                            }  else{
            $verificador = new Alta();
            $alta = $_POST;
            $verificador -> Registro($alta);
                                            }
        }                