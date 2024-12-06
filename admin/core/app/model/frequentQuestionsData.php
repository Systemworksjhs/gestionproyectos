<?php
	class frequentQuestionsData {
		public static $tablename = "frequentquestions";

		public function frequentQuestionsData(){
			$this->name = "";
		}

		public function add(){
			$fecha_Creation =date("d-m-Y h:i:s");
			$sql = "insert into ".self::$tablename." (ask, message, updateDate, status) ";
			$sql .= "value (\"$this->ask\",\"$this->message\",NOW(),\"$this->status\")";
			return Executor::doit($sql);
		}

		public function del(){
			$sql = "delete from ".self::$tablename." where id_question=$this->id_question";
			Executor::doit($sql);
		}

		// partiendo de que ya tenemos creado un objecto frequentQuestionsData previamente utilizamos el contexto
		public function update(){
			$sql = "update ".self::$tablename." set ask=\"$this->ask\",message=\"$this->message\",updateDate=NOW(),status=\"$this->status\" where id_question=$this->id_question";
			Executor::doit($sql);
		}

		public static function getById($id){
			$sql = "select * from ".self::$tablename." where id_question=$id";
			$query = Executor::doit($sql);
			return Model::one($query[0],new frequentQuestionsData());
		}

		public static function getAll(){
			$sql = "select * from ".self::$tablename;
			$query = Executor::doit($sql);
			return Model::many($query[0],new frequentQuestionsData());

		}
		
		public static function getLike($q){
			$sql = "select * from ".self::$tablename." where name like '%$q%'";
			$query = Executor::doit($sql);
			return Model::many($query[0],new frequentQuestionsData());
		}

	}

?>