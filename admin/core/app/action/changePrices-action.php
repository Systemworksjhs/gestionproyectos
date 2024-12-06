<?php

	if(isset($_GET["opt"]) && $_GET["opt"]=="add"){
		Core::redir("./?view=changePrices");
	}
	else if(isset($_GET["opt"]) && $_GET["opt"]=="update"){
		$producto = changePricesData::getById($_POST["id_product"]);
		$producto->enabled 	= isset($_POST["enabled"])?1:0;
		$producto->price = $_POST["price"];
		$producto->update();
		//acutulizamo hitorico de productos locales agrotic
		//$newUpdateProductHistory = new ProductHistoryData();
		//$newUpdateProductHistory->id_product = $_POST["id_product"];
		//$newUpdateProductHistory->image = $producto->image;
		//$newUpdateProductHistory->product = $_POST["name_product"];
		//$newUpdateProductHistory->price = $_POST["price"];
		//$newUpdateProductHistory->add();
 
		Core::redir("./?view=changePrices");
	}
	else if(isset($_GET["opt"]) && $_GET["opt"]=="del"){
		Core::redir("./?view=changePrices");
	}
 
 	if(isset($_POST["changePorcentaje"])&& $_GET["opt"]=="por"){
		echo "Calculando.... </br>";
		$auxIdUser 		= $_SESSION["id_userMunicipality"];
		$aIncrementar	= $_POST["incrementPrice"];
		Echo "Id usuario		: $auxIdUser<br>";
		Echo "Vr a incrementar	: $aIncrementar<br>";
		//Core::redir("./?view=changePrices");
	}
 
?>