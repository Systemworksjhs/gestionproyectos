<?php
	class productosDptoData {
		public static $tablename = "productos_dpto_narino";

		public function productosDptoData(){
			$this->name = "";
		}

		public function add(){
			
			$sql = "insert into ".self::$tablename." (name_product, image, enabled, id_category_product, url_product, presentation, municipioId, description, view, sales, scientific_name, various) ";
			$sql .= "value (\"$this->name_product\",\"$this->image\",\"$this->enabled\",\"$this->id_category_product\",\"$this->url_product\",\"$this->presentation\",\"$this->municipioId\",\"$this->description\",\"$this->view\",\"$this->sales\",\"$this->scientific_name\",\"$this->various\")";
			return Executor::doit($sql);
		}

		public function del(){
			$sql = "delete from ".self::$tablename." where id_product=$this->id_product";
			Executor::doit($sql);
		}

		// partiendo de que ya tenemos creado un objecto productosDptoData previamente utilizamos el contexto
		public function update(){
			$sql = "update ".self::$tablename." set name_product=\"$this->name_product\",image=\"$this->image\",enabled=\"$this->enabled\",id_category_product=\"$this->id_category_product\",url_product=\"$this->url_product\",presentation=\"$this->presentation\",municipioId=\"$this->municipioId\",description=\"$this->description\",scientific_name=\"$this->scientific_name\", various=\"$this->various\",update_date=NOW() where id_product=$this->id_product";
			Executor::doit($sql);
			
		}

		// Actualizacion productos presentation
		public function updatePresentations(){
			$sql = "update ".self::$tablename." set presentation=\"$this->presentation\",enabled=\"$this->enabled\",update_date=NOW() where id_product=$this->id_product";
			Executor::doit($sql);
		}
		
		public static function getById($id){
			$sql = "select * from ".self::$tablename." where id_product=$id";
			$query = Executor::doit($sql);
			return Model::one($query[0],new productosDptoData());
		}

		public static function getAll(){
			$sql = "select * from ".self::$tablename;
			$query = Executor::doit($sql);
			return Model::many($query[0],new productosDptoData());
		}
		
		public static function getLike($q){
			$sql = "select * from ".self::$tablename." where nombre_Producto like '%$q%'";
			$query = Executor::doit($sql);
			return Model::many($query[0],new productosDptoData());
		}

				
		public static function getAlls(){
			$sql = "select * from ".self::$tablename;
			$query = Executor::doit($sql);
			return Model::many($query[0],new productosDptoData());
			
		}

		public static function getAllTuberculos(){
			$sql = "SELECT * FROM ".self::$tablename." WHERE clase='Tuberculos'";
			$query = Executor::doit($sql);
			return Model::many($query[0],new productosDptoData());
		}

		public static function getAllFrutas(){
			$sql = "SELECT * FROM ".self::$tablename." WHERE clase='Frutas'";
			$query = Executor::doit($sql);
			return Model::many($query[0],new productosDptoData());
		}

		public static function getAllVainas(){
			$sql = "SELECT * FROM ".self::$tablename." WHERE clase='Vainas'";
			$query = Executor::doit($sql);
			return Model::many($query[0],new productosDptoData());
		}

		public static function getAllRamas(){
			$sql = "SELECT * FROM ".self::$tablename." WHERE clase='Ramas'";
			$query = Executor::doit($sql);
			return Model::many($query[0],new productosDptoData());
		}

		public static function getAllRecents(){
			$sql = "SELECT * FROM ".self::$tablename." WHERE enabled=1 order by id_product desc LIMIT 5";
			$query = Executor::doit($sql);
			return Model::many($query[0],new productosDptoData());
			
		}

	}

?>