<?php

require_once "p_conexion.php";

class VerificadoresMDL
{

	/*=========================================
                MOSTRAR USUARIOS
    ==========================================*/

	static public function mdlDetalleUsu($tabla, $item, $datos)
	{

		if ($datos != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
			$stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
			$stmt->execute();
			return $stmt->fetch();
		} else {
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
			$stmt->execute();
			return $stmt->fetchAll();
		}

		$stmt = null;
	}

	/*=========================================
                ALTA DE USUARIOS
    ==========================================*/

	static public function mdlConfigAltausu($tabla, $Datosalta)
	{
		//echo var_dump($Datosalta);
		if ($Datosalta != null) {

			$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla
			(municipio_verificador, unidad_eco_verificador, tel_titular_ue_verificador, 
			tel_contraloria_verificador, nombre_completo_verificador, ruta_imagen_verificador, 
			estado_verificador, token_verificador, ruta_qr_verificador, url_verificador, 
			alta_verificador, creo_verificador, ultima_mod_verificador, modifico_verificador, 
			conteo_vistas_verificador, titularue_verificadores)
			VALUES(:municipio_verificador, 
			:unidad_eco_verificador, 
			:tel_titular_ue_verificador, 
			:tel_contraloria_verificador, 
			:nombre_completo_verificador, 
			:ruta_imagen_verificador, 
			:estado_verificador, 
			:token_verificador, 
			:ruta_qr_verificador, 
			:url_verificador, 
			:alta_verificador, 
			:creo_verificador, 
			current_timestamp(),
			:modifico_verificador,
			0,
			:titularue_verificadores)");

			$stmt->bindParam(":municipio_verificador", $Datosalta["municipio_verificador"], PDO::PARAM_INT);
			$stmt->bindParam(":unidad_eco_verificador", $Datosalta["unidad_eco_verificador"], PDO::PARAM_STR);
			$stmt->bindParam(":tel_titular_ue_verificador", $Datosalta["tel_titular_ue_verificador"], PDO::PARAM_STR);
			$stmt->bindParam(":tel_contraloria_verificador", $Datosalta["tel_contraloria_verificador"], PDO::PARAM_STR);
			$stmt->bindParam(":nombre_completo_verificador", $Datosalta["nombre_completo_verificador"], PDO::PARAM_STR);
			$stmt->bindParam(":ruta_imagen_verificador", $Datosalta["ruta_imagen_verificador"], PDO::PARAM_STR);
			$stmt->bindParam(":estado_verificador", $Datosalta["estado_verificador"], PDO::PARAM_STR);
			$stmt->bindParam(":token_verificador", $Datosalta["token_verificador"], PDO::PARAM_STR);
			$stmt->bindParam(":ruta_qr_verificador", $Datosalta["ruta_qr_verificador"], PDO::PARAM_STR);
			$stmt->bindParam(":url_verificador", $Datosalta["url_verificador"], PDO::PARAM_STR);
			$stmt->bindParam(":alta_verificador", $Datosalta["alta_verificador"], PDO::PARAM_STR);
			$stmt->bindParam(":creo_verificador", $Datosalta["creo_verificador"], PDO::PARAM_STR);
			$stmt->bindParam(":modifico_verificador", $Datosalta["modifico_verificador"], PDO::PARAM_STR);
			$stmt->bindParam(":titularue_verificadores", $Datosalta["titularue_verificadores"], PDO::PARAM_STR);

			if ($stmt->execute()) {
				return "OK";
			} else {
				print_r($stmt->errorInfo());
			}
		} else {
			return "Datos vacios";
		}

		$stmt = null;
	}


	/*=========================================
                MOSTRAR USUARIOS
    ==========================================*/

	static public function mdlListarVerifcicadores($tabla)
	{

		if ($tabla != null) {

			$stmt = Conexion::conectar()->prepare("SELECT   `verificadores_tbl`.`municipio_verificador`,
			`verificadores_tbl`.`unidad_eco_verificador`,
			`verificadores_tbl`.`tel_titular_ue_verificador`,
			`verificadores_tbl`.`tel_contraloria_verificador`,
			`verificadores_tbl`.`nombre_completo_verificador`,
			`verificadores_tbl`.`ruta_imagen_verificador`,
			`verificadores_tbl`.`estado_verificador`,
			`contenido_publico_verificadores`.`estado_contenido_ver`,
			`verificadores_tbl`.`token_verificador`,
			`contenido_publico_verificadores`.`token_verif_cont`,
			`verificadores_tbl`.`ruta_qr_verificador`,
			`verificadores_tbl`.`url_verificador`,
			`verificadores_tbl`.`titularue_verificadores`
   FROM     `contenido_publico_verificadores` 
   INNER JOIN `verificadores_tbl`  ON `contenido_publico_verificadores`.`token_verif_cont` = `verificadores_tbl`.`token_verificador` 
      where estado_verificador = 1 and estado_contenido_ver =1");
			//			$stmt -> bindParam(":".$item,$valor, PDO::PARAM_STR);
			/*      Aqui va la respuesta side server de datatatbles      */
			if ($stmt->execute()) {

				$c = 0;
				while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
					$data[$c]["#"] = $c + 1;
					$data[$c]["Municipio"] = $fila["municipio_verificador"];
					$data[$c]["Unidad Economica"] = $fila["unidad_eco_verificador"];
					$data[$c]["Telefono titular Unidad E"] = $fila["tel_titular_ue_verificador"];
					$data[$c]["Telefono Quejas y Denuncias"] = $fila["tel_contraloria_verificador"];
					$data[$c]["Nombre Verificador"] = $fila["nombre_completo_verificador"];
					$data[$c]["Url Verificador"] = $fila["url_verificador"];
					$data[$c]["Acciones"] = "<div class='btn-group'><button type='button' class='btn btn-primary waves-effect waves-light btn-sm btn-DetalleVerifpublic' data-toggle='modal' data-target='.modalDetalleUsu' idUsuario='" . $fila["token_verificador"] . "'><i class='fa fa-search-plus m-r-5'></i><span>Detalle</span></button> </div>";
					$c++;
				}

				$results = [
					"sEcho" => 1,
					"iTotalRecords" => count($data),
					"iTotalDisplayRecords" => count($data),
					"aaData" => $data
				];


				return $results;
			} else {
				print_r($stmt->errorInfo());


				$stmt = null;
			}
			/*      fin de la construccion de la respuesta               */
		} else {
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
			$stmt->execute();
			return $stmt->fetchAll();
		}

		$stmt = null;
	}

