<?php
    $errors = array();
    require 'configuration/conectionpdo.php';
    require 'phpmailer/PHPMailerAutoload.php';
    
    $sql = "SELECT id_municipality, name_municipality FROM municipality ORDER BY name_municipality ";
    $database = new Connection();
    $db = $database->open();
    
    $sql1 = "SELECT id_initiatives, name_initiative FROM initiatives ORDER BY name_initiative ";
    $database1 = new Connection();
    $db1 = $database1->open();

    
    
    $errors = array();
    if (!empty($_POST)) {
        
        $productHome1 = $mysqli->real_escape_string($_POST['mainProduct']);
        foreach ($db1->query($sql1) as $row1) {   
            if($row1['id_initiatives']==$productHome1)
            {
               $productHome  = $row1['name_initiative'];
            }
        }
        
        $genero = $mysqli->real_escape_string($_POST['genero']);
        $name_initiative = $mysqli->real_escape_string($_POST['nombres']);
        $description_initiative = $mysqli->real_escape_string($_POST['description']);
        
        //if($genero=="M"){
            $image="trabajandoporti.png";
        //}else{
        //    $image="avatarMujer.PNG";
        //}
        $direction = $mysqli->real_escape_string($_POST['direccion']);
        $url_web = $mysqli->real_escape_string($_POST['direccionweb']);
        $email = $mysqli->real_escape_string($_POST['correo']);
        $twitter = $mysqli->real_escape_string($_POST['twitter']);
        $facebook = $mysqli->real_escape_string($_POST['facebook']);
        $instagram = $mysqli->real_escape_string($_POST['instagram']);
        $cod_municipality = $mysqli->real_escape_string($_POST['id_municipality_producer']);
        $id_initiatives = $mysqli->real_escape_string($_POST['mainProduct']);
        $estado = 0;
        $documento = $_FILES["filecedula"]['name'];
        $phone = $mysqli->real_escape_string($_POST['phone']);
        //$productHome = $mysqli->real_escape_string($_POST['mainProduct']);
        $fechacreacion = date("Y-m-d H:i:s");
        $corregimiento = $mysqli->real_escape_string($_POST['corregimiento']);
        $nrocedula = $mysqli->real_escape_string($_POST['nrocedula']);
        $totalproduccion = $mysqli->real_escape_string($_POST['totalproduccion']);
        
		$mesesproduccion = $_POST['mesesproduccion'];
		for ($i=0;$i<count($mesesproduccion);$i++)	{ 
			$periodo .=$mesesproduccion[$i]." - ";
		}
        
		$frecuencias = $_POST['frecuencia'];
		for ($i=0;$i<count($frecuencias);$i++)	{ 
			$frecuencia .=$frecuencias[$i]." - ";
		}
        
        if (isNullTwo($genero, $description_initiative, $image, $email, $cod_municipality, $id_initiatives, $estado, $documento, $phone, $productHome, $fechacreacion)){
            $errors[] = "Debe digitar todos los campos";
        }

        if (emailExisteProducers($email)){
            $errors[] = "Dirección de correo electrónica $email ya existe";
        }

        //if (phoneExiste($phone)){
        //    $errors[] = "Número de teléfono $phone ya se encuentra asignado";
        //}

        if (count($errors) == 0){
            $registro = registraProducer($genero, $name_initiative, $description_initiative, $image, $direction, $url_web, $email, $twitter, $facebook, $instagram, $cod_municipality, $id_initiatives, $estado, $documento, $phone, $productHome, $fechacreacion, $nrocedula, $corregimiento, $totalproduccion, $periodo, $frecuencia);
            if ($registro > 0){
                $errors[] = "Actividad registrada en la base de datos, pronto será activado en el sistema.";
                $fieldocument = $_FILES["filecedula"]['name'];
                $rout = "uploads/producers/".$fieldocument;
                $outcome = @move_uploaded_file($_FILES["filecedula"]["tmp_name"], $rout);
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
				$mail1->isHTML(true);				// Set email format to HTML
				$mail1->Subject = 'Confirmación de registro en la plataforma de Agrotic - Nariño.';
				$mail1->Body    = '<b>Sistema de información Agrotic Nariño</b>.</p>...';
				$mail1->Body .="<h1 style='color:#091E3E;'>Registro exitoso...!</h1>";
				$mail1->Body .= "</br></br><p></p></br></br>";
				$mail1->Body .= "</br>";
				$mail1->Body .= $cuerpo;
				$mail1->Body .= "AgroTic Nariño confirma registro en la plataforma, tan pronto se valide la información enviada a través del formualario, usted podrá visualizarse en el mapa interactivo agrícola 100% nariñense.</a> <br><br>
                    Para mayor información puedes comunicarte al número <b>3113895946</b>";
                $mail1->Body .= "</br></br><p>Fecha y Hora: ".date("d-m-Y h:i:s")."</p>";
				if(!$mail1->send()) {
				}
            if(isset($_COOKIE["check"]) || (isset($_SESSION['listSC']))){
                    header("location: mapainteractivo");
            }else{
                header("location: mapainteractivo");
            }
            }else {
                $errors[] = "Error al registrar usuario";
            }
        }
    }
?>
    