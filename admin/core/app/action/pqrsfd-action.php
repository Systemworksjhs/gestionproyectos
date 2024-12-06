<?php
    require 'uploads/phpmailer/PHPMailerAutoload.php';
	if(isset($_GET["opt"]) && $_GET["opt"]=="add"){
		$pqrsfdate = new pqrsfdData();
		$pqrsfdate->dateReception = $_POST["dateReception"];
        $pqrsfdate->affair = $_POST["affair"];
        $pqrsfdate->message = $_POST["message"];
        $pqrsfdate->sender = $_POST["sender"];
        $pqrsfdate->phone = $_POST["phone"];
        $pqrsfdate->email = $_POST["email"];
        $pqrsfdate->type = $_POST["type"];
        $pqrsfdate->responsible = $_POST["responsible"];
        $pqrsfdate->status = $_POST["status"];
        $pqrsfdate->status_send = 0;
        $pqrsfdate->response = $_POST["response"];
        $pqrsfdate->response_date = $_POST["response_date"];
		$pqrsfdate->add();
		Core::redir("./?view=pqrsfd");
	}
	else if(isset($_GET["opt"]) && $_GET["opt"]=="update"){
		$pqrsfdate = pqrsfdData::getById($_POST["id_pqrsfd"]);
		$pqrsfdate->dateReception = $_POST["dateReception"];
        $pqrsfdate->affair = $_POST["affair"];
        $pqrsfdate->message = $_POST["message"];
        $pqrsfdate->sender = $_POST["sender"];
        $pqrsfdate->phone = $_POST["phone"];
        $pqrsfdate->email = $_POST["email"];
        $pqrsfdate->type = $_POST["type"];
        $pqrsfdate->responsible = $_POST["responsible"];
        $pqrsfdate->status = $_POST["status"];
        $pqrsfdate->status_send = isset($_POST["status_send"])?1:0;
        $pqrsfdate->response = str_replace('"', '', $_POST["response"]);
        $pqrsfdate->response_date = $_POST["response_date"];
        $response = $pqrsfdate->response;
		$pqrsfdate->update();
        if($pqrsfdate->status_send==1){
        	//Envio de correo electrónico		
    		$pqrsfcode = $_POST["pqrsfcode"];
    		$status = $_POST["status"];
    		$respuesta = str_replace('"', '', $_POST["response"]);
    		$mail1 = new PHPMailer;
    		//$mail->SMTPDebug = 3;
    		$mail1->CharSet = 'UTF-8';
    	    $mail1->Encoding = 'base64';
    		$mail1->isSMTP();
    		$mail1->Host = 'smtp.localhost';
    		$mail1->SMTPAuth = true;
    		$mail1->Username = 'pqrsf@gestionproyectos.narino.gov.co';
    		$mail1->Password = 'Pqrsf@grotic*';
    		$mail1->SMTPSecure = 'tls';
    		$mail1->Port = 25;
    		$mail1->SMTPOptions = array('ssl' => array('verify_peer' => false, 'verify_peer_name' => false, 'allow_self_signed' => true));
    		$mail1->setFrom('pqrsf@gestionproyectos.narino.gov.co', '');
    		$mail1->addAddress($pqrsfdate->email, '');     // Add a recipient
    		$mail1->addCC('pqrsf@gestionproyectos.narino.gov.co'); 
    		//$mail1->addBCC('');                 // Add Copy hidden
    		$mail1->isHTML(true);				// Set email format to HTML
    		$mail1->Subject = "Cambio de estado pqrsf $pqrsfcode.";
    		$mail1->Body    = '<b>Sistema de información Agrotic Nariño</b>.</p>...';
    		$mail1->Body .="<h1 style='color:#091E3E;'>Actualización de PQRSF $pqrsfcode...!</h1>";
    		$mail1->Body .= "</br></br></br>";
    		$mail1->Body .= "</br>";
    		//$mail1->Body .= $cuerpo;
    		$mail1->Body .= "AgroTic Nariño confirma actualización de PQRSF con código $pqrsfcode.</br>";
    		$mail1->Body .= "Respuesta: $response.</br></br>";
    		$mail1->Body .= "Para confirmar el estado de su PQRSF por favor comunicarse al correo pqrsf@gestionproyectos.narino.gov.co<br><br>
                Para mayor información puedes comunicarte al número 3157073014</br>";
    		$mail1->Body .= "</br></br><p></br>";
    		$mail1->Body .= "</br>";
            $mail1->Body .= "</hr>";
            $mail1->Body .="</br>Estado: $status.";
            $mail1->Body .= "</hr>";
    		$mail1->Body .= "</br></br><p></p></br></br>";
    		$mail1->Body .= "</br>";
            $mail1->Body .= "</hr>";
            $mail1->Body .="</br>Respuesta: $respuesta.";
            $mail1->Body .= "</hr>";
            $mail1->Body .= "</br></br><p>Fecha y Hora: ".date("d-m-Y h:i:s")."</p>";
    		
    		if(!$mail1->send()) {
    			
    		}
        }
		Core::redir("./?view=pqrsfd");
	}
	else if(isset($_GET["opt"]) && $_GET["opt"]=="del"){
		$idagrortic = base64_decode($_REQUEST['idcitorga']);
		$pqrsfdate = pqrsfdData::getById($idagrortic);
		$pqrsfdate->del();
		Core::redir("./?view=pqrsfd");
	}

?>