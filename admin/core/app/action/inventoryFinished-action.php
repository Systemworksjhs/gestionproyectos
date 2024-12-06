<?php

	if(isset($_GET["opt"]) && $_GET["opt"]=="add"){
		$inventoryFinish = new inventoryFinishedData();
		$inventoryFinish->dateRegistrer = $_POST["dateRegistrer"];
        $inventoryFinish->batch = $_POST["batch"];
        $inventoryFinish->supplier = $_POST["supplier"];
        $inventoryFinish->product = $_POST["selectproduct"];
        
        $numInput = $_POST["inputTotal"];
        $cantidad = "";
        
        for ($i = 0; $i < $numInput; $i++){
            
            $input1 = $_POST["inputP".$i];
            $input2 = $_POST["inputE".$i];
            $cantidad = $cantidad.$input2."=".$input1."<br>";
            
        }
        $cantidad = substr($cantidad, 0, -4);
        $inventoryFinish->amount = $cantidad;
        $inventoryFinish->decrease = $_POST["decrease"];
		$inventoryFinish->add();
		Core::redir("./?view=inventoryFinished");
	}
	else if(isset($_GET["opt"]) && $_GET["opt"]=="update"){
		$inventoryFinish = inventoryFinishedData::getById($_POST["id_inventory"]);
		$inventoryFinish->dateRegistrer = $_POST["dateRegistrer"];
        $inventoryFinish->batch = $_POST["batch"];
        $inventoryFinish->supplier = $_POST["supplier"];
        $inventoryFinish->product = $_POST["product"];
        
        $numInput = $_POST["inputTotal"];
        $cantidad = "";
        
        for ($i = 0; $i < $numInput; $i++){
            
            $input1 = $_POST["inputP".$i];
            $input2 = $_POST["inputE".$i];
            $cantidad = $cantidad.$input2."=".$input1."<br>";
            
        }
        
        $cantidad = substr($cantidad, 0, -4);
        $inventoryFinish->amount = $cantidad;
        $inventoryFinish->decrease = $_POST["decrease"];
		$inventoryFinish->update();
		Core::redir("./?view=inventoryFinished");
	}
	else if(isset($_GET["opt"]) && $_GET["opt"]=="del"){
		$idagrortic = base64_decode($_REQUEST['idcitorga']);
		$inventoryFinish = inventoryFinishedData::getById($idagrortic);
		$inventoryFinish->del();
		Core::redir("./?view=inventoryFinished");
	}

?>