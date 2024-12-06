<?php

	$admin = UserData::getById($_SESSION["user_id"]);
	$user = UserStandarData::getById($_GET["id"]);
	$user->del();
	Core::redir("./?view=usersStandar");

?>