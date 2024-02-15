<?PHP
ini_set('display_errors',1);  error_reporting(E_ALL);
//session_start();
class Verficadores
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
    
    static function ctrListarVerificadores($item){

        $tabla = "verificadores_tbl";

        $respuesta = VerificadoresMDL::mdlListarVerifcicadores($tabla);
           // echo var_dump($respuesta);
        return $respuesta;

        }

/*******************************************/
    /*************FUNCIÓN LISTAR URLS*******/
    /*******************************************/

        static function ctrListarUrls($item){

            $tabla = "verificadores_tbl";
    
            $respuesta = VerificadoresMDL::mdlListarUrls($tabla);
               // echo var_dump($respuesta);
            return $respuesta;
    
            }
    


    /*******************************************/
    /*************FUNCIÓN ALTA DE USUARIO*******/
    /*******************************************/
    
    static function ctrConfigAltaVerificador($item){
        //echo variables de ocntrol//
        //echo var_dump($item);
        /////////////////////////////
        $raiz= $_SERVER['DOCUMENT_ROOT'];
        $token_verif = uniqid();
        date_default_timezone_set('America/Mexico_City');

                    $fecha = date('Y-m-d');
                    $hora = date('H:i:s');
                    $fechaActual = $fecha. ' ' .$hora;
                    require_once "../controladores/ruta_controlador.php";
                    $ruta = ControladorRuta::ctrRuta();
        $tabla = "verificadores_tbl";
        if(
            preg_match("/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ!-_@#.$%\/ ]+$/",$item["usuact"]) &&
            preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ!-_@#.$%\/ ]+$/', $item["mpioverif"]) &&
            preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ!-_@#.$%\/ ]+$/', $item["altaUE"]) &&
            preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ!-_@#.$%\/ ]+$/', $item["altatitularUE"]) &&
            preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ!-_@#.$%\/ ]+$/', $item["altatelua"]) &&
            preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ!-_@#.$%\/ ]+$/', $item["altatelcontr"]) &&
            preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ!-_@#.$%\/ ]+$/', $item["nombverif"]) ){

                /*verifivcacion del adjunto del gafete*/
                 
            $nombreAdjunto = $_FILES["gafverif"]["name"];
            date_default_timezone_set('America/Mexico_City');
            $DateAndTime = date("His"); 
            $nombreAdjunto= $DateAndTime."-".$nombreAdjunto;
            $tamanoTurnoAdjunto = $_FILES["gafverif"]["size"];
           
           

            $directorio = $raiz.'/verificadores/vistas/assets/uploads/verif'.$token_verif.'/';
            if (!file_exists($directorio)) {
               //echo $directorio;
               
                 mkdir($directorio, 0755, true);
               }
            //Valida el PDF ///
            $rutacompleta= $raiz.'/verificadores/vistas/assets/uploads/verif'.$token_verif.'/'.$nombreAdjunto;
            $allowed =  array('png','jpeg' ,'jpg');
            $filename = $_FILES['gafverif']['name'];
            $ext = pathinfo($filename, PATHINFO_EXTENSION);
            $tamanoTurnoAdjunto = $_FILES["gafverif"]["size"];
            if(!in_array($ext,$allowed) ) {
                return 'error';
            }

            elseif (isset($_FILES["gafverif"]["tmp_name"]) && !empty($_FILES["gafverif"]["tmp_name"])){
               move_uploaded_file($_FILES["gafverif"]["tmp_name"], $directorio.$nombreAdjunto);
                        /*fin verificacion pdf */
                    /*Arma ruta de verificador web*/
                    $qrcompleto = $token_verif;
                    $PNG_TEMP_DIR = $raiz.'/verificadores/vistas/assets/uploads/verif'.$token_verif.'/';
                    require_once "../extensiones/QR/qrlib.php";
                    $errorCorrectionLevel = 'L';
                    $matrixPointSize = 4 ;
                    $filename = $PNG_TEMP_DIR.$qrcompleto.'.png';
                    $rutaqrurl=@$ruta.'public/index.php?token='.$qrcompleto;
                    QRcode::png((@$ruta.'public/index.php?token='.$qrcompleto) , $filename, $errorCorrectionLevel, $matrixPointSize, 4);



                    /*Fin ruta QR */


                    $Datosalta = array(
                    "municipio_verificador" => $item["mpioverif"],
                    "unidad_eco_verificador" => $item["altaUE"],
                    "titularue_verificadores" => $item["altatitularUE"],
                    "tel_titular_ue_verificador" => $item["altatelua"],
                    "tel_contraloria_verificador"=>$item["altatelcontr"],
                    "nombre_completo_verificador" => $item["nombverif"],
                    "ruta_imagen_verificador" => $rutacompleta,
                    "estado_verificador" => '1',
                    "token_verificador" => $token_verif,
                    "ruta_qr_verificador" => $filename,
                    "url_verificador" => $rutaqrurl,
                    "alta_verificador" => $fechaActual,
                    "creo_verificador" => $item["usuact"],
                    "modifico_verificador" => 0,
                    "conteo_vistas_verificador" => 0
                    );
                    
                 $respuesta = VerificadoresMDL::mdlConfigAltausu($tabla,$Datosalta);
                // return $respuesta;
                }
           
            
            }//fin if pregmatchs
            else{
                return "errorpm";
            }

        $respuesta = VerificadoresMDL::mdlConfigAltausu($tabla, $item);
           // echo var_dump($respuesta);
        return $respuesta;

        }

        

}