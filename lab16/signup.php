<?php	
	session_start();
	require_once("modelo.php");
	require_once("cleanInput.php");
	if (isset($_SESSION["usuario"])) 
        header("location:index.php");
    else if(isset($_POST["nombre"]) && isset($_POST["usuario"]) && isset($_POST["password"])){
		$nombre= cleanInput($_POST["nombre"]);
		$usuario= cleanInput($_POST["usuario"]);
		$password= cleanInput($_POST["password"]);
		if ($nombre!="" && $usuario!="" && $password!=""){
			if (signup($nombre, $usuario, $password)){
				$_SESSION["usuario"]=$_POST["usuario"];
				header("location:index.php");
			}
			else{
				$error = "Ocurrió un error al crear la cuenta";
	                include("header.html");
	                include("signup.html");
	                include("footer.html");
			}
		}
		else
			$error="Llenar todos los campos para continuar";
			include("header.html");
            include("signup.html");
            include("footer.html");
	}
	else{
		include("header.html");
        include("signup.html");
        include("footer.html");
	}
?>