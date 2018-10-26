<?php	
	require_once("modelo.php");
	require_once("util.php");
    if(isset($_POST["idZombie"]) && isset($_POST["nombre"])){
		$idZombie= cleanInput($_POST["idZombie"]);
		$nombre= cleanInput($_POST["nombre"]);
		if ($idZombie!="" && $nombre!=""){
			if (updateName(2, $nombre)){
				header("location:index.php");
			}
			else{
	                include("_header.html");
	                include("_nav.html");
	                include("_update.html");
	                include("_footer.html");
			}
		}
		else
			include("_header.html");
			include("_nav.html");
            include("_update.html");
            include("_footer.html");
	}
	else{
		include("_header.html");
		include("_nav.html");
        include("_update.html");
        include("_footer.html");
	}
?>