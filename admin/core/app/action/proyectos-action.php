<?php

	if(isset($_GET["opt"]) && $_GET["opt"]=="add"){
		$proyecto = new ProyectosData();
		$proyecto->title = $_POST["title"];
		$imagen = "";
        $imagen = $_FILES['imagen']['name'];
        $rout = "uploads/proyectos/".$imagen;
        $outcome = @move_uploaded_file($_FILES["imagen"]["tmp_name"], $rout);
		$proyecto->imagen = $imagen;
        $document = "";
        $document = $_FILES['documents']['name'];
        $rout = "uploads/proyectos/".$document;
        $outcome = @move_uploaded_file($_FILES["documents"]["tmp_name"], $rout);
		$proyecto->documents = $document;
        $proyecto->description = $_POST["description"];
        $proyecto->category = $_POST["category"];
        $proyecto->status = isset($_POST["status"])?1:0;
        $proyecto->url = $_POST["url"];
		$proyecto->add();
		Core::redir("./?view=proyectos");
	}
	else if(isset($_GET["opt"]) && $_GET["opt"]=="update"){
		$proyecto = ProyectosData::getById($_POST["id_proyecto"]);
		$proyecto->title = $_POST["title"];
        $proyecto->description = $_POST["description"];
        $proyecto->category = $_POST["category"];
        $proyecto->status = isset($_POST["status"])?1:0;
        $proyecto->url = $_POST["url"];
		$imagen = $_FILES['imagen']['name'];
		if($imagen==""){
			$proyecto->imagen = $_POST["slide_img_aux"];
		}
		else {
			$imagen = $_FILES['imagen']['name'];
			$rout = "uploads/proyectos/".$imagen;
			$outcome = @move_uploaded_file($_FILES["imagen"]["tmp_name"], $rout);
			$proyecto->imagen = $imagen;
		}
        $document = $_FILES['documents']['name'];
		if($document==""){
			$proyecto->documents = $_POST["document_aux"];
		}
		else {
			$document = $_FILES['documents']['name'];
			$rout = "uploads/proyectos/".$document;
			$outcome = @move_uploaded_file($_FILES["documents"]["tmp_name"], $rout);
			$proyecto->documents = $document;
		}
		$proyecto->update();
		Core::redir("./?view=proyectos");
	}
	else if(isset($_GET["opt"]) && $_GET["opt"]=="del"){
		$idagrortic = base64_decode($_REQUEST['idcitorga']);
		$proyecto = ProyectosData::getById($idagrortic);
		$proyecto->del();
		Core::redir("./?view=proyectos");
	}

?>