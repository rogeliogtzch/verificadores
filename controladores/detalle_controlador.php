<?PHP
ini_set('display_errors',1);  error_reporting(E_ALL);
//session_start();
class DetalleVerif
{

    /*******************************************/
    /*************FUNCIÓN DETALLE VERIFICADOR***/
    /*******************************************/
    
    static function ctrDetalleVerificador($dato){
        //echo var_dump($dato);
        $tabla = "verificadores_tbl";
        $item = "token_verificador";
        $valor= $dato;

        $respuesta = VerificadorDetalleMDL::mdlDetalleVerif($tabla, $item,$valor);
        //echo var_dump($respuesta);
        if($respuesta==null){
            return"NODET";
        }else{
        return $respuesta;
             }
        }


}