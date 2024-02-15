<?php
require_once "../controladores/Upd_controlador.php";
require_once "../modelos/detalle_modelo.php";
require_once "../modelos/verificadores_modelo.php";
class DetalleUpd
{
    public $detalleupd;
    public $datosupd;
    
    /*******************************************/
    /*******************FUNCIÓN Detalle UPD*****/
    /*******************************************/
    static function DetalleVerifUPD($detalleupd)
    {
        
        $valor1 = $detalleupd;
        $respuesta= UPDVerif::ctrUPDdetalleVerificador($valor1);

      echo json_encode($respuesta);
    }

    /*******************************************/
    /*******************FUNCIÓN PROCESA UPD*****/
    /*******************************************/
    static function ProcVerifUPD($datosupd)
    {
        
        $valor1 = $datosupd;
        $respuesta= UPDVerif::ProcesaUpdVerificador($valor1);
        echo json_encode($respuesta);

    }

    
}
/*////////////////////VALIDACION POST AJAX//////////////////////////////////*/
                

        if (isset($_POST["idVerDet"])) {

if ($_POST["idVerDet"] ==null) {
    echo 'vacio';   
                                            }  else{
            $usuario = new DetalleUpd();
            $detalleupd = $_POST;
            $usuario -> DetalleVerifUPD($detalleupd);
                                            }
        }                


/*////////////////////VALIDACION POST UPD AJAX//////////////////////////////////*/
                

if (isset($_POST["tokenverupd"])) {

              $datosupdproc = new DetalleUpd();
              $datosupd = $_POST;
              $datosupdproc -> ProcVerifUPD($datosupd);
                                              
          }                