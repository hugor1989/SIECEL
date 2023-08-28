<?php

require_once "conexion.php";

class ModeloTransporte{

	
	/*=============================================
	MOSTRAR MedioTransporte
	=============================================*/

	static public function mdlMostrarMedioTransporte($tabla, $item, $valor){

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
	MOSTRAR Linea Transportista
	=============================================*/

	static public function mdlMostrarLineaTransportista($tabla, $item, $valor){

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
	MOSTRAR Recorrigo
	=============================================*/

	static public function mdlMostrarRecorrido($tabla, $item, $valor){

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
	MOSTRAR Tipo de Vehiculo
	=============================================*/

	static public function mdlMostrarTipoVehiculo($tabla, $item, $valor){

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
	REGISTRO DE MedioTransporte
	=============================================*/

	static public function mdlIngresarMedioTransporte($tabla, $datos){

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
	REGISTRO DE Linea Transportista
	=============================================*/

	static public function mdlIngresarLineaTransportista($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(Clave, Descripcion, Transporte) VALUES (:Clave, :Descripcion, :Transporte)");
		
		//Crear la clave automatica del perfil
		$clave = substr($datos["descripcion"], -2); 
		
		
		$stmt->bindParam(":Descripcion", $datos["descripcion"]);
		$stmt->bindParam(":Clave", $clave);
		$stmt->bindParam(":Transporte", $datos["transporte"]);
		

		if($stmt->execute()){

			return "ok";	

		}else{

			return "error";
		
		}

		$stmt->close();
		
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
	REGISTRO DE TipoVehiculo
	=============================================*/

	static public function mdlIngresarTipoVehiculo($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(Clave, Descripcion, Recorrido, Linea_Transporte) VALUES (:Clave, :Descripcion, :Recorrido, :Linea_Transporte)");
		
		//Crear la clave automatica del perfil
		$clave = substr($datos["descripcion"], -2); 
		
		
		$stmt->bindParam(":Descripcion", $datos["descripcion"]);
		$stmt->bindParam(":Clave", $clave);
		$stmt->bindParam(":Recorrido", $datos["recorrido"]);
		$stmt->bindParam(":Linea_Transporte", $datos["linea"]);
		
		if($stmt->execute()){

			return "ok";	

		}else{

			return "error";
		
		}

		$stmt->close();
		
		$stmt = null;

	}
	/*=============================================
	EDITAR GIRO
	=============================================*/

	static public function mdlEditarGiro($tabla, $datos){
	
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
	EDITAR MERCANCIA
	=============================================*/

	static public function mdlEditarMercancia($tabla, $datos){
	
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET Descripcion = :Descripcion, Giro = :Giro, Peligrosidad = :Peligrosidad, Valor_Aseguradora = :Valor_Aseguradora, Valor_Apar = :Valor_Apar  WHERE Id = :Id");

		$stmt -> bindParam(":Descripcion", $datos["descripcion"]);
		$stmt -> bindParam(":Giro", $datos["giro"]);
		$stmt -> bindParam(":Peligrosidad", $datos["peligrosidad"]);
		$stmt -> bindParam(":Valor_Aseguradora", $datos["valora"]);
		$stmt -> bindParam(":Valor_Apar", $datos["valorap"]);
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
	ACTUALIZAR GIRO
	=============================================*/

	static public function mdlActualizarGiro($tabla, $item1, $valor1, $item2, $valor2){

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
	/*=============================================
	ACTUALIZAR mercancia
	=============================================*/

	static public function mdlActualizarMercancia($tabla, $item1, $valor1, $item2, $valor2){

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