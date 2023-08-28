<?php

require_once "conexion.php";

class ModeloUsuarios{

	/*=============================================
	MOSTRAR USUARIOS
	=============================================*/

	static public function mdlMostrarUsuarios($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE Perfil!=0 AND $item = :$item");

			$stmt -> bindParam(":".$item, $valor);

			$stmt -> execute();

			return $stmt -> fetchAll();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla  WHERE Perfil !=0 ");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}
		

		$stmt -> close();

		$stmt = null;

	}
	static public function mdlMostrarUsuariosItemNuevo($tabla, $item, $valor){

		if($item != null){


			$num = intval($valor);

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $num);

			$stmt -> execute();


			return $stmt -> fetch();

		}
		$stmt -> close();

		$stmt = null;

	}
	static public function mdlMostrarUsuariosItem($tabla, $item, $valor){

		if($item != null){


			$num = intval($valor);

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $num);

			$stmt -> execute();


			return $stmt -> fetchAll();

		}
		$stmt -> close();

		$stmt = null;

	}
	/*=============================================
	MOSTRAR PERFILES
	=============================================*/

	static public function mdlMostrarPerfiles($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item AND Estado=1");

			$stmt -> bindParam(":".$item, $valor);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE Estado=1");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}
		

		$stmt -> close();

		$stmt = null;

	}
	/*=============================================
	MOSTRAR VENDEDORES
	=============================================*/

	static public function mdlMostrarVendedores($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE perfil='Vendedor' AND $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

		return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE perfil='Vendedor'");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}
		

		$stmt -> close();

		$stmt = null;

	}
