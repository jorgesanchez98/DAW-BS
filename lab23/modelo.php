<?php
	function connect(){
		$conexion=	mysqli_connect("localhost", "root", "", "tiendapan");
		if($conexion==NULL){
			die("Error, imposible conectarse a la base de datos");
		}
		$conexion->set_charset("utf8");
		return $conexion;
	}

	function disconnect($conexion){
		mysqli_close($conexion);
	}

	function login($usuario, $password){
		$conexion=connect();
		$usuario=$conexion->real_escape_string($usuario);
		$password=$conexion->real_escape_string($password);
		$query="SELECT nickname FROM usuarios WHERE nickname = '".$usuario."' AND password = '".$password."'";
		$results=$conexion->query($query);
		while ($row=mysqli_fetch_array($results, MYSQLI_BOTH)) {
			mysqli_free_result($results);
			disconnect($conexion);
			return $row["nickname"];
		}
		mysqli_free_result($results);
		disconnect($conexion);
		return false;
	}

	function getProductos(){
		$conexion=connect();
		$cards='<div class="row">';
		$query="SELECT nombre, precio, descripcion, imagen FROM productos";
		$results=$conexion->query($query);
		while ($row=mysqli_fetch_array($results, MYSQLI_BOTH)) {
			$cards.='<div class="col s4">
				<div class="card">
				    <div class="card-image waves-effect waves-block waves-light">
				      	<img class="activator" src="images/'.$row["imagen"].'" height=327>
				    </div>
				    <div class="card-content">
				      	<span class="card-title activator grey-text text-darken-4">'.$row["nombre"].'<i class="material-icons right">more_vert</i></span>
				      	<p>'.$row["precio"]."$".'</p>
				    </div>
				    <div class="card-reveal">
				      	<span class="card-title grey-text text-darken-4">'.$row["nombre"].'<i class="material-icons right">close</i></span>
				      	<p>'.$row["descripcion"].'</p>
    					<div class="paypal-button-container"></div>
				    </div>
				</div>
			</div>';
		}
		$cards.='</div>';
		mysqli_free_result($results);
		disconnect($conexion);
		return $cards;
	}

	function signup($nombre, $nickname, $password){
		$conexion=connect();
		$query="INSERT INTO usuarios (nombre, nickname, password) VALUES (?, ?, ?)";
		if (!($statement=$conexion->prepare($query))){
			disconnect($conexion);
            die("Preparation failed");
		}
		$nombre = $conexion->real_escape_string($nombre);
		$nickname = $conexion->real_escape_string($nickname);
        $password = $conexion->real_escape_string($password);
		if(!($statement->bind_param("sss", $nombre, $nickname, $password))){
			disconnect($conexion);
			die("Parameter vinculation failed");
		}
		if (!$statement->execute()){
			disconnect($conexion);
			return false;
		}
		disconnect($conexion);
		return true;
	}	
?>