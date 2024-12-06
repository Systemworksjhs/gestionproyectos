<?php
    
    require 'phpmailer/PHPMailerAutoload.php';

	if(isset($_GET["opt"]) && $_GET["opt"]=="add"){
		$orders = new ordersData();
		$orders->referenceCode = $_POST["referenceCode"];
		$orders->status 	= $_POST["status"];
		$orders->id_user_order = $_POST["id_user_order"];
		$orders->reference_pol = $_POST["reference_pol"];	
        $orders->price = $_POST["price"];
        $orders->details = $_POST["details"];
        $orders->email = $_POST["email"];
        $orders->phone = $_POST["phone"];
        $orders->address = $_POST["address"];
        $orders->id_municipality = $_POST["id_municipality"];
        $orders->add();
		Core::redir("./?view=orders");
	}
	
	
	
	//Actualizar pedido
	else if(isset($_GET["opt"]) && $_GET["opt"]=="update"){
		$orders = ordersData::getById($_POST["id_order"]);
		$orders->referenceCode = $_POST["referenceCode"];
		$reference_orders = $_POST["referenceCode"];
		$name_client = $_POST["name_lastname_user"];
		$name_municipio = $_POST["name_municipio_user"];
		$lastStatus 	= $_POST["lastStatus"];
		$newStatus 	= $_POST["status"];
		$emailUsu = $_POST["email"];
		$met_envio= $_POST["shipping_method"];
		$orders->status 	= $_POST["status"];
		$orders->id_user_order = $_POST["id_user_order"];
		$orders->reference_pol = $_POST["reference_pol"];	
        $orders->price = $_POST["price"];
        $orders->details = $_POST["details"];
        
        $orders->email = $_POST["email"];
        $orders->phone = $_POST["phone"];
        $orders->address = $_POST["address"];
        $orders->id_municipality = $_POST["id_municipality"];
        
        //Comparación para enviar correo si existe un cambio de estado
        if($lastStatus != $newStatus){
            //Envio de correo electrónico a cliente
            
                if ($newStatus == "Aprobado"){
                    $asunto= "Confirmación de pedido";
                    $mensajeInicial = "Tu pedido está aprobado.";
                    if($met_envio == "Servicio domicilio"){
                        $url_imagen="./../images/SDAprobado.PNG";
                     }elseif($met_envio== "Recoger en CA"){
                        $url_imagen="./../images/RECAAprobado.PNG";
                    }
                    
                }else if($newStatus == "Alistamiento"){
                    $asunto= "Tu pedido está en alistamiento";
                    $mensajeInicial = "¡Tu pedido está siendo alistado por el proveedor!";
                    if($met_envio== "Servicio domicilio"){
                        $url_imagen="./../images/SDAlistamiento.PNG";
                     }elseif($met_envio== "Recoger en CA"){
                        $url_imagen="./../images/RECAAlistamiento.PNG";
                    }
                    
                }else if($newStatus == "En proceso"){
                    $asunto= "¡Tu pedido está en procesamiento y empaque!";
                    $mensajeInicial = "Tu pedido está siendo procesado y almacenado en el Packing House de ".$name_municipio;
                    if($met_envio== "Servicio domicilio"){
                        $url_imagen="./../images/SDEnProceso.PNG";
                     }elseif($met_envio== "Recoger en CA"){
                        $url_imagen="./../images/RECAEnProceso.PNG";
                    }
                    
                }else if($newStatus == "En ruta"){
                    $asunto= "Tu pedido va en camino.";
                    $mensajeInicial = "¡Tu pedido ha sido enviado!";
                    $url_imagen="./../images/SDEnRuta.PNG";
                    
                    
                }else if($newStatus == "Listo para recoger"){
                    
                    if($name_municipio=="San Juan de Pasto"){
                        $direccion="Carrera 14 No.12-58 Av. Champagnat (cerca a la glorieta Julián Buchéli) - Pasto";
                    }elseif($name_municipio=="Ipiales"){
                        $direccion="Manzana J lote 94A casa B - Ipiales";
                    }elseif($name_municipio=="Tumaco"){
                        $direccion="Manzana 089 lote 028 - Tumaco";
                    }
                        
                    $asunto= "Tu pedido está listo para recoger";
                    $mensajeInicial = "¡Tu pedido está listo para ser recogido en el Packing House ".$name_municipio."! <br>Dirección: ".$direccion;
                    $url_imagen="./../images/RECAListoParaRecoger.PNG";
                    
                    
                }else if($newStatus == "Entregado"){
                    $asunto= "Tu pedido ha sido entregado";
                    $mensajeInicial = "¡Tu pedido fue entregado exitosamente!";
                    if($met_envio== "Servicio domicilio"){
                        $url_imagen="./../images/SDEntregado.PNG";
                     }elseif($met_envio== "Recoger en CA"){
                        $url_imagen="./../images/RECAEntregado.PNG";
                    }
                    
                }
                
                $url = 'https://'.$_SERVER["SERVER_NAME"].'/myCount?myShopping';	
				$mail2 = new PHPMailer;
				$mail2->CharSet = 'UTF-8';
			    $mail2->Encoding = 'base64';
				$mail2->isSMTP();
				$mail2->Host = 'smtp.localhost';
				$mail2->SMTPAuth = true;
				$mail2->Username = 'contactenos@gestionproyectos.narino.gov.co';
				$mail2->Password = '@dm1nC0nt@ct0$*';
				$mail2->SMTPSecure = 'tls';
				$mail2->Port = 25;
				$mail2->SMTPOptions = array('ssl' => array('verify_peer' => false, 'verify_peer_name' => false, 'allow_self_signed' => true));
				$mail2->setFrom('contactenos@gestionproyectos.narino.gov.co', '');
				$mail2->addAddress($emailUsu, '');     // Add a recipient
				$mail2->isHTML(true);				// Set email format to HTML
				$mail2->Subject = $asunto;
				
				$mail2->Body .="<h3 style='color:#091E3E;text-align:center;'>".$mensajeInicial."</h3><br>";
                $mail2->Body .= "<p style='color:#091E3E;text-align:center;'>Hola ".$name_client."!<br></p>";
                
				
				$mail2->Body .= "<p style='color:#091E3E;text-align:center;'>AgroTic Nariño confirma que el estado de tu pedido es <b>".$newStatus."</b>, con código de referencia: <b>".$reference_orders."</b></p>";
                $mail2->addEmbeddedImage($url_imagen, 'image_cid');
                $mail2->Body .= "<div style='text-align:center;'> <img style='width: 600px;' src='cid:image_cid'> </div>";
                
                $mail2->Body .= "<br><br><p style='color:#091E3E;'> <b>Para realizar el seguimiento y revisar el estado de tu pedido sigue los siguientes pasos: </b><br>
            		                <b>1.</b> Ingresa a la <a href='https://gestionproyectos.narino.gov.co/tienda'>Tienda AgroTic Nariño</a> y seleccione su municipio si aún no lo ha hecho. <br>
            		                <b>2.</b> Da clic en el botón \"Mi cuenta\" ubicado en la parte superior derecha de la página.
            		                <b>3.</b> Si no has iniciado sesión te solicitará realizar este proceso.<br>
            		                <b>4.</b> Por último da clic en \"Mis compras\" ubicado en el munú izquierdo y listo! podrás mirar el listado de todas sus compras realizadas, seleccione su compra dando clic en el código de referencia correspondiente.
            		                O simplemente da clic <a href='".$url."'>Aquí.</a><br></p>";
            	    
                $mail2->Body .= "<p style='color:#091E3E;'><br><br>Para mayor información puedes comunicarte al número <b>3113895946</b>,
                                donde estaremos resolviendo todas tus dudas.</p>";
                				
				if(!$mail2->send()) {
            					
            	}
				
				
        }
        
        
        
        
		$orders->update();
		Core::redir("./?view=orders");
	}
	else if(isset($_GET["opt"]) && $_GET["opt"]=="del"){
		$idagrortic = base64_decode($_REQUEST['idcitorga']);
		$orders = ordersData::getById($idagrortic);
		$orders->del();
		Core::redir("./?view=orders");
	}

?>