<?php
	require '../../../core/conection.php';
	require '../../../core/funcs.php';
	$errors = array();
	if (!empty($_POST)) {
		$email = $mysqli->real_escape_string($_POST['email']);
		if(!isEmail($email)){
			$errors[] = "Debe ingresar un correo electrónico válido";
		}	
		if(emailExiste($email)){
			$user_id = getValor('id','correo', $email);
			$nombre = getValor('nombre','correo', $email);
			$token = generaTokenPass($user_id);
			//$url = 'http://'.$_SERVER["SERVER_NAME"].'/cambia_pass?XdefrfefHGHyhhy='.base64_encode($user_id).'&hfhvfndfhsdfhHHNJh='.base64_encode($token);
			$url = 'http://'.$_SERVER["SERVER_NAME"].'/proyectnar/cambia_pass?XdefrfefHGHyhhy='.base64_encode($user_id).'&hfhvfndfhsdfhHHNJh='.base64_encode($token);
			$url = 'http://'.$_SERVER["SERVER_NAME"].'/proyectnar/cambia_pass?user_id='.$user_id.'&token='.$token;
			$asunto = "Recuperar password - Sistema usuarios Agrotic Nariño";
			$cuerpo = "Muy bien día $nombre: <br/><br/>Para restaurar su password, visite  la siguiente dirección: <a href='$url'>Cambiar Password</a>";
			
			//Envio de correo electrónico
				require '../../../core/phpmailer/PHPMailerAutoload.php';
				$mail1 = new PHPMailer;
				//$mail->SMTPDebug = 3;
				$mail1->CharSet = 'UTF-8';
				$mail1->isSMTP();

				$mail1->Host = 'smtp.gmail.com';			// Specify main and backup SMTP servers
				$mail1->SMTPAuth = true;					// Enable SMTP authentication
				$mail1->Username = 'proyectnar@gmail.com';	// SMTP username
				$mail1->Password = '03-03-2021';			// SMTP password
				$mail1->SMTPSecure = 'tls';					// Enable TLS encryption, `ssl` also accepted
				$mail1->Port = 587;							// TCP port to connect to
				$mail1->SMTPOptions = array('ssl' => array('verify_peer' => false, 'verify_peer_name' => false, 'allow_self_signed' => true));
				$mail1->setFrom('proyectnar@gmail.com', '');
				
				//$mail1->Host = 'smtp.localhost';
				//$mail1->SMTPAuth = true;
				//$mail1->Username = 'administrador@proyectnar.narino.gov.co';
				//$mail1->Password = '@dmini$trador2022';
				//$mail1->SMTPSecure = 'tls';
				//$mail1->Port = 25;
				//$mail1->SMTPOptions = array('ssl' => array('verify_peer' => false, 'verify_peer_name' => false, 'allow_self_signed' => true));
				//$mail1->setFrom('administrador@proyectnar.narino.gov.co', '');

				$mail1->addAddress($email, '');			// Add a recipient
				$mail1->isHTML(true);					// Set email format to HTML
				$mail1->Subject = 'Recuperar contraseña Agrotic Nariño.';
				$mail1->Body    = 'Usted ha solicitado reiniciar su contraseña del <b>Sistema de información Agotic Nariño</b>.</p>...';
				$mail1->Body .="<h1 style='color:#3498db;'>Recuperar contraseña...!</h1>";
				$mail1->Body .= "</br></br><p></p></br></br>";
				$mail1->Body .= "</br>";
				$mail1->Body .= $cuerpo;
				$mail1->Body .= "</br></br><p>Fecha y Hora: ".date("d-m-Y h:i:s")."</p>";
				$mail1->AltBody = 'Aquí el cuerpo del mensaje, es un texto plano';
				$errors[] = "<div class='alert alert-success'>Por favor revise su correo, es posible que el mensaje se encuentre en la carpeta de spam.</div>";
				if(!$mail1->send()) {
					
				}
			// Fin envio email
		}
		else {
			$errors[] = "No existe correo electrónico en la base de datos del sistema Agrotic";
		}
	}
?>
<!doctype html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Recuperar Password</title>
		
		<link rel="stylesheet" href="css/bootstrap.min.css" >
		<link rel="stylesheet" href="css/bootstrap-theme.min.css" >
		<script src="js/bootstrap.min.js" ></script>
		
	</head>
	
	<body>
		
		<div class="container">    
			<div id="loginbox" style="margin-top:100px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
				<div class="panel panel-info" >
					<div class="panel-heading">
						<div class="panel-title">Recuperar Password</div>
						<div style="float:right; font-size: 90%; position: relative; top:-10px"><a href="index">Iniciar Sesi&oacute;n</a></div>
					</div>     
					
					<div style="padding-top:30px" class="panel-body" >
						
						<div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
						
						<form id="loginform" class="form-horizontal" role="form" action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" autocomplete="off">
							
							<div style="margin-bottom: 25px" class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
								<input id="email" type="email" class="form-control" name="email" placeholder="email" required>                                        
							</div>
							
							<div style="margin-top:10px" class="form-group">
								<div class="col-sm-12 controls">
									<button id="btn-login" type="submit" class="btn btn-success">Enviar</a>
								</div>
							</div>
							
							<div class="form-group">
								<div class="col-md-12 control">
									<div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
										Comuníquese con Planeación para crear una cuenta de usuario!</br></br>
									</div>
								</div>
							</div>    
						</form>
						<?php echo resultBlock($errors); ?>
						<div class="col-sm-12 text-center">
								<img src="../../../../images/logo.png" alt="">
						</div>
					</div>                     
				</div>  
			</div>
		</div>
	</body>
</html>							