	/*=========================================
                MOSTRAR USUARIOS
    ==========================================*/

	static public function mdlListarUrls($tabla)
	{

		if ($tabla != null) {

			$stmt = Conexion::conectar()->prepare("SELECT   `verificadores_tbl`.`municipio_verificador`,
			`verificadores_tbl`.`unidad_eco_verificador`,
			`verificadores_tbl`.`tel_titular_ue_verificador`,
			`verificadores_tbl`.`tel_contraloria_verificador`,
			`verificadores_tbl`.`nombre_completo_verificador`,
			`verificadores_tbl`.`ruta_imagen_verificador`,
			`verificadores_tbl`.`estado_verificador`,
			`contenido_publico_verificadores`.`estado_contenido_ver`,
			`verificadores_tbl`.`token_verificador`,
			`contenido_publico_verificadores`.`token_verif_cont`,
			`verificadores_tbl`.`ruta_qr_verificador`,
			`verificadores_tbl`.`url_verificador`,
			`verificadores_tbl`.`titularue_verificadores`
   FROM     `contenido_publico_verificadores` 
   INNER JOIN `verificadores_tbl`  ON `contenido_publico_verificadores`.`token_verif_cont` = `verificadores_tbl`.`token_verificador` 
      where estado_verificador = 1");
			//			$stmt -> bindParam(":".$item,$valor, PDO::PARAM_STR);
			/*      Aqui va la respuesta side server de datatatbles      */
			if ($stmt->execute()) {

				$c = 0;
				while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
					$data[$c]["#"] = $c + 1;
					$data[$c]["url de verifiación"] = $fila["url_verificador"];
					$data[$c]["Nombre del Verificador/Inspector"] = $fila["nombre_completo_verificador"];
					$data[$c]["Acciones"] = "<div class='btn-group'><button type='button' class='btn btn-info waves-effect waves-light btn-sm btn-DetalleUsu' data-toggle='modal' data-target='.modalDetalleUsu' idUsuario='" . $fila["token_verificador"] . "'><i class='fa fa-search-plus m-r-5'></i><span>Detalle</span></button> &emsp; <button type='button' class='btn btn-primary waves-effect waves-light btn-sm btn-UpdUsu' data-toggle='modal' data-target='.modalupd' idUsuario='" . $fila["token_verificador"] . "'><i class='fas fa-edit m-r-5'></i><span>Editar</span></button> &emsp;<button type='button' class='btn btn-danger waves-effect waves-light btn-sm btn-eliminarCapturaPeticion' idUsuario='" . $fila["token_verificador"] . "'><i class='fa fa-trash m-r-5'></i> <span> Eliminar</span></button></div>
					<input class='form-check-input' type='checkbox' id='flexSwitchCheckChecked' checked=''>";
					$c++;
				}

				$results = [
					"sEcho" => 1,
					"iTotalRecords" => count($data),
					"iTotalDisplayRecords" => count($data),
					"aaData" => $data
				];


				return $results;
			} else {
				print_r($stmt->errorInfo());


				$stmt = null;
			}
			/*      fin de la construccion de la respuesta               */
		} else {
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
			$stmt->execute();
			return $stmt->fetchAll();
		}

		$stmt = null;
	}

 /*                 detalle de urlQR */
	static public function mdlDetalleVERQR($tabla, $item, $datos)
	{

		if ($datos != null) {




			$stmt2 = Conexion::conectar()->prepare("UPDATE $tabla 
			SET $tabla.conteo_vistas_verificador = $tabla.conteo_vistas_verificador+ 1 
			WHERE $item = :$item");
			$stmt2->bindParam(":" . $item, $datos, PDO::PARAM_STR);
			if($stmt2->execute()){
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
			$stmt->bindParam(":" . $item, $datos, PDO::PARAM_STR);
			$stmt->execute();
			return $stmt->fetch();
			}else{ print_r($stmt2->errorInfo());}

		} else {
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
			$stmt->execute();
			return $stmt->fetchAll();
		}

		$stmt = null;
	}
}
