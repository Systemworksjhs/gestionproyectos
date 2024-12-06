<?php
	class ObjectiveData {
		public static $tablename = "objectives";

		public function ObjectiveData(){
			$this->created_at = "NOW()";
		}

		public function add(){
			$sql = "insert into ".self::$tablename." (title,description,status,created_at) ";
			$sql .= "value (\"$this->title\",\"$this->description\",\"$this->status\",NOW())";
			return Executor::doit($sql);
		}

		public static function delById($id){
			$sql = "delete from ".self::$tablename." where id_objective=$id";
			Executor::doit($sql);
		}
		public function del(){
			$sql = "delete from ".self::$tablename." where id_objective=$this->id_objective";
			Executor::doit($sql);
		}

	// partiendo de que ya tenemos creado un objecto ObjectiveData previamente utilizamos el contexto
		public function update(){
			$sql = "update ".self::$tablename." set title=\"$this->title\",description=\"$this->description\",status=\"$this->status\",created_at=NOW() WHERE id_objective=$this->id_objective";
            Executor::doit($sql);
		}

		public static function getById($id){
			$sql = "select * from ".self::$tablename." where id_objective=$id";
			$query = Executor::doit($sql);
			return Model::one($query[0],new ObjectiveData());
		}

		public static function getAll(){
			$sql = "select * from ".self::$tablename;
			$query = Executor::doit($sql);
			return Model::many($query[0],new ObjectiveData());

		}
		
		public static function getAllActive(){
			$sql = "select * from ".self::$tablename;
			$query = Executor::doit($sql);
			return Model::many($query[0],new ObjectiveData());

		}

		public static function getLike($q){
			$sql = "select * from ".self::$tablename." where name like '%$q%'";
			$query = Executor::doit($sql);
			return Model::many($query[0],new ObjectiveData());
		}

	}

?>