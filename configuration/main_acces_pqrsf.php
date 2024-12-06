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
        $type = $mysqli->real_escape_string($_POST['tipo']);
        $identification = $mysqli->real_escape_string($_POST['identification']);
        $city = $mysqli->real_escape_string($_POST['city']);
        //$captcha = $mysqli->real_escape_string($_POST['g-recaptcha-response']);
        $activacion = 1;
        $id_tipo = 2;
        $secret = '';
        $fecha = date("Y-m-d H:i:s");
        $permitted_chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $codepqrsf = mt_rand(99,1000);
        $codepqrsf.= substr(str_shuffle($permitted_chars), 0, 3);
        $codepqrsf.= mt_rand(100,999);
        $status = "Recibida";
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
                $registro = registraUsuarioPqrsf($sender, $email, $phone, $affair, $message, $type, $fecha, $codepqrsf, $status, $identification, $city);
                if ($registro > 0){
                    $errors[] = "Actividad registrada en la base de datos, pronto será notificado para ver estado de su PQRSF.";
                  
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
    				//$mail1->addBCC('');                 // Add Copy hidden
    				$mail1->isHTML(true);				// Set email format to HTML
    				$mail1->Subject = 'Confirmación de recepción de PQRSF.';
    				$mail1->Body    = '<b>Sistema de información Agrotic Nariño</b>.</p>...';
    				$mail1->Body .="<h1 style='color:#091E3E;'>Registro PQRSF...!</h1>";
    				$mail1->Body .= "<p></p></br>";
    				$mail1->Body .= "<p>Cordial saludo, $sender</p><br>"; 
    				$mail1->Body .= "<p>Gracias por utilizar los servicios de AgroTic Nariño, los siguientes son los datos de tu actualización de PQRSF.<br>";
    				$mail1->Body .= "<p>Estado de la PQRS: <strong>Recibida</strong></p>";
    				$mail1->Body .= "<p>Código de radiación: <strong>$codepqrsf</strong></p>";
    				$mail1->Body .= "<p>Tema: <strong>$affair</strong></p>";
    				$mail1->Body .= "<p>Descripción: <strong>$message</strong></p>";
    				$mail1->Body .= "<p>Para tener en cuenta: se le dará una respuesta a su PQRSF de acuerdo con el termino legal; por regla general 15 días hábiles contados a partir del día siguiente de la radicación de su PQRSF.</p><br>";
    				$mail1->Body .= $cuerpo;
    				$mail1->Body .= "Para revisar el estado de su PQRSF por favor comunicarse al correo pqrsf@gestionproyectos.narino.gov.co</a> <br><br>
                                    Para mayor información puedes comunicarte al número <b>3157073014</b>";
                    $mail1->Body .= "</br></br><p>Fecha y Hora: ".date("d-m-Y h:i:s")."</p>";
    				if(!$mail1->send()) {
    				}

                }else {
                    $errors[] = "Error al registrar PQRSFD";
                }
            //} else {
            //  $errors[] = 'Error al comprobar captcha';
            //}
        }
    }
?>