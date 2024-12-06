<?php
	class presentationsData {
		public static $tablename = "presentations";

		public function presentationsData(){
			$this->name = "";
		
		}

		public function add(){
			
			$sql = "insert into ".self::$tablename." (name, grams) ";
			
			$sql .= "value (\"$this->name\",\"$this->grams\")";
			//echo $sql;return;
			return Executor::doit($sql);
		}
		
		public static function getById($id){
			$sql = "select * from ".self::$tablename." where id=$id";
			
			$query = Executor::doit($sql);
			return Model::one($query[0],new presentationsData());
		}

		public function del(){
			$sql = "delete from ".self::$tablename." where id=$this->id";
			
			Executor::doit($sql);
		}

		// partiendo de que ya tenemos creado un objecto productosDptoData previamente utilizamos el contexto
		public function update(){
			$sql = "update ".self::$tablename." set name_product=\"$this->name_product\",image=\"$this->image\",price=\"$this->price\",weight_unit=\"$this->weight_unit\",enabled=\"$this->enabled\",id_category_product=\"$this->id_category_product\",url_product=\"$this->url_product\",presentation=\"$this->presentation\",municipioId=\"$this->municipioId\",description=\"$this->description\",update_date=NOW() where id_product=$this->id_product";
			Executor::doit($sql);
		}
		
		public function updatepres(){
			$sql = "update ".self::$tablename." set name=\"$this->name\", grams=$this->grams where id=$this->id";
			
			Executor::doit($sql);
		}

		// Actualizacion productos presentation
		public function updatePresentations(){
			$sql = "update ".self::$tablename." set presentation=\"$this->presentation\",enabled=\"$this->enabled\",update_date=NOW() where id_product=$this->id_product";
			Executor::doit($sql);
		}
		
		

		public static function getAll(){
			$sql = "select * from ".self::$tablename." ORDER BY name DESC";
			$query = Executor::doit($sql);
			return Model::many($query[0],new presentationsData());
		}
		
		


	}

?>