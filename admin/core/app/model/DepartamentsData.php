<?php
	class DepartamentsData {
		public static $tablename = "departaments";

		public function departaments(){
			$this->name = "";
		}

		public static function getById($id){
			$sql = "select * from ".self::$tablename." where id_departament=$id";
			$query = Executor::doit($sql);
			return Model::one($query[0],new DepartamentsData());
		}

		public static function getAll(){
			$sql = "select * from ".self::$tablename;
			$query = Executor::doit($sql);
			return Model::many($query[0],new DepartamentsData());

		}
		
		public static function getLike($q){
			$sql = "select * from ".self::$tablename." where name_departament like '%$q%'";
			$query = Executor::doit($sql);
			return Model::many($query[0],new DepartamentsData());
		}

	}

?>