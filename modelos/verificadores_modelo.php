<?php

require_once "conexion.php";

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

			$stmt->bindParam(":municipio_verificador", $Datosalta["municipio_verificador"], PDO::PARAM_STR);
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
						//insercion en contenido publico para permisos de visuaizacion de url//
								if ($stmt->execute()) {
									$stmt2 = Conexion::conectar()->prepare("INSERT INTO verificadores.contenido_publico_verificadores
									(contenido_publico_ver, 
									creo_publico_ver, 
									fecha_creacio_ver, 
									estado_contenido_ver,
									token_verif_cont)
									
									VALUES(:contenido_publico_ver,
									:creo_publico_ver, 
									:fecha_creacio_ver, 
									1,
									:token_verif_cont)");
									$stmt2->bindParam(":contenido_publico_ver", $Datosalta["url_verificador"], PDO::PARAM_STR);
									$stmt2->bindParam(":creo_publico_ver", $Datosalta["creo_verificador"], PDO::PARAM_STR);
									$stmt2->bindParam(":fecha_creacio_ver", $Datosalta["alta_verificador"], PDO::PARAM_STR);
									$stmt2->bindParam(":token_verif_cont", $Datosalta["token_verificador"], PDO::PARAM_STR);
									
									if($stmt2->execute()){
										return "OK";
									}else{
										print_r($stmt->errorInfo());
									}
						// Fin insercion en permisos de url y contenido publico
				
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

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla where estado_verificador = 1");
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
					$data[$c]["Alta"] = $fila["alta_verificador"];
					$data[$c]["Acciones"] = "<div class='btn-group'><button type='button' class='btn btn-primary waves-effect waves-light btn-sm btn-DetalleVerif' data-toggle='modal' data-target='.detallemodal' id_verifdet='" . $fila["token_verificador"] . "'><i class='bi search'></i><span>Detalle</span></button> &emsp; <button type='button' class='btn btn-warning waves-effect waves-light btn-sm btn-UpdUsu' data-toggle='modal' data-target='.modifica_verificdor' id_verifupd='" . $fila["token_verificador"] . "'><i class='fas fa-edit m-r-5'></i><span>Editar</span></button> &emsp;<button type='button' class='btn btn-danger waves-effect waves-light btn-sm btn-eliminarVerificador' id_verifelimina='" . $fila["token_verificador"] . "'><i class='fa fa-trash m-r-5'></i> <span> Eliminar</span></button></div>";
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

	static public function mdlListarUrlsverif($tabla)
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
					/********************************************************************* */
					if($fila["estado_contenido_ver"]==0){
						$botonestado="<button type='button' class='btn btn-success waves-effect waves-light btn-sm btn-habilitaurl' tokenhabUrl='" . $fila["token_verificador"] . "'><i class='fa fa-trash m-r-5'></i> <span> Activar</span></button></div>";
					}
					else{
						$botonestado="<button type='button' class='btn btn-danger waves-effect waves-light btn-sm btn-deshabilitaurl' tokendeshUrl='" . $fila["token_verificador"] . "'><i class='fa fa-trash m-r-5'></i> <span> Desactivar</span></button></div>";
					}

					/********************************************************************** */
					$data[$c]["Acciones"] = "<div class='btn-group'><button type='button' class='btn btn-primary waves-effect waves-light btn-sm btn-DetalleUrl' data-toggle='modal' data-target='.modalDetalleUrl' tokenUrl='" . $fila["token_verificador"] . "'><i class='fa fa-search-plus m-r-5'></i><span>Detalle</span></button> &emsp;".$botonestado;
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
                ACTUALIZAR VERIFICADOR
    ==========================================*/

	static public function mdlUPDVerificador($tabla,$Datosalta)
	{
		/*echo var_dump($tabla);
		echo "<br>";
		echo var_dump($Datosalta);*/
		if ($Datosalta != null) {

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla
			
			 SET municipio_verificador=:municipio_verificador, 
			 unidad_eco_verificador=:unidad_eco_verificador, 
			 tel_titular_ue_verificador=:tel_titular_ue_verificador, 
			 tel_contraloria_verificador=:tel_contraloria_verificador, 
			 nombre_completo_verificador=:nombre_completo_verificador, 
			 ruta_imagen_verificador=:ruta_imagen_verificador, 
			 ultima_mod_verificador=current_timestamp(), 
			 modifico_verificador=:modifico_verificador, 
			 titularue_verificadores= :titularue_verificadores
              WHERE  token_verificador = :token_verificador");

				$stmt->bindParam(":municipio_verificador", $Datosalta["municipio_verificador"], PDO::PARAM_STR);
				$stmt->bindParam(":unidad_eco_verificador", $Datosalta["unidad_eco_verificador"], PDO::PARAM_STR);
				$stmt->bindParam(":tel_titular_ue_verificador", $Datosalta["tel_titular_ue_verificador"], PDO::PARAM_STR);
				$stmt->bindParam(":tel_contraloria_verificador", $Datosalta["tel_contraloria_verificador"], PDO::PARAM_STR);
				$stmt->bindParam(":nombre_completo_verificador", $Datosalta["nombre_completo_verificador"], PDO::PARAM_STR);
				$stmt->bindParam(":ruta_imagen_verificador", $Datosalta["ruta_imagen_verificador"], PDO::PARAM_STR);
				$stmt->bindParam(":modifico_verificador", $Datosalta["modifico_verificador"], PDO::PARAM_STR);
				$stmt->bindParam(":titularue_verificadores", $Datosalta["titularue_verificadores"], PDO::PARAM_STR);
				$stmt->bindParam(":token_verificador", $Datosalta["token_verificador"], PDO::PARAM_STR);

				if ($stmt->execute()) {
					return"OKUPD";

				}else{
					print_r($stmt->errorInfo());
					}


		}


		
	}


	/*=========================================
                ACTUALIZAR VERIFICADOR
    ==========================================*/

	static public function mdlEliminaVerificador($tabla,$item,$valor)
	{
		/*echo var_dump($tabla);
		echo "<br>";
		echo var_dump($Datosalta);*/
		if ($valor != null) {

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla
			 SET ultima_mod_verificador=current_timestamp(), 
			 modifico_verificador=:modifico_verificador, 
			 estado_verificador= 0
            
			WHERE  $item = :token_verificador");

				$stmt->bindParam(":modifico_verificador", $valor["idusuact"], PDO::PARAM_STR);
				$stmt->bindParam(":token_verificador", $valor["idVerDel"], PDO::PARAM_STR);

				if ($stmt->execute()) {

								/* URL X B DE VER */
								$stmt2 = Conexion::conectar()->prepare("UPDATE contenido_publico_verificadores
								SET								
								estado_contenido_ver = 0
							   
							   WHERE  token_verif_cont = :token_verificador");
				   				    $stmt2->bindParam(":token_verificador", $valor["idVerDel"], PDO::PARAM_STR);
				   
								   if ($stmt2->execute()) {

									return"OKDEL";

														}else{
														print_r($stmt2->errorInfo());
															}
								/*FIN URL X B DE VER */


					return"OKDEL";

				}else{
					print_r($stmt->errorInfo());
					}


		}


		
	}

/*=========================================
                ACTUALIZAR VERIFICADOR URLs
    ==========================================*/

	static public function mdlEliminaUrl($tabla,$item,$valor)
	{
		/*echo var_dump($tabla);
		echo "<br>";
		echo var_dump($Datosalta);*/
		if ($valor != null) {

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla
			 SET estado_contenido_ver = 0
			WHERE  $item = :token_verificador");
				$stmt->bindParam(":token_verificador", $valor["idVerurl"], PDO::PARAM_STR);

				if ($stmt->execute()) {

								return"OKDELURL";

				}else{
					print_r($stmt->errorInfo());
					}


		}


		
	}


/*=========================================
                ACTUALIZAR VERIFICADOR URLs
    ==========================================*/

	static public function mdlHabilitaUrl($tabla,$item,$valor)
	{
		/*echo var_dump($tabla);
		echo "<br>";
		echo var_dump($Datosalta);*/
		if ($valor != null) {

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla
			 SET estado_contenido_ver = 1
			WHERE  $item = :token_verificador");
				$stmt->bindParam(":token_verificador", $valor["idVerurlhab"], PDO::PARAM_STR);

				if ($stmt->execute()) {

								return"OKHABURL";

				}else{
					print_r($stmt->errorInfo());
					}


		}


		
	}

	/*=========================================
                MOSTRAR USUARIOS
    ==========================================*/

	static public function mdlNombresGraph($tabla, $datos)
	{
  $nombres="";
		if ($datos != null) {

			$stmt = Conexion::conectar()->prepare("SELECT nombre_completo_verificador
			FROM $tabla");
						

						if($stmt->execute()){
							while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
							// Esto crea un string como 'id1','id2','id3',
							
								$nombres .= ''.$fila['nombre_completo_verificador'] . ', ';
							}
							$nombres  = substr($nombres,0,-2);
			//$nombres .="]";
			return $nombres;
		} else {
			
		}

		$stmt = null;
	}


 }

 static public function mdlValoresGraph($tabla, $datos)
	{
  $nombres="";
		if ($datos != null) {

			$stmt = Conexion::conectar()->prepare("SELECT conteo_vistas_verificador
			FROM $tabla");
						

						if($stmt->execute()){
							while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
							// Esto crea un string como 'id1','id2','id3',
							
								$nombres .= ''.$fila['conteo_vistas_verificador'] . ', ';
							}
							$nombres  = substr($nombres,0,-2);
			//$nombres .="]";
			return $nombres;
		} else {
			
		}

		$stmt = null;
	}


 }

 	 /*********************************************************************** */
   /****************************Actualiza pills********************* */
   /*********************************************************************** */

   public static function mdlUpdpills($tabla)
   {
       if ($tabla!= null) {

       $stmt = Conexion::conectar()->prepare("SELECT
   Sum(Case When estado_verificador= 1 Then 1 Else 0 End) As 'Activos',
  Sum(Case When estado_verificador= 0 Then 1 Else 0 End) As 'inactivos',
  Sum((Case When estado_verificador = 1 Then 1 Else 0 End)+(Case When estado_verificador= 0 Then 1 Else 0 End))AS 'Total'
From $tabla
 
       ");
            if($stmt->execute()){

                return $stmt->fetch();
            }else{
                print_r($stmt->errorInfo());

                
                $stmt = null;
            }

           

        } else {
            //$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
            //$stmt->execute();
         echo"UPS";
            //return $stmt->fetchAll();

        }

        
        $stmt = null;
   }
}
