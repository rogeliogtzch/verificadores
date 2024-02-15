<?PHP
ini_set('display_errors',1);  error_reporting(E_ALL);
//session_start();
class UPDVerif
{

    /*******************************************/
    /*************FUNCIÓN DETALLE VERIFICADOR***/
    /*******************************************/
    
    static function ctrUPDdetalleVerificador($dato){

        $tabla = "verificadores_tbl";
        $item = "token_verificador";
        $valor= $dato;
      

        $respuesta = VerificadorDetalleMDL::mdlDetalleVerif($tabla, $item,$valor);
        //echo var_dump($dato);
        if($respuesta==null){
            return"NODET";
        }else{
        return $respuesta;
             }
        }

    /*******************************************/
    /********FUNCIÓN Porocesa VERIFICADOR UPD***/
    /*******************************************/

    static function ProcesaUpdVerificador($datos){
        //echo var_dump($datos);

        $raiz= $_SERVER['DOCUMENT_ROOT'];
        $token_verif = $datos['tokenverupd'];
        date_default_timezone_set('America/Mexico_City');

                    $fecha = date('Y-m-d');
                    $hora = date('H:i:s');
                    $fechaActualUPD = $fecha. ' ' .$hora;
                    require_once "../controladores/ruta_controlador.php";
                    $ruta = ControladorRuta::ctrRuta();
        $tabla = "verificadores_tbl";
        if(
            preg_match("/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ!-_@#.$%\/ ]+$/",$datos["usuact"]) &&
            preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ!-_@#.$%\/ ]+$/', $datos["mpioverifupd"]) &&
            preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ!-_@#.$%\/ ]+$/', $datos["altaUEupd"]) &&
            preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ!-_@#.$%\/ ]+$/', $datos["altatitularUEupd"]) &&
            preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ!-_@#.$%\/ ]+$/', $datos["altateluaupd"]) &&
            preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ!-_@#.$%\/ ]+$/', $datos["altatelcontrupd"]) &&
            preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ!-_@#.$%\/ ]+$/', $datos["nombverifupd"])&&
            preg_match('/^[a-zA-Z0-9]+$/', $datos["tokenverupd"])){

                /*verifivcacion del adjunto del gafete*/
                 
            $nombreAdjunto = $_FILES["gafverifupd"]["name"];
            date_default_timezone_set('America/Mexico_City');
            $DateAndTime = date("His"); 
            $nombreAdjunto= $DateAndTime."-".$nombreAdjunto;
            $tamanoTurnoAdjunto = $_FILES["gafverifupd"]["size"];
            $fecha_url = $nombreAdjunto;
           

            $directorio = $raiz.'/verificadores/vistas/assets/uploads/verif'.$token_verif.'/';
            if (!file_exists($directorio)) {
               //echo $directorio;
               
                 mkdir($directorio, 0755, true);
               }
            //Valida el PDF ///
            $rutacompleta= $raiz.'/verificadores/vistas/assets/uploads/verif'.$token_verif.'/'.$nombreAdjunto;
            $rutaimgverif ='./vistas/assets/uploads/verif'.$token_verif.'/'.$nombreAdjunto;
            $allowed =  array('png','jpeg' ,'jpg');
            $filename = $_FILES['gafverifupd']['name'];
            $ext = pathinfo($filename, PATHINFO_EXTENSION);
            $tamanoTurnoAdjunto = $_FILES["gafverifupd"]["size"];
            if(!in_array($ext,$allowed) ) {
                return 'error';
            }

            elseif (isset($_FILES["gafverifupd"]["tmp_name"]) && !empty($_FILES["gafverifupd"]["tmp_name"])){
               move_uploaded_file($_FILES["gafverifupd"]["tmp_name"], $directorio.$nombreAdjunto);
                        /*fin verificacion pdf */
                    $Datosalta = array(
                    "municipio_verificador" => $datos["mpioverifupd"],
                    "unidad_eco_verificador" => $datos["altaUEupd"],
                    "titularue_verificadores" => $datos["altatitularUEupd"],
                    "tel_titular_ue_verificador" => $datos["altateluaupd"],
                    "tel_contraloria_verificador"=>$datos["altatelcontrupd"],
                    "nombre_completo_verificador" => $datos["nombverifupd"],
                    "ruta_imagen_verificador" => $rutaimgverif,
                    "token_verificador" => $token_verif,
                    "ultima_mod_verificador" => $fechaActualUPD,
                    "modifico_verificador" => $datos["usuact"],
                    "conteo_vistas_verificador" => 0,
                    "fecha_creacion" => $fechaActualUPD
                    );
                    
                 $respuesta = VerificadoresMDL::mdlUPDVerificador($tabla,$Datosalta);
                 return $respuesta;
                }
           
            
            }//fin if pregmatchs
            else{
                return "errorpm";
            }

    }


}