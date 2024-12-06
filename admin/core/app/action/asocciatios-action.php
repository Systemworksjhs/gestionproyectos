<?php

	if(isset($_GET["opt"]) && $_GET["opt"]=="add"){
		$newasocciatios = new AsocciatiosData();
		$newasocciatios->name = $_POST["name"];
        $newasocciatios->legal_representative = $_POST["legal_representative"];
        $newasocciatios->phone = $_POST["phone"];
        $newasocciatios->slug = $_POST["slug"];
        $newasocciatios->facebook = $_POST["facebook"];
        $newasocciatios->twitter = $_POST["twitter"];
        $newasocciatios->instagram = $_POST["instagram"];
        $newasocciatios->textAsociation = $_POST["textAsociation"];
        $newasocciatios->mision = $_POST["mision"];
        $newasocciatios->vision = $_POST["vision"];
        $imagen = "";
        $imagen = $_FILES['logo']['name'];
        $rout = "uploads/images/".$imagen;
        $outcome = @move_uploaded_file($_FILES["logo"]["tmp_name"], $rout);
		$newasocciatios->logo = $imagen;
        $document = "";
        $document = $_FILES['documents']['name'];
        $rout = "uploads/documents/".$document;
        $outcome = @move_uploaded_file($_FILES["documents"]["tmp_name"], $rout);
		$newasocciatios->documents = $document;
        $newasocciatios->municipality = $_POST["municipality"];
        $newasocciatios->status = $_POST["status"];

		$newasocciatios->item_1 = $_POST["item-1"];
        $newasocciatios->text_item_1 = $_POST["text-item-1"];
		$item_img_1 = $_FILES['item_img_1']['name'];
        $rout = "uploads/asociaciones/".$item_img_1;
        $outcome = @move_uploaded_file($_FILES["item_img_1"]["tmp_name"], $rout);
		$newasocciatios->img_item_1 = $item_img_1;

		$newasocciatios->item_2 = $_POST["item-2"];
        $newasocciatios->text_item_2 = $_POST["text-item-2"];
		$item_img_2 = $_FILES['item_img_2']['name'];
        $rout = "uploads/asociaciones/".$item_img_2;
        $outcome = @move_uploaded_file($_FILES["item_img_2"]["tmp_name"], $rout);
		$newasocciatios->img_item_2 = $item_img_2;

		$newasocciatios->item_3 = $_POST["item-3"];
        $newasocciatios->text_item_3 = $_POST["text-item-3"];
		$item_img_3 = $_FILES['item_img_3']['name'];
        $rout = "uploads/asociaciones/".$item_img_3;
        $outcome = @move_uploaded_file($_FILES["item_img_3"]["tmp_name"], $rout);
		$newasocciatios->img_item_3 = $item_img_3;

		$newasocciatios->add();
		Core::redir("./?view=asocciatios");
	}
	else if(isset($_GET["opt"]) && $_GET["opt"]=="update"){
		$newasocciatios = AsocciatiosData::getById($_POST["id_asocciatios"]);
		$newasocciatios->name = $_POST["name"];
        $newasocciatios->legal_representative = $_POST["legal_representative"];
        $newasocciatios->phone = $_POST["phone"];
        $newasocciatios->slug = $_POST["slug"];
        $newasocciatios->facebook = $_POST["facebook"];
        $newasocciatios->twitter = $_POST["twitter"];
        $newasocciatios->instagram = $_POST["instagram"];
        $newasocciatios->textAsociation = $_POST["textAsociation"];
        $newasocciatios->mision = $_POST["mision"];
        $newasocciatios->vision = $_POST["vision"];
		$imagen = $_FILES['logo']['name'];
		if($imagen==""){
			$imagen = $_POST["slide_img_aux"];
		}
		else {
			$imagen = $_FILES['logo']['name'];
			$rout = "uploads/images/".$imagen;
			$outcome = @move_uploaded_file($_FILES["logo"]["tmp_name"], $rout);
			$newasocciatios->logo = $imagen;
		}
		$document = $_FILES['documents']['name'];
		if($document==""){
			$newasocciatios->documents = $_POST["acta_aux"];
		}
		else {
			$document = $_FILES['documents']['name'];
			$rout = "uploads/documents/".$document;
			$outcome = @move_uploaded_file($_FILES["documents"]["tmp_name"], $rout);
			$newasocciatios->documents = $document;
		}
        $newasocciatios->municipality = $_POST["municipality"];
        $newasocciatios->status = $_POST["status"];

		$newasocciatios->item_1 = $_POST["item-1"];
        $newasocciatios->text_item_1 = $_POST["text-item-1"];
		$img_item_1 = $_FILES['item_img_1']['name'];
		if($img_item_1==""){
			$img_item_1 = $_POST["slide_img_aux_2"];
		}
		else {
			$img_item_1 = $_FILES['item_img_1']['name'];
			$rout = "uploads/asociaciones/".$img_item_1;
			$outcome = @move_uploaded_file($_FILES["item_img_1"]["tmp_name"], $rout);
			$newasocciatios->img_item_1 = $img_item_1;
		}

		$newasocciatios->item_2 = $_POST["item-2"];
        $newasocciatios->text_item_2 = $_POST["text-item-2"];
		$img_item_2 = $_FILES['item_img_2']['name'];
		if($img_item_2==""){
			$img_item_2 = $_POST["slide_img_aux_3"];
		}
		else {
			$img_item_2 = $_FILES['item_img_2']['name'];
			$rout = "uploads/asociaciones/".$img_item_2;
			$outcome = @move_uploaded_file($_FILES["item_img_2"]["tmp_name"], $rout);
			$newasocciatios->img_item_2 = $img_item_2;
		}

		$newasocciatios->item_3 = $_POST["item-3"];
        $newasocciatios->text_item_3 = $_POST["text-item-3"];
		$img_item_3 = $_FILES['item_img_3']['name'];
		if($img_item_3==""){
			$img_item_3 = $_POST["slide_img_aux_4"];
		}
		else {
			$img_item_3 = $_FILES['item_img_3']['name'];
			$rout = "uploads/asociaciones/".$img_item_3;
			$outcome = @move_uploaded_file($_FILES["item_img_3"]["tmp_name"], $rout);
			$newasocciatios->img_item_3 = $img_item_3;
		}

		$newasocciatios->update();
		Core::redir("./?view=asocciatios");
	}
	else if(isset($_GET["opt"]) && $_GET["opt"]=="del"){
		$idagrortic = base64_decode($_REQUEST['idcitorga']);
		$newasocciatios = AsocciatiosData::getById($idagrortic);
		$newasocciatios->del();
		Core::redir("./?view=asocciatios");
	}

?>