<?php

	if(isset($_GET["opt"]) && $_GET["opt"]=="add"){
		$producto = new productosDptoData();
		$producto->name_product = $_POST["name_product"];
		$producto->scientific_name= $_POST["scientific_name"];
        $producto->various= $_POST["various"];
		$producto->enabled 	= isset($_POST["enabled"])?1:0;
		$imagen = "";
        $imagen = $_FILES['image']['name'];
        $rout = "./../images/products/".$imagen;
        $outcome = @move_uploaded_file($_FILES["image"]["tmp_name"], $rout);
		$producto->image = $imagen;
        
        
        $presentations	= "[";
		$presentations1	= $_POST["presentation"];
		
		for ($i=0;$i<count($presentations1);$i++){ 
		    $partes = explode(",", $presentations1[$i]);
			$presentations .='{\"name\":\"'.$partes[0].'\",\"grams\":\"'.$partes[1].'\",\"priceGram\":\"0\",\"incrementPrice\":\"0\"},';
		}
		$presentations = substr($presentations, 0, -1);
		$presentations .="]";
		$producto->presentation = $presentations;
        
        
        
        
        $producto->municipioId = $_POST["municipioId"];
        $producto->description = $_POST["description"];
        $producto->url_product = $_POST["url_product"];
        $producto->id_category_product = $_POST["id_category_product"];
        $producto->view=0;
        $producto->sales=0;
        $producto->add();
		$newUpdateProductHistory = new ProductHistoryData();
		$newUpdateProductHistory->id_product=$_POST["id_productNew"];
		$newUpdateProductHistory->image = $imagen;
		$newUpdateProductHistory->product = $_POST["name_product"];
        $newUpdateProductHistory->price = $_POST["price"];
		$newUpdateProductHistory->add();
		

		Core::redir("./?view=productosDpto");
		
		
	}else if(isset($_GET["opt"]) && $_GET["opt"]=="update"){
		$producto = productosDptoData::getById($_POST["id_product"]);
		$producto->name_product = $_POST["name_product"];
		$producto->enabled 	= isset($_POST["enabled"])?1:0;
		$producto->scientific_name= $_POST["scientific_name"];
        $producto->various= $_POST["various"];
		$imagen = "";
		$imagen = $_FILES['image']['name'];
		$presentaciones = $_POST["presentations"];
		if($imagen==""){
			$producto->image = $_POST["slide_img_aux"];
		}else {
			$imagen = $_FILES['image']['name'];
			$rout = "./../images/products/".$imagen;
			$outcome = @move_uploaded_file($_FILES["image"]["tmp_name"], $rout);
			$producto->image = $imagen;
		}
        
        $producto->municipioId = $_POST["municipioId"];
        $producto->description = $_POST["description"];
        $producto->url_product = $_POST["url_product"];
        
        $presentations	= "[";
		$presentations1	= $_POST["presentations"];
		$presentations2 = $producto->presentation;
		//print_r($producto->presentation);
		//echo ($producto->presentation);
		//echo "hola";
		for ($i=0;$i<count($presentations1);$i++){ 
		    $partes = explode(",", $presentations1[$i]);
			$presentations .='{\"name\":\"'.$partes[0].'\",\"grams\":\"'.$partes[1].'\",\"priceGram\":\"0\",\"incrementPrice\":\"0\"},';
		}
		$presentations = substr($presentations, 0, -1);
		$presentations .="]";
		$presentationsJSON = json_decode(stripslashes($presentations), true);
	    //echo "Presentaciones capturadas: ".$presentations;
	    //echo "Presentaciones capturadas JSON: ";
		//print_r ($presentationsJSON);
		//echo "Presentaciones capturadas JSON: ";
		//print_r (json_decode($presentations2,true));
		
		foreach ($presentationsJSON as &$item1) {
            // Iterate over presentation2
            //echo ("1 ");
            foreach (json_decode($presentations2,true) as $item2) {
                //echo ("2 ");
                // Check if the names match
                if ($item1["name"] === $item2["name"]) {
                    // Update the values in presentation1
                    $item1["priceGram"] = $item2["priceGram"];
                    $item1["incrementPrice"] = $item2["incrementPrice"];
                    //echo ("coincide");
                    break; // Exit the inner loop once a match is found
                }
            }
        }
		$presentations=addslashes(json_encode($presentationsJSON));
		//echo $presentations;
		
		$producto->presentation = $presentations;
        
        $producto->id_category_product = $_POST["id_category_product"];
        
        //echo $producto->enabled."<br>";
        //echo $producto->id_category_product."<br>";
        //echo $producto->name_product."<br>";
        //echo $producto->scientific_name."<br>";
        //echo $producto->various."<br>";
        //echo $producto->url_product."<br>";
        //echo $producto->presentation."<br>";
        //echo $producto->municipioId."<br>";
        //echo $producto->description."<br>";
        //echo $producto->image."<br>";
        //echo $producto->view."<br>";
        //echo $producto->sales."<br>";
        //echo $producto->creation_date."<br>";
        //echo $producto->update_date."<br>";
        //echo $producto->chage_prices_update."<br>";
        
        //Quitar
		$producto->update();

		$newUpdateProductHistory = new ProductHistoryData();
		$newUpdateProductHistory->id_product = $_POST["id_product"];
		$newUpdateProductHistory->image = $producto->image;
		$newUpdateProductHistory->product = $_POST["name_product"];
		$newUpdateProductHistory->price = $_POST["price"];
		$newUpdateProductHistory->add();

        //Quitar
		Core::redir("./?view=productosDpto");
	
	    
	}else if(isset($_GET["opt"]) && $_GET["opt"]=="del"){
		$idagrortic = base64_decode($_REQUEST['idcitorga']);
		$producto = productosDptoData::getById($idagrortic);
		$producto->del();
		Core::redir("./?view=productosDpto");
	}

?>