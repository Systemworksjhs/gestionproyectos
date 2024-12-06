<?php

	if(isset($_GET["opt"]) && $_GET["opt"]=="add"){
		$dispatchinventory = new dispatchinventoryData();
		$dispatchinventory->Date_Registration = $_POST["Date_Registration"];
        $dispatchinventory->Batch = $_POST["Batch"];
        $dispatchinventory->Supplier = $_POST["Supplier"];
        $dispatchinventory->Product_Tubers = $_POST["Product_Tubers"];
        $dispatchinventory->Quantity_Tubers = $_POST["Quantity_Tubers"];
        $dispatchinventory->Product_Fruits = $_POST["Product_Fruits"];
        $dispatchinventory->Quantity_Fruits = $_POST["Quantity_Fruits"];
        $dispatchinventory->Product_Pods = $_POST["Product_Pods"];
        $dispatchinventory->Quantity_Pods = $_POST["Quantity_Pods"];
        $dispatchinventory->Product_Branches = $_POST["Product_Branches"];
        $dispatchinventory->Quantity_Branches = $_POST["Quantity_Branches"];
		$dispatchinventory->add();
		Core::redir("./?view=dispatchinventory");
	}
	else if(isset($_GET["opt"]) && $_GET["opt"]=="update"){
		$dispatchinventory = dispatchinventoryData::getById($_POST["id_product_return"]);
		$dispatchinventory->Date_Registration = $_POST["Date_Registration"];
        $dispatchinventory->Batch = $_POST["Batch"];
        $dispatchinventory->Supplier = $_POST["Supplier"];
        $dispatchinventory->Product_Tubers = $_POST["Product_Tubers"];
        $dispatchinventory->Quantity_Tubers = $_POST["Quantity_Tubers"];
        $dispatchinventory->Product_Fruits = $_POST["Product_Fruits"];
        $dispatchinventory->Quantity_Fruits = $_POST["Quantity_Fruits"];
        $dispatchinventory->Product_Pods = $_POST["Product_Pods"];
        $dispatchinventory->Quantity_Pods = $_POST["Quantity_Pods"];
        $dispatchinventory->Product_Branches = $_POST["Product_Branches"];
        $dispatchinventory->Quantity_Branches = $_POST["Quantity_Branches"];
		$dispatchinventory->update();
		Core::redir("./?view=dispatchinventory");
	}
	else if(isset($_GET["opt"]) && $_GET["opt"]=="del"){
		$idagrortic = base64_decode($_REQUEST['idcitorga']);
		$dispatchinventory = dispatchinventoryData::getById($idagrortic);
		$dispatchinventory->del();
		Core::redir("./?view=dispatchinventory");
	}

?>