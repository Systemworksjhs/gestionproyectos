<?php
	Class Connection{
		private $server = "mysql:host=localhost;dbname=agro_tic_narino";
		private $username = "root";
		private $password = "JhosepH2020";
		private $options  = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",);
		protected $conn;

		public function open(){
			try{
				$this->conn = new PDO($this->server, $this->username, $this->password, $this->options);
				return $this->conn;
			}
			catch (PDOException $e){
				echo "Ocurrió un problema con la conexión: " . $e->getMessage();
			}
		}

		public function close(){
			$this->conn = null;
		}

	}
 
?>