<?php
	class CustomersData {
		public static $tablename = "customers";

		public function CustomersData(){
			$this->name = "";
		}

		public function add(){
			$sql = "insert into ".self::$tablename." (position, names, phone, establishment, address, department, municipality, location_area, geographic_location, status, date_creation) ";
			$sql .= "value (\"$this->position\",\"$this->names\",\"$this->phone\",\"$this->establishment\",\"$this->address\",\"$this->department\",\"$this->municipality\",\"$this->location_area\",\"$this->geographic_location\",\"$this->status\",NOW())";
			return Executor::doit($sql);
		}

		public function del(){
			$sql = "delete from ".self::$tablename." where id_customers=$this->id_customers";
			Executor::doit($sql);
		}

		// partiendo de que ya tenemos creado un objecto CustomersData previamente utilizamos el contexto
		public function update(){
			$sql = "update ".self::$tablename." set position=\"$this->position\",names=\"$this->names\",phone=\"$this->phone\",establishment=\"$this->establishment\",address=\"$this->address\",department=\"$this->department\",municipality=\"$this->municipality\",location_area=\"$this->location_area\",geographic_location=\"$this->geographic_location\",status=\"$this->status\",date_creation=NOW() where id_customers=$this->id_customers";
			Executor::doit($sql);
		}

		public static function getById($id){
			$sql = "select * from ".self::$tablename." where id_customers=$id";
			$query = Executor::doit($sql);
			return Model::one($query[0],new CustomersData());
		}

		public static function getAll(){
			$sql = "select * from ".self::$tablename;
			$query = Executor::doit($sql);
			return Model::many($query[0],new CustomersData());

		}
		
		public static function getLike($q){
			$sql = "select * from ".self::$tablename." where name like '%$q%'";
			$query = Executor::doit($sql);
			return Model::many($query[0],new CustomersData());
		}

	}

?>