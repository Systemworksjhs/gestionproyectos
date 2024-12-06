<?php
	class ProductoresData {
		public static $tablename = "initiatives_municipalities";

		public function ProductoresData(){
			$this->name = "";
		}

		public function add(){
			$sql = "insert into ".self::$tablename." (title,brief,content,category_id,image,urlpost,registrationForm,dateRegistrer,created_at) ";
			$sql .= "value (\"$this->title\",\"$this->brief\",\"$this->content\",$this->category_id,\"$this->image\",\"$this->urlpost\",\"$this->registrationForm\",\"$this->dateRegistrer\",NOW())";
			return Executor::doit($sql);
		}

		public static function delById($id){
			$sql = "delete from ".self::$tablename." where id_initiative=$id";
			Executor::doit($sql);
		}
		
		public function del(){
			$sql = "delete from ".self::$tablename." where id_initiative=$this->id_initiative";
			Executor::doit($sql);
		}

	// partiendo de que ya tenemos creado un objecto ProductoresData previamente utilizamos el contexto
		public function update(){
			$sql = "update ".self::$tablename." set estado=$this->estado where id_initiative=$this->id_initiative";
			Executor::doit($sql);
		}

		public static function getById($id){
			$sql = "select * from ".self::$tablename." where id_initiative=$id";
			$query = Executor::doit($sql);
			return Model::one($query[0],new ProductoresData());
		}

		public static function getAll(){
			$sql = "select * from ".self::$tablename." where estado=0";
			$query = Executor::doit($sql);
			return Model::many($query[0],new ProductoresData());

		}
		
		public static function getAllActive(){
			$sql = "select * from ".self::$tablename." where estado=1";
			$query = Executor::doit($sql);
			return Model::many($query[0],new ProductoresData());

		}

		public static function getAllActiveMain(){
			$sql = "select * from ".self::$tablename." where estado=1 order by id desc LIMIT 3";
			$query = Executor::doit($sql);
			return Model::many($query[0],new ProductoresData());

		}

		public static function getLike($q){
			$sql = "select * from ".self::$tablename." where name_initiative like '%$q%'";
			$query = Executor::doit($sql);
			return Model::many($query[0],new ProductoresData());
		}

	}

?>