<?php

require_once "conexion.php";

class ModeloAseguradora{

	
	/*=============================================
	MOSTRAR ASEGURADORA
	=============================================*/

	static public function mdlMostrarAseguradora($tabla, $item, $valor){

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
	MOSTRAR CUOTA ASEGURADORA
	=============================================*/

	static public function mdlMostrarCuotaAseguradora($tabla, $item, $valor){

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
	MOSTRAR CUOTA CUOTA
	=============================================*/

	static public function mdlMostrarCuota($tabla, $item, $valor){

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
	REGISTRO DE ASEGURADORA
	=============================================*/

	static public function mdlIngresarAseguradora($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(Clave, Descripcion, RFC, VT, Cuota_Rot, Cuota_TR, Cuota_Contenedor, Telefono, CondicionesGenerales, NumeroPoliza, Logo, Direccion)
													  VALUES (:Clave, :Descripcion, :RFC, :VT, :Cuota_Rot, :Cuota_TR, :Cuota_Contenedor, :Telefono, :CondicionesGenerales, :NumeroPoliza, :Logo, :Direccion)");
		
		//Crear la clave automatica del perfil

		//$pdf_b64 = base64_decode($datos["condicionesgenerales"]);

		//$encode = base64_encode(file_get_contents( $datos["condicionesgenerales"])); //base64_encode($datos[""]);

		$clave = substr($datos["descripcion"], -2); 
		$stmt->bindParam(":Descripcion", $datos["descripcion"]);
		$stmt->bindParam(":Clave", $clave);
		$stmt->bindParam(":RFC", $datos["rfc"]);
		$stmt->bindParam(":VT", $datos["vt"]);
		$stmt->bindParam(":Cuota_Rot", $datos["cuota_rot"]);
		$stmt->bindParam(":Cuota_TR", $datos["cuota_tr"]);
		$stmt->bindParam(":Cuota_Contenedor", $datos["cuota_contenedor"]);
		$stmt->bindParam(":Telefono", $datos["telefono"]);
		$stmt->bindParam(":CondicionesGenerales",  $datos["condicionesgenerales"]);
		$stmt->bindParam(":NumeroPoliza", $datos["poliza"]);
		$stmt->bindParam(":Logo", base64_encode(file_get_contents($datos["ruta"])));
		$stmt->bindParam(":Direccion", $datos["direccion"]);


		if($stmt->execute()){

			return "ok";	

		}else{

			return "error";
		
		}

		$stmt->close();
		
		$stmt = null;

	}
		/*=============================================
	REGISTRO DE ASEGURADORA
	=============================================*/

	static public function mdlIngresarCuota($tabla, $datos){

		//Asociado	Comision	Prefijo	Cuota_Aseguradora

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(Asociado, Comision, Prefijo, Cuota_Aseguradora) 
													   VALUES (:Asociado, :Comision, :Prefijo, :Cuota_Aseguradora)");
		
		//Crear la clave automatica del perfil
		
		
		$stmt->bindParam(":Asociado", $datos["asociado"]);
		$stmt->bindParam(":Comision", $datos["comision"]);
		$stmt->bindParam(":Prefijo", $datos["prefijo"]);
		$stmt->bindParam(":Cuota_Aseguradora", $datos["cuotaaseguradora"]);

		if($stmt->execute()){

			return "ok";	

		}else{

			return "error";
		
		}

		$stmt->close();
		
		$stmt = null;

	}
	/*=============================================
	REGISTRO DE CUOTA ASEGURADORA
	=============================================*/
//Aseguradora	Cuota_Basica	Cuota_Rot	Cuota_TR	Cuota_Contenedor

	static public function mdlIngresarCuotaAseguradora($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(Aseguradora, VT, Cuota_Rot, Cuota_TR, Cuota_Contenedor) 
													VALUES (:Aseguradora, :VT, :Cuota_Rot, :Cuota_TR, :Cuota_Contenedor)");
		
		//Crear la clave automatica del perfil
		//$clave = substr($datos["descripcion"], -2); 
		
		
		$stmt->bindParam(":Aseguradora", $datos["aseguradora"]);
		$stmt->bindParam(":VT", $datos["VT"]);
		$stmt->bindParam(":Cuota_Rot", $datos["cuota_rot"]);
		$stmt->bindParam(":Cuota_TR", $datos["cuota_tr"]);
		$stmt->bindParam(":Cuota_Contenedor", $datos["cuota_contenedor"]);
		
		if($stmt->execute()){

			return "ok";	

		}else{

			return "error";
		
		}

		$stmt->close();
		
		$stmt = null;

	}

	
	/*=============================================
	EDITAR ASEGURADORA
	=============================================*/

	static public function mdlEditarAseguradora($tabla, $datos){
	
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET Descripcion = :Descripcion, RFC = :RFC, VT = :VT,
																 Cuota_Rot = :Cuota_Rot, Cuota_TR = :Cuota_TR, Cuota_Contenedor = :Cuota_Contenedor,
																 Telefono = :Telefono, CondicionesGenerales = :CondicionesGenerales, NumeroPoliza = :NumeroPoliza, 
																 Direccion = :Direccion, Logo = :Logo WHERE Id = :Id");

		$stmt ->bindParam(":Descripcion", $datos["descripcion"]);
		$stmt ->bindParam(":RFC", $datos["rfc"]);
		$stmt->bindParam(":VT", $datos["vt"]);
		$stmt->bindParam(":Cuota_Rot", $datos["cuota_rot"]);
		$stmt->bindParam(":Cuota_TR", $datos["cuota_tr"]);
		$stmt->bindParam(":Cuota_Contenedor", $datos["cuota_contenedor"]);
		$stmt->bindParam(":Telefono", $datos["telefono"]);
		$stmt->bindParam(":CondicionesGenerales", $datos["condicionesgenerales"]);
		$stmt->bindParam(":NumeroPoliza", $datos["poliza"]);
		$stmt->bindParam(":Direccion", $datos["direccion"]);
		$stmt->bindParam(":Logo", $datos["ruta"]);
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
	EDITAR CUOTA ASEGURADORA
	=============================================*/

	static public function mdlEditarCuotaAseguradora($tabla, $datos){
																								///Cuota_Basica, Cuota_Rot, Cuota_TR, Cuota_Contenedor
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET Cuota_Basica = :Cuota_Basica, Cuota_Rot = :Cuota_Rot, Cuota_TR = :Cuota_TR, Cuota_Contenedor = :Cuota_Contenedor WHERE Id = :Id");
		
		$stmt->bindParam(":Cuota_Basica", $datos["cuota_basica"]);
		$stmt->bindParam(":Cuota_Rot", $datos["cuota_rot"]);
		$stmt->bindParam(":Cuota_TR", $datos["cuota_tr"]);
		$stmt->bindParam(":Cuota_Contenedor", $datos["cuota_contenedor"]);
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
	EDITAR CUOTA
	=============================================*/

	static public function mdlEditarCuota($tabla, $datos){
		/////Asociado	Comision	Prefijo	Cuota_Aseguradora
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET Asociado = :Asociado, Comision = :Comision, Prefijo = :Prefijo, Cuota_Aseguradora = :Cuota_Aseguradora WHERE Id = :Id");

		$stmt->bindParam(":Asociado", $datos["asociados"]);
		$stmt->bindParam(":Comision", $datos["comision"]);
		$stmt->bindParam(":Prefijo", $datos["prefijo"]);
		$stmt->bindParam(":Cuota_Aseguradora", $datos["cuota"]);
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

	static public function mdlActualizarAseguradora($tabla, $item1, $valor1, $item2, $valor2){

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

	static public function mdlActualizarCuotaAseguradora($tabla, $item1, $valor1, $item2, $valor2){

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