/*=============================================
	MOSTRAR EMPRESAS ASOCIADAS
	=============================================*/

	static public function mdlMostrarEmpresasAsociada($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

		return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}
		

		$stmt -> close();

		$stmt = null;

	}
	/*=============================================
	REGISTRO DE USUARIO
	=============================================*/

	static public function mdlIngresarUsuario($tabla, $datos){

		/* if($datos["usuario"] == "001"){

			$prefijo="UA".$datos["usuario"]; 
		}else{
			$prefijo=$datos["usuario"];
		} */
		
		//$usuriofinal=$prefijo.$ultimoUsuario;


		if($datos["SL_EmpresaAsociada"] > 0){


	

			$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(Nombre, Password, Username, Foto, Perfil, Email,
																	Comision, Abreviatura, Cuota_VT,
																	Cuota_Rot, Cuota_TR, Cuota_Contenedor,
																	Prima_Minima, Derecho_Certificado, ComisionAsociado, IdAseguradora,IdEmpresaAsociada,ImagenBase64) 
													VALUES (:Nombre, :Password, :Username, :Foto, :Perfil, :Email,
															:Comision, :Abreviatura, :Cuota_VT,
															:Cuota_Rot, :Cuota_TR, :Cuota_Contenedor,
															:Prima_Minima, :Derecho_Certificado, :ComisionAsociado, :IdAseguradora, :IdEmpresaAsociada, :ImagenBase64)");

			$stmt->bindParam(":Nombre", $datos["nombre"]);
			$stmt->bindParam(":Username", $datos["usuario"]);
			$stmt->bindParam(":Foto", $datos["foto"]);
			$stmt->bindParam(":Email", $datos["email"]);
			$stmt->bindParam(":Password", $datos["password"]);
			$stmt->bindParam(":Perfil", $datos["perfil"]);
			$stmt->bindParam(":Comision", $datos["comision"]);
			$stmt->bindParam(":ComisionAsociado", $datos["comisionasociado"]);
			$stmt->bindParam(":Abreviatura", $datos["abreviatura"]);
			$stmt->bindParam(":Cuota_VT", $datos["cuotabasica"]);
			$stmt->bindParam(":Cuota_Rot", $datos["cuotarot"]);
			$stmt->bindParam(":Cuota_TR", $datos["cuotatr"]);
			$stmt->bindParam(":Cuota_Contenedor", $datos["cuotacontenedor"]);
			$stmt->bindParam(":Prima_Minima", $datos["primaminima"]);
			$stmt->bindParam(":Derecho_Certificado", $datos["derechocertificado"]);
			$stmt->bindParam(":IdAseguradora", $datos["idaseguradora"]);
			$stmt->bindParam(":IdEmpresaAsociada", $datos["SL_EmpresaAsociada"]);
			$stmt->bindParam(":ImagenBase64", base64_encode(file_get_contents( $datos["foto"])));


		}else{

			$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(Nombre, Password, Username, Foto, Perfil, Email,
																  Empresa, RFC, Calle, Numero_Interior, Numero_Exterior,
																  Colonia, CodigoPostal, Estado, Municipio, Pais,
																  Email_Adicional, Giro, Telefono, Celular,
																  Contacto,  CuentaBancaria, CuentaBancaria_Adicional,
																  Comision, Abreviatura, Cuota_VT,
																  Cuota_Rot, Cuota_TR, Cuota_Contenedor,
																  Prima_Minima, Derecho_Certificado, Localidad, ComisionAsociado, IdAseguradora,ImagenBase64) 
													   VALUES (:Nombre, :Password, :Username, :Foto, :Perfil, :Email,
													   		   :Empresa, :RFC, :Calle, :Numero_Interior, :Numero_Exterior,
															   :Colonia, :CodigoPostal, :Estado, :Municipio, :Pais,
															   :Email_Adicional, :Giro, :Telefono, :Celular,
															   :Contacto, :CuentaBancaria, :CuentaBancaria_Adicional,
															   :Comision, :Abreviatura, :Cuota_VT,
															   :Cuota_Rot, :Cuota_TR, :Cuota_Contenedor,
															   :Prima_Minima, :Derecho_Certificado, :Localidad, :ComisionAsociado, :IdAseguradora,:ImagenBase64)");


				

				$stmt->bindParam(":Nombre", $datos["nombre"]);
				$stmt->bindParam(":Username", $datos["usuario"]);
				$stmt->bindParam(":Foto", $datos["foto"]);
				$stmt->bindParam(":Email", $datos["email"]);
				$stmt->bindParam(":Password", $datos["password"]);
				$stmt->bindParam(":Perfil", $datos["perfil"]);
				$stmt->bindParam(":Empresa", $datos["empresa"]);
				$stmt->bindParam(":RFC", $datos["rfc"]);
				$stmt->bindParam(":Calle", $datos["calle"]);
				$stmt->bindParam(":Numero_Interior", $datos["numerointerior"]);
				$stmt->bindParam(":Numero_Exterior", $datos["numeroexterior"]);
				$stmt->bindParam(":Colonia", $datos["colonia"]);
				$stmt->bindParam(":CodigoPostal", $datos["cp"]);
				$stmt->bindParam(":Estado", $datos["estado"]);
				$stmt->bindParam(":Municipio", $datos["municipio"]);
				$stmt->bindParam(":Pais", $datos["pais"]);
				$stmt->bindParam(":Email_Adicional", $datos["emailadicional"]);
				$stmt->bindParam(":Giro", $datos["giro"]);
				$stmt->bindParam(":Telefono", $datos["telefono"]);
				$stmt->bindParam(":Celular", $datos["celular"]);
				$stmt->bindParam(":Contacto", $datos["contacto"]);
				//$stmt->bindParam(":Nextel", $datos["nextel"]);
				$stmt->bindParam(":CuentaBancaria", $datos["cuentabancaria"]);
				$stmt->bindParam(":CuentaBancaria_Adicional", $datos["cuentabancariaad"]);
				$stmt->bindParam(":Comision", $datos["comision"]);
				$stmt->bindParam(":ComisionAsociado", $datos["comisionasociado"]);
				$stmt->bindParam(":Abreviatura", $datos["abreviatura"]);
				$stmt->bindParam(":Cuota_VT", $datos["cuotabasica"]);
				$stmt->bindParam(":Cuota_Rot", $datos["cuotarot"]);
				$stmt->bindParam(":Cuota_TR", $datos["cuotatr"]);
				$stmt->bindParam(":Cuota_Contenedor", $datos["cuotacontenedor"]);
				$stmt->bindParam(":Prima_Minima", $datos["primaminima"]);
				$stmt->bindParam(":Derecho_Certificado", $datos["derechocertificado"]);
				$stmt->bindParam(":Localidad", $datos["localidad"]);
				$stmt->bindParam(":IdAseguradora", $datos["idaseguradora"]);
				$stmt->bindParam(":ImagenBase64", base64_encode(file_get_contents( $datos["foto"])));
				

		}
		

			
		
		
		if($stmt->execute()){

			return "ok";	

		}else{

			return "error";
		
		}

		$stmt->close();
		
		$stmt = null;

	}
	/*=============================================
	REGISTRO DE PERFIL
	=============================================*/

	static public function mdlIngresarPerfil($tabla, $datos){

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
	EDITAR USUARIO
	=============================================*/

	static public function mdlEditarUsuario($tabla, $datos){
		

		


		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET  Nombre = :Nombre, Password = :Password, Foto=:Foto, Email = :Email,  
											  Perfil=:Perfil,  Empresa =:Empresa, RFC=:RFC, Calle=:Calle, Numero_Interior=:Numero_Interior,
											  Numero_Exterior=:Numero_Exterior, Colonia=:Colonia, Municipio=:Municipio, Estado=:Estado,
											  CodigoPostal=:CodigoPostal, Pais=:Pais, Email_Adicional=:Email_Adicional, Giro=:Giro, Telefono=:Telefono,
											  Celular=:Celular, Contacto=:Contacto,  CuentaBancaria=:CuentaBancaria, CuentaBancaria_Adicional=:CuentaBancaria_Adicional,
											  Comision=:Comision, Abreviatura=:Abreviatura, Cuota_VT=:Cuota_VT, Cuota_Rot=:Cuota_Rot, Cuota_TR=:Cuota_TR, 
											  Cuota_Contenedor=:Cuota_Contenedor, Prima_Minima = :Prima_Minima, Derecho_Certificado=:Derecho_Certificado, Localidad=:Localidad, ComisionAsociado=:ComisionAsociado, IdAseguradora=:IdAseguradora
											  WHERE Id = :Id");


		/* $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET Nombre = :Nombre, Email = :Email, Foto=:Foto, Password = :Password,
																 Empresa =:Empresa, RFC=:RFC, Calle=:Calle, Numero_Interior=:Numero_Interior, 
																 Numero_Exterior=:Numero_Exterior, Colonia=:Colonia, Municipio=:Municipio, Estado=:Estado, 
																 CodigoPostal=:CodigoPostal, Pais=:Pais, 
																 Email_Adicional=:Email_Adicional, Giro=:Giro, Telefono=:Telefono, Celular=:Celular, 
																 Contacto=:Contacto, Nextel=:Nextel, CuentaBancaria=:CuentaBancaria, CuentaBancaria_Adicional=:CuentaBancaria_Adicional,
																 Comision=:Comision, Abreviatura=:Abreviatura, Cuota_VT=:Cuota_VT, Cuota_Rot=:Cuota_Rot, Cuota_TR=:Cuota_TR, 
																 Cuota_Contenedor=:Cuota_Contenedor, Prima_Minima = :Prima_Minima, Derecho_Certificado=:Derecho_Certificado, Localidad=:Localidad, ComisionAsociado=:ComisionAsociado, IdAseguradora=:IdAseguradora WHERE Id = :Id");
		 */
		
		$stmt->bindParam(":Perfil", $datos["Perfil"]);
		$stmt->bindParam(":Email", $datos["email"]);
		$stmt->bindParam(":Nombre", $datos["Nombre"]);
		$stmt->bindParam(":Password", $datos["password"]);
		$stmt->bindParam(":Foto", $datos["foto"]);
		$stmt->bindParam(":Empresa", $datos["empresa"]);
		$stmt->bindParam(":RFC", $datos["rfc"]);
		$stmt->bindParam(":Calle", $datos["calle"]);
		$stmt->bindParam(":Numero_Interior", $datos["numerointerior"]);
		$stmt->bindParam(":Numero_Exterior", $datos["numeroexterior"]);
		$stmt->bindParam(":Colonia", $datos["colonia"]);
		$stmt->bindParam(":Municipio", $datos["municipio"]);
		$stmt->bindParam(":Estado", $datos["estado"]);
		$stmt->bindParam(":CodigoPostal", $datos["cp"]);
		$stmt->bindParam(":Pais", $datos["pais"]);
		$stmt->bindParam(":Email_Adicional", $datos["emailadicional"]);
		$stmt->bindParam(":Giro", $datos["giro"]);
		$stmt->bindParam(":Telefono", $datos["telefono"]);
		$stmt->bindParam(":Celular", $datos["celular"]);
		$stmt->bindParam(":Contacto", $datos["contacto"]);
		$stmt->bindParam(":CuentaBancaria", $datos["cuentabancaria"]);
		$stmt->bindParam(":CuentaBancaria_Adicional", $datos["cuentabancariaad"]);
		$stmt->bindParam(":Comision", $datos["comision"]);
		$stmt->bindParam(":ComisionAsociado", $datos["comisionasociado"]);
		$stmt->bindParam(":Abreviatura", $datos["abreviatura"]);
		$stmt->bindParam(":Cuota_VT", $datos["cuotabasica"]);
		$stmt->bindParam(":Cuota_Rot", $datos["cuotarot"]);
		$stmt->bindParam(":Cuota_TR", $datos["cuotatr"]);
		$stmt->bindParam(":Cuota_Contenedor", $datos["cuotacontenedor"]);
		$stmt->bindParam(":Prima_Minima", $datos["primaminima"]);
		$stmt->bindParam(":Derecho_Certificado", $datos["derechocertificado"]);
		$stmt->bindParam(":Localidad", $datos["localidad"]);
		$stmt->bindParam(":IdAseguradora", $datos["idaseguradora"]); 
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
	EDITAR PERFIL USUARIO
	=============================================*/

	static public function mdlEditarPerfilUsuario($tabla, $datos){
	
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
	obtener el ultimo usuario MAX
	=============================================*/
	static public function mdlObtenerUltimoUsuario($tabla){

		
		$stmt = Conexion::conectar()->prepare("SELECT MAX(Username) AS Folio 
											   FROM $tabla");

		$stmt -> execute();

		$last = $stmt->fetch(PDO::FETCH_ASSOC);

		return $last['Folio'];

		$stmt -> close();

		$stmt = null;
	}
	/*=============================================
	ACTUALIZAR USUARIO
	=============================================*/

	static public function mdlActualizarUsuario($tabla, $item1, $valor1, $item2, $valor2){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE $item2 = :$item2");

		$stmt -> bindParam(":".$item1, $valor1, PDO::PARAM_STR);
		$stmt -> bindParam(":".$item2, $valor2, PDO::PARAM_STR);

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

	static public function mdlActualizarPerfil($tabla, $item1, $valor1, $item2, $valor2){

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
	BORRAR USUARIO
	=============================================*/

	static public function mdlBorrarUsuario($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

		$stmt -> bindParam(":id", $datos, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;


	}

}