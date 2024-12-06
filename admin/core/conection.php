<?php
	$mysqli=new mysqli("localhost","root","JhosepH2020","agro_tic_narino"); //servidor, usuario de base de datos, contraseña del usuario, nombre de base de datos
	if(mysqli_connect_errno()){
		echo 'Conexion Fallida : ', mysqli_connect_error();
		exit();
	}
	 if($mysqli){
		 mysqli_set_charset($mysqli,'utf8');
	 } 
?>