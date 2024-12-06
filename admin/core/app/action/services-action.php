<?php

	if(isset($_GET["opt"]) && $_GET["opt"]=="add"){
		$services = new servicesData();
		$services->title = $_POST["title"];
        $services->text = $_POST["text"];
        $imagen = "";
        $imagen = $_FILES['image']['name'];
        $rout = "uploads/services/".$imagen;
        $outcome = @move_uploaded_file($_FILES["image"]["tmp_name"], $rout);
		$services->image = $imagen;
        $services->status = isset($_POST["status"])?1:0;
		$services->add();
        Core::redir("./?view=services");
	}
	else if(isset($_GET["opt"]) && $_GET["opt"]=="update"){
		$services = servicesData::getById($_POST["id_service"]);
		$services->title = $_POST["title"];
        $services->text = $_POST["text"];
        $imagen = $_FILES['image']['name'];
		if($imagen==""){
			$imagen = $_POST["slide_img_aux"];
		}
		else {
			$imagen = $_FILES['image']['name'];
			$rout = "uploads/services/".$imagen;
			$outcome = @move_uploaded_file($_FILES["image"]["tmp_name"], $rout);
			$services->image = $imagen;
		}
        $services->status = isset($_POST["status"])?1:0;
		$services->update();
		Core::redir("./?view=services");
	}
	else if(isset($_GET["opt"]) && $_GET["opt"]=="del"){
		$idagrortic = base64_decode($_REQUEST['idcitorga']);
		$services = servicesData::getById($idagrortic);
		$services->del();
		Core::redir("./?view=services");
	}

?>