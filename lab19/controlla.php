<?php
		require_once("modelo.php");
		
		$pattern=strtolower($_GET['pattern']);
		$response="";
		$conexion=connect();
		$query="SELECT nombre FROM Cosas";
		$results=$conexion->query($query);
		$size=0;
		while ($row=mysqli_fetch_array($results, MYSQLI_BOTH)) {
			$pos=stripos(strtolower($row["nombre"]),$pattern);
		   	if(!($pos===false)){
		   		$size++;
			    $word=$row["nombre"];
			    $response.="<option value=\"$word\">$word</option>";
		   	}		  
		}
		mysqli_free_result($results);
		disconnect($conexion);
		if($size>0)
		 	echo "<select id=\"list\" size=$size onclick=\"selectValue()\">$response</select>";		
?>