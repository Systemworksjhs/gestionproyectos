<?php

	if(isset($_GET["opt"]) && $_GET["opt"]=="add"){
		$receptionsRawMaterials = new receptionRawMaterialsData();
		$receptionsRawMaterials->Date_Registration = $_POST["Date_Registration"];
        $receptionsRawMaterials->Batch = $_POST["Batch"];
        $receptionsRawMaterials->Supplier = $_POST["Supplier"];
        $receptionsRawMaterials->Product_Tubers = $_POST["Product_Tubers"];
        $receptionsRawMaterials->Quantity_Tubers = $_POST["Quantity_Tubers"];
        $receptionsRawMaterials->Product_Fruits = $_POST["Product_Fruits"];
        $receptionsRawMaterials->Quantity_Fruits = $_POST["Quantity_Fruits"];
        $receptionsRawMaterials->Product_Pods = $_POST["Product_Pods"];
        $receptionsRawMaterials->Quantity_Pods = $_POST["Quantity_Pods"];
        $receptionsRawMaterials->Product_Branches = $_POST["Product_Branches"];
        $receptionsRawMaterials->Quantity_Branches = $_POST["Quantity_Branches"];
		$receptionsRawMaterials->add();
		Core::redir("./?view=receptionRawMaterials");
	}
	else if(isset($_GET["opt"]) && $_GET["opt"]=="update"){
		$receptionsRawMaterials = receptionRawMaterialsData::getById($_POST["id_product_return"]);
		$receptionsRawMaterials->Date_Registration = $_POST["Date_Registration"];
        $receptionsRawMaterials->Batch = $_POST["Batch"];
        $receptionsRawMaterials->Supplier = $_POST["Supplier"];
        $receptionsRawMaterials->Product_Tubers = $_POST["Product_Tubers"];
        $receptionsRawMaterials->Quantity_Tubers = $_POST["Quantity_Tubers"];
        $receptionsRawMaterials->Product_Fruits = $_POST["Product_Fruits"];
        $receptionsRawMaterials->Quantity_Fruits = $_POST["Quantity_Fruits"];
        $receptionsRawMaterials->Product_Pods = $_POST["Product_Pods"];
        $receptionsRawMaterials->Quantity_Pods = $_POST["Quantity_Pods"];
        $receptionsRawMaterials->Product_Branches = $_POST["Product_Branches"];
        $receptionsRawMaterials->Quantity_Branches = $_POST["Quantity_Branches"];
		$receptionsRawMaterials->update();
		Core::redir("./?view=receptionRawMaterials");
	}
	else if(isset($_GET["opt"]) && $_GET["opt"]=="del"){
		$idagrortic = base64_decode($_REQUEST['idcitorga']);
		$receptionsRawMaterials = receptionRawMaterialsData::getById($idagrortic);
		$receptionsRawMaterials->del();
		Core::redir("./?view=receptionRawMaterials");
	}

?>