<?php

	if(isset($_GET["opt"]) && $_GET["opt"]=="add"){
		$team = new teamData();
		$team->area = $_POST["area"];
        $team->designation = $_POST["designation"];
        $imagen = "";
        $imagen = $_FILES['image']['name'];
        $rout = "uploads/team/".$imagen;
        $outcome = @move_uploaded_file($_FILES["image"]["tmp_name"], $rout);
		$team->image = $imagen;
        $team->status = isset($_POST["status"])?1:0;
		$team->add();
		Core::redir("./?view=team");
	}
	else if(isset($_GET["opt"]) && $_GET["opt"]=="update"){
		$team = teamData::getById($_POST["id_team"]);
		$team->area = $_POST["area"];
        $team->designation = $_POST["designation"];
        $imagen = $_FILES['image']['name'];
		if($imagen==""){
			$imagen = $_POST["slide_img_aux"];
		}
		else {
			$imagen = $_FILES['image']['name'];
			$rout = "uploads/team/".$imagen;
			$outcome = @move_uploaded_file($_FILES["image"]["tmp_name"], $rout);
			$team->image = $imagen;
		}
        $team->status = isset($_POST["status"])?1:0;
		$team->update();
		Core::redir("./?view=team");
	}
	else if(isset($_GET["opt"]) && $_GET["opt"]=="del"){
		$idagrortic = base64_decode($_REQUEST['idcitorga']);
		$team = teamData::getById($idagrortic);
		$team->del();
		Core::redir("./?view=team");
	}

?>