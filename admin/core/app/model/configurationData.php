<?php
	class configurationData {
		public static $tablename = "configurations";

	// partiendo de que ya tenemos creado un objecto configurationData previamente utilizamos el contexto
		public function update(){
			$sql = "update ".self::$tablename." set logoLogin=\"$this->logoLogin\",fondoLogin=\"$this->fondoLogin\",favicon=\"$this->favicon\",loading=\"$this->loading\",created_at=NOW() where id_configuration=$this->id_configuration";
			Executor::doit($sql);
		}

		public static function getById($id){
			$sql = "select * from ".self::$tablename." where id_configuration=$id";
			$query = Executor::doit($sql);
			return Model::one($query[0],new configurationData());
		}

		public static function getAll(){
			$sql = "select * from ".self::$tablename;
			$query = Executor::doit($sql);
			return Model::many($query[0],new configurationData());

		}

	}

?>