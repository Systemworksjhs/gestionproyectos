<?php

	function isNull($nombre, $user, $pass, $pass_con, $email, $identificacion){
		if(strlen(trim($nombre)) < 1 || strlen(trim($user)) < 1 || strlen(trim($pass)) < 1 || strlen(trim($pass_con)) < 1 || strlen(trim($email)) < 1 || strlen(trim($identificacion)) < 1)
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
		
		$stmt = $mysqli->prepare("SELECT id FROM usuarios WHERE usuario = ? LIMIT 1");
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
		
		$stmt = $mysqli->prepare("SELECT id FROM usuarios WHERE identificacion = ? LIMIT 1");
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

	function emailExiste($email)
	{
		global $mysqli;
		
		$stmt = $mysqli->prepare("SELECT id FROM usuarios WHERE correo = ? LIMIT 1");
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
			echo "<div id='error' class='alert alert-danger' role='alert'>
			<a href='#' onclick=\"showHide('error');\">[X]</a>
			<ul>";
			foreach($errors as $error)
			{
				echo "<li>".$error."</li>";
			}
			echo "</ul>";
			echo "</div>";
		}
	}
	
	function registraUsuario($usuario, $pass_hash, $nombre, $email, $activo, $token, $tipo_usuario, $identificacion, $phone){
		
		global $mysqli;
		
		$stmt = $mysqli->prepare("INSERT INTO usuarios (usuario, password, nombre, correo, activacion, token, id_tipo, identificacion, phone) VALUES(?,?,?,?,?,?,?,?,?)");
		$stmt->bind_param('ssssisiss', $usuario, $pass_hash, $nombre, $email, $activo, $token, $tipo_usuario, $identificacion, $phone);
		
		if ($stmt->execute()){
			$auditoriasnew = "Se registra al usuario: ";
			$auditoriasnew .= $usuario; 
			auditorias_1($auditoriasnew);
			return $mysqli->insert_id;
			
		} else {
			return 0;	
		}		
	}
	
	function enviarEmail($email, $nombre, $asunto, $cuerpo){
		
		//require_once 'PHPMailer/PHPMailerAutoload.php';
		include "./login/PHPMailer/class.smtp.php";
		include "./login/PHPMailer/class.phpmailer.php";
		$email_user = "proyectnar@gmail.com";
		$email_password = "03-03-2021";
		$the_subject = $asunto;
		$address_to = $email;
		$from_name = "Secretar&iacute;a Planeaci&oacute;n";
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
		
		$stmt = $mysqli->prepare("SELECT activacion FROM usuarios WHERE id = ? AND token = ? LIMIT 1");
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
		
		$stmt = $mysqli->prepare("UPDATE usuarios SET activacion=1 WHERE id = ?");
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
		
		$stmt = $mysqli->prepare("SELECT id, id_tipo, password, correo, nombre FROM usuarios WHERE usuario = ? || correo = ? LIMIT 1");
		$stmt->bind_param("ss", $usuario, $usuario);
		$stmt->execute();
		$stmt->store_result();
		$rows = $stmt->num_rows;
		
		if($rows > 0) {
			
			if(isActivo($usuario)){
				
				$stmt->bind_result($id, $id_tipo, $passwd, $correo, $nombre);
				$stmt->fetch();
				
				$validaPassw = password_verify($password, $passwd);
				
				if($validaPassw){
					
					lastSession($id);
					$_SESSION['id'] = $id;
					$_SESSION['tipo_usuario'] = $id_tipo;
					$_SESSION['correo'] = $correo;
					$_SESSION['nombre'] = $nombre;
					auditorias_1('Inicio de sesión');
					
					header("location: principal");
					} else {
					
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
	
	function lastSession($id)
	{
		global $mysqli;
		
		$stmt = $mysqli->prepare("UPDATE usuarios SET last_session=NOW(), token_password='', password_request=0 WHERE id = ?");
		$stmt->bind_param('s', $id);
		$stmt->execute();
		$stmt->close();
	}
	
	function auditorias_1($actividades){
		$fecha = date("Y-m-d H:i:s");
		$users=$_SESSION['nombre'];
		include_once('connection.php');
		$database2 = new Connection();
		$db2 = $database2->open();
		$stmt2 = $db2->prepare("INSERT INTO auditory (user, activity, date) VALUES (:users, :actividades, :fecha)");
		$stmt2->execute(array(':users' => $users , ':actividades' => $actividades , ':fecha' => $fecha));
		$database2->close();
	}

	function isActivo($usuario)
	{
		global $mysqli;
		
		$stmt = $mysqli->prepare("SELECT activacion FROM usuarios WHERE usuario = ? || correo = ? LIMIT 1");
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
		
		$stmt = $mysqli->prepare("UPDATE usuarios SET token_password=?, password_request=1 WHERE id = ?");
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
		
		$stmt = $mysqli->prepare("SELECT password_request FROM usuarios WHERE id = ?");
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
		
		$stmt = $mysqli->prepare("SELECT activacion FROM usuarios WHERE id = ? AND token_password = ? AND password_request = 1 LIMIT 1");
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
		
		$stmt = $mysqli->prepare("UPDATE usuarios SET password = ?, token_password='', password_request=0 WHERE id = ? AND token_password = ?");
		$stmt->bind_param('sis', $password, $user_id, $token);
		
		if($stmt->execute()){
			return true;
			} else {
			return false;		
		}
	}
	
	function cambiaPassword_1($password, $user_id){
		$database = new Connection();
		$db = $database->open();
		$sql = "UPDATE usuarios SET password = '$password' WHERE id='$user_id'";
		$db->exec($sql);
		
		$fecha = date("Y-m-d H:i:s");
		$actividad ="Cambio de contraseña";
		$users=$_SESSION['nombre'];
		$database2 = new Connection();
		$db2 = $database2->open();
		$stmt2 = $db2->prepare("INSERT INTO auditory (user, activity, date) VALUES (:users, :actividad, :fecha)");
		$stmt2->execute(array(':users' => $users , ':actividad' => $actividad , ':fecha' => $fecha));
		$database->close();
		$database2->close();

	}

