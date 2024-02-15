<?php
require_once "../controladores/verificadores_controlador.php";
require_once "../modelos/verificadores_modelo.php";
class EliminaUrl
{
    public $token;
    public $habtoken;
    /*******************************************/
    /*******************ELIMINA LOGIN **********/
    /*******************************************/
    static function EliminaUrlpublica($token)
    {
        
        $valor1 = $token;
        $respuesta= Verficadores::ctrEliminaUrl($valor1);
        echo json_encode($respuesta);
    }


    static function Habilita($habtoken)
    {
        
        $valor1 = $habtoken;
        $respuesta= Verficadores::ctrHabilitaUrl($valor1);
        echo json_encode($respuesta);
    }

    
}
/*////////////////////VALIDACION POST AJAX//////////////////////////////////*/
                //validacion de usuario contraseña

        if (isset($_POST["idVerurl"])) {

if ($_POST["idVerurl"] ==null) {
    echo 'vacio';   
                                            }  else{
            $usuario = new EliminaUrl();
            $token = $_POST;
            $usuario -> EliminaUrlpublica($token);
                                            }
        }             
        if (isset($_POST["idVerurlhab"])) {

          
                        $usuario = new EliminaUrl();
                        $habtoken = $_POST;
                        $usuario -> Habilita($habtoken);
                                                        }
                    