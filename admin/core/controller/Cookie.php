<?php

	class Cookie {
		function __get($value){
			if(!$this->exist($value)){
				print "<b>COOKIE ERROR</b> El parametro <b>$value</b> que intentas llamar no existe!";
				die();
			}
			return $_COOKIE[$value];
		}

		function  exist($value){
			$found = false;
			if(isset($_COOKIE[$value])){
				$found=true;
			}
			return $found;
		}
	}

?>