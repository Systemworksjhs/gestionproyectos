<?php
	class ordersData {
		public static $tablename = "orders";

		public function ordersData(){
			$this->name = "";
		}

		public function add(){
			$fecha_Creacion =date("d-m-Y h:i:s");
			$sql = "insert into ".self::$tablename." (referenceCode, reference_pol, id_user_order , id_municipality, price, email, phone, address, details, status, date_created_order) ";
			$sql .= "value (\"$this->referenceCode\",\"$this->reference_pol\",\"$this->id_user_order\",\"$this->id_municipality\",\"$this->price\",\"$this->email\",\"$this->phone\",\"$this->address\",\"$this->details\",\"$this->status\",NOW())";
			return Executor::doit($sql);
		}

		public function del(){
			$sql = "delete from ".self::$tablename." where id_order=$this->id_order";
			Executor::doit($sql);
		}

		// partiendo de que ya tenemos creado un objecto ordersData previamente utilizamos el contexto
		public function update(){
			$sql = "update ".self::$tablename." set referenceCode=\"$this->referenceCode\",reference_pol=\"$this->reference_pol\",id_user_order=\"$this->id_user_order\",id_municipality=\"$this->id_municipality\",price=\"$this->price\",email=\"$this->email\",phone=\"$this->phone\",address=\"$this->address\",status=\"$this->status\",update_date=NOW() where id_order=$this->id_order";
			Executor::doit($sql);
		}

		public static function getById($id){
			$sql = "select * from ".self::$tablename." where id_order=$id";
			$query = Executor::doit($sql);
			return Model::one($query[0],new ordersData());
		}

		public static function getAll(){
			$sql = "select * from ".self::$tablename." ORDER BY id_order DESC";
			$query = Executor::doit($sql);
			return Model::many($query[0],new ordersData());
		}
		
		public static function getLike($q){
			$sql = "select * from ".self::$tablename." where nombre_Producto like '%$q%'";
			$query = Executor::doit($sql);
			return Model::many($query[0],new ordersData());
		}

		public static function getAllOrdersSecretaries(){
			$sql = "SELECT count(secretaria) as Secretarias, funcionario, secretaria from ".self::$tablename." orders WHERE funcionario=1 GROUP by secretaria";
			$query = Executor::doit($sql);
			return Model::many($query[0],new ordersData());
		}
				
		public static function getAlls(){
			$sql = "select * from ".self::$tablename;
			$query = Executor::doit($sql);
			return Model::many($query[0],new ordersData());
			
		}

		public static function getAllTuberculos(){
			$sql = "SELECT * FROM ".self::$tablename." WHERE clase='Tuberculos'";
			$query = Executor::doit($sql);
			return Model::many($query[0],new ordersData());
		}

		public static function getAllFrutas(){
			$sql = "SELECT * FROM ".self::$tablename." WHERE clase='Frutas'";
			$query = Executor::doit($sql);
			return Model::many($query[0],new ordersData());
		}

		public static function getAllVainas(){
			$sql = "SELECT * FROM ".self::$tablename." WHERE clase='Vainas'";
			$query = Executor::doit($sql);
			return Model::many($query[0],new ordersData());
		}

		public static function getAllRamas(){
			$sql = "SELECT * FROM ".self::$tablename." WHERE clase='Ramas'";
			$query = Executor::doit($sql);
			return Model::many($query[0],new ordersData());
		}

		public static function getAllRecents(){
			$sql = "SELECT * FROM ".self::$tablename." WHERE estado=1 order by id_order desc LIMIT 5";
			$query = Executor::doit($sql);
			return Model::many($query[0],new ordersData());
			
		}

	}

?>