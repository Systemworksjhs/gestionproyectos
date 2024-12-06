<?php
	class Database {
		public static $db;
		public static $con;
		function Database(){
			$this->user="root";$this->pass="root";$this->host="JhosepH2020";$this->ddbb="agro_tic_narino";
		}

		function connect(){
			$con = new mysqli("localhost", "root", "JhosepH2020", "bd_gestionproyectos");
			mysqli_set_charset($con,'utf8');
			return $con;
		}

		public static function getCon(){
			if(self::$con==null && self::$db==null){
				self::$db = new Database();
				self::$con = self::$db->connect();
			}
			return self::$con;
		}
		
	}
?>