<?php

	if(isset($_GET["opt"]) && $_GET["opt"]=="add"){
		$newfederation = new FederationData();
		$newfederation->name = $_POST["name"];
        $newfederation->legal_representative = $_POST["legal_representative"];
        $newfederation->contact_legal_representative = $_POST["contact_legal_representative"];
        $newfederation->address = $_POST["address"];
        $newfederation->facebook = $_POST["facebook"];
        $newfederation->twitter = $_POST["twitter"];
        $newfederation->instagram = $_POST["instagram"];
        $newfederation->textAsociation = $_POST["textAsociation"];
        $newfederation->mision = $_POST["mision"];
        $newfederation->vision = $_POST["vision"];
        $imagen = "";
        $imagen = $_FILES['logo']['name'];
        $rout = "uploads/federation/".$imagen;
        $outcome = @move_uploaded_file($_FILES["logo"]["tmp_name"], $rout);
		$newfederation->logo = $imagen;
        $imagen = "";
        $imagen = $_FILES['image']['name'];
        $rout = "uploads/federation/".$imagen;
        $outcome = @move_uploaded_file($_FILES["image"]["tmp_name"], $rout);
		$newfederation->image = $imagen;
        $document = "";
        $document = $_FILES['documents']['name'];
        $rout = "uploads/federation/".$document;
        $outcome = @move_uploaded_file($_FILES["documents"]["tmp_name"], $rout);
		$newfederation->documents = $document;
        $newfederation->status = $_POST["status"];
        $newfederation->emailFederation = $_POST["email"];
		$newfederation->add();
		Core::redir("./?view=federation");
	}
	else if(isset($_GET["opt"]) && $_GET["opt"]=="update"){
		$newfederation = FederationData::getById($_POST["id_federation"]);
		$newfederation->name = $_POST["name"];
        $newfederation->legal_representative = $_POST["legal_representative"];
        $newfederation->contact_legal_representative = $_POST["contact_legal_representative"];
        $newfederation->address = $_POST["address"];
        $newfederation->facebook = $_POST["facebook"];
        $newfederation->twitter = $_POST["twitter"];
        $newfederation->instagram = $_POST["instagram"];
        $newfederation->textAsociation = $_POST["textAsociation"];
        $newfederation->mision = $_POST["mision"];
        $newfederation->vision = $_POST["vision"];
		
        $imagen = $_FILES['logo']['name'];
		if($imagen==""){
			$newfederation->logo = $_POST["slide_img_aux"];
		}
		else {
			$imagen = $_FILES['logo']['name'];
			$rout = "uploads/federation/".$imagen;
			$outcome = @move_uploaded_file($_FILES["logo"]["tmp_name"], $rout);
			$newfederation->logo = $imagen;
		}

        $imagen = $_FILES['image']['name'];
		if($imagen==""){
			$newfederation->image = $_POST["slide_img_aux1"];
		}
		else {
			$imagen = $_FILES['image']['name'];
			$rout = "uploads/federation/".$imagen;
			$outcome = @move_uploaded_file($_FILES["image"]["tmp_name"], $rout);
			$newfederation->image = $imagen;
		}

        $document = $_FILES['documents']['name'];
		if($document==""){
			$newfederation->documents = $_POST["acta_aux"];
		}
		else {
			$document = $_FILES['documents']['name'];
			$rout = "uploads/federation/".$document;
			$outcome = @move_uploaded_file($_FILES["documents"]["tmp_name"], $rout);
			$newfederation->documents = $document;
		}
        $newfederation->status = $_POST["status"];
        $newfederation->emailFederation = $_POST["email"];
		$newfederation->update();
		Core::redir("./?view=federation");
	}
	else if(isset($_GET["opt"]) && $_GET["opt"]=="del"){
		$idagrortic = base64_decode($_REQUEST['idcitorga']);
		$newfederation = FederationData::getById($idagrortic);
		$newfederation->del();
		Core::redir("./?view=federation");
	}

?>