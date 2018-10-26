<?php
	function connect(){
		$conexion=	mysqli_connect("localhost", "a01209929", "", "c9");
		if($conexion==NULL){
			die("Error, imposible conectarse a la base de datos");
		}
		$conexion->set_charset("utf8");
		return $conexion;
	}

	function disconnect($conexion){
		mysqli_close($conexion);
	}	
	
	function register($nombre, $estado){
	$conexion=connect();
	$query="INSERT INTO zombies (nombre, estado) VALUES (?, ?)";
	if (!($statement=$conexion->prepare($query))){
		disconnect($conexion);
        die("Preparation failed");
	}
	$nombre = $conexion->real_escape_string($nombre);
	$estado = $conexion->real_escape_string($estado);
	if(!($statement->bind_param("ss", $nombre, $estado))){
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

	function updateName($idZombie, $nombre){
		$conexion=connect();
		$query="UPDATE zombies SET nombre='Pancho P' WHERE idZombie=2";
		if (!($statement=$conexion->prepare($query))){
			disconnect($conexion);
	        die("Preparation failed");
		}
		/*$nombre = $conexion->real_escape_string($nombre);
		if(!($statement->bind_param("s", $nombre))){
				disconnect($conexion);
				die("Parameter vinculation failed");
			}*/
			if (!$statement->execute()){
				disconnect($conexion);
				return false;
		}
		disconnect($conexion);
		return true;
	}

	function allZombies(){
		$conexion=connect();
		$query="SELECT idZombie, Nombre, Estado FROM zombies ORDER BY fecha ASC";
		$results=$conexion->query($query);
		$table='<table>
						<thead>
							<th>idZombie</th>
							<th>Nombre</th>
							<th>Estado</th>
						</thead>
						<tbody>';
		while ($row=mysqli_fetch_array($results, MYSQLI_BOTH)) {
			$table.='	<tr>
							<td>'.$row["idZombie"].'</td>
							<td>'.$row["Nombre"].'</td>
							<td>'.$row["Estado"].'</td>											
						</tr>';
						
		}
		$table.='</tbody>
			</table>';
		mysqli_free_result($results);
		disconnect($conexion);
		return $table;
	}