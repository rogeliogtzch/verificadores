<?PHP
ini_set('display_errors',1);  error_reporting(E_ALL);
//session_start();
class Urls
{
    /*******************************************/
    /*************FUNCIÓN DETALLE USUARIO*******/
    /*******************************************/
    
    static function ctrMostrarVerificador($item){

        $tabla = "tbl_usuarios";
        $item = $item;
        $datos = "";

        $respuesta = VerificadoresMDL::mdlDetalleUsu($tabla, $item,$datos);
           // echo var_dump($respuesta);
        return $respuesta;

        }
    /*******************************************/
    /*************FUNCIÓN LISTAR USUARIOS*******/
    /*******************************************/
    
    static function ctrListarUrls($item){

        $tabla = "verificadores_tbl";

        $respuesta = VerificadoresMDL::mdlListarVerifcicadores($tabla);
           // echo var_dump($respuesta);
        return $respuesta;

        }


    /*******************************************/
    /*************FUNCIÓN ALTA DE USUARIO*******/
    /*******************************************/
    
    static function ctrConfigAltaVerificador($item){
        $raiz= $_SERVER['DOCUMENT_ROOT'];
        //echo var_dump($item);
        $token_verif = uniqid();

        date_default_timezone_set('America/Mexico_City');

                    $fecha = date('Y-m-d');
                    $hora = date('H:i:s');
                    $fechaActual = $fecha. ' ' .$hora;
                    //crea los directorios por verificador//
                    
                    $directorio = $raiz.'/verificadores/vistas/assets/uploads/verif'.$token_verif;
                    if (!file_exists($directorio)) {
                       //echo $directorio;
                       
                             mkdir($directorio, 0755, true);
                       }
                    //Valida el PDF ///


        
        $tabla = "tbl_usuarios";
        if(
            preg_match("/^[0-9]+$/",$item["uActual"]) &&
            preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ!-_@#.$%\/ ]+$/', $item["Nusu"]) &&
            preg_match('/^[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $item["UsuMail"]) &&
            preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ!-_@#.$%\/ ]+$/', $item["usuNombr"]) &&
            preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ!-_@#.$%\/ ]+$/', $item["pass2"]) &&
            preg_match("/^[0-9]+$/",$item["UsuRol"])){

                
                $Datosalta = array(
            "usuario_datos_nombre" => $item["Nusu"],
            "usuario_datos_email" => $item["UsuMail"],
            "usuario_acceso_username" => $item["usuNombr"],
            "usuario_acceso_password" => crypt($item["pass2"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$'),
            "usuario_acceso_nivel"=>$item["UsuRol"],
            "usuario_acceso_token" => "",
            "usuario_ultimo_acceso" => "0000-00-00 00:00:00.0000",
            "usuario_inserto" => $item["uActual"],
            "usuario_fecha_alta" => $fechaActual );
            $respuesta = VerificadoresMDL::mdlConfigAltausu($tabla,$Datosalta);
            return $respuesta;
            
            }//fin if pregmatchs
            else{
                return "errorpm";
            }

        $respuesta = VerificadoresMDL::mdlConfigAltausu($tabla, $item);
           // echo var_dump($respuesta);
        return $respuesta;

        }

}