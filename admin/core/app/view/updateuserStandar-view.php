<?php

	if(count($_POST)>0){
		$kind=0;
		if(isset($_POST["kind"])){$kind=1;}
		//$status=0;
		//if(isset($_POST["status"])){$status=1;}
		$user = UserStandarData::getById($_POST["user_id"]);
		$user->activacion = isset($_POST["activacion"])?1:0;
		$user->names = $_POST["names"];                             
		$user->lastnames = $_POST["lastnames"];                     
		$user->usuario = $_POST["identificacion"];                  
		$user->identificacion = $_POST["identificacion"];           
		$user->phone = $_POST["phone"];                             
		$user->email = $_POST["email"];                             
		$user->id_tipo=2;
		$imagen = $_FILES['image']['name'];
		if($imagen==""){
			$user->imagen = $_POST["slide_img_aux"];                
		}
		else {
			$imagen = $_FILES['image']['name'];
			$rout = "uploads/profiles/".$imagen;
			$outcome = @move_uploaded_file($_FILES["image"]["tmp_name"], $rout);
			$user->imagen = $imagen;
		}
        $user->address = $_POST["address"];                 
        $user->id_municipality_user = $_POST["id_municipality_user"];     
        $user->rol = isset($_POST["rol"])?"Proveedor":"Cliente";

		$user->update();
		if($_POST["password"]!=""){
			$user->password = password_hash($_POST["password"], PASSWORD_DEFAULT);
			$user->update_passwd();
			print "<script>alert('Se ha actualizado el password');</script>";
		}
		print "<script>window.location='./?view=usersStandar';</script>";
	}

?>
