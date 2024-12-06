<?php
	class MunicipalityData {
		public static $tablename = "municipality";

		public function MunicipalityData(){
			$this->created_at = "NOW()";
		}

		public function add(){
			$sql = "insert into ".self::$tablename." (title,description,namefile,created_at) ";
			$sql .= "value (\"$this->title\",\"$this->description\",\"$this->namefile\",NOW())";
			return Executor::doit($sql);
		}

		public static function delById($id){
			$sql = "delete from ".self::$tablename." where id_municipality=$id";
			Executor::doit($sql);
		}
		public function del(){
			$sql = "delete from ".self::$tablename." where id_municipality=$this->id_municipality";
			Executor::doit($sql);
		}

	// partiendo de que ya tenemos creado un objecto MunicipalityData previamente utilizamos el contexto
		public function update(){
			$sql = "update ".self::$tablename." set name_municipality=\"$this->name_municipality\",description=\"$this->description\",image=\"$this->image\",facebook=\"$this->facebook\",twiter=\"$this->twiter\",instagram=\"$this->instagram\",url_web=\"$this->url_web\",email=\"$this->email\" WHERE id_municipality=$this->id_municipality";
            Executor::doit($sql);
		}

		public static function getById($id){
			$sql = "select * from ".self::$tablename." where id_municipality=$id";
			$query = Executor::doit($sql);
			return Model::one($query[0],new MunicipalityData());
		}

		public static function getAll(){
			$sql = "select * from ".self::$tablename;
			$query = Executor::doit($sql);
			return Model::many($query[0],new MunicipalityData());

		}
		
		public static function getAllActive(){
			$sql = "select * from ".self::$tablename;
			$query = Executor::doit($sql);
			return Model::many($query[0],new MunicipalityData());

		}

		public static function getLike($q){
			$sql = "select * from ".self::$tablename." where name like '%$q%'";
			$query = Executor::doit($sql);
			return Model::many($query[0],new MunicipalityData());
		}

	}

?>