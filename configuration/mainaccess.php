<?php
    $errors = array();
    require 'configuration/conectionpdo.php';
    require 'phpmailer/PHPMailerAutoload.php';
    $sql = "SELECT id_municipality, name_municipality FROM municipality ORDER BY name_municipality ";
    $database = new Connection();
    $db = $database->open();
    $errors = array();
    if (!empty($_POST)) {
        $names = $mysqli->real_escape_string($_POST['names']);
        $lastnames = $mysqli->real_escape_string($_POST['lastnames']);
        $usuario = $mysqli->real_escape_string($_POST['identificacion']);
        $password = $mysqli->real_escape_string($_POST['password']);
        $con_password = $mysqli->real_escape_string($_POST['con_password']);
        $email = $mysqli->real_escape_string($_POST['email']);
        $identificacion = $mysqli->real_escape_string($_POST['identificacion']);
        $phone = $mysqli->real_escape_string($_POST['phone']);
        $id_municipality_user = $mysqli->real_escape_string($_POST['id_municipality_user']);
        $address = $mysqli->real_escape_string($_POST['address']);
        $rol = $mysqli->real_escape_string($_POST['rol']);
        $genero =  $mysqli->real_escape_string($_POST['genero']);
        $imagen = $_FILES['image']['name'];
        $imagenAux = $_FILES['image']['name'];
        if($imagen==""){
            if($genero=="Masculino"){
                $imagen="avatarHombre.PNG";
            }else{
                $imagen="avatarMujer.PNG";
            }
        }
        //$captcha = $mysqli->real_escape_string($_POST['g-recaptcha-response']);
        $activacion = 1;
        $id_tipo = 2;
        $secret = '';
        $fecha = date("Y-m-d H:i:s");
        //if (!$captcha){
        //    $errors[] = "Por favor verifica el captcha";
        //}
        if (isNull($usuario, $names, $lastnames, $identificacion, $password, $con_password, $email, $address, $id_municipality_user, $phone, $id_tipo, $rol, $activacion)){
            $errors[] = "Debe digitar todos los campos";
        }

        if (!validaPassword($password, $con_password)) {
            $errors[] = "Las contraseñas no coinciden";
        }

        if(usuarioExiste($usuario)){
            $errors[] = "El nombre del usuario $usuario ya existe";
        }

        if(identificacionExiste($identificacion)){
            $errors[] = "El número de identificación $identificacion ya está registrado";
        }

        if (emailExiste($email)){
            $errors[] = "Dirección de correo electrónica $email ya existe";
        }

        if (phoneExiste($phone)){
            $errors[] = "Número de teléfono $phone ya se encuentra asignado";
        }

        if (count($errors) == 0){
            //$response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$captcha");
            //$arr = json_decode($response, TRUE);
            //if($arr['success']){
                $pass_hash = hashPassword($password);
                $token = generateToken();
                $registro = registraUsuario($usuario, $pass_hash, $names, $lastnames, $genero, $email, $activacion, $token, $rol, $identificacion, $phone, $address, $imagen, $id_municipality_user, $id_tipo, $fecha);
                if ($registro > 0){
                    //$url = 'http://'.$_SERVER["SERVER_NAME"].'/login/activar.php?id='.$registro.'&val='.$token;
                    //$asunto = "Activar cuenta en el la plataforma de AgrotiNariño";
                    //$cuerpo = "Estimado .$names. $lastnames ; <br /><br />para continuar con el proceso de registro, es indispensable de click en el siguiente link <a href='$url'>Activar cuenta</a>";
                    //if ($imagenAux!=""){
                    //    $rout = "admin/uploads/profiles/".$imagenAux;
                    //    $outcome = @move_uploaded_file($_FILES["image"]["tmp_name"], $rout);
                        $errors[] = "Actividad registrada en la base de datos, pronto será activado en el sistema.";
                    //}
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
    				//$mail1->addCC($emailResult);                  // Add copy to
    				//$mail1->addBCC('');                 // Add Copy hidden
    				$mail1->isHTML(true);				// Set email format to HTML
    				$mail1->Subject = 'Confirmación de registro en la plataforma de Agrotic - Nariño.';
    				$mail1->Body    = '<b>Sistema de información Agrotic Nariño</b>.</p>...';
    				$mail1->Body .="<h1 style='color:#091E3E;'>Registro exitoso...!</h1>";
    				$mail1->Body .= "</br></br><p></p></br></br>";
    				$mail1->Body .= "</br>";
    				$mail1->Body .= $cuerpo;
    				$mail1->Body .= "AgroTic Nariño confirma registro en la plataforma, ahora puede comprar productos agrícolas 100% nariñenses</a> <br><br>
                        Para mayor información puedes comunicarte al número <b>3113895946</b>";
                    $mail1->Body .= "</br></br><p>Fecha y Hora: ".date("d-m-Y h:i:s")."</p>";
    				
    				if(!$mail1->send()) {
    					
    				}
                    //if (enviarEmail($email, $name, $asunto, $cuerpo)){
                    //    echo"Para terminar el proceso de registro siga las instrucciones que le hemos enviado a la dirección de correo electrónico: $email";
                    //    echo"<br><a href = './'>iniciar sesión";
                    //    exit;
                    //}else {
                    //    $errors[] = "Error al enviar correo electrónico";
                    //}
                    if(isset($_COOKIE["check"]) || (isset($_SESSION['listSC']))){
                            header("location: login");
                                        
                    }else{
                        header("location: login");
                    }
                
                }else {
                    $errors[] = "Error al registrar usuario";
                }
            //} else {
            //  $errors[] = 'Error al comprobar captcha';
            //}
        }
    }
?>