<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Panel de Administraci¨®n</title>
		<link rel="icon" href="dist/img/favicon.ico">
		<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
		<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
		<!-- Bootstrap 3.3.4 -->
		<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
		<!-- Font Awesome Icons -->
		<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
		<!-- Theme style -->
		<link href="dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
	</head>
	<body>
		<?php
			if(!isset($_SESSION["user_id"])) {
				$user = $_POST['username'];
				$pass = sha1(md5($_POST['password']));
				$base = new Database();
				$con = $base->connect();
				$sql = "select * from users where (email= \"".$user."\" or username= \"".$user."\") and password= \"".$pass."\" and status=1 ";
				$query = $con->query($sql);
				$found = false;
				$userid = null;
				$kind = null;
				while($r = $query->fetch_array()){
					$found = true ;
					$userid = $r['id'];
					$kind = $r['kind'];
					$id_userMunicipality 	= $r['id_userMunicipality'];
				}
				if($found==true) {
					$_SESSION['user_id']=$userid;
					$_SESSION['kind']=$kind;
					$_SESSION['id_userMunicipality']= $id_userMunicipality ;
					echo "<div class='login-box' style='background: #85A633;'>";
						echo "<div class='card-header text-center'>";
							echo " <img src='uploads/setup/Cargando.gif' alt=''></br>";
							echo "<h3>Cargando ... $user</h3>";
							print "<script>window.location='./?view=home';</script>";
						echo "</div";
					echo "</div";
				}else {
					print "<script>window.location='./?view=login';</script>";
				}
				}else{
					print "<script>window.location='./?view=home';</script>";	
			}
		?>
	</body>
</html>	

