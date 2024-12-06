<?php
	class UserData {
		public static $tablename = "users";

		public function UserData(){
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
			$sql = "delete from ".self::$tablename." where id=$this->id";
			Executor::doit($sql);
		}

		// partiendo de que ya tenemos creado un objecto UserData previamente utilizamos el contexto
		public function update(){
			$sql = "update ".self::$tablename." set name=\"$this->name\",lastname=\"$this->lastname\",email=\"$this->email\",username=\"$this->username\",password=\"$this->password\",status=\"$this->status\",kind=\"$this->kind\",image=\"$this->image\",identification=\"$this->identification\",phone=\"$this->phone\" where id=$this->id";
			Executor::doit($sql);
		}

		public function update_passwd(){
			$sql = "update ".self::$tablename." set password=\"$this->password\" where id=$this->id";
			Executor::doit($sql);
		}

		public static function getById($id){
			$sql = "select * from ".self::$tablename." where id=$id";
			$query = Executor::doit($sql);
			return Model::one($query[0],new UserData());
		}

		public static function getAll(){
			$sql = "select * from ".self::$tablename." order by created_at desc";
			$query = Executor::doit($sql);
			return Model::many($query[0],new UserData());
		}

		public static function getLike($q){
			$sql = "select * from ".self::$tablename." where title like '%$q%' or content like '%$q%'";
			$query = Executor::doit($sql);
			return Model::many($query[0],new UserData());
		}

	}

?>