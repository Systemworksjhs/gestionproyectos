<?php
	if(isset($_GET['opt']) && $_GET['opt'] == 'general'){
		$mercado = new mercados_campesinosData();
		$mercado->titulo = $_POST['titulo'];
		$imagen = "";
        $imagen = $_FILES['image']['name'];
        $rout = "./../images/".$imagen;
        $outcome = @move_uploaded_file($_FILES["image"]["tmp_name"], $rout);
		$mercado->image = $imagen;
		//echo $_POST['titulo'];
        $mercado->updateGeneral();
        Core::redir("./?view=mercados_campesinos");

	}else if(isset($_GET["opt"]) && $_GET["opt"] == "mercado1"){
        $mercado = new mercados_campesinosData();
        $mercado->nombre = $_POST['nombre1'];
        $mercado->precio = $_POST['precio1'];
    
        $productos1 = $_POST["products"];
        $numProducts = count($productos1); // Cambiado de $array a $productos1
        $k = 0;
        $productosArray = array();
    
        foreach ($productos1 as $product) {
            $k = $k + 1;
            $clavePresentacion = "presentacion" . $k;
    
            // Agregar el producto al array
            $productosArray[] = array("producto" => $product, "presentation" => $_POST[$clavePresentacion]);
            //echo $_POST[$clavePresentacion];
        }
        // Convertir el array a formato JSON
        $productosJson = json_encode($productosArray);
        //echo $productosJson;
        $mercado->productos = $productosJson;
        $mercado->updateMercado1();

		Core::redir("./?view=mercados_campesinos");
	
	}else if(isset($_GET["opt"]) && $_GET["opt"] == "mercado2"){
        $mercado = new mercados_campesinosData();
        $mercado->nombre = $_POST['nombre2'];
        $mercado->precio = $_POST['precio2'];
    
        $productos1 = $_POST["products2"];
        $numProducts = count($productos1); // Cambiado de $array a $productos1
        $k = 0;
        $productosArray = array();
    
        foreach ($productos1 as $product) {
            $k = $k + 1;
            $clavePresentacion = "presentacion" . $k;
    
            // Agregar el producto al array
            $productosArray[] = array("producto" => $product, "presentation" => $_POST[$clavePresentacion]);
            //echo $_POST[$clavePresentacion];
        }
        // Convertir el array a formato JSON
        $productosJson = json_encode($productosArray);
        //echo $productosJson;
        $mercado->productos = $productosJson;
        $mercado->updateMercado2();

		Core::redir("./?view=mercados_campesinos");
	    
	}else if(isset($_GET["opt"]) && $_GET["opt"]=="del"){
		$mercado = new mercados_campesinosData();
		$mercado->nombre = $_POST['nombre2'];
		$mercado->precio = $_POST['precio2'];
		//$mercado->productos = $_POST['precio1'];
        $mercado->updateMercado2();
		
		Core::redir("./?view=mercados_campesinos");
	}

?>