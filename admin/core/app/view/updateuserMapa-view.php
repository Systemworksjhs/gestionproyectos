<?php
	//if(count($_POST)>0){
		$kind=0;
		if(isset($_POST["kind"])){$kind=1;}
		$userMapa = userMapaData::getById($_POST["id_user"]);
		$userMapa->insignia_bmp = isset($_POST["bpm"])?1:0;
		$userMapa->insignia_bpa = isset($_POST["bpa"])?1:0;
		$userMapa->id_user=$_POST["id_user"];
		//$userMapa->names = $_POST["names"];                             
		//$userMapa->lastnames = $_POST["lastnames"];                     
		//$userMapa->usuario = $_POST["identificacion"];                  
		//$userMapa->identificacion = $_POST["identificacion"];           
		//$userMapa->phone = $_POST["phone"];                             
		//$userMapa->email = $_POST["email"];                             
		//$userMapa->id_tipo=2;
		
		//$imagen = $_FILES['image']['name'];
		//if($imagen==""){
		//	$userMapa->imagen = $_POST["slide_img_aux"];                
		//}
		//else {
		//	$imagen = $_FILES['image']['name'];
		//	$rout = "uploads/profiles/".$imagen;
		//	$outcome = @move_uploaded_file($_FILES["image"]["tmp_name"], $rout);
		//	$userMapa->imagen = $imagen;
		//}
		
        //$userMapa->address = $_POST["address"];                 
        //$userMapa->id_municipality_user = $_POST["id_municipality_user"];     
        //$userMapa->rol = isset($_POST["rol"])?"Proveedor":"Cliente";
		
		$userMapa->update();
		print "<script>window.location='./?view=insignias';</script>";
	//}
?>