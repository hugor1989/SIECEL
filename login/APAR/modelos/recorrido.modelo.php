<?php

require_once "conexion.php";

class ModeloRecorrido{

	/*=============================================
	MOSTRAR Recorrido
	=============================================*/

	static public function mdlMostrarRecorrido($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}
		

		$stmt -> close();

		$stmt = null;

	}
	
	/*=============================================
	REGISTRO DE Recorrido
	=============================================*/

	static public function mdlIngresarRecorrido($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(Clave, Descripcion) VALUES (:Clave, :Descripcion)");
		
		//Crear la clave automatica del perfil
		$clave = substr($datos["descripcion"], -2); 
		
		$stmt->bindParam(":Descripcion", $datos["descripcion"]);
		$stmt->bindParam(":Clave", $clave);

		if($stmt->execute()){

			return "ok";	

		}else{

			return "error";
		
		}

		$stmt->close();
		
		$stmt = null;

	}

	
	/*=============================================
	EDITAR PERFIL Recorrido
	=============================================*/

	static public function mdlEditarRecorrido($tabla, $datos){
	
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET Descripcion = :Descripcion WHERE Id = :Id");

		$stmt -> bindParam(":Descripcion", $datos["descripcion"]);
		$stmt -> bindParam(":Id", $datos["id"]);
		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}
	/*=============================================
	ACTUALIZAR Perfil
	=============================================*/

	static public function mdlActualizarRecorrido($tabla, $item1, $valor1, $item2, $valor2){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE $item2 = :$item2");

		$stmt -> bindParam(":".$item1, $valor1);
		$stmt -> bindParam(":".$item2, $valor2);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}
}