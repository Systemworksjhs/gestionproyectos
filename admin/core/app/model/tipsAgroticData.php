<?php
	class tipsAgroticData {
		public static $tablename = "tipsAgrotic";

		public function tipsAgroticData(){
			$this->name = "";
		}

		public function add(){
			$sql = "insert into ".self::$tablename." (title, description, image, status, date_created, instagram, facebook, youtube, tipsPdf) ";
			$sql .= "value (\"$this->title\",\"$this->description\",\"$this->image\",\"$this->status\",NOW(),\"$this->instagram\",\"$this->facebook\",\"$this->youtube\",\"$this->tipsPdf\")";
			return Executor::doit($sql);
		}

		public function del(){
			$sql = "delete from ".self::$tablename." where id_tipsAgrotic=$this->id_tipsAgrotic";
			Executor::doit($sql);
		}

		// partiendo de que ya tenemos creado un objecto tipsAgroticData previamente utilizamos el contexto
		public function update(){
			$sql = "update ".self::$tablename." set title=\"$this->title\",description=\"$this->description\",image=\"$this->image\",status=\"$this->status\",date_created=NOW(),instagram=\"$this->instagram\", facebook=\"$this->facebook\", youtube=\"$this->youtube\", tipsPdf=\"$this->tipsPdf\" where id_tipsAgrotic=$this->id_tipsAgrotic";
			Executor::doit($sql);
		}

		public static function getById($id){
			$sql = "select * from ".self::$tablename." where id_tipsAgrotic=$id";
			$query = Executor::doit($sql);
			return Model::one($query[0],new tipsAgroticData());
		}

		public static function getAll(){
			$sql = "select * from ".self::$tablename;
			$query = Executor::doit($sql);
			return Model::many($query[0],new tipsAgroticData());

		}
		
		public static function getLike($q){
			$sql = "select * from ".self::$tablename." where name like '%$q%'";
			$query = Executor::doit($sql);
			return Model::many($query[0],new tipsAgroticData());
		}

	}

?>