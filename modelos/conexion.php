<?php

Class Conexion{

	static public function conectar(){

		$conexion = new PDO("mysql:host=localhost;dbname=verificadores",
						"root",
						"S15t3m@5");

		$conexion->exec("set names utf8");

		return $conexion;

	}


}