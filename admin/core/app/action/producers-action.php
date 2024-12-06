<?php
	if(isset($_GET["opt"]) && $_GET["opt"]=="add"){
		$producers = new ProducersData();
		$producers->position = $_POST["position"];
        $producers->names = $_POST["names"];
        $producers->cedula = $_POST["cedula"];
        $producers->phone = $_POST["phone"];
        $producers->establishment = $_POST["establishment"];
        $producers->address = $_POST["address"];
        $producers->department = $_POST["department"];
        $producers->municipality = $_POST["municipality"];
        $producers->location_area = $_POST["location_area"];
        $producers->geographic_location = $_POST["geographic_location"];
        $producers->status = isset($_POST["status"])?1:0;
        $imagen = "";
        $imagen = $_FILES['image']['name'];
        $rout = "uploads/producers/".$imagen;
        $outcome = @move_uploaded_file($_FILES["image"]["tmp_name"], $rout);
		$producers->image = $imagen;
		$product1 = "";
		$product = $_POST["products"];
		for ($i=0;$i<count($product);$i++)	{ 
			$product1 .=$product[$i]."\r";
		}
		$producers->products = $product1;
		$producers->add();
		Core::redir("./?view=producers");
	}
	else if(isset($_GET["opt"]) && $_GET["opt"]=="update"){
		$producers = ProducersData::getById($_POST["id_producers"]);
		$producers->position = $_POST["position"];
        $producers->names = $_POST["names"];
        $producers->cedula = $_POST["cedula"];
        $producers->phone = $_POST["phone"];
        $producers->establishment = $_POST["establishment"];
        $producers->address = $_POST["address"];
        $producers->department = $_POST["department"];
        $producers->municipality = $_POST["municipality"];
        $producers->location_area = $_POST["location_area"];
        $producers->geographic_location = $_POST["geographic_location"];
        $producers->status = isset($_POST["status"])?1:0;
        $imagen = $_FILES['image']['name'];
		if($imagen==""){
			$producers->image = $_POST["slide_img_aux"];
		}
		else {
			$imagen = $_FILES['image']['name'];
			$rout = "uploads/producers/".$imagen;
			$outcome = @move_uploaded_file($_FILES["image"]["tmp_name"], $rout);
			$producers->image = $imagen;
		}
		$product1="";
		if($_POST['Aux']==""){
			$product = $_POST['products'];
			for ($i=0;$i<count($product);$i++)	{ 
				$product1 .=$product[$i]."\r";
			}
		}else {
			if (!empty($_POST['products'])) {
				$product = $_POST['products'];
				for ($i=0;$i<count($product);$i++)	{ 
					$product1 .=$product[$i]."\r";
				}
			}
			else{
				$product1=$_POST['ProductAux'];
			}
		}
		$producers->products = $product1;
		$producers->update();
		Core::redir("./?view=producers");
	}
	else if(isset($_GET["opt"]) && $_GET["opt"]=="del"){
		$idagrortic = base64_decode($_REQUEST['idcitorga']);
		$producers = ProducersData::getById($idagrortic);
		$producers->del();
		Core::redir("./?view=producers");
	}

?>