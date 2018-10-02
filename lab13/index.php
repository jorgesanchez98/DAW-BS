<?php

session_start();

include("header.html");

if (isset($_POST["usuario"]))
	$_POST["usuario"]=htmlspecialchars($_POST["usuario"]);

if (isset($_POST["password"]))
	$_POST["password"]=htmlspecialchars($_POST["password"]);

if (isset($_SESSION["usuario"]) && isset($_SESSION["password"])){
	include("nav.html");
	include("body.html");
}

else if (isset($_POST["usuario"])  && isset($_POST["password"]) && $_POST["usuario"]=="coki" && $_POST["password"]=="kkp2") {
	$_SESSION["usuario"]=$_POST["usuario"];
	$_SESSION["password"]=$_POST["password"];
	include("nav.html");
	include("body.html");
}
else if (isset($_POST["usuario"])  && isset($_POST["password"]) && $_POST["usuario"] == "" && $_POST["password"] == "" ){
	$error = "Ingresa tu usuario y contraseña";
    include("login.html");
}
else if (isset($_POST["usuario"])  && isset($_POST["password"])){
	sleep(3);
	$error = "Usuario y/o password incorrectos";
    include("login.html");
}
else {
	include("login.html");
}

include("footer.html");

?>