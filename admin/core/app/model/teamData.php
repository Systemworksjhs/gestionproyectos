<?php
	class teamData {
		public static $tablename = "team";

		public function teamData(){
			$this->name = "";
		}

		public function add(){
			$fecha_Creation =date("d-m-Y h:i:s");
			$sql = "insert into ".self::$tablename." (area,image,designation,status,createdDate) ";
			$sql .= "value (\"$this->area\",\"$this->image\",\"$this->designation\",\"$this->status\",NOW())";
			return Executor::doit($sql);
		}

		public function del(){
			$sql = "delete from ".self::$tablename." where id_team=$this->id_team";
			Executor::doit($sql);
		}

		// partiendo de que ya tenemos creado un objecto teamData previamente utilizamos el contexto
		public function update(){
			$sql = "update ".self::$tablename." set area=\"$this->area\",image=\"$this->image\",designation=\"$this->designation\",status=\"$this->status\",createdDate=NOW() where id_team=$this->id_team";
			Executor::doit($sql);
		}

		public static function getById($id){
			$sql = "select * from ".self::$tablename." where id_team=$id";
			$query = Executor::doit($sql);
			return Model::one($query[0],new teamData());
		}

		public static function getAll(){
			$sql = "select * from ".self::$tablename;
			$query = Executor::doit($sql);
			return Model::many($query[0],new teamData());

		}
		
		public static function getLike($q){
			$sql = "select * from ".self::$tablename." where name like '%$q%'";
			$query = Executor::doit($sql);
			return Model::many($query[0],new teamData());
		}

	}

?>