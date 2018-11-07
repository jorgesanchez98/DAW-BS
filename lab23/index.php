<?php

session_start();
require_once("util.php");
require_once("modelo.php");

include("header.html");

if (isset($_POST["usuario"]))
	$_POST["usuario"]=cleanInput($_POST["usuario"]);

if (isset($_POST["password"]))
	$_POST["password"]=cleanInput($_POST["password"]);

if (isset($_SESSION["usuario"]) && isset($_SESSION["password"])){
	include("nav.html");
	include("body.html");
}

else if (isset($_POST["usuario"]) && isset($_POST["password"]) && login($_POST["usuario"], $_POST["password"])!=false) {
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