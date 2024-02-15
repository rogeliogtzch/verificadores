<?php

require_once "p_conexion.php";

class VerificadorDetalleMDL
{

	/*=========================================
                MOSTRAR USUARIOS
    ==========================================*/

	static public function mdlDetalleVerif($tabla, $item, $valor)
	{

		if ($valor != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
			$stmt->bindParam(":" . $item, $valor["idVerDet"], PDO::PARAM_STR);
			$stmt->execute();
			return $stmt->fetch();
		} else {
			return "NODET";
		}

		$stmt = null;
	}
}