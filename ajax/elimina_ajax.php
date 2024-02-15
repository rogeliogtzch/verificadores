<?php
require_once "../controladores/verificadores_controlador.php";
require_once "../modelos/verificadores_modelo.php";
class EliminaVerificador
{
    public $token;
    
    
    /*******************************************/
    /*******************ELIMINA LOGIN **********/
    /*******************************************/
    static function Elimina($token)
    {
        
        $valor1 = $token;
        $respuesta= Verficadores::ctrEliminaVerif($valor1);
        echo json_encode($respuesta);
    }

    

    
}
/*////////////////////VALIDACION POST AJAX//////////////////////////////////*/
                //validacion de usuario contraseña

        if (isset($_POST["idVerDel"])) {

if ($_POST["idVerDel"] ==null) {
    echo 'vaciodeshab';   
                                            }  else{
            $usuario = new EliminaVerificador();
            $token = $_POST;
            $usuario -> Elimina($token);
                                            }
        }                

       