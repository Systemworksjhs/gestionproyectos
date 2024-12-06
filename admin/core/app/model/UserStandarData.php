<?php
	class UserStandarData {
		public static $tablename = "usuarios";

		public function UserStandarData(){
			$this->is_active = "0";
			$this->created_at = "NOW()";
		}

		public function add(){
			$sql = "insert into ".self::$tablename." (usuario,names,lastnames,email,activacion,id_tipo,identificacion,phone,rol,id_municipality_user,address,imagen,password,token,at_created) ";
			$sql .= "value (\"$this->usuario\",\"$this->names\",\"$this->lastnames\",\"$this->email\",\"$this->activacion\",2,\"$this->identificacion\",\"$this->phone\",\"$this->rol\",\"$this->id_municipality_user\",\"$this->address\",\"$this->imagen\",\"$this->password\",\"$this->token\",NOW())";
			Executor::doit($sql);
		}

		public static function delById($id){
			$sql = "delete from ".self::$tablename." where id_user=$id";
			Executor::doit($sql);
		}
		public function del(){
			$sql = "delete from ".self::$tablename." where id_user=$this->id_user";
			Executor::doit($sql);
		}

		// partiendo de que ya tenemos creado un objecto UserStandarData previamente utilizamos el contexto
		public function update(){
			$sql = "update ".self::$tablename." set usuario=\"$this->usuario\",names=\"$this->names\",lastnames=\"$this->lastnames\",email=\"$this->email\",activacion=\"$this->activacion\",identificacion=\"$this->identificacion\",phone=\"$this->phone\",rol=\"$this->rol\",id_municipality_user=\"$this->id_municipality_user\",address=\"$this->address\",imagen=\"$this->imagen\" where id_user=$this->id_user";
			Executor::doit($sql);
		}

		public function update_passwd(){
			$sql = "update ".self::$tablename." set password=\"$this->password\" where id_user=$this->id_user";
			Executor::doit($sql);
		}

		public static function getById($id){
			$sql = "select * from ".self::$tablename." where id_user=$id";
			$query = Executor::doit($sql);
			return Model::one($query[0],new UserStandarData());
		}

		public static function getAll(){
			$sql = "select * from ".self::$tablename." order by at_created desc";
			$query = Executor::doit($sql);
			return Model::many($query[0],new UserStandarData());
		}

		public static function getLike($q){
			$sql = "select * from ".self::$tablename." where title like '%$q%' or content like '%$q%'";
			$query = Executor::doit($sql);
			return Model::many($query[0],new UserStandarData());
		}

	}

?>