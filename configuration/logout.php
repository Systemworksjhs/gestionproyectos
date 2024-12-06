<?php
	session_start();
	
	/*variable */
	unset($_SESSION['listSC']);
	unset($_SESSION['remanente']);
	session_destroy();
	session_unset();
	header("Location: /");
?>