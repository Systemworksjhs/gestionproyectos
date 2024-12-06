<?php

	if(isset($_GET["opt"]) && $_GET["opt"]=="add"){
		$newUpdateProductHistory = new ProductHistoryData();
		$newUpdateProductHistory->image = $imagen;
		$newUpdateProductHistory->product = $_POST["nombre_Producto"];
        $newUpdateProductHistory->price = $_POST["price"];
		//$newUpdateProductHistory->add();
		Core::redir("./?view=productHistory");
	}
	else if(isset($_GET["opt"]) && $_GET["opt"]=="update"){

		$newUpdateProductHistory = new ProductHistoryData();
		$newUpdateProductHistory->id_product = $_POST["id_Producto"];
		$newUpdateProductHistory->image = $producto->imagen;
		$newUpdateProductHistory->product = $_POST["nombre_Producto"];
		$newUpdateProductHistory->price = $_POST["price"];
		//$newUpdateProductHistory->add();
		Core::redir("./?view=productHistory");
	}
	else if(isset($_GET["opt"]) && $_GET["opt"]=="del"){
		$idagrortic = base64_decode($_REQUEST['idcitorga']);
		$producto = ProductHistoryData::getById($idagrortic);
		$producto->del();
		Core::redir("./?view=productHistory");
	}

?>