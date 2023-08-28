<?php

require_once "conexion.php";

class ModeloProtocolo{

	
	/*=============================================
	MOSTRAR PROTOCOLO
	=============================================*/

	static public function mdlMostrarProtocolo($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor);

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
	REGISTRO DE PROTOCOLO
	=============================================*/

	static public function mdlIngresarProtocolo($tabla, $datos){


			$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(Titulo, Descripcion) VALUES (:Titulo, :Descripcion)");
		
			$stmt->bindParam(":Titulo", $datos["titulo"]);
			$stmt->bindParam(":Descripcion", $datos["descripcion"]);
	
				
			if($stmt->execute()){
	
				return "ok";	
	
			}else{
				return "error";
			}
		
		$stmt->close();
			
		$stmt = null;
	}
	/*=============================================
	EDITAR PROTOCOLO
	=============================================*/

	static public function mdlEditarProtocolo($tabla, $datos){
	
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET Titulo = :Titulo, Descripcion = :Descripcion WHERE Id = :Id");

		$stmt -> bindParam(":Titulo", $datos["titulo"]);
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
	ACTUALIZAR PROTOCOLO
	=============================================*/

	static public function mdlActualizarProtocolo($tabla, $item1, $valor1, $item2, $valor2){

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