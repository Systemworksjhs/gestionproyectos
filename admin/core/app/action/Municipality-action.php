<?php

	if(isset($_GET["opt"]) && $_GET["opt"]=="add"){
		$municipality = new MunicipalityData();
        $municipality->name_municipality = $_POST["name_municipality"];
		$municipality->description = $_POST["description"];
        $image="";
		$image = $_FILES['image']['name'];
        $route = "uploads/municipalities/".$image;
        $outcome = @move_uploaded_file($_FILES["image"]["tmp_name"], $route);
		$municipality->image = $image;
        $municipality->facebook = $_POST["facebook"];
		$municipality->twiter = $_POST["twiter"];
		$municipality->instagram = $_POST["instagram"];
		$municipality->url_web = $_POST["url_web"];
        $municipality->email = $_POST["email"];
		$municipality->add();
		Core::redir("./?view=Municipality");

	}
	else if(isset($_GET["opt"]) && $_GET["opt"]=="update"){
		$municipality = MunicipalityData::getById($_POST["id_municipality"]);
        $municipality->name_municipality = $_POST["name_municipality"];
		$municipality->description = $_POST["description"];
		$file = $_FILES['image']['name'];
		if($file==""){
			$municipality->image = $_POST["slide_img_aux1"];
		}
		else {
			$file = $_FILES['image']['name'];
			$municipality->image = $file;
			$route = "uploads/municipalities/".$file;
			$outcome = @move_uploaded_file($_FILES["image"]["tmp_name"], $route);
		}
        $municipality->facebook = $_POST["facebook"];
		$municipality->twiter = $_POST["twiter"];
		$municipality->instagram = $_POST["instagram"];
		$municipality->url_web = $_POST["url_web"];
        $municipality->email = $_POST["email"];
		$municipality->update();
		Core::redir("./?view=Municipality");
	}
	else if(isset($_GET["opt"]) && $_GET["opt"]=="del"){
		$municipality = MunicipalityData::getById($_GET["id"]);
		$municipality->del();
		Core::redir("./?view=Municipality");
	}

?>
