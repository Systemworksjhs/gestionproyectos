<?php
	class contactsMesagesData {
		public static $tablename = "contactsmessages";

		public function contactsMesagesData(){
			$this->name = "";
		}

		public function add(){
			$fecha_Creation =date("d-m-Y h:i:s");
			$sql = "insert into ".self::$tablename." (area,image,designation,status,createdDate) ";
			$sql .= "value (\"$this->area\",\"$this->image\",\"$this->designation\",\"$this->status\",NOW())";
			return Executor::doit($sql);
		}

		public function del(){
			$sql = "delete from ".self::$tablename." where id_contacts=$this->id_contacts";
			Executor::doit($sql);
		}

		// partiendo de que ya tenemos creado un objecto contactsMesagesData previamente utilizamos el contexto
		public function update(){
			$sql = "update ".self::$tablename." set observation=\"$this->observation\",status=\"$this->status\",send=\"$this->send\",response=NOW() where id_contacts=$this->id_contacts";
			Executor::doit($sql);
		}

		public static function getById($id){
			$sql = "select * from ".self::$tablename." where id_contacts=$id";
			$query = Executor::doit($sql);
			return Model::one($query[0],new contactsMesagesData());
		}

		public static function getAll(){
			$sql = "select * from ".self::$tablename;
			$query = Executor::doit($sql);
			return Model::many($query[0],new contactsMesagesData());
		}
		
		public static function getLike($q){
			$sql = "select * from ".self::$tablename." where name like '%$q%'";
			$query = Executor::doit($sql);
			return Model::many($query[0],new contactsMesagesData());
		}

		public static function getMessagesNotReady(){
			$sql = "select * from ".self::$tablename." where status=0";
			$query = Executor::doit($sql);
			return Model::many($query[0],new contactsMesagesData());
		}
	}

?>