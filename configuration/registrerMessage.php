<?php
    if (!empty($_POST)) {
        session_start();
        require 'conection.php';
        require '../phpmailer/PHPMailerAutoload.php';
        $names          = $mysqli->real_escape_string($_POST['names']);
        $lastnames      = $mysqli->real_escape_string($_POST['lastnames']);
        $email          = $mysqli->real_escape_string($_POST['email']);
        $phone          = $mysqli->real_escape_string($_POST['phone']);
        $municipality   = $mysqli->real_escape_string($_POST['municipality']);
        $adress         = $mysqli->real_escape_string($_POST['adress']);
        $message        = $mysqli->real_escape_string($_POST['message']);
        $message        = str_replace('"', " ", $message);
        $at_created     = date("Y-m-d H:i:s");
        $stmt           = $mysqli->prepare("INSERT INTO contactsmessages (names, lastnames, email, phone, municipality, adress, message, at_created) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param('ssssssss', $names, $lastnames, $email, $phone, $municipality, $adress, $message, $at_created);
        $stmt->execute();

		//Envio de correo electrónico
		$mail1 = new PHPMailer;
		//$mail->SMTPDebug = 3;
		$mail1->CharSet = 'UTF-8';
	    $mail1->Encoding = 'base64';
		$mail1->isSMTP();
		$mail1->Host = 'smtp.localhost';
		$mail1->SMTPAuth = true;
		$mail1->Username = 'contactenos@gestionproyectos.narino.gov.co';
		$mail1->Password = '@dm1nC0nt@ct0$*';
		$mail1->SMTPSecure = 'tls';
		$mail1->Port = 25;
		$mail1->SMTPOptions = array('ssl' => array('verify_peer' => false, 'verify_peer_name' => false, 'allow_self_signed' => true));
		$mail1->setFrom('contactenos@gestionproyectos.narino.gov.co', '');
		$mail1->addAddress($email, '');     // Add a recipient
		//$mail1->addCC($emailResult);      // Add copy to
		//$mail1->addBCC('');               // Add Copy hidden
		$mail1->isHTML(true);               // Set email format to HTML
		$mail1->Subject = 'Confirmación recepción de mensaje.';
		$mail1->Body    = '<b>Sistema de información Agrotic Nariño</b>.</p>...';
		$mail1->Body .="<h1 style='color:#091E3E;'>Registro de mensaje...!</h1>";
		$mail1->Body .= "</br></br><p></p></br></br>";
		$mail1->Body .= "</br>";
		//$mail1->Body .= $cuerpo;
		$mail1->Body .= "AgroTic Nariño confirma registro de mensaje: $message.... por favor comunicarse al correo contactenos@gestionproyectos.narino.gov.co</a> <br><br>
            Para mayor información puedes comunicarte al número <b>3157073014</b>";
        $mail1->Body .= "</br></br><p>Fecha y Hora: ".date("d-m-Y h:i:s")."</p>";
		if(!$mail1->send()) {
			
		}
        $_SESSION['message'] = " Gracias por contactarnos, pronto nos comunicaremos contigo ";
        header("Location: https://gestionproyectos.narino.gov.co/");
    }
    else{
        echo 
        '<script>
            window.location = "https://gestionproyectos.narino.gov.co/";
        </script>';
    }
?>