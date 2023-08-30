<?php

require_once "conexion.php";

class ModeloMercancia{

	
	/*=============================================
	MOSTRAR GIRO
	=============================================*/

	static public function mdlMostrarGiro($tabla, $item, $valor){

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
	MOSTRAR MERCANCIA
	=============================================*/

	static public function mdlMostrarMercancia($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ORDER BY Descripcion ASC");

			$stmt -> bindParam(":".$item, $valor);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY Descripcion ASC");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}
		

		$stmt -> close();

		$stmt = null;

	}
	/*=============================================
	REGISTRO DE GIRO
	=============================================*/

	static public function mdlIngresarGiro($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(Descripcion) VALUES (:Descripcion)");
		
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
	REGISTRO DE MERCANCIA
	=============================================*/

	static public function mdlIngresarMercancia($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(Clave, Descripcion, Giro, Peligrosidad, Valor_Aseguradora, Valor_Apar,
															      Valor_A, Valor_B, Valor_C, Valor_D, Valor_E,
																  DEDUCIBLE_ROT,DEDUCIBLE_ROBO,DEDUCIBLE_OTROS_R,DEDUCIBLE_SVT,EMBARQUE_CARRETERA_LIBRE,MARITIMO_AEREO_COMBINADO)
													 VALUES (:Clave, :Descripcion, :Giro, :Peligrosidad, :Valor_Aseguradora, :Valor_Apar,
															  :Valor_A, :Valor_B, :Valor_C, :Valor_D, :Valor_E,
															  :DEDUCIBLE_ROT, :DEDUCIBLE_ROBO, :DEDUCIBLE_OTROS_R,
															  :DEDUCIBLE_SVT, :EMBARQUE_CARRETERA_LIBRE, :MARITIMO_AEREO_COMBINADO)");
		
		//Crear la clave automatica del perfil
		$clave = substr($datos["descripcion"], -2); 
		
		$stmt->bindParam(":Descripcion", $datos["descripcion"]);
		$stmt->bindParam(":Clave", $clave);
		$stmt->bindParam(":Giro", $datos["giro"]);
		$stmt->bindParam(":Peligrosidad", $datos["peligrosidad"]);
		$stmt->bindParam(":Valor_Aseguradora", $datos["valoar_aseguradora"]);
		$stmt->bindParam(":Valor_Apar", $datos["valoar_apar"]);
		$stmt->bindParam(":Valor_A", $datos["valora"]);
		$stmt->bindParam(":Valor_B", $datos["valorb"]);
		$stmt->bindParam(":Valor_C", $datos["valorc"]);
		$stmt->bindParam(":Valor_D", $datos["valord"]);
		$stmt->bindParam(":Valor_E", $datos["valore"]);
		$stmt -> bindParam(":DEDUCIBLE_ROT", $datos["nuevoDEDUCIBLE_ROT"]);
		$stmt -> bindParam(":DEDUCIBLE_ROBO", $datos["DEDUCIBLE_ROBO"]);
		$stmt -> bindParam(":DEDUCIBLE_OTROS_R", $datos["DEDUCIBLE_OTROS_R"]);
		$stmt -> bindParam(":DEDUCIBLE_SVT", $datos["DEDUCIBLE_SVT"]);
		$stmt -> bindParam(":EMBARQUE_CARRETERA_LIBRE", $datos["EMBARQUE_CARRETERA_LIBRE"]);
		$stmt -> bindParam(":MARITIMO_AEREO_COMBINADO", $datos["MARITIMO_AEREO_COMBINADO"]);

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
	
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET Descripcion = :Descripcion, Giro = :Giro, Peligrosidad = :Peligrosidad, 
																 Valor_Aseguradora = :Valor_Aseguradora, Valor_Apar = :Valor_Apar,
															     Valor_A = :Valor_A, Valor_B= :Valor_B, Valor_C= :Valor_C, 
																 Valor_D= :Valor_D, Valor_E= :Valor_E, DEDUCIBLE_ROT =:DEDUCIBLE_ROT,
																 DEDUCIBLE_ROBO = :DEDUCIBLE_ROBO, DEDUCIBLE_OTROS_R = :DEDUCIBLE_OTROS_R,
																 DEDUCIBLE_SVT = :DEDUCIBLE_SVT, EMBARQUE_CARRETERA_LIBRE = :EMBARQUE_CARRETERA_LIBRE,
																 MARITIMO_AEREO_COMBINADO = :MARITIMO_AEREO_COMBINADO
																 WHERE Id = :Id");

		$stmt -> bindParam(":Descripcion", $datos["descripcion"]);
		$stmt -> bindParam(":Giro", $datos["giro"]);
		$stmt -> bindParam(":Peligrosidad", $datos["peligrosidad"]);
		$stmt -> bindParam(":Valor_Aseguradora", $datos["valoraseguradora"]);
		$stmt -> bindParam(":Valor_Apar", $datos["valorap"]);
		$stmt -> bindParam(":Valor_A", $datos["valora"]);
		$stmt -> bindParam(":Valor_B", $datos["valorb"]);
		$stmt -> bindParam(":Valor_C", $datos["valorc"]);
		$stmt -> bindParam(":Valor_D", $datos["valord"]);
		$stmt -> bindParam(":Valor_E", $datos["valore"]);
		$stmt -> bindParam(":DEDUCIBLE_ROT", $datos["ETB_DEDUCIBLE_ROT"]);
		$stmt -> bindParam(":DEDUCIBLE_ROBO", $datos["ETB_DEDUCIBLE_ROBO"]);
		$stmt -> bindParam(":DEDUCIBLE_OTROS_R", $datos["ETB_DEDUCIBLE_OTROS_R"]);
		$stmt -> bindParam(":DEDUCIBLE_SVT", $datos["ETB_DEDUCIBLE_SVT"]);
		$stmt -> bindParam(":EMBARQUE_CARRETERA_LIBRE", $datos["ETb_EMBARQUE_CARRETERA_LIBRE"]);
		$stmt -> bindParam(":MARITIMO_AEREO_COMBINADO", $datos["ETb_MARITIMO_AEREO_COMBINADO"]);
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
	/*=============================================
	ACTUALIZAR ACTIVAR AUTOMATICO mercancia
	=============================================*/

	static public function mdlActualizarAutomaticoMercancia($tabla, $item1, $valor1, $item2, $valor2){

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