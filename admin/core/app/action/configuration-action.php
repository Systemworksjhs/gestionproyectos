<?php

	if(isset($_GET["opt"]) && $_GET["opt"]=="add"){

	}
	else if(isset($_GET["opt"]) && $_GET["opt"]=="update"){
		$post = configurationData::getById($_POST["id_configuration"]);
        $imagen = $_FILES['logoLogin']['name'];
		if($imagen==""){
			$imagen = $_POST["slide_img_aux1"];
		}
		else {
			$imagen = $_FILES['logoLogin']['name'];
			$rout = "uploads/setup/".$imagen;
			$outcome = @move_uploaded_file($_FILES["logoLogin"]["tmp_name"], $rout);
			$post->logoLogin = $imagen;
		}
		$imagen = $_FILES['fondoLogin']['name'];
		if($imagen==""){
			$imagen = $_POST["slide_img_aux2"];
		}
		else {
			$imagen = $_FILES['fondoLogin']['name'];
			$rout = "uploads/setup/".$imagen;
			$outcome = @move_uploaded_file($_FILES["fondoLogin"]["tmp_name"], $rout);
			$post->fondoLogin = $imagen;
		}
		$imagen = $_FILES['favicon']['name'];
		if($imagen==""){
			$imagen = $_POST["slide_img_aux3"];
		}
		else {
			$imagen = $_FILES['favicon']['name'];
			$rout = "uploads/setup/".$imagen;
			$outcome = @move_uploaded_file($_FILES["favicon"]["tmp_name"], $rout);
			$post->favicon = $imagen;
		}
		$imagen = $_FILES['loading']['name'];
		if($imagen==""){
			$imagen = $_POST["slide_img_aux4"];
		}
		else {
			$imagen = $_FILES['loading']['name'];
			$rout = "uploads/setup/".$imagen;
			$outcome = @move_uploaded_file($_FILES["loading"]["tmp_name"], $rout);
			$post->loading = $imagen;
		}
		$post->update();
		Core::redir("./?view=configuration");
	}
	else if(isset($_GET["opt"]) && $_GET["opt"]=="del"){

	}

?>