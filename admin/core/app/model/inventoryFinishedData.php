<?php
	class inventoryFinishedData {
		public static $tablename = "warehouse_inventory_finished";

		public function inventoryFinishedData(){
			$this->name = "";
		}

		public function add(){
			$sql = "insert into ".self::$tablename." (dateRegistrer,batch,supplier,product,amount,decrease) ";
			$sql .= "value (\"$this->dateRegistrer\",\"$this->batch\",\"$this->supplier\",\"$this->product\",\"$this->amount\",\"$this->decrease\")";
			return Executor::doit($sql);
		}

		public function del(){
			$sql = "delete from ".self::$tablename." where id_inventory=$this->id_inventory";
			Executor::doit($sql);
		}

		// partiendo de que ya tenemos creado un objecto inventoryFinishedData previamente utilizamos el contexto
		public function update(){
			$sql = "update ".self::$tablename." set dateRegistrer=\"$this->dateRegistrer\",batch=\"$this->batch\",supplier=\"$this->supplier\",product=\"$this->product\",amount=\"$this->amount\",decrease=\"$this->decrease\" where id_inventory=$this->id_inventory";
			Executor::doit($sql);
		}

		public static function getById($id){
			$sql = "select * from ".self::$tablename." where id_inventory=$id";
			$query = Executor::doit($sql);
			return Model::one($query[0],new inventoryFinishedData());
		}

		public static function getAll(){
			$sql = "select * from ".self::$tablename;
			$query = Executor::doit($sql);
			return Model::many($query[0],new inventoryFinishedData());

		}
		
		public static function getLike($q){
			$sql = "select * from ".self::$tablename." where name like '%$q%'";
			$query = Executor::doit($sql);
			return Model::many($query[0],new inventoryFinishedData());
		}

	}

?>