<?php
//ini_set('display_errors',1);  error_reporting(E_ALL);
require_once "conexion.php";

class LoginUsuarios
{

    /***************************** */
    /*    Modelo de inicio de sesion*/
    /****************************** */ 
    public static function mdlLogin($tabla, $item, $valor)
    {
        if ($item != null && $valor != null) {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item AND usu_ver_estado = 1 ");
            $stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);
           if ($stmt->execute()){
                return $stmt->fetch(); }
                else{
                    print_r($stmt->errorInfo());
                }
        } else {
              
            return "error";
            $item = null;
        }
    }

    /***************************** */
    /*Modelo Recuperacion de password*/
    /****************************** */ 
    public static function mdlRecpawwsd($tabla, $item, $valor)
    {
        if ($item != null && $valor != null) {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item AND usuario_estado = 1 ");
            $stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);
            $stmt->execute();

            return $stmt->fetch(); 
        } else {
            return "error";
            $item = null;
        }
    }

     /*=============================================
	               ASIGNAR TOKEN
    =============================================*/
    
	static public function mdlAsignarToken($tabla, $datos){

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET usuario_token = :token WHERE usuario_email = :usuario_email");
        
		$stmt->bindParam(":token", $datos["token"], PDO::PARAM_STR);
		$stmt->bindParam(":usuario_email", $datos["usuario_email"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

	
		$stmt = null;

	}

}
