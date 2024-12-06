<?php
	class sponsorsData {
		public static $tablename = "sponsors";

		public function sponsorsData(){
			$this->name = "";
		}

		public function add(){
			$fecha_Creation =date("d-m-Y h:i:s");
			$sql = "insert into ".self::$tablename." (name,image,status,createdDate) ";
			$sql .= "value (\"$this->name\",\"$this->image\",\"$this->status\",NOW())";
			return Executor::doit($sql);
		}

		public function del(){
			$sql = "delete from ".self::$tablename." where id_sponsor=$this->id_sponsor";
			Executor::doit($sql);
		}

		// partiendo de que ya tenemos creado un objecto sponsorsData previamente utilizamos el contexto
		public function update(){
			$sql = "update ".self::$tablename." set name=\"$this->name\",image=\"$this->image\",status=\"$this->status\",createdDate=NOW() where id_sponsor=$this->id_sponsor";
			Executor::doit($sql);
		}

		public static function getById($id){
			$sql = "select * from ".self::$tablename." where id_sponsor=$id";
			$query = Executor::doit($sql);
			return Model::one($query[0],new sponsorsData());
		}

		public static function getAll(){
			$sql = "select * from ".self::$tablename;
			$query = Executor::doit($sql);
			return Model::many($query[0],new sponsorsData());

		}
		
		public static function getLike($q){
			$sql = "select * from ".self::$tablename." where name like '%$q%'";
			$query = Executor::doit($sql);
			return Model::many($query[0],new sponsorsData());
		}

	}

?>