<?php

	function isNull($pass_hash, $names, $lastnames, $email, $activacion, $token, $rol, $identificacion, $phone, $address, $id_municipality_user, $id_tipo){
		if(strlen(trim($pass_hash)) < 1 || strlen(trim($names)) < 1 || strlen(trim($lastnames)) < 1 || strlen(trim($email)) < 1 || strlen(trim($activacion)) < 1 || strlen(trim($token)) < 1 || strlen(trim($rol)) < 1 || strlen(trim($identificacion)) < 1 || strlen(trim($phone)) < 1 || strlen(trim($address)) < 1 || strlen(trim($id_municipality_user)) < 1 || strlen(trim($id_tipo)) < 1)
		{
			return true;
			} else {
			return false;
		}		
	}

	
	function isEmail($email)
	{
		if (filter_var($email, FILTER_VALIDATE_EMAIL)){
			return true;
			} else {
			return false;
		}
	}
	
	function validaPassword($var1, $var2)
	{
		if (strcmp($var1, $var2) !== 0){
			return false;
			} else {
			return true;
		}
	}
	
	function minMax($min, $max, $valor){
		if(strlen(trim($valor)) < $min)
		{
			return true;
		}
		else if(strlen(trim($valor)) > $max)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	function usuarioExiste($usuario)
	{
		global $mysqli;
		
		$stmt = $mysqli->prepare("SELECT id_user FROM usuarios WHERE usuario = ? LIMIT 1");
		$stmt->bind_param("s", $usuario);
		$stmt->execute();
		$stmt->store_result();
		$num = $stmt->num_rows;
		$stmt->close();
		
		if ($num > 0){
			return true;
			} else {
			return false;
		}
	}
	
	function identificacionExiste($identificacion)
	{
		global $mysqli;
		
		$stmt = $mysqli->prepare("SELECT id_user FROM usuarios WHERE identificacion = ? LIMIT 1");
		$stmt->bind_param("s", $identificacion);
		$stmt->execute();
		$stmt->store_result();
		$num = $stmt->num_rows;
		$stmt->close();
		
		if ($num > 0){
			return true;
			} else {
			return false;
		}
	}
	
	function nitExiste($nit)
	{
		global $mysqli;
		
		$stmt = $mysqli->prepare("SELECT id_user FROM usuarios WHERE nit = ? LIMIT 1");
		$stmt->bind_param("s", $nit);
		$stmt->execute();
		$stmt->store_result();
		$num = $stmt->num_rows;
		$stmt->close();
		
		if ($num > 0){
			return true;
			} else {
			return false;
		}
	}

	function emailExiste($email)
	{
		global $mysqli;
		
		$stmt = $mysqli->prepare("SELECT id_user FROM usuarios WHERE email = ? LIMIT 1");
		$stmt->bind_param("s", $email);
		$stmt->execute();
		$stmt->store_result();
		$num = $stmt->num_rows;
		$stmt->close();
		
		if ($num > 0){
			return true;
			} else {
			return false;	
		}
	}
	
	
	function emailExisteProducers($email)
	{
		global $mysqli;
		
		$stmt = $mysqli->prepare("SELECT id_initiative FROM initiatives_municipalities WHERE email = ? LIMIT 1");
		$stmt->bind_param("s", $email);
		$stmt->execute();
		$stmt->store_result();
		$num = $stmt->num_rows;
		$stmt->close();
		
		if ($num > 0){
			return true;
			} else {
			return false;	
		}
	}
	
	function phoneExiste($phone)
	{
		global $mysqli;
		
		$stmt = $mysqli->prepare("SELECT id_user FROM usuarios WHERE phone = ? LIMIT 1");
		$stmt->bind_param("s", $phone);
		$stmt->execute();
		$stmt->store_result();
		$num = $stmt->num_rows;
		$stmt->close();
		
		if ($num > 0){
			return true;
			} else {
			return false;	
		}
	}

	function generateToken()
	{
		$gen = md5(uniqid(mt_rand(), false));	
		return $gen;
	}
	
	function hashPassword($password) 
	{
		$hash = password_hash($password, PASSWORD_DEFAULT);
		return $hash;
	}
	
	function resultBlock($errors){
		if(count($errors) > 0)
		{
		echo "<div id='error' class='alert alert-dismissible alert-success' role='alert'>
				<button type='button' class='close botton-error' data-dismiss='alert'>&times;</button>	
				<ul>";
					foreach($errors as $error)
					{
						echo "<li style='list-style: none;'>".$error."</li>";
					}
					echo "</ul>";
			echo "</div>";
		}
	}
	
	function registraUsuario($usuario, $pass_hash, $names, $lastnames, $genero, $email, $activacion, $token, $rol, $identificacion, $phone, $address, $imagen, $id_municipality_user, $id_tipo, $fecha){
		global $mysqli;
		$stmt = $mysqli->prepare("INSERT INTO usuarios (usuario, password, names, lastnames, genero, email, activacion, token, rol, identificacion, phone, address, imagen, id_municipality_user, id_tipo, at_created) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
		$stmt->bind_param('ssssssisssssssis', $usuario, $pass_hash, $names, $lastnames, $genero, $email, $activacion, $token, $rol, $identificacion, $phone, $address, $imagen, $id_municipality_user, $id_tipo, $fecha);
		if ($stmt->execute()){
			$auditoriasnew = "Se registra al usuario: ";
			$auditoriasnew .= $names;
			$fecha = date("Y-m-d H:i:s");
			$users = $usuario;
			include_once('conectionpdo.php');
			$database2 = new Connection();
			$db2 = $database2->open();
			$stmt2 = $db2->prepare("INSERT INTO auditory (user, activity, date) VALUES (:users, :actividades, :fecha)");
			$stmt2->execute(array(':users' => $users , ':actividades' => $auditoriasnew , ':fecha' => $fecha));
			$database2->close();
			return $mysqli->insert_id;
			$errors[] = "Actividad registrada en la base de datos, pronto será activido en el sistema.";

		} else {
			return 0;	
		}		
	}
	
	function registraUsuarioPqrsf($sender, $email, $phone, $affair, $message, $type, $fecha, $codepqrsf, $status, $identification, $city){
		global $mysqli;
		$stmt = $mysqli->prepare("INSERT INTO pqrsfd (sender, email, phone, affair, message, type, dateReception, codepqrsf, status, identification, city) VALUES(?,?,?,?,?,?,?,?,?,?,?)"); 
		$stmt->bind_param('sssssssssss', $sender, $email, $phone, $affair, $message, $type, $fecha, $codepqrsf, $status, $identification, $city);
		if ($stmt->execute()){
			$auditoriasnew = "Se registra pqrsfd con referencia $codepqrsf y asunto: ";
			$auditoriasnew .= $affair;
			$fecha = date("Y-m-d H:i:s");
			$users = $sender;
			if($users==""){$users="Registro pqr";}
			include_once('conectionpdo.php');
			$database2 = new Connection();
			$db2 = $database2->open();
			$stmt2 = $db2->prepare("INSERT INTO auditory (user, activity, date) VALUES (:users, :actividades, :fecha)");
			$stmt2->execute(array(':users' => $users , ':actividades' => $auditoriasnew , ':fecha' => $fecha));
			$database2->close();
			return $mysqli->insert_id;
			$errors[] = "PQRSFD registrada en la base de datos, tendrá un respuesta en los tiempos establecidos.";
		} else {
			return 0;	
		}		
	} 
	 
 	function registraMessageAsociation($sender, $email, $phone, $affair, $message, $fecha, $codemessage, $status, $emailAsociation){
		global $mysqli;
		$stmt = $mysqli->prepare("INSERT INTO messagesAsociations (sender, email, phone, affair, message, dateReception, codemessage, status, emailAsociation) VALUES(?,?,?,?,?,?,?,?,?)"); 
		$stmt->bind_param('sssssssss', $sender, $email, $phone, $affair, $message, $fecha, $codemessage, $status, $emailAsociation);
		if ($stmt->execute()){
			$auditoriasnew = "Se registra Mensaje con referencia $codemessage y asunto: ";
			$auditoriasnew .= $affair;
			$fecha = date("Y-m-d H:i:s");
			$users = $sender;
			if($users==""){$users="Registro mensaje";}
			include_once('conectionpdo.php');
			$database2 = new Connection();
			$db2 = $database2->open();
			$stmt2 = $db2->prepare("INSERT INTO auditory (user, activity, date) VALUES (:users, :actividades, :fecha)");
			$stmt2->execute(array(':users' => $users , ':actividades' => $auditoriasnew , ':fecha' => $fecha));
			$database2->close();
			return $mysqli->insert_id;
			$errors[] = "Mensaje enviado y registrado en la base de datos, pronto estaremos en contacto contigo.";
		} else {
			return 0;	
		}		
	} 
	
 	function registraMessageFederation($sender, $email, $phone, $affair, $message, $fecha, $codemessage, $status){
		global $mysqli;
		$stmt = $mysqli->prepare("INSERT INTO messagesFederation (sender, email, phone, affair, message, dateReception, codemessage, status) VALUES(?,?,?,?,?,?,?,?)"); 
		$stmt->bind_param('ssssssss', $sender, $email, $phone, $affair, $message, $fecha, $codemessage, $status);
		if ($stmt->execute()){
			$auditoriasnew = "Se registra Mensaje con referencia $codemessage y asunto: ";
			$auditoriasnew .= $affair;
			$fecha = date("Y-m-d H:i:s");
			$users = $sender;
			if($users==""){$users="Registro mensaje";}
			include_once('conectionpdo.php');
			$database2 = new Connection();
			$db2 = $database2->open();
			$stmt2 = $db2->prepare("INSERT INTO auditory (user, activity, date) VALUES (:users, :actividades, :fecha)");
			$stmt2->execute(array(':users' => $users , ':actividades' => $auditoriasnew , ':fecha' => $fecha));
			$database2->close();
			return $mysqli->insert_id;
			$errors[] = "Mensaje enviado y registrado en la base de datos, pronto estaremos en contacto contigo.";
		} else {
			return 0;	
		}		
	}
	
	function isNullTwo($genero, $description_initiative, $image, $email, $cod_municipality, $id_initiatives, $estado, $documento, $phone, $productHome, $fechacreacion){
		if(strlen(trim($genero)) < 1 || strlen(trim($description_initiative)) < 1 || strlen(trim($image)) < 1 || strlen(trim($email)) < 1 || strlen(trim($cod_municipality)) < 1 || strlen(trim($id_initiatives)) < 1 || strlen(trim($estado)) < 1 || strlen(trim($documento)) < 1 || strlen(trim($phone)) < 1 || strlen(trim($productHome)) < 1 || strlen(trim($fechacreacion)) < 1 )
		{
			return true;
			} else {
			return false;
		}		
	}
	
	function registraProducer($genero, $name_initiative, $description_initiative, $image, $direction, $url_web, $email, $twitter, $facebook, $instagram, $cod_municipality, $id_initiatives, $estado, $documento, $phone, $productHome, $fechacreacion, $nrocedula, $corregimiento, $totalproduccion, $periodo, $frecuencia){
		global $mysqli;
		$stmt = $mysqli->prepare("INSERT INTO initiatives_municipalities (genero, name_initiative, description_initiative, image, direction, url_web, email, twitter, facebook, instagram, cod_municipality, id_initiatives, estado, documento, phone, productHome, fechacreacion, nroDocumentoIdentidad, corregimiento, totalProduction, 	monthofProduction, frequency) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
		$stmt->bind_param('ssssssssssiiisssssssss', $genero, $name_initiative, $description_initiative, $image, $direction, $url_web, $email, $twitter, $facebook, $instagram, $cod_municipality, $id_initiatives, $estado, $documento, $phone, $productHome, $fechacreacion, $nrocedula, $corregimiento, $totalproduccion, $periodo, $frecuencia);
		if ($stmt->execute()){
			$auditoriasnew = "Se registra al productor: ";
			$auditoriasnew .= $description_initiative;
			$fecha = date("Y-m-d H:i:s");
			$users = $description_initiative;
			include_once('conectionpdo.php');
			$database2 = new Connection();
			$db2 = $database2->open();
			$stmt2 = $db2->prepare("INSERT INTO auditory (user, activity, date) VALUES (:users, :actividades, :fecha)");
			$stmt2->execute(array(':users' => $users , ':actividades' => $auditoriasnew , ':fecha' => $fecha));
			$database2->close();
			return $mysqli->insert_id;
			$errors[] = "Actividad registrada en la base de datos, pronto será activido en el sistema.";

		} else {
			return 0;	
		}		
	}
	
	function isNullThree($usuario, $names, $nit, $identificacion, $password, $con_password, $email, $id_municipality_user, $phone, $id_tipo, $rol, $activacion, $address){
		if(strlen(trim($usuario)) < 1 || strlen(trim($names)) < 1 || strlen(trim($nit)) < 1 || strlen(trim($identificacion)) < 1 || strlen(trim($password)) < 1 || strlen(trim($con_password)) < 1 || strlen(trim($email)) < 1 || strlen(trim($id_municipality_user)) < 1 || strlen(trim($phone)) < 1 || strlen(trim($id_tipo)) < 1  || strlen(trim($rol)) < 1 || strlen(trim($activacion)) < 1 || strlen(trim($address)) < 1 )
		{
			return true;
			} else {
			return false;
		}		
	}
	
	function registraUserCompraPublicas($usuario,$pass_hash,$names,$genero,$email,$activacion,$token,$token_password,$password_request,$id_tipo,$identificacion,$phone,$rol,$id_municipality_user,$address,$imagen,$conjunto,$iniciativa,$nit,$cargo,$operador,$fecha){
		global $mysqli;
		$stmt = $mysqli->prepare("INSERT INTO usuarios (usuario, password, names, genero, email, activacion, token, token_password, password_request, id_tipo, identificacion, phone, rol, id_municipality_user, address, imagen, conjunto, iniciativa, nit, cargo, operador, at_created) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
		$stmt->bind_param('sssssisiiisssissssssss', $usuario,$pass_hash,$names,$genero,$email,$activacion,$token,$token_password,$password_request,$id_tipo,$identificacion,$phone,$rol,$id_municipality_user,$address,$imagen,$conjunto,$iniciativa,$nit,$cargo,$operador,$fecha);
		if ($stmt->execute()){
			$auditoriasnew = "Se registra al usuario compras públicas: $names";
			//$auditoriasnew .= $description_initiative;
			$fecha = date("Y-m-d H:i:s");
			$users = $usuario;
			include_once('conectionpdo.php');
			$database2 = new Connection();
			$db2 = $database2->open();
			$stmt2 = $db2->prepare("INSERT INTO auditory (user, activity, date) VALUES (:users, :actividades, :fecha)");
			$stmt2->execute(array(':users' => $users , ':actividades' => $auditoriasnew , ':fecha' => $fecha));
			$database2->close();
			return $mysqli->insert_id;

		} else {
			return 0;	
		}		
	}
	
	function enviarEmail($email, $name, $asunto, $cuerpo){
		
		//require_once 'PHPMailer/PHPMailerAutoload.php';
		include "phpmailer/class.smtp.php";
		include "phpmailer/class.phpmailer.php";
		$email_user = "proyectnar@gmail.com";
		$email_password = "03-03-2021";
		$the_subject = $asunto;
		$address_to = $email;
		$from_name = "Plataforma Agrotic Nari&nacute;o";
		$mail = new PHPMailer();
		// ———--- datos de la cuenta de Gmail ---————
		$mail->Username = $email_user;
		$mail->Password = $email_password;
		// ———--configuración contenido email ---————
		$mail->SMTPSecure = 'ssl';
		$mail->Host = 'smtp.gmail.com'; //gmail
		$mail->Port = 465;
		$mail->isSMTP();
		$mail->SMTPAuth = true;
		$mail->setFrom($mail->Username,$from_name);
		$mail->addAddress($address_to);
		$mail->Subject = $the_subject;
		$mail->Body .="<h1 style='color:#3498db;'>Hola Bienvenido...!</h1>";
		$mail->Body .= "<p>Mensaje personalizado</p>";
		$mail->Body .= $cuerpo;
		$mail->Body .= "<p>Fecha y Hora: ".date("d-m-Y h:i:s")."</p>";
		$mail->IsHTML(true);
		if($mail->send())
		return true;
		else
		return false;
	}
	
	function validaIdToken($id, $token){
		global $mysqli;
		
		$stmt = $mysqli->prepare("SELECT status FROM usuarios WHERE id_user = ? AND token = ? LIMIT 1");
		$stmt->bind_param("is", $id, $token);
		$stmt->execute();
		$stmt->store_result();
		$rows = $stmt->num_rows;
		
		if($rows > 0) {
			$stmt->bind_result($activacion);
			$stmt->fetch();
			
			if($activacion == 1){
				$msg = "La cuenta ya se activo anteriormente.";
				} else {
				if(activarUsuario($id)){
					$msg = 'Cuenta activada.';
					} else {
					$msg = 'Error al Activar Cuenta';
				}
			}
			} else {
			$msg = 'No existe el registro para activar.';
		}
		return $msg;
	}
	
	function activarUsuario($id)
	{
		global $mysqli;
		
		$stmt = $mysqli->prepare("UPDATE usuarios SET status=1 WHERE id_user = ?");
		$stmt->bind_param('s', $id);
		$result = $stmt->execute();
		$stmt->close();
		return $result;
	}
	
	function isNullLogin($usuario, $password){
		if(strlen(trim($usuario)) < 1 || strlen(trim($password)) < 1)
		{
			return true;
		}
		else
		{
			return false;
		}		
	}
	
	function login($usuario, $password)
	{
		global $mysqli;
		
		$stmt = $mysqli->prepare("SELECT id_user, id_tipo, password, email, names FROM usuarios WHERE usuario = ? || email = ? LIMIT 1");
		$stmt->bind_param("ss", $usuario, $usuario);
		$stmt->execute();
		$stmt->store_result();
		$rows = $stmt->num_rows;
		
		if($rows > 0) {
			
			if(isActivo($usuario)){
				
				$stmt->bind_result($id_user, $id_tipo, $passwd, $correo, $name);
				$stmt->fetch();
				$validaPassw = password_verify($password, $passwd);
				if($validaPassw){
					lastSession($id_user);
					$_SESSION['id'] = $id_user;
					$_SESSION['tipo_usuario'] = $id_tipo;
					$_SESSION['correo'] = $correo;
					$_SESSION['name'] = $name;
					$verify=1;
					auditorias_1('Inicio de sesión');
					
					//Verificar si viene de la página de remanentes
					if(isset($_SESSION['remanente'])==1){
					    header("location: remanente");
					    unset($_SESSION['remanente']);
					}
					else{
    					//Verificar si viene de mercado campesino para reedireccionara al checkout correspondiente
    					if (isset($_SESSION['mercado']) && ($_SESSION['mercado'] == 1 )) {
                            header("location: checkout_mercados_campesinos");
                        } else {
        					if(isset($_SESSION['check']) && ($_SESSION['check'] == 1) ){
                                header("location: checkout");
                            }elseif(isset($_COOKIE["myC"])){
                                header("location: myCount?");
                            }else{
                                header("location: index");
                            }
                        }
					}
				}else {
					
					$errors = "La contrase&ntilde;a es incorrecta";
				}
				} else {
				$errors = 'El usuario no esta activo';
			}
			} else {
			$errors = "El nombre de usuario o correo electr&oacute;nico no existe";
		}
		return $errors;
	}
	
	function lastSession($id_user)
	{
		global $mysqli;
		
		$stmt = $mysqli->prepare("UPDATE usuarios SET ultima_session=NOW(), token_password='', password_request=0 WHERE id_user = ?");
		$stmt->bind_param('s', $id_user);
		$stmt->execute();
		$stmt->close();
	}
	
	function auditorias_1($actividades){
		
		$fecha = date("Y-m-d H:i:s");
		$users=$_SESSION['name'];
		include_once('conectionpdo.php');
		$database2 = new Connection();
		$db2 = $database2->open();
		$stmt2 = $db2->prepare("INSERT INTO auditory (user, activity, date) VALUES (:users, :actividades, :fecha)");
		$stmt2->execute(array(':users' => $users , ':actividades' => $actividades , ':fecha' => $fecha));
		$database2->close();

	}

	function isActivo($usuario)
	{
		global $mysqli;
		
		$stmt = $mysqli->prepare("SELECT activacion FROM usuarios WHERE usuario = ? || email = ? LIMIT 1");
		$stmt->bind_param('ss', $usuario, $usuario);
		$stmt->execute();
		$stmt->bind_result($activacion);
		$stmt->fetch();
		
		if ($activacion == 1)
		{
			return true;
		}
		else
		{
			return false;	
		}
	}	
	
	function generaTokenPass($user_id)
	{
		global $mysqli;
		
		$token = generateToken();
		
		$stmt = $mysqli->prepare("UPDATE usuarios SET token_password=?, password_request=1 WHERE id_user = ?");
		$stmt->bind_param('ss', $token, $user_id);
		$stmt->execute();
		$stmt->close();
		
		return $token;
	}
	
	function getValor($campo, $campoWhere, $valor)
	{
		global $mysqli;
		
		$stmt = $mysqli->prepare("SELECT $campo FROM usuarios WHERE $campoWhere = ? LIMIT 1");
		$stmt->bind_param('s', $valor);
		$stmt->execute();
		$stmt->store_result();
		$num = $stmt->num_rows;
		
		if ($num > 0)
		{
			$stmt->bind_result($_campo);
			$stmt->fetch();
			return $_campo;
		}
		else
		{
			return null;	
		}
	}
	
	function getPasswordRequest($id)
	{
		global $mysqli;
		
		$stmt = $mysqli->prepare("SELECT password_request FROM usuarios WHERE id_user = ?");
		$stmt->bind_param('i', $id);
		$stmt->execute();
		$stmt->bind_result($_id);
		$stmt->fetch();
		
		if ($_id == 1)
		{
			return true;
		}
		else
		{
			return null;	
		}
	}
	
	function verificaTokenPass($user_id, $token){
		
		global $mysqli;
		
		$stmt = $mysqli->prepare("SELECT activacion FROM usuarios WHERE id_user = ? AND token_password = ? AND password_request = 1 LIMIT 1");
		$stmt->bind_param('is', $user_id, $token);
		$stmt->execute();
		$stmt->store_result();
		$num = $stmt->num_rows;
		
		if ($num > 0)
		{
			$stmt->bind_result($activacion);
			$stmt->fetch();
			if($activacion == 1)
			{
				return true;
			}
			else 
			{
				return false;
			}
		}
		else
		{
			return false;	
		}
	}
	
	function cambiaPassword($password, $user_id, $token){
		
		global $mysqli;
		
		$stmt = $mysqli->prepare("UPDATE usuarios SET password = ?, token_password='', password_request=0 WHERE id_user = ? AND token_password = ?");
		$stmt->bind_param('sis', $password, $user_id, $token);
		
		if($stmt->execute()){
			return true;
			} else {
			return false;		
		}
	}
	
	function cambiaPasswordCuenta($password, $id_user){
		global $mysqli;
		$stmt = $mysqli->prepare("UPDATE usuarios SET password = ? WHERE id_user = ?");
		$stmt->bind_param('ss', $password, $id_user);
		if($stmt->execute()){
			return true;
			} else {
			return false;		
		}
	}
	
	
	function cambiaPassword_1($password, $user_id){
//		$database = new Connection();
//		$db = $database->open();
//		$sql = "UPDATE usuarios SET password = '$password' WHERE id='$user_id'";
//		$db->exec($sql);
//		
//		$fecha = date("Y-m-d H:i:s");
//		$actividad ="Cambio de contraseña";
//		$usuarios=$_SESSION['nombre'];
//		$database2 = new Connection();
//		$db2 = $database2->open();
//		$stmt2 = $db2->prepare("INSERT INTO auditory (user, activity, date) VALUES (:usuarios, :actividad, :fecha)");
//		$stmt2->execute(array(':usuarios' => $usuarios , ':actividad' => $actividad , ':fecha' => $fecha));
//		$database->close();
//		$database2->close();

	}


// funciones generales

	function test_show_featured(){
		global $mysqli;
		$sqlOne ="SELECT * FROM post WHERE status = 1 order by created_at DESC LIMIT 1";
		$resultOne = $mysqli->query($sqlOne) or die($mysqli->error);
		return $resultOne;
	}

	//Desplegar objetivos
	function show_objetives(){
		global $mysqli;
		$sqlTwo ="SELECT * FROM objectives WHERE status = 1";
		$resultTwo = $mysqli->query($sqlTwo) or die($mysqli->error);
		return $resultTwo;
	}

	//Desplegar noticia principal
	function show_news_main(){
		global $mysqli;
		$sqlThree ="SELECT * FROM post WHERE (status = 1) and (category_id = 11) limit 1";
		$resultThree = $mysqli->query($sqlThree) or die($mysqli->error);
		return $resultThree;
	}

	//Depslegar noticia en slider rotador 3d
	function show_news_slider_1(){
		global $mysqli;
		$sqlFour ="SELECT * FROM post WHERE (status = 1) and (category_id = 10) limit 3";
		$resultFour = $mysqli->query($sqlFour) or die($mysqli->error);
		return $resultFour;
	}

	 //Desplegar noticia en sobresalientes
	function show_news_outstanding(){
		global $mysqli;
		$sqlFive ="SELECT * FROM post WHERE (status = 1) and (category_id = 9) limit 1";
		$resultFive = $mysqli->query($sqlFive) or die($mysqli->error);
		return $resultFive;
	}

	//Mostrar detalle de las noticias
	function show_news_details($idnews){
		global $mysqli;
		$sqlSix ="SELECT * FROM post WHERE id = $idnews limit 1";
		$resultSix = $mysqli->query($sqlSix) or die($mysqli->error);
		return $resultSix;
	}

	//Mostrar 4 ultimas noticias en el detalle de noticias ----slider derecha
	function show_last_news(){
		global $mysqli;
		$sqlSeven ="SELECT * FROM post WHERE (status = 1) order by id DESC limit 4";
		$resultSeven = $mysqli->query($sqlSeven) or die($mysqli->error);
		return $resultSeven;
	}

	//Mostrar noticias en slider 2 pagina de noticias
	function show_news_sliderTwo(){
		global $mysqli;
		$sqlEight ="SELECT * FROM post WHERE (status = 1) and (category_id = 12) order by id DESC limit 4";
		$resultEight = $mysqli->query($sqlEight) or die($mysqli->error);
		return $resultEight;
	}
	
	//Actualizar BD con los datos que vienen de wompi	
	function webhook($reference_orders, $status_Orders, $id_Orders, $payment_method, $reference_orders1){
		global $mysqli;
		global $ejecuted;
		$stmt = $mysqli->prepare("UPDATE orders SET referenceCode = ?, status = ?, reference_pol = ?, pay_method = ? WHERE referenceCode = ?");
		$stmt->bind_param('sssss', $reference_orders, $status_Orders, $id_Orders, $payment_method, $reference_orders1);
		if($stmt->execute()){
			return true;
			} else {
			return false;		
		}
	}

	//Actualiziar visitas de las noticias
	function update_views_newsx($idnews){
		global $mysqli;
		$sqlNine ="SELECT * FROM post WHERE id = $idnews limit 1";
		$resultNine = $mysqli->query($sqlNine) or die($mysqli->error);
		return $resultNine;
	}
	
	//Consulta para verificar ventas en un periodo de tiempo determinado
	function consult_sales($inicio,$fin){
		global $mysqli;
		$inicio = date($inicio);
		$fin = date($fin);
        //$sqlTen= "SELECT * FROM orders WHERE str_to_date(left(date_created_order,10), '%Y-%m-%d') BETWEEN $inicio AND $fin ORDER BY date_created_order ASC";
		//$sqlTen= "SELECT * FROM orders WHERE ( str_to_date(left(date_created_order,10), '%Y-%m-%d')>= date('$inicio') ) AND ( str_to_date(left(date_created_order,10), '%Y-%m-%d')<= date('$fin') ) ORDER BY date_created_order ASC";
		$sqlTen= "SELECT * FROM orders WHERE str_to_date(left(date_created_order,10), '%Y-%m-%d')>=date('$inicio') AND str_to_date(left(date_created_order,10), '%Y-%m-%d')<=date('$fin') AND (status='Aprobado' OR status='Alistamiento' OR status='En proceso' OR status='En ruta' OR status='Entregado' OR status='Listo para recoger') ORDER BY id_order DESC";
		$resultTen = $mysqli->query($sqlTen) or die($mysqli->error);
		return $resultTen;
	}
	
	//Consulta para obtener los nombres de los usuarios en los pedidos
	function consult_sales_names(){
		global $mysqli;
		$sqlEleven= "SELECT * FROM usuarios";
		$resulEleven = $mysqli->query($sqlEleven) or die($mysqli->error);
		return $resulEleven;
	}
	
	//Consulta para obtener los correos de los usuarios de apoyo logístico
	function consult_email_log($city){
		global $mysqli;
		$sqlTwelve= "SELECT * FROM users WHERE id_userMunicipality=$city and kind=5 ";
		$resulTwelve = $mysqli->query($sqlTwelve) or die($mysqli->error);
		return $resulTwelve;
	}
	
	//Consulta para obtener los nombres de los usuarios en los pedidos
	function consult_sales_names_export($idAux){
		global $mysqli;
		$sqlThirteen= "SELECT * FROM usuarios WHERE id_user = $idAux LIMIT 1";
		$resulThirteen = $mysqli->query($sqlThirteen) or die($mysqli->error);
		return $resulThirteen;
	}
	
	//Consulta para verificar ventas en un periodo de tiempo determinado Apoyo Logistico
	function consultSalesApoyoLogistico($inicio,$fin){
		global $mysqli;
		$inicio = date($inicio);
		$fin = date($fin);
		$sqlFourteen= "SELECT * FROM orders WHERE str_to_date(left(date_created_order,10), '%Y-%m-%d')>=date('$inicio') AND str_to_date(left(date_created_order,10), '%Y-%m-%d')<=date('$fin') AND (status='Aprobado' OR status='Alistamiento' OR status='En proceso' OR status='En ruta' OR status='Entregado' OR status='Listo para recoger') ORDER BY date_created_order DESC";
		$resultFourteen = $mysqli->query($sqlFourteen) or die($mysqli->error);
		return $resultFourteen;
	}
	
	
	//Consulta para verificar ventas en un periodo de tiempo determinado Equioo contable Pasto
	function consultSalesTeamContables($inicio,$fin){
		global $mysqli;
		$inicio = date($inicio);
		$fin = date($fin);
		$sqlFifteen= "SELECT * FROM orders WHERE str_to_date(left(date_created_order,10), '%Y-%m-%d')>=date('$inicio') AND str_to_date(left(date_created_order,10), '%Y-%m-%d')<=date('$fin') AND (status='Aprobado' OR status='Alistamiento' OR status='En proceso' OR status='En ruta' OR status='Entregado' OR status='Listo para recoger') ORDER BY date_created_order DESC";
		$resultFifteen = $mysqli->query($sqlFifteen) or die($mysqli->error);
		return $resultFifteen;
	}


	//Mostrar detalle de los proyectos
	function show_proyects_details($idnews,$categoria){
		global $mysqli;
		$sqlSixteen ="SELECT * FROM proyectos WHERE id_proyecto = $idnews limit 1";
		$resultSixteen = $mysqli->query($sqlSixteen) or die($mysqli->error);
		return $resultSixteen;
	}

	//Mostrar 3 ultimas proyectos de la categoría seleccionada
	function show_last_proyects($categoria){
		global $mysqli;
		$sqlSeventeen ="SELECT * FROM proyectos WHERE (status = 1) AND (category = '$categoria') order by id_proyecto DESC limit 3";
		$resultSeventeen = $mysqli->query($sqlSeventeen) or die($mysqli->error);
		return $resultSeventeen;
	}
	
	//Mostrar tips los tres ultimos
	function show_tips(){
		global $mysqli;
		$sqlEightenn ="SELECT * FROM tipsAgrotic WHERE (status = 1) order by id_tipsAgrotic ASC limit 3";
		$resultEightenn = $mysqli->query($sqlEightenn) or die($mysqli->error);
		return $resultEightenn;
	}
	
	//Mostrar detalle asociaciones
	function show_asociaciation_details($slug){
		global $mysqli;
		$sqlnineteen ="SELECT * FROM associations WHERE (slug = '$slug') AND (status = 1) limit 1";
		$resultnineteen = $mysqli->query($sqlnineteen) or die($mysqli->error);
		return $resultnineteen;
	}
	
	//Mostrar detalle federation
	function show_federation_details(){
		global $mysqli;
		$sqltwenty ="SELECT * FROM federation WHERE (status = 1) limit 1";
		$resulttwenty = $mysqli->query($sqltwenty) or die($mysqli->error);
		return $resulttwenty;
	}
	
	//Consulta para obtener los gramos de una venta
	function consult_grams_order($nroOrders){
		global $mysqli;
		$sqltwentyTwo= "SELECT * FROM orders WHERE referenceCode = $nroOrders LIMIT 1";
		$resulsqltwentyTwo = $mysqli->query($sqltwentyTwo) or die($mysqli->error);
		return $resulsqltwentyTwo;
	}
	function consult_grams_ordersTwo($NameOrders){
		global $mysqli;
		$sqltwentyFour= "SELECT * FROM presentations WHERE name = $NameOrders LIMIT 1";
		$resulsqltwentyFour = $mysqli->query($sqltwentyFour) or die($mysqli->error);
		return $resulsqltwentyFour;
	} 
	
	//Consulta para verificar ventas en un periodo de tiempo determinado mercados campesinos
	function consult_sales_mercados_campesinos($inicio,$fin){
		global $mysqli;
		$inicio = date($inicio);
		$fin = date($fin);
        //$sqlTen= "SELECT * FROM orders WHERE str_to_date(left(date_created_order,10), '%Y-%m-%d') BETWEEN $inicio AND $fin ORDER BY date_created_order ASC";
		//$sqlTen= "SELECT * FROM orders WHERE ( str_to_date(left(date_created_order,10), '%Y-%m-%d')>= date('$inicio') ) AND ( str_to_date(left(date_created_order,10), '%Y-%m-%d')<= date('$fin') ) ORDER BY date_created_order ASC";
		$sqltwentyFive= "SELECT * FROM orders WHERE str_to_date(left(date_created_order,10), '%Y-%m-%d')>=date('$inicio') AND str_to_date(left(date_created_order,10), '%Y-%m-%d')<=date('$fin') AND (funcionario=1 OR funcionario=0) AND (details LIKE '%Mercado%') ORDER BY id_order DESC";
		$resulttwentyFive = $mysqli->query($sqltwentyFive) or die($mysqli->error);
		return $resulttwentyFive;
	}
	
	function product($id_product){
        global $mysqli;
        $sql = "SELECT * FROM productos_dpto_narino WHERE id_product = ?";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("i", $id_product); // "i" indica un parámetro entero
        $stmt->execute();
        $result = $stmt->get_result();
    
        // Obtener la primera fila como un array
        $productData = $result->fetch_assoc();
    
        $stmt->close();
        return $productData;
    }
	
	function datos_generales(){
		global $mysqli;
		$sqltwentySeven= "SELECT * FROM mercados_campesinos WHERE id = 1 LIMIT 1";
		$resulsqltwentySeven = $mysqli->query($sqltwentySeven) or die($mysqli->error);
		
        $datos = $resulsqltwentySeven->fetch_array(MYSQLI_ASSOC);
        return $datos;
	}
	
	function datos_mercado2(){
		global $mysqli;
		$sqltwentyEight= "SELECT * FROM mercados_campesinos WHERE id = 2 LIMIT 1";
		$resulsqltwentyEight = $mysqli->query($sqltwentyEight) or die($mysqli->error);
		
        $datosM = $resulsqltwentyEight->fetch_array(MYSQLI_ASSOC);
        return $datosM;
	}
	

	