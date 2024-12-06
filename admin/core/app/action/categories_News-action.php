<?php

	if(isset($_GET["opt"]) && $_GET["opt"]=="add"){
		$category = new categories_NewsData();
		$category->name = $_POST["name"];
		$category->add();
		Core::redir("./?view=categories_News");
	}
	else if(isset($_GET["opt"]) && $_GET["opt"]=="update"){
		$category = categories_NewsData::getById($_POST["user_id"]);
		$category->name = $_POST["name"];
		$category->update();
		Core::redir("./?view=categories_News");
	}
	else if(isset($_GET["opt"]) && $_GET["opt"]=="del"){
		$category = categories_NewsData::getById($_GET["id"]);
		$category->del();
		Core::redir("./index.php?view=categories_News");
	}

?>