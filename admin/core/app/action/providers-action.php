<?php

	if(isset($_GET["opt"]) && $_GET["opt"]=="add"){
		$providers 					= new providersData();
		$providers->name			= $_POST["name"];
		$providers->nit 			= $_POST["nit"];
		$providers->phone 			= $_POST["phone"];
		$providers->address 		= $_POST["address"];
		$providers->municipality	= $_POST["municipality"];
		$image 						= "";
        $image 						= $_FILES['image']['name'];
        $rout 						= "uploads/providers/".$image;
        $outcome 					= @move_uploaded_file($_FILES["image"]["tmp_name"], $rout);
		$providers->image 			= $image;
        $files 						= "";
        $files 						= $_FILES['files']['name'];
        $rout 						= "uploads/providers/".$files;
        $outcome 					= @move_uploaded_file($_FILES["files"]["tmp_name"], $rout);
		$providers->certification 	= $files;
        $providers->status 			= isset($_POST["status"])?1:0;
		$product1					= "";
		$product 					= $_POST["products"];
		for ($i=0;$i<count($product);$i++)	{ 
			$product1 .=$product[$i]."\r";
		}
		$providers->products = $product1;
		$providers->add();

        Core::redir("./?view=providers");
	}
	else if(isset($_GET["opt"]) && $_GET["opt"]=="update"){
		$providers = providersData::getById($_POST["id_provider"]);
		$providers->name = $_POST["name"];
		$providers->nit = $_POST["nit"];
		$providers->phone = $_POST["phone"];
		$providers->address = $_POST["address"];
		$providers->municipality = $_POST["municipality"];
		$image = $_FILES['image']['name'];
		if($image==""){
			$providers->image = $_POST["slide_img_aux"];
		}
		else {
			$image = $_FILES['image']['name'];
			$rout = "uploads/providers/".$image;
			$outcome = @move_uploaded_file($_FILES["image"]["tmp_name"], $rout);
			$providers->image = $image;
		}
        $files = $_FILES['files']['name'];
		if($files==""){
			$providers->certification = $_POST["certification_aux"];
		}
		else {
			$files = $_FILES['files']['name'];
			$rout = "uploads/providers/".$files;
			$outcome = @move_uploaded_file($_FILES["files"]["tmp_name"], $rout);
			$providers->certification = $files;
		}
        $providers->status = isset($_POST["status"])?1:0;

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
		$providers->products = $product1;

		$providers->update();
        Core::redir("./?view=providers");
	}
	else if(isset($_GET["opt"]) && $_GET["opt"]=="del"){
		$idagrortic = base64_decode($_REQUEST['idcitorga']);
		$providers = providersData::getById($idagrortic);
		$providers->del();
		Core::redir("./?view=providers");
	}

?>