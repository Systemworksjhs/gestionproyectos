<?php
	class changePricesData {
		public static $tablename = "productos_dpto_narino";

        public function del(){
			$sql = "delete from ".self::$tablename." where id_product=$this->id_product";
			Executor::doit($sql);
		}

		// partiendo de que ya tenemos creado un objeto changePricesData previamente utilizamos el contexto
		public function update(){
			$sql = "update ".self::$tablename." set price=\"$this->price\",enabled=\"$this->enabled\",update_date=NOW() where id_product=$this->id_product";
			Executor::doit($sql);
		}

		public static function getById($id){
			$sql = "select * from ".self::$tablename." where id_product=$id";
			$query = Executor::doit($sql);
			return Model::one($query[0],new changePricesData());
		}

		public static function getAll(){
			$sql = "select * from ".self::$tablename;
			$query = Executor::doit($sql);
			return Model::many($query[0],new changePricesData());
		}
		
		public static function getLike($q){
			$sql = "select * from ".self::$tablename." where nombre_Producto like '%$q%'";
			$query = Executor::doit($sql);
			return Model::many($query[0],new changePricesData());
		}

		public static function getAlls(){
			$sql = "select * from ".self::$tablename;
			$query = Executor::doit($sql);
			return Model::many($query[0],new changePricesData());
			
		}

	}

?>