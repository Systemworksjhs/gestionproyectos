<?php

	$admin = UserData::getById($_SESSION["user_id"]);
	$userMapa = userMapaData::getById($_GET["idinitiative"]);
	//if($admin->is_admin){
		//if($userMapa->id_initiative!=$admin->id){
		    $userMapa->id=$_GET["idinitiative"];
			$userMapa->del();
			Core::alert("Eliminado exitosamente!");
			Core::redir("./?view=insignias");
		//}else{
		//Core::alert("No te puedes eliminar a ti mismo");
		//Core::redir("./?view=insignias");
		//}
	//}else{
	//	Core::alert("Error!");
	//}
	//Core::redir("./logout.php");

?>