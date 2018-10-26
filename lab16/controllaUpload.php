<?php

session_start();
include("header.html");
include("nav.html");
if (isset($_FILES["fileUp"])){
	$target_dir="images/";
	$target_file=$target_dir . basename($_FILES["fileUp"]["name"]);
	$target_type=strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
	$uploadOk=1;
	if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
	}
	else{
		if (move_uploaded_file($_FILES["fileUp"]["tmp_name"], $target_dir . basename($_FILES['fileUp']['tmp_name']))) {
			echo "The file" . basename(["fileUp"]["name"]) . "has been uploaded";
			$_SESSION["imagen"]=$target_file;
			header("location:index.php");
		}
		else
			echo "failure to upload";
	}
}
else
	include("upload.html");
include("footer.html");


?>