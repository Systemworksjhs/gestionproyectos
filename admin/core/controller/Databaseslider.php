<?php
	$DB_HOST="localhost";//Servidor donde se encuentra alojada nuestra base de datos
	$DB_NAME= "agro_tic_narino";// Nombre de la base de datos
	$DB_USER= "root";//Usuario de la base de datos
	$DB_PASS= "JhosepH2020";//Contraseña del usuario de la base de datos
	# conectare la base de datos
    $con1=@mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
	mysqli_set_charset($con1,'utf8');
    if(!$con1){
        die("imposible conectarse: ".mysqli_error($con1));
    }
    if (@mysqli_connect_errno()) {
        die("Connect failed: ".mysqli_connect_errno()." : ". mysqli_connect_error());
    }
?>