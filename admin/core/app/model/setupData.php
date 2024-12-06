<?php
	class c {
		public static $tablename = "setup";

		public function setupData(){
			$this->name = "";
		}

		public function add(){
			$sql = "insert into ".self::$tablename." (title,brief,content,category_id,image,dateRegistrer,created_at) ";
			$sql .= "value (\"$this->title\",\"$this->brief\",\"$this->content\",$this->category_id,\"$this->image\",\"$this->dateRegistrer\",NOW())";
			return Executor::doit($sql);
		}

		public static function delById($id){
			$sql = "delete from ".self::$tablename." where id=$id";
			Executor::doit($sql);
		}
		public function del(){
			$sql = "delete from ".self::$tablename." where id=$this->id";
			Executor::doit($sql);
		}

	// partiendo de que ya tenemos creado un objecto setupData previamente utilizamos el contexto
		public function update(){
			$sql = "update ".self::$tablename." set title=\"$this->title\",brief=\"$this->brief\",content=\"$this->content\",image=\"$this->image\",category_id=\"$this->category_id\",status=$this->status where id=$this->id";
			Executor::doit($sql);
		}

		public static function getById($id){
			$sql = "select * from ".self::$tablename." where id=$id";
			$query = Executor::doit($sql);
			return Model::one($query[0],new setupData());
		}

		public static function getAll(){
			$sql = "select * from ".self::$tablename;
			$query = Executor::doit($sql);
			return Model::many($query[0],new setupData());

		}
		
		public static function getLike($q){
			$sql = "select * from ".self::$tablename." where name like '%$q%'";
			$query = Executor::doit($sql);
			return Model::many($query[0],new setupData());
		}

	}

?>