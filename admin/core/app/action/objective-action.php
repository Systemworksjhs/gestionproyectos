<?php

	if(isset($_GET["opt"]) && $_GET["opt"]=="add"){
		$objectives = new ObjectiveData();
        $objectives->title = $_POST["title"];
		$objectives->description = $_POST["description"];
		$objectives->status = isset($_POST["status"])?1:0;
		$objectives->add();
		Core::redir("./?view=objective");

	}
	else if(isset($_GET["opt"]) && $_GET["opt"]=="update"){
		$objectives = ObjectiveData::getById($_POST["id_objective"]);
        $objectives->title = $_POST["title"];
		$objectives->description = $_POST["description"];
		$objectives->status = isset($_POST["status"])?1:0;
		$objectives->update();
		Core::redir("./?view=objective");
	}
	else if(isset($_GET["opt"]) && $_GET["opt"]=="del"){
		$objectives = ObjectiveData::getById($_GET["id"]);
		$objectives->del();
		Core::redir("./?view=objective");
	}

?>
