<?php
	class changePricesTwoData {
		public static $tablename = "productos_dpto_narino";

		public function changePricesTwoData(){
			$this->name = "";
		}

		// partiendo de que ya tenemos creado un objecto changePricesTwoData previamente utilizamos el contexto
		// programar la variable para almacenar el porcentaje de incremento
		public function update($aIncrementar){
			$sql = "update ".self::$tablename." set price=price,
			                                        incrementPrice=ROUND((((price*$aIncrementar)/100)+price),2),
			                                        chage_prices_update=NOW() 
			                                        where municipioId=$this->municipioId";
			Executor::doit($sql);
		}

		public static function getById($id){
			$sql = "select * from ".self::$tablename." where municipioId=$id";
			$query = Executor::doit($sql);
			return Model::one($query[0],new changePricesTwoData());
		}

		public static function getAll(){
			$sql = "select * from ".self::$tablename;
			$query = Executor::doit($sql);
			return Model::many($query[0],new changePricesTwoData());
		}
		
		public static function getLike($q){
			$sql = "select * from ".self::$tablename." where name like '%$q%'";
			$query = Executor::doit($sql);
			return Model::many($query[0],new changePricesTwoData());
		}

	}

?>