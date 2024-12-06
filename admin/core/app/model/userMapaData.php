
<?php
	class userMapaData {
		public static $tablename = "initiatives_municipalities";

		public function userMapaData(){
			$this->is_active = "0";
			$this->created_at = "NOW()";
		}

		public function add(){
			$sql = "insert into ".self::$tablename." (name,lastname,image,email,username,password,status,kind,identification,phone,created_at) ";
			$sql .= "value (\"$this->name\",\"$this->lastname\",\"$this->image\",\"$this->email\",\"$this->username\",\"$this->password\",0,\"$this->kind\",\"$this->identification\",\"$this->phone\",NOW())";
			Executor::doit($sql);
		}

		public static function delById($id){
			$sql = "delete from ".self::$tablename." where id=$id";
			Executor::doit($sql);
		}
		public function del(){
			$sql = "delete from ".self::$tablename." where id_initiative=$this->id";
			Executor::doit($sql);
		}

		// partiendo de que ya tenemos creado un objecto userMapaData previamente utilizamos el contexto
		public function update(){
			$sql = "update ".self::$tablename." set 	insignia_bmp=\"$this->insignia_bmp\",insignia_bpa=\"$this->insignia_bpa\" where id_initiative=$this->id_user";
			Executor::doit($sql);
		}

		public static function getById($id){
			$sql = "select * from ".self::$tablename." where id_initiative=$id";
			$query = Executor::doit($sql);
			return Model::one($query[0],new userMapaData());
		}

		public static function getAll(){
			$sql = "select * from ".self::$tablename." order by fechacreacion desc";
			$query = Executor::doit($sql);
			return Model::many($query[0],new userMapaData());
		}

		public static function getLike($q){
			$sql = "select * from ".self::$tablename." where title like '%$q%' or content like '%$q%'";
			$query = Executor::doit($sql);
			return Model::many($query[0],new userMapaData());
		}

	}

?>