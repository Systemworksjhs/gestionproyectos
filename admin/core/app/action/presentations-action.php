<?php

	if(isset($_GET["opt"]) && $_GET["opt"]=="add"){
		$presentations 					= new presentationsData();
		$presentations->name			= $_POST["name"];
		$presentations->grams 			= $_POST["gramaje"];
		
		
		$presentations->add();
		
        Core::redir("./?view=presentations");
	
	    
	}else if(isset($_GET["opt"]) && $_GET["opt"]=="update"){
	    
		$presentations = presentationsData::getById($_POST["id_presentation"]);
		
		$presentations->name = $_POST["name"];
		$presentations->grams = $_POST["gramaje"];
		
		$presentations->updatepres();
        Core::redir("./?view=presentations");
	}
	else if(isset($_GET["opt"]) && $_GET["opt"]=="del"){
		$idagrortic = base64_decode($_REQUEST['idcitorga']);
		$presentations = presentationsData::getById($idagrortic);
		
		$presentations->del();
		Core::redir("./?view=presentations");
	}

?>