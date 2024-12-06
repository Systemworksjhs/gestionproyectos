<?php

	if(isset($_GET["opt"]) && $_GET["opt"]=="add"){
		$sponsors = new sponsorsData();
		$sponsors->name = $_POST["name"];
        $imagen = "";
        $imagen = $_FILES['image']['name'];
        $rout = "uploads/sponsors/".$imagen;
        $outcome = @move_uploaded_file($_FILES["image"]["tmp_name"], $rout);
		$sponsors->image = $imagen;
        $sponsors->status = isset($_POST["status"])?1:0;
		$sponsors->add();
		Core::redir("./?view=sponsors");
	}
	else if(isset($_GET["opt"]) && $_GET["opt"]=="update"){
		$sponsors = sponsorsData::getById($_POST["id_sponsor"]);
		$sponsors->name = $_POST["name"];
        $imagen = $_FILES['image']['name'];
		if($imagen==""){
			$imagen = $_POST["slide_img_aux"];
		}
		else {
			$imagen = $_FILES['image']['name'];
			$rout = "uploads/sponsors/".$imagen;
			$outcome = @move_uploaded_file($_FILES["image"]["tmp_name"], $rout);
			$sponsors->image = $imagen;
		}
        $sponsors->status = isset($_POST["status"])?1:0;
		$sponsors->update();
		Core::redir("./?view=sponsors");
	}
	else if(isset($_GET["opt"]) && $_GET["opt"]=="del"){
		$idagrortic = base64_decode($_REQUEST['idcitorga']);
		$sponsors = sponsorsData::getById($idagrortic);
		$sponsors->del();
		Core::redir("./?view=sponsors");
	}

?>