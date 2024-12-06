<?php

	if(count($_POST)>0){
		$is_admin=0;
		//if(isset($_POST["is_admin"])){$is_admin=1;}
		$user = new UserStandarData();
		$user->names = $_POST["names"];
		$user->lastnames = $_POST["lastnames"];
		$user->identificacion = $_POST["identificacion"];
		$user->phone = $_POST["phone"];
			$imagen = $_FILES['imagen']['name'];
			$rout = "uploads/profiles/".$imagen;
			$outcome = @move_uploaded_file($_FILES["imagen"]["tmp_name"], $rout);
        $user->imagen = $imagen;
		$user->usuario = $_POST["identificacion"];
		$user->email = $_POST["email"];
		$user->id_tipo = 2;
        $user->address = $_POST["address"];
        $user->activacion = isset($_POST["activacion"])?1:0;
        $user->id_municipality_user = $_POST["id_municipality_user"];
        $user->rol = isset($_POST["rol"])?"Proveedor":"Cliente";
        $user->password = password_hash($_POST["password"], PASSWORD_DEFAULT);
		$user->token = sha1(md5($_POST["password"]));
        $user->add();
		print "<script>window.location='./?view=usersStandar';</script>";
	}

?>
