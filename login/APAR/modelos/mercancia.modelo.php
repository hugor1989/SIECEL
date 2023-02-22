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
	REGISTRO DE MERCANCIA
	=============================================*/

	static public function mdlIngresarMercancia($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(Clave, Descripcion, Giro, Peligrosidad, Valor_Aseguradora, Valor_Apar,
																  ROT, TR, Variacion_Termica,
															      Valor_A, Valor_B, Valor_C, Valor_D, Valor_E, Valor_F)
													 VALUES (:Clave, :Descripcion, :Giro, :Peligrosidad, :Valor_Aseguradora, :Valor_Apar,
													 		 :ROT, :TR, :Variacion_Termica,
															  :Valor_A, :Valor_B, :Valor_C, :Valor_D, :Valor_E, :Valor_F)");
		
		//Crear la clave automatica del perfil
		$clave = substr($datos["descripcion"], -2); 
		
		$stmt->bindParam(":Descripcion", $datos["descripcion"]);
		$stmt->bindParam(":Clave", $clave);
		$stmt->bindParam(":Giro", $datos["giro"]);
		$stmt->bindParam(":Peligrosidad", $datos["peligrosidad"]);
		$stmt->bindParam(":Valor_Aseguradora", $datos["valoar_aseguradora"]);
		$stmt->bindParam(":Valor_Apar", $datos["valoar_apar"]);
		$stmt->bindParam(":ROT", $datos["rot"]);
		$stmt->bindParam(":TR", $datos["tr"]);
		$stmt->bindParam(":Variacion_Termica", $datos["vt"]);
		$stmt->bindParam(":Valor_A", $datos["valora"]);
		$stmt->bindParam(":Valor_B", $datos["valorb"]);
		$stmt->bindParam(":Valor_C", $datos["valorc"]);
		$stmt->bindParam(":Valor_D", $datos["valord"]);
		$stmt->bindParam(":Valor_E", $datos["valore"]);
		$stmt->bindParam(":Valor_F", $datos["valorf"]);

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
																 ROT = :ROT, TR= :TR, Variacion_Termica= :Variacion_Termica, 
															     Valor_A = :Valor_A, Valor_B= :Valor_B, Valor_C= :Valor_C, 
																 Valor_D= :Valor_D, Valor_E= :Valor_E, Valor_F= :Valor_F
																 WHERE Id = :Id");

		$stmt -> bindParam(":Descripcion", $datos["descripcion"]);
		$stmt -> bindParam(":Giro", $datos["giro"]);
		$stmt -> bindParam(":Peligrosidad", $datos["peligrosidad"]);
		$stmt -> bindParam(":Valor_Aseguradora", $datos["valoraseguradora"]);
		$stmt -> bindParam(":Valor_Apar", $datos["valorap"]);
		$stmt -> bindParam(":ROT", $datos["rot"]);
		$stmt -> bindParam(":TR", $datos["tr"]);
		$stmt -> bindParam(":Variacion_Termica", $datos["vt"]);
		$stmt -> bindParam(":Valor_A", $datos["valora"]);
		$stmt -> bindParam(":Valor_B", $datos["valorb"]);
		$stmt -> bindParam(":Valor_C", $datos["valorc"]);
		$stmt -> bindParam(":Valor_D", $datos["valord"]);
		$stmt -> bindParam(":Valor_E", $datos["valore"]);
		$stmt -> bindParam(":Valor_F", $datos["valorf"]);
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