<?php
	if(isset($_GET["opt"]) && $_GET["opt"]=="add"){
		$tips = new tipsAgroticData();
		$tips->title = $_POST["title"];
        $tips->description = $_POST["description"];
		$tips->instagram = $_POST["instagram"];
		$tips->facebook = $_POST["facebook"];
		$tips->youtube = $_POST["youtube"];
        $tips->status = isset($_POST["status"])?1:0;
        $imagen = "";
        $imagen = $_FILES['image']['name'];
        $rout = "uploads/tips/".$imagen;
        $outcome = @move_uploaded_file($_FILES["image"]["tmp_name"], $rout);
		$tips->image = $imagen;
		$files = "";
        $files = $_FILES['filespdf']['name'];
        $rout = "uploads/tips/".$files;
        $outcome = @move_uploaded_file($_FILES["filespdf"]["tmp_name"], $rout);
		$tips->tipsPdf = $files;
		$tips->add();
		Core::redir("./?view=tipsAgrotic");
	}
	else if(isset($_GET["opt"]) && $_GET["opt"]=="update"){
		$tips = tipsAgroticData::getById($_POST["id_tipsAgrotic"]);
		$tips->title = $_POST["title"];
        $tips->description = $_POST["description"];
		$tips->instagram = $_POST["instagram"];
		$tips->facebook = $_POST["facebook"];
		$tips->youtube = $_POST["youtube"];
        $tips->status = isset($_POST["status"])?1:0;
        $imagen = $_FILES['image']['name'];
		if($imagen==""){
			$tips->image = $_POST["slide_img_aux"];
		}
		else {
			$imagen = $_FILES['image']['name'];
			$rout = "uploads/tips/".$imagen;
			$outcome = @move_uploaded_file($_FILES["image"]["tmp_name"], $rout);
			$tips->image = $imagen;
		}
		$files = $_FILES['filespdf']['name'];
		if($files==""){
			$tips->tipsPdf = $_POST["tips_aux"];
		}
		else {
			$files = $_FILES['filespdf']['name'];
			$rout = "uploads/tips/".$files;
			$outcome = @move_uploaded_file($_FILES["filespdf"]["tmp_name"], $rout);
			$tips->tipsPdf = $files;
		}
		$tips->update();
		Core::redir("./?view=tipsAgrotic");
	}
	else if(isset($_GET["opt"]) && $_GET["opt"]=="del"){
		$idagrortic = base64_decode($_REQUEST['idcitorga']);
		$tips = tipsAgroticData::getById($idagrortic);
		$tips->del();
		Core::redir("./?view=tipsAgrotic");
	}

?>