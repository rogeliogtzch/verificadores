<?php
require_once "../controladores/p_login_controlador.php";
require_once "../modelos/p_login_modelo.php";
class Acceso
{
    public $login;
    
    /*******************************************/
    /*******************FUNCIÓN LOGIN **********/
    /*******************************************/
    static function login($login)
    {
        
        $valor1 = $login;
        $respuesta= ControladorLogin::ctrLogin($valor1);
        echo $respuesta;
    }

    
}
/*////////////////////VALIDACION POST AJAX//////////////////////////////////*/
                //validacion de usuario contraseña

        if (isset($_POST["usuario"])) {

if ($_POST["usuario"] ==null AND $_POST["contrasena"] ==null) {
    echo 'vacio';   
                                            }  else{
            $usuario = new Acceso();
            $login = $_POST;
            $usuario -> login($login);
                                            }
        }                