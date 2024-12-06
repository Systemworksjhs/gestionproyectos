<?php
    $errors = array(); 
    require 'configuration/conectionpdo.php';
    require 'phpmailer/PHPMailerAutoload.php';
    $database = new Connection();
    $db = $database->open();
    $errors = array(); 
    if (!empty($_POST)) {
        $sender = $mysqli->real_escape_string($_POST['names']);
        $email = $mysqli->real_escape_string($_POST['email']);
        $phone = $mysqli->real_escape_string($_POST['telefono']);
        $affair = $mysqli->real_escape_string($_POST['asunto']);
        $message = $mysqli->real_escape_string($_POST['mensaje']);
        $emailAsociation = $mysqli->real_escape_string($_POST['emailasociacion']);
        //$captcha = $mysqli->real_escape_string($_POST['g-recaptcha-response']);
        //$activacion = 1;
        //$id_tipo = 2;
        //$secret = '';
        $fecha = date("Y-m-d H:i:s");
        $permitted_chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $codemessage = mt_rand(99,1000);
        $codemessage.= substr(str_shuffle($permitted_chars), 0, 3);
        $codemessage.= mt_rand(100,999);
        $status = "Recibido";
        //if (!$captcha){
        //    $errors[] = "Por favor verifica el captcha";
        //}
        //if (isNull($sender, $email, $phone, $affair, $message, $type, $email)){
        //    $errors[] = "Debe digitar todos los campos";
        //}

        if (count($errors) == 0){
            //$response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$captcha");
            //$arr = json_decode($response, TRUE);
            //if($arr['success']){
                $registro = registraMessageAsociation($sender, $email, $phone, $affair, $message, $fecha, $codemessage, $status, $emailAsociation);
                if ($registro > 0){
                    $errors[] = "Actividad registrada en la base de datos, para mayor información pronto nos comunicaremos con usted.";
                  
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
    				$mail1->addCC('pqrsf@gestionproyectos.narino.gov.co');                  // Add copy to
    				$mail1->addBCC($emailAsociation);                 // Add Copy hidden
    				$mail1->isHTML(true);				// Set email format to HTML
    				$mail1->Subject = 'Confirmación de recepción de Mensaje.';
    				$mail1->Body    = '<b>Sistema de información Agrotic Nariño</b>.</p>...';
    				$mail1->Body .="<h1 style='color:#091E3E;'>Registro MENSAJE...!</h1>";
    				$mail1->Body .= "<p></p></br>";
    				$mail1->Body .= "<p>Cordial saludo, $sender</p><br>"; 
    				$mail1->Body .= "<p>Gracias por utilizar los servicios de AgroTic Nariño, los siguientes son los datos de su trasnsacción.<br>";
    				$mail1->Body .= "<p>Estado del mensaje: <strong>Enviado</strong></p>";
    				$mail1->Body .= "<p>Código de radiación: <strong>$codemessage</strong></p>";
    				$mail1->Body .= "<p>Tema: <strong>$affair</strong></p>";
    				$mail1->Body .= "<p>Descripción: <strong>$message</strong></p>";
    				$mail1->Body .= "<p>Para tener en cuenta: la Asociación que contactó pronto se comunicará con ustedes.</p><br>";
    				$mail1->Body .= $cuerpo;
    				//$mail1->Body .= "Para revisar el estado de su PQRSF por favor comunicarse al correo pqrsf@gestionproyectos.narino.gov.co</a> <br><br>
                    //                Para mayor información puedes comunicarte al número <b>3157073014</b>";
                    $mail1->Body .= "</br></br><p>Fecha y Hora: ".date("d-m-Y h:i:s")."</p>";
    				if(!$mail1->send()) {
    				}

                }else {
                    $errors[] = "Error al registrar mensaje";
                }
            //} else {
            //  $errors[] = 'Error al comprobar captcha';
            //}
        }
    }
?>