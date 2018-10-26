<?php	
	require_once("modelo.php");
	require_once("util.php");
    if(isset($_POST["nombre"]) && isset($_POST["estado"])){
		$nombre= cleanInput($_POST["nombre"]);
		$estado= cleanInput($_POST["estado"]);
		if ($nombre!="" && $estado!=""){
			if (register($nombre, $estado)){
				header("location:index.php");
			}
			else{
	                include("header.html");
	                include("_register.html");
	                include("footer.html");
			}
		}
		else
			include("header.html");
            include("_register.html");
            include("footer.html");
	}
	else{
		include("header.html");
        include("_register.html");
        include("footer.html");
	}
?>