<?php
    require 'uploads/phpmailer/PHPMailerAutoload.php';
	if(isset($_GET["opt"]) && $_GET["opt"]=="add"){
		$post = new ProductoresData();
		$post->title = $_POST["title"];
		$post->brief = $_POST["brief"];
		$post->content = $_POST["content"];
		$post->urlpost = $_POST["posturl"];
		$post->registrationForm = $_POST["formUrl"];
		$image = "";
        $image = $_FILES['image']['name'];
		$post->dateRegistrer = $_POST["dateRegistrer"];
		
        $rout = "uploads/news/".$image;
        $outcome = @move_uploaded_file($_FILES["image"]["tmp_name"], $rout);
		$post->image = $image;
		$post->category_id = $_POST["category_id"];
		$post->add();
		Core::redir("./?view=productores");
	}
	else if(isset($_GET["opt"]) && $_GET["opt"]=="update"){
		$post = ProductoresData::getById($_POST["id_initiative"]);
		$post->estado = isset($_POST["status"])?1:0;
        $rejection_reason = $rejection_reason=$_POST["rejection_reason"];
        $estado = $post->estado;
        $decline = isset($_POST["decline"])?1:0;
        //if($post->estado==0){
        //    $status="Registro rechazado.";
        //    $rejection_reason ="No es posible validar la información, por favor comunicarse con el equipó de apoyo logístico llamando al número 3157073014.<br><br>";
        //    $rejection_reason .="</br></br>";
        //    $rejection_reason .="Estamos trabajando por y para ustedes, gracias por visitar el sitio, recuerde comunicarse con nuestro equipo de Apoyo Logístico, ellos le brindarán más información.";
        //}else{

		$post->update();

        $correodecline = $_POST["correodecline"];
        $nombreiniciativa =$_POST["nombreiniciativa"];
        $header = "Apreciad@:<br><br>";
        $header .= "$nombreiniciativa<br><br>";

        if($estado==1){
            $status="Aprobado.";
            $rejection_reason  = "Felicitaciones, usted ahora puede ser visualizado en el mapa interactivo de AgroTicNariño.</br></br>";
            $rejection_reason .= "Lo invitamos a interactuar en la plataforma diseñada pensando en usted. Ahora usted puede ser visualizado por todos aquellos que formamos parte de este grán proyecto.";
        }
        if($decline==1){
            if($rejection_reason==""){
                $rejection_reason ="No es posible validar la información, por favor comunicarse con el equipó de apoyo logístico llamando al número 3157073014.<br><br>";
                $rejection_reason .="</br></br>";
                $rejection_reason .="Estamos trabajando por y para ustedes, gracias por visitar el sitio, recuerde comunicarse con nuestro equipo de Apoyo Logístico, ellos le brindarán más información.";
            }
            $status="Rechazado.";
        }
        if(($decline==1)or($estado==1)){
        	//Envio de correo electrónico		
    		$respuesta = str_replace('"', '', $rejection_reason);
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
    		$mail1->addAddress($correodecline, '');     // Add a recipient
    		$mail1->addCC('contactenos@gestionproyectos.narino.gov.co'); 
    		//$mail1->addBCC('');                 // Add Copy hidden
    		$mail1->isHTML(true);				// Set email format to HTML
    		$mail1->Subject = "Actualización de estado mapa interactivo.";
    		$mail1->Body    = '<b>Sistema de información Agrotic Nariño</b>.</p>...';
    		$mail1->Body .="<h1 style='color:#091E3E;'>Actualización de registro...!</h1>";
    		$mail1->Body .= "</br></br></br>";
    		$mail1->Body .= "</br>";
    		//$mail1->Body .= $cuerpo;
    		//$mail1->Body .= "AgroTic Nariño confirma actualización del estado para poder visualizarse en el mapa interactivo .</br>";
    		//$mail1->Body .= "Respuesta: $response.</br></br>";
    		//$mail1->Body .= "Para confirmar el estado de su PQRSF por favor comunicarse al correo pqrsf@gestionproyectos.narino.gov.co<br><br>
            //    Para mayor información puedes comunicarte al número 3157073014</br>";
    		$mail1->Body .= "</br></br><p></br>";
    		$mail1->Body .= "</br>";
            $mail1->Body .= "</hr>";
            $mail1->Body .="</br>Estado: $status.";
            $mail1->Body .= "</hr>";
    		$mail1->Body .= "</br></br><p></p></br></br>";
    		$mail1->Body .= "</br>";
    		$mail1->Body .= "$header";
            $mail1->Body .= "</hr>";
            $mail1->Body .="</br>Respuesta: $rejection_reason.";
            $mail1->Body .= "</hr>";
            $mail1->Body .= "</br></br><p>Fecha y Hora: ".date("d-m-Y h:i:s")."</p>";
    		if(!$mail1->send()) {
    			
    		}
        }

		Core::redir("./?view=productores");
	}
	else if(isset($_GET["opt"]) && $_GET["opt"]=="del"){
		$post = ProductoresData::getById($_GET["id"]);
		$post->del();
		Core::redir("./?view=productores");
	}

?>