<?php

	if(isset($_GET["opt"]) && $_GET["opt"]=="add"){
		$customers = new CustomersData();
		$customers->position = $_POST["position"];
        $customers->names = $_POST["names"];
        $customers->phone = $_POST["phone"];
        $customers->establishment = $_POST["establishment"];
        $customers->address = $_POST["address"];
        $customers->department = $_POST["department"];
        $customers->municipality = $_POST["municipality"];
        $customers->location_area = $_POST["location_area"];
        $customers->geographic_location = $_POST["geographic_location"];
        $customers->status = isset($_POST["status"])?1:0;
		$customers->add();
		Core::redir("./?view=Customers");
	}
	else if(isset($_GET["opt"]) && $_GET["opt"]=="update"){
		$customers = CustomersData::getById($_POST["id_customers"]);
		$customers->position = $_POST["position"];
        $customers->names = $_POST["names"];
        $customers->phone = $_POST["phone"];
        $customers->establishment = $_POST["establishment"];
        $customers->address = $_POST["address"];
        $customers->department = $_POST["department"];
        $customers->municipality = $_POST["municipality"];
        $customers->location_area = $_POST["location_area"];
        $customers->geographic_location = $_POST["geographic_location"];
        $customers->status = isset($_POST["status"])?1:0;
		$customers->update();
		Core::redir("./?view=Customers");
	}
	else if(isset($_GET["opt"]) && $_GET["opt"]=="del"){
		$idagrortic = base64_decode($_REQUEST['idcitorga']);
		$customers = CustomersData::getById($idagrortic);
		$customers->del();
		Core::redir("./?view=Customers");
	}

?>