<?php
	class ProductosData {
		public static $tablename = "productos_dpto_narino";

		public function ProductosData(){
			$this->name = "";
		}

		public function add(){
			$fecha_Creacion =date("d-m-Y h:i:s");
			$sql = "insert into productos_plazas (nombre_Producto, imagen, price , unit_of_measurement, estado, clase, date_Creation) ";
			$sql .= "value (\"$this->nombre_Producto\",\"$this->imagen\",\"$this->price\",\"$this->unit_of_measurement\",\"$this->estado\",\"$this->clase\",NOW())";
			return Executor::doit($sql);
		}

		public function del(){
			$sql = "delete from ".self::$tablename." where id_Producto=$this->id_Producto";
			Executor::doit($sql);
		}

		// partiendo de que ya tenemos creado un objecto ProductosData previamente utilizamos el contexto
		public function update(){
			$sql = "update ".self::$tablename." set nombre_Producto=\"$this->nombre_Producto\",estado=\"$this->estado\",imagen=\"$this->imagen\",price=\"$this->price\",unit_of_measurement=\"$this->unit_of_measurement\",clase=\"$this->clase\",date_update=NOW() where id_Producto=$this->id_Producto";
			Executor::doit($sql);
		}

		public static function getById($id){
			$sql = "select * from ".self::$tablename." where id_Producto=$id";
			$query = Executor::doit($sql);
			return Model::one($query[0],new ProductosData());
		}

		public static function getAll(){
			$sql = "select * from ".self::$tablename;
			$query = Executor::doit($sql);
			return Model::many($query[0],new ProductosData());
		}
		
		public static function getLike($q){
			$sql = "select * from ".self::$tablename." where nombre_Producto like '%$q%'";
			$query = Executor::doit($sql);
			return Model::many($query[0],new ProductosData());
		}

				
		public static function getAlls(){
			$sql = "select * from ".self::$tablename;
			$query = Executor::doit($sql);
			return Model::many($query[0],new ProductosData());
			
		}

		public static function getAllTuberculos(){
			$sql = "SELECT * FROM ".self::$tablename." WHERE clase='Tuberculos'";
			$query = Executor::doit($sql);
			return Model::many($query[0],new ProductosData());
		}

		public static function getAllFrutas(){
			$sql = "SELECT * FROM ".self::$tablename." WHERE clase='Frutas'";
			$query = Executor::doit($sql);
			return Model::many($query[0],new ProductosData());
		}

		public static function getAllVainas(){
			$sql = "SELECT * FROM ".self::$tablename." WHERE clase='Vainas'";
			$query = Executor::doit($sql);
			return Model::many($query[0],new ProductosData());
		}

		public static function getAllRamas(){
			$sql = "SELECT * FROM ".self::$tablename." WHERE clase='Ramas'";
			$query = Executor::doit($sql);
			return Model::many($query[0],new ProductosData());
		}

		public static function getAllRecents(){
			$sql = "SELECT * FROM ".self::$tablename." WHERE estado=1 order by id_Producto desc LIMIT 5";
			$query = Executor::doit($sql);
			return Model::many($query[0],new ProductosData());
			
		}

	}

?>