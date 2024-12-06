<?php
    require 'uploads/phpmailer/PHPMailerAutoload.php';
	if(isset($_GET["opt"]) && $_GET["opt"]=="add"){
		$messageContact                 = new contactsMesagesData();
		$messageContact->area           = $_POST["area"];
        $messageContact->designation    = $_POST["designation"];
        $messageContact->status         = isset($_POST["status"])?1:0;
		$messageContact->add();
		Core::redir("./?view=contactsMesages");
	}
	else if(isset($_GET["opt"]) && $_GET["opt"]=="update"){
		$messageContact                 = contactsMesagesData::getById($_POST["id_contacts"]);
		$messageContact->observation    = $_POST["observation"];
        $messageContact->status         = isset($_POST["status"])?1:0;
		$messageContact->send         	= isset($_POST["send"])?1:0;
        $messageContact->response       = date("Y-m-d H:i:s");
        $mensaje_send                   = $_POST["mensaje_send"];
		$messageContact->update();
		$responseMensaje = $_POST["observation"];
		$email = $_POST["email"];
		if($messageContact->send==1){
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
    		$mail1->Subject = 'Respuesta a mensaje';
    		$mail1->Body    = '<b>Sistema de información Agrotic Nariño</b>.</p>...';
    		$mail1->Body .="<h1 style='color:#091E3E;'>Respuesta a mensaje...!</h1>";
    		$mail1->Body .= "</br></br><p></p></br></br>";
    		$mail1->Body .= "</br>";
    		//$mail1->Body .= $cuerpo;
    		$mail1->Body .= "AgroTic Nariño confirma respuesta a mensaje: $mensaje_send.... <br><br>";
    		$mail1->Body .= "</br></br><p></p></br></br>";
    		$mail1->Body .= "Respuesta: $responseMensaje";
    		$mail1->Body .= "</br></br><p></p></br></br>";
            $mail1->Body .= "Para mayor información puedes comunicarte al número <b>3157073014</b>";
            $mail1->Body .= "</br></br><p>Fecha y Hora: ".date("d-m-Y h:i:s")."</p>";
    		if(!$mail1->send()) {
    			
    		}
		}
		Core::redir("./?view=contactsMesages");
	}
	else if(isset($_GET["opt"]) && $_GET["opt"]=="del"){
		$idagrortic = base64_decode($_REQUEST['idcitorga']);
		$messageContact = contactsMesagesData::getById($idagrortic);
		$messageContact->del();
		Core::redir("./?view=contactsMesages");
	}

?>