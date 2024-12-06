<?php

	if(isset($_GET["opt"]) && $_GET["opt"]=="add"){
		$producto = new ProductosData();
		$producto->nombre_Producto = $_POST["nombre_Producto"];
		$producto->estado = $_POST["estado"];
		$producto->clase = $_POST["clase"];
		$producto->price = $_POST["price"];
		$producto->unit_of_measurement = $_POST["unit_of_measurement"];
		$imagen = "";
        $imagen = $_FILES['imagen']['name'];
        $rout = "uploads/productos/".$imagen;
        $outcome = @move_uploaded_file($_FILES["imagen"]["tmp_name"], $rout);
		$producto->imagen = $imagen;
		$producto->add();

		$newUpdateProductHistory = new ProductHistoryData();
		$newUpdateProductHistory->id_product=$_POST["id_ProductoNew"];
		$newUpdateProductHistory->image = $imagen;
		$newUpdateProductHistory->product = $_POST["nombre_Producto"];
        $newUpdateProductHistory->price = $_POST["price"];
		$newUpdateProductHistory->add();

		Core::redir("./?view=productos");
	}
	else if(isset($_GET["opt"]) && $_GET["opt"]=="update"){
		$producto = ProductosData::getById($_POST["id_Producto"]);
		$producto->nombre_Producto = $_POST["nombre_Producto"];
		$producto->clase = $_POST["clase"];
		$producto->estado = $_POST["estado"];
		$producto->price = $_POST["price"];
		$producto->unit_of_measurement = $_POST["unit_of_measurement"];
		$imagen = $_FILES['imagen']['name'];
		if($imagen==""){
			$producto->imagen = $_POST["slide_img_aux"];
		}
		else {
			$imagen = $_FILES['imagen']['name'];
			$rout = "uploads/productos/".$imagen;
			$outcome = @move_uploaded_file($_FILES["imagen"]["tmp_name"], $rout);
			$producto->imagen = $imagen;
		}
		$producto->update();

		$newUpdateProductHistory = new ProductHistoryData();
		$newUpdateProductHistory->id_product = $_POST["id_Producto"];
		$newUpdateProductHistory->image = $producto->imagen;
		$newUpdateProductHistory->product = $_POST["nombre_Producto"];
		$newUpdateProductHistory->price = $_POST["price"];
		$newUpdateProductHistory->add();

		Core::redir("./?view=productos");
	}
	else if(isset($_GET["opt"]) && $_GET["opt"]=="del"){
		$idagrortic = base64_decode($_REQUEST['idcitorga']);
		$producto = ProductosData::getById($idagrortic);
		$producto->del();
		Core::redir("./?view=productos");
	}

?>