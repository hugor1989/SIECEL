<?php

	$host = 'localhost';
	$user = 'siecelppr_pprpar';
	$password = 'wB8G[NdmsFj;';
	$db = 'siecelppr_ppr';

	$conection = @mysqli_connect($host,$user,$password,$db);

	if(!$conection){
		echo "Error en la conexion";
	}

?>
