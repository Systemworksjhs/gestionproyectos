<?php
	class testimonialsData {
		public static $tablename = "testimonials";

		public function testimonialsData(){
			$this->name = "";
		}

		public function add(){
			$fecha_Creation =date("d-m-Y h:i:s");
			$sql = "insert into ".self::$tablename." (names,image,message,occupation,status,createdDate) ";
			$sql .= "value (\"$this->names\",\"$this->image\",\"$this->message\",\"$this->occupation\",\"$this->status\",NOW())";
			return Executor::doit($sql);
		}

		public function del(){
			$sql = "delete from ".self::$tablename." where id_testimonials=$this->id_testimonials";
			Executor::doit($sql);
		}

		// partiendo de que ya tenemos creado un objecto testimonialsData previamente utilizamos el contexto
		public function update(){
			$sql = "update ".self::$tablename." set names=\"$this->names\",image=\"$this->image\",message=\"$this->message\",occupation=\"$this->occupation\",status=\"$this->status\",createdDate=NOW() where id_testimonials=$this->id_testimonials";
			Executor::doit($sql);
		}

		public static function getById($id){
			$sql = "select * from ".self::$tablename." where id_testimonials=$id";
			$query = Executor::doit($sql);
			return Model::one($query[0],new testimonialsData());
		}

		public static function getAll(){
			$sql = "select * from ".self::$tablename;
			$query = Executor::doit($sql);
			return Model::many($query[0],new testimonialsData());

		}
		
		public static function getLike($q){
			$sql = "select * from ".self::$tablename." where name like '%$q%'";
			$query = Executor::doit($sql);
			return Model::many($query[0],new testimonialsData());
		}

	}

?>