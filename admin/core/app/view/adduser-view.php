<?php

	if(count($_POST)>0){
		$is_admin=0;
		if(isset($_POST["is_admin"])){$is_admin=1;}
		$user = new UserData();
		$user->name = $_POST["name"];
		$user->lastname = $_POST["lastname"];
		$user->identification = $_POST["identification"];
		$user->phone = $_POST["phone"];
			$imagen = $_FILES['image']['name'];
			$rout = "uploads/profiles/".$imagen;
			$outcome = @move_uploaded_file($_FILES["image"]["tmp_name"], $rout);
			$user->image = $imagen;
		$user->username = $_POST["username"];
		$user->email = $_POST["email"];
		$user->kind = $_POST["kind"];
		$user->password = sha1(md5($_POST["password"]));
		$user->add();
		print "<script>window.location='./?view=users';</script>";

	}

?>