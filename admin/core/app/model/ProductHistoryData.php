<?php
	class ProductHistoryData {
		public static $tablename = "product_history";

		public function ProductHistoryData(){
			$this->name = "";
		}

		public function add(){
			$fecha_Creation =date("d-m-Y h:i:s");
			$sql = "insert into product_history (id_product, image, product, price, updatedate)";
			$sql .= "value (\"$this->id_product\",\"$this->image\",\"$this->product\",\"$this->price\",NOW())";
			return Executor::doit($sql);
		}

		public function del(){
			$sql = "delete from ".self::$tablename." where id_history=$this->id_history";
			Executor::doit($sql);
		}

		// partiendo de que ya tenemos creado un objecto ProductHistoryData previamente utilizamos el contexto
		public function update(){
			$sql = "update ".self::$tablename." set id_history=\"$this->id_history\",image=\"$this->image\",product=\"$this->product\",price=\"$this->price\",date=\"$this->date\",updatedate=NOW() where id_asocciatios=$this->id_asocciatios";
			Executor::doit($sql);
		}

		public static function getById($id){
			$sql = "select * from ".self::$tablename." where id_history=$id";
			$query = Executor::doit($sql);
			return Model::one($query[0],new ProductHistoryData());
		}

		public static function getAll(){
			$sql = "select * from ".self::$tablename;
			$query = Executor::doit($sql);
			return Model::many($query[0],new ProductHistoryData());

		}
		
		public static function getLike($q){
			$sql = "select * from ".self::$tablename." where name like '%$q%'";
			$query = Executor::doit($sql);
			return Model::many($query[0],new ProductHistoryData());
		}

	}

?>