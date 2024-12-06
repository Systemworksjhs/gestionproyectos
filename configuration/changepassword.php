<?php
    session_start();
	require 'conection.php';
	require 'funcscopy.php';
	if(isset($_SESSION["id"])){
		$id_user         = $_SESSION['id'];
    }else{
       header("Location: login");
    }

    //if (!empty($_POST)) {
		$id_user = $mysqli->real_escape_string($id_user);
		$password = $mysqli->real_escape_string($_GET['passwordChange1']);
		$con_password = $mysqli->real_escape_string($_GET['passwordChange2']);
		if( (strlen($password)<8) || (strlen($con_password)<8)){ 
			$errorsTwo= "Las contraseñas deben tener al menos 8 caracteres";
		}else{
			if (!empty($password)&&!empty($password)){
			    $sw=0;
			    $textError="Error!";
				if(validaPassword($password, $con_password)){
					$pass_hash = hashPassword($password);
					if(cambiaPasswordCuenta($pass_hash, $id_user)){
						$errorsTwo = "Password modificado exitosamente";
						$sw=1;
						$textError="Cambio exitoso! ";
					} else {
						$errorsTwo = "Error al modificar el password";
					}
				} else {
					$errorsTwo = "Las contraseñas no coinciden";
				}
			}else{
				$errorsTwo = "Los campos están vacios";
				
			}
		}
	//}
   
    if($sw==0){?>		
        <div class="w3-container w3-section w3-red">
    <?php
    }
    else{
        ?>
        <div class="w3-container w3-section w3-green">
            <?php
    }
    ?>
        <span onclick="this.parentElement.style.display='none'" class="w3-closebtn" style="font-size:18px;">&times;</span>
        <h3><?php echo $textError;?><span style="font-size:16px;margin-left: 15px;"><?php echo $errorsTwo;?></span></h3>
    </div>
    