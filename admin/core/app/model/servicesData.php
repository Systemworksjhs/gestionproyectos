<?php
	class servicesData {
		public static $tablename = "services";

		public function servicesData(){
			$this->name = "";
		}

		public function add(){
			$fecha_Creation =date("d-m-Y h:i:s");
			$sql = "insert into ".self::$tablename." (title,image,text,status,createdDate) ";
			$sql .= "value (\"$this->title\",\"$this->image\",\"$this->text\",\"$this->status\",NOW())";
			return Executor::doit($sql);
		}

		public function del(){
			$sql = "delete from ".self::$tablename." where id_service=$this->id_service";
			Executor::doit($sql);
		}

		// partiendo de que ya tenemos creado un objecto servicesData previamente utilizamos el contexto
		public function update(){
			$sql = "update ".self::$tablename." set title=\"$this->title\",image=\"$this->image\",text=\"$this->text\",status=\"$this->status\",createdDate=NOW() where id_service=$this->id_service";
			Executor::doit($sql);
		}

		public static function getById($id){
			$sql = "select * from ".self::$tablename." where id_service=$id";
			$query = Executor::doit($sql);
			return Model::one($query[0],new servicesData());
		}

		public static function getAll(){
			$sql = "select * from ".self::$tablename;
			$query = Executor::doit($sql);
			return Model::many($query[0],new servicesData());

		}
		
		public static function getLike($q){
			$sql = "select * from ".self::$tablename." where name like '%$q%'";
			$query = Executor::doit($sql);
			return Model::many($query[0],new servicesData());
		}

	}

?>