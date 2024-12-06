<?php

	if(isset($_GET["opt"]) && $_GET["opt"]=="add"){
		$testimonials = new testimonialsData();
		$testimonials->names = $_POST["names"];
        $testimonials->message = $_POST["message"];
        $testimonials->occupation = $_POST["occupation"];
        $imagen = "";
        $imagen = $_FILES['image']['name'];
        $rout = "uploads/testimonials/".$imagen;
        $outcome = @move_uploaded_file($_FILES["image"]["tmp_name"], $rout);
		$testimonials->image = $imagen;
        $testimonials->status = isset($_POST["status"])?1:0;
		$testimonials->add();
		Core::redir("./?view=testimonials");
	}
	else if(isset($_GET["opt"]) && $_GET["opt"]=="update"){
		$testimonials = testimonialsData::getById($_POST["id_testimonials"]);
		$testimonials->names = $_POST["names"];
        $testimonials->message = $_POST["message"];
        $testimonials->occupation = $_POST["occupation"];
        $imagen = $_FILES['image']['name'];
		if($imagen==""){
			$imagen = $_POST["slide_img_aux"];
		}
		else {
			$imagen = $_FILES['image']['name'];
			$rout = "uploads/testimonials/".$imagen;
			$outcome = @move_uploaded_file($_FILES["image"]["tmp_name"], $rout);
			$testimonials->image = $imagen;
		}
        $testimonials->status = isset($_POST["status"])?1:0;
		$testimonials->update();
		Core::redir("./?view=testimonials");
	}
	else if(isset($_GET["opt"]) && $_GET["opt"]=="del"){
		$idagrortic = base64_decode($_REQUEST['idcitorga']);
		$testimonials = testimonialsData::getById($idagrortic);
		$testimonials->del();
		Core::redir("./?view=testimonials");
	}

?>