<?php
	function connect(){
		$conexion=	mysqli_connect("localhost", "root", "", "ajaxejemplos");
		if($conexion==NULL){
			die("Error, imposible conectarse a la base de datos");
		}
		$conexion->set_charset("utf8");
		return $conexion;
	}

	function disconnect($conexion){
		mysqli_close($conexion);
	}
?>
