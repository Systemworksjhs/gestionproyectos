<?php
    //Llamamos al modelo de los productos dpto pero con la nueva funcion : updatePresentations
    if(isset($_GET["opt"]) && $_GET["opt"]=="update"){
		$stringJson = $_POST["strJson"];
		$stringJson = str_replace('"', '\"', $stringJson);
		$enabled = isset($_POST["enabled"])?1:0;
		$id_product = $_POST["id_product"];
		$updatePresentation = productosDptoData::getById($_POST["id_product"]);
        $updatePresentation->enabled = isset($_POST["enabled"])?1:0;
        $updatePresentation->presentation = strval($stringJson);
		$updatePresentation->updatePresentations();
		Core::redir("./?view=changePrices");
	}

?>