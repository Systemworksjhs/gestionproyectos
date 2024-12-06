<?php

	if(isset($_GET["opt"]) && $_GET["opt"]=="add"){
		$frequentQuestion = new frequentQuestionsData();
		$frequentQuestion->ask = $_POST["ask"];
        $frequentQuestion->message = $_POST["message"];
        $frequentQuestion->status = isset($_POST["status"])?1:0;
		$frequentQuestion->add();
		Core::redir("./?view=frequentQuestions");
	}
	else if(isset($_GET["opt"]) && $_GET["opt"]=="update"){
		$frequentQuestion = frequentQuestionsData::getById($_POST["id_question"]);
		$frequentQuestion->ask = $_POST["ask"];
        $frequentQuestion->message = $_POST["message"];
        $frequentQuestion->status = isset($_POST["status"])?1:0;
		$frequentQuestion->update();
		Core::redir("./?view=frequentQuestions");
	}
	else if(isset($_GET["opt"]) && $_GET["opt"]=="del"){
		$idagrortic = base64_decode($_REQUEST['idcitorga']);
		$frequentQuestion = frequentQuestionsData::getById($idagrortic);
		$frequentQuestion->del();
		Core::redir("./?view=frequentQuestions");
	}

?>