<?php

	if(isset($_GET["opt"]) && $_GET["opt"]=="add"){
		$categoria = new categorias_ProductosData();
		$categoria->nombre_Categoria = $_POST["nombre_Categoria"];
		$categoria->add();
		Core::redir("./?view=categorias_Productos");
	}
	else if(isset($_GET["opt"]) && $_GET["opt"]=="update"){
		$categoria = categorias_ProductosData::getById($_POST["categoria_Id"]);
		$categoria->nombre_Categoria = $_POST["nombre_Categoria"];
		$categoria->update();
		Core::redir("./?view=categorias_Productos");
	}
	else if(isset($_GET["opt"]) && $_GET["opt"]=="del"){
		$idagrortic = base64_decode($_REQUEST['idcitorga']);
		$categoria = categorias_ProductosData::getById($idagrortic);
		$categoria->del();
		Core::redir("./?view=categorias_Productos");
	}

?>