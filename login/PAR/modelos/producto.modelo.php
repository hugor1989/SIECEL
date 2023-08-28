<?php

require_once "conexion.php";

class ModeloProducto{

	
	/*=============================================
	MOSTRAR Producto
	=============================================*/

	static public function mdlMostrarProducto($tabla, $item, $valor){

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
	REGISTRO DE Producto
	=============================================*/

	static public function mdlIngresarProducto($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(Descripcion, No_obligatorio, Tipo_mercancia, Gps_basico, Gps_activacion_1, 
																  Gps_activacion_2, Cts, Custodia_electronica, Custodia_fisica, Custodia)
															VALUES (:Descripcion, :No_obligatorio, :Tipo_mercancia, :Gps_basico, :Gps_activacion_1, 
																	:Gps_activacion_2, :Cts, :Custodia_electronica, :Custodia_fisica, :Custodia)");
		
		$stmt->bindParam(":Descripcion", $datos["descripcion"]);
		$stmt->bindParam(":No_obligatorio", $datos["na"]);
		$stmt->bindParam(":Tipo_mercancia", $datos["tipomercancia"]);
		$stmt->bindParam(":Gps_basico", $datos["gpsbasico"]);
		$stmt->bindParam(":Gps_activacion_1", $datos["activacionuno"]);
		$stmt->bindParam(":Gps_activacion_2", $datos["activaciondos"]);
		$stmt->bindParam(":Cts", $datos["cts"]);
		$stmt->bindParam(":Custodia_electronica", $datos["cuelectrica"]);
		$stmt->bindParam(":Custodia_fisica", $datos["cufisica"]);
		$stmt->bindParam(":Custodia", $datos["custodia"]);

		
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

	static public function mdlEditarProducto($tabla, $datos){
	
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET Descripcion = :Descripcion, No_obligatorio = :No_obligatorio, Tipo_mercancia = :Tipo_mercancia, Gps_basico = :Gps_basico, Gps_activacion_1 = :Gps_activacion_1, Gps_activacion_2 = :Gps_activacion_2, Cts = :Cts, Custodia_electronica = :Custodia_electronica, Custodia_fisica = :Custodia_fisica, Custodia = :Custodia WHERE Id = :Id");

		$stmt->bindParam(":Descripcion", $datos["descripcion"]);
		$stmt->bindParam(":No_obligatorio", $datos["na"]);
		$stmt->bindParam(":Tipo_mercancia", $datos["tipomercancia"]);
		$stmt->bindParam(":Gps_basico", $datos["gpsbasico"]);
		$stmt->bindParam(":Gps_activacion_1", $datos["activacionuno"]);
		$stmt->bindParam(":Gps_activacion_2", $datos["activaciondos"]);
		$stmt->bindParam(":Cts", $datos["cts"]);
		$stmt->bindParam(":Custodia_electronica", $datos["cuelectrica"]);
		$stmt->bindParam(":Custodia_fisica", $datos["cufisica"]);
		$stmt->bindParam(":Custodia", $datos["custodia"]);
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
	ACTUALIZAR PRODUCTO
	=============================================*/

	static public function mdlActualizarProducto($tabla, $item1, $valor1, $item2, $valor2){

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