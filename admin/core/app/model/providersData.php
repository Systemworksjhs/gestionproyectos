<?php
	class providersData {
		public static $tablename = "providers";

		public function providersData(){
			$this->name = "";
		}

		public function add(){
			$sql = "insert into ".self::$tablename." (name,nit,phone,address,municipality,products,image,certification,status,date_created) ";
			$sql .= "value (\"$this->name\",\"$this->nit\",\"$this->phone\",\"$this->address\",\"$this->municipality\",\"$this->products\",\"$this->image\",\"$this->certification\",\"$this->status\",NOW())";
			return Executor::doit($sql);
		}

		public function del(){
			$sql = "delete from ".self::$tablename." where id_provider=$this->id_provider";
			Executor::doit($sql);
		}

		// partiendo de que ya tenemos creado un objecto providersData previamente utilizamos el contexto
		public function update(){
			$sql = "update ".self::$tablename." set name=\"$this->name\",image=\"$this->image\",nit=\"$this->nit\",municipality=\"$this->municipality\",products=\"$this->products\",phone=\"$this->phone\",address=\"$this->address\",status=\"$this->status\",date_created=NOW()  where id_provider=$this->id_provider";
			Executor::doit($sql);
		}

		public static function getById($id){
			$sql = "select * from ".self::$tablename." where id_provider=$id";
			$query = Executor::doit($sql);
			return Model::one($query[0],new providersData());
		}

		public static function getAll(){
			$sql = "select * from ".self::$tablename;
			$query = Executor::doit($sql);
			return Model::many($query[0],new providersData());

		}
		
		public static function getLike($q){
			$sql = "select * from ".self::$tablename." where name like '%$q%'";
			$query = Executor::doit($sql);
			return Model::many($query[0],new providersData());
		}

		public static function getAllRecents(){
			$sql = "SELECT * FROM ".self::$tablename." WHERE status=1 order by id_provider desc LIMIT 5";
			$query = Executor::doit($sql);
			return Model::many($query[0],new providersData());
			
		}

	}

?>