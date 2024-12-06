<?php
	class MunicipalityData {
		public static $tablename = "municipality";

		public function municipality(){
			$this->name = "";
		}

		public static function getById($id){
			$sql = "select * from ".self::$tablename." where id_municipality=$id";
			$query = Executor::doit($sql);
			return Model::one($query[0],new MunicipalityData());
		}

		public static function getAll(){
			$sql = "select * from ".self::$tablename;
			$query = Executor::doit($sql);
			return Model::many($query[0],new MunicipalityData());

		}
		
		public static function getLike($q){
			$sql = "select * from ".self::$tablename." where name_municipality like '%$q%'";
			$query = Executor::doit($sql);
			return Model::many($query[0],new MunicipalityData());
		}

	}

?>