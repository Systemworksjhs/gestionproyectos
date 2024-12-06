<?php

	if(count($_POST)>0){
		$kind=0;
		if(isset($_POST["kind"])){$kind=1;}
		//$status=0;
		//if(isset($_POST["status"])){$status=1;}
		$user = UserData::getById($_POST["user_id"]);
		$user->status = isset($_POST["status"])?1:0;
		$user->name = $_POST["name"];
		$user->lastname = $_POST["lastname"];
		$user->username = $_POST["username"];
		$user->identification = $_POST["identification"];
		$user->phone = $_POST["phone"];
		$user->email = $_POST["email"];
		$user->kind=$kind;
		$imagen = $_FILES['image']['name'];
		if($imagen==""){
			$user->image = $_POST["slide_img_aux"];
		}
		else {
			$imagen = $_FILES['image']['name'];
			$rout = "uploads/profiles/".$imagen;
			$outcome = @move_uploaded_file($_FILES["image"]["tmp_name"], $rout);
			$user->image = $imagen;
		}
		$user->update();
		if($_POST["password"]!=""){
			$user->password = sha1(md5($_POST["password"]));
			$user->update_passwd();
			print "<script>alert('Se ha actualizado el password');</script>";
		}
		print "<script>window.location='./?view=users';</script>";
	}

?>