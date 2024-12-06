<?php
	class pqrsfdData {
		public static $tablename = "pqrsfd";

		public function pqrsfdData(){
			$this->name = "";
		}

		public function add(){
			$sql = "insert into ".self::$tablename." (dateReception,affair,message,sender,phone,email,type,responsible,status,status_send,response,response_date) ";
			$sql .= "value (\"$this->dateReception\",\"$this->affair\",\"$this->message\",\"$this->sender\",\"$this->phone\",\"$this->email\",\"$this->type\",\"$this->responsible\",\"$this->status\",\"$this->status_send\",\"$this->response\",\"$this->response_date\")";
			return Executor::doit($sql);
		}

		public function del(){
			$sql = "delete from ".self::$tablename." where id_pqrsfd=$this->id_pqrsfd";
			Executor::doit($sql);
		}

		// partiendo de que ya tenemos creado un objecto pqrsfdData previamente utilizamos el contexto
		public function update(){
		    //$sql = "update ".self::$tablename." set dateReception=\"$this->dateReception\",affair=\"$this->affair\",message=\"$this->message\",sender=\"$this->sender\",phone=\"$this->phone\",email=\"$this->email\",type=\"$this->type\",responsible=\"$this->responsible\",status=\"$this->status\",response=\"$this->response\",response_date=\"$this->response_date\" where id_pqrsfd=$this->id_pqrsfd";
			$sql = "update ".self::$tablename." set responsible=\"$this->responsible\",status=\"$this->status\",status_send=\"$this->status_send\",response=\"$this->response\",response_date=\"$this->response_date\" where id_pqrsfd=$this->id_pqrsfd";
			Executor::doit($sql);
		}

		public static function getById($id){
			$sql = "select * from ".self::$tablename." where id_pqrsfd=$id";
			$query = Executor::doit($sql);
			return Model::one($query[0],new pqrsfdData());
		}

		public static function getAll(){
			$sql = "select * from ".self::$tablename;
			$query = Executor::doit($sql);
			return Model::many($query[0],new pqrsfdData());

		}
		
		public static function getLike($q){
			$sql = "select * from ".self::$tablename." where name like '%$q%'";
			$query = Executor::doit($sql);
			return Model::many($query[0],new pqrsfdData());
		}

	}

?>