<?php

Class Conexion{

	static public function conectar(){

		$conexion = new PDO("mysql:host=localhost;dbname=verificadores",
						"root",
						"Intr@n3tHXQ");

		$conexion->exec("set names utf8");

		return $conexion;

	}


}