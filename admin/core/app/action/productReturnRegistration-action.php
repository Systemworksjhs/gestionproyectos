<?php

	if(isset($_GET["opt"]) && $_GET["opt"]=="add"){
		$productsResgistration = new productReturnRegistrationData();
		$productsResgistration->Date_Registration = $_POST["Date_Registration"];
        $productsResgistration->Batch = $_POST["Batch"];
        $productsResgistration->Supplier = $_POST["Supplier"];
        $productsResgistration->Product_Tubers = $_POST["Product_Tubers"];
        $productsResgistration->Quantity_Tubers = $_POST["Quantity_Tubers"];
        $productsResgistration->Product_Fruits = $_POST["Product_Fruits"];
        $productsResgistration->Quantity_Fruits = $_POST["Quantity_Fruits"];
        $productsResgistration->Product_Pods = $_POST["Product_Pods"];
        $productsResgistration->Quantity_Pods = $_POST["Quantity_Pods"];
        $productsResgistration->Product_Branches = $_POST["Product_Branches"];
        $productsResgistration->Quantity_Branches = $_POST["Quantity_Branches"];
		$productsResgistration->add();
		Core::redir("./?view=productReturnRegistration");
	}
	else if(isset($_GET["opt"]) && $_GET["opt"]=="update"){
		$productsResgistration = productReturnRegistrationData::getById($_POST["id_product_return"]);
		$productsResgistration->Date_Registration = $_POST["Date_Registration"];
        $productsResgistration->Batch = $_POST["Batch"];
        $productsResgistration->Supplier = $_POST["Supplier"];
        $productsResgistration->Product_Tubers = $_POST["Product_Tubers"];
        $productsResgistration->Quantity_Tubers = $_POST["Quantity_Tubers"];
        $productsResgistration->Product_Fruits = $_POST["Product_Fruits"];
        $productsResgistration->Quantity_Fruits = $_POST["Quantity_Fruits"];
        $productsResgistration->Product_Pods = $_POST["Product_Pods"];
        $productsResgistration->Quantity_Pods = $_POST["Quantity_Pods"];
        $productsResgistration->Product_Branches = $_POST["Product_Branches"];
        $productsResgistration->Quantity_Branches = $_POST["Quantity_Branches"];
		$productsResgistration->update();
		Core::redir("./?view=productReturnRegistration");
	}
	else if(isset($_GET["opt"]) && $_GET["opt"]=="del"){
		$idagrortic = base64_decode($_REQUEST['idcitorga']);
		$productsResgistration = productReturnRegistrationData::getById($idagrortic);
		$productsResgistration->del();
		Core::redir("./?view=productReturnRegistration");
	}

?>