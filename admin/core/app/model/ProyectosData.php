<?php
	class ProyectosData {
		public static $tablename = "proyectos";

		public function ProyectosData(){
			$this->name = "";
		}

		public function add(){
			$fecha_Creacion =date("d-m-Y h:i:s");
			$sql = "insert into ".self::$tablename." (title, imagen, description , status, category, url, documents, date_Creation) ";
			$sql .= "value (\"$this->title\",\"$this->imagen\",\"$this->description\",\"$this->status\",\"$this->category\",\"$this->url\",\"$this->documents\",NOW())";
			return Executor::doit($sql);
		}

		public function del(){
			$sql = "delete from ".self::$tablename." where id_proyecto=$this->id_proyecto";
			Executor::doit($sql);
		}

		// partiendo de que ya tenemos creado un objecto ProyectosData previamente utilizamos el contexto
		public function update(){
			$sql = "update ".self::$tablename." set title=\"$this->title\",imagen=\"$this->imagen\",description=\"$this->description\",category=\"$this->category\",status=\"$this->status\",url=\"$this->url\",documents=\"$this->documents\",date_Creation=NOW() where id_proyecto=$this->id_proyecto";
			Executor::doit($sql);
		}

		public static function getById($id){
			$sql = "select * from ".self::$tablename." where id_proyecto=$id";
			$query = Executor::doit($sql);
			return Model::one($query[0],new ProyectosData());
		}

		public static function getAll(){
			$sql = "select * from ".self::$tablename;
			$query = Executor::doit($sql);
			return Model::many($query[0],new ProyectosData());
		}
		
		public static function getLike($q){
			$sql = "select * from ".self::$tablename." where nombre_Producto like '%$q%'";
			$query = Executor::doit($sql);
			return Model::many($query[0],new ProyectosData());
		}

				
		public static function getAlls(){
			$sql = "select * from ".self::$tablename;
			$query = Executor::doit($sql);
			return Model::many($query[0],new ProyectosData());
			
		}

		public static function getAllRecents(){
			$sql = "SELECT * FROM ".self::$tablename." WHERE status=1 order by id_proyecto desc LIMIT 5";
			$query = Executor::doit($sql);
			return Model::many($query[0],new ProyectosData());
			
		}

	}

?>