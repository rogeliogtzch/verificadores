<?PHP
//ini_set('display_errors',1);  error_reporting(E_ALL);
session_start();
class ControladorLogin
{
    /*=============================================
    Validar login
    =============================================*/

    static function ctrLogin($valor1)
    {
        
        if (isset($valor1["usuario"])) {
            

                $encriptarPassword = crypt($valor1["contrasena"], '$2a$07$tsjloi76rd45VCR56709DGASSDIVERFIF08/2022$');

                $tabla = "usuarios_verificadores";
                $item = "usu_ver_usuario";
                $valor = $valor1["usuario"];
                $respuesta = LoginUsuarios::mdlLogin($tabla, $item, $valor);
                //echo var_dump($respuesta);       
                if ($respuesta["usu_ver_usuario"] == $valor1["usuario"] && $respuesta["usu_ver_password"] == $encriptarPassword) {
                    $_SESSION["iniciarSesion"] = "OK";
                    $_SESSION["uactivo"] = $respuesta["usu_ver_token"];
                    $_SESSION["Nombre"] = $respuesta["usu_ver_nombre"];
                    return "OK";
                }else{ echo "no";}
           
        }
    }

    /*=============================================
    Recupera Passwd
    =============================================*/

    static function ctrRecPasswd($valor1)
    {
        
        if (isset($valor1["mailrec"])) {
                $tabla = "tbl_usuario";
                $item = "usuario_email";
                $valor = $valor1["mailrec"];
                $respuesta = LoginUsuarios::mdlRecpawwsd($tabla, $item, $valor);
                //return $respuesta si existe el correo entonces........       
                if ($respuesta["usuario_email"] == $valor1["mailrec"]) {
                 //Si existe entonces :.................
                    $id=$respuesta['usuario_id'];

                    echo"OK";
                    $nombreU = $respuesta['usuario_nombre_completo'];
                    $tabla = "tbl_usuario";
                    $token = uniqid();
    
                    $datos = array("token" => $token,
                                   "usuario_email" => $valor1["mailrec"]
                                    );
                    $respuesta2 = LoginUsuarios::mdlAsignarToken($tabla, $datos);                
                             /*Construccion y envio del mail de recuperacion de password*/
                             
                    $root=$_SERVER["DOCUMENT_ROOT"];
                    require $root.'/delycp/extensiones/PHPMailer/PHPMailerAutoload.php';

           
        }

       
    }}
 /////////////////////////////////////////
        /*  Cmbia el password                  */
        /////////////////////////////////////////

        static function ctrNuevoPassword($nvopassword){

            if(isset($nvopassword["dtaval1"])){


                if(preg_match("/^[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ]+$/", $nvopassword["dtaval1"])){
    
                    
                    $tabla = "tbl_usuario";
    
                    $encryptPassword = crypt($nvopassword["dtaval1"], '$2a$07$tsjloi76rd45VCR56709DGASSDIFORMDELYPC2022$');
    
                    $datos = array("usuario_id" => $nvopassword["numusr"],
                                    "usuario_password" => $encryptPassword
                                   );
    
    
                       // $respuesta = UsuariosModelo::mdlActualizarPasswordUsuario($tabla, $datos);
                       $respuesta =0;
                        if($respuesta == "OK"){
    
                            return 'OK';
                        } else {
    
                            return 'error';
                        }
    
                }else{
    
                    return 'Etipo';
                
                }
    
            }



        }
}
?>