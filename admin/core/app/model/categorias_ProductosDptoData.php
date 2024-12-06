<?php
	class categorias_ProductosDptoData {
		public static $tablename = "categories";

		public function categorias_Productos(){
			$this->name = "";
		}

		public function add(){
			$sql = "insert into ".self::$tablename." (nombre_Categoria) ";
			$sql .= "value (\"$this->nombre_Categoria\")";
			return Executor::doit($sql);
		}

		public function del(){
			$sql = "delete from ".self::$tablename." where id_category=$this->id_category";
			Executor::doit($sql);
		}

		// partiendo de que ya tenemos creado un objecto categorias_Productos previamente utilizamos el contexto
		public function update(){
			$sql = "update ".self::$tablename." set nombre_Categoria=\"$this->nombre_Categoria\" where id_category=$this->id_category";
			Executor::doit($sql);
		}

		public static function getById($id){
			$sql = "select * from ".self::$tablename." where id_category=$id";
			$query = Executor::doit($sql);
			return Model::one($query[0],new categorias_ProductosDptoData());
		}

		public static function getAll(){
			$sql = "select * from ".self::$tablename." ORDER BY id_municipality_category DESC";
			$query = Executor::doit($sql);
			return Model::many($query[0],new categorias_ProductosDptoData());

		}
		
		public static function getLike($q){
			$sql = "select * from ".self::$tablename." where nombre_Categoria like '%$q%'";
			$query = Executor::doit($sql);
			return Model::many($query[0],new categorias_ProductosDptoData());
		}

	}

?>