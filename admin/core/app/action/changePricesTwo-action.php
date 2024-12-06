<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Panel de Administraci√≥n</title>
		<link rel="icon" href="dist/img/favicon.ico">
		<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
		<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
		<!-- Bootstrap 3.3.4 -->
		<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
		<!-- Font Awesome Icons -->
		<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
		<!-- Theme style -->
		<link href="dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
	</head>
	<body>
	    
	    
	<?php
		if(isset($_POST["changePorcentaje"]) && $_GET["opt"]=="update"){
			echo "Calculando.... </br>";
			$auxIdUser 		= $_POST["municipioId"];
			$aIncrementar	= $_POST["incrementPrice"];
			//Ya se encuentra listo para seguir con la programaci®Æn ---->MVC ajustado
			//Echo "Id usuario		: $auxIdUser<br>";
			//Echo "Vr a incrementar	: $aIncrementar<br>";
			$producto = changePricesTwoData::getById($_POST["municipioId"]);
			$producto->price = $_POST["incrementPrice"];
			$producto->update($aIncrementar);
			echo "<div class='login-box'>";
				echo "<div class='card-header text-center'>";
					echo " <img src='uploads/setup/Cargando.gif' alt=''></br>";
					echo "<h3>Procesando solicitud</h3>";
					print "<script>window.location='./?view=changePrices';</script>";
				echo "</div";
			echo "</div";
		}
	?>
	</body>
	
</html>	