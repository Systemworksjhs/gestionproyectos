<?php
	class SliderData {
		public static $tablename = "slider";

		public function SliderData(){
			$this->created_at = "NOW()";
		}

		public function add(){
			$sql = "insert into ".self::$tablename." (title, description, url_image, text_botton, url_botton, style_botton, status, order_slider, created_at) ";
			$sql .= "value (\"$this->title\",\"$this->description\",\"$this->url_image\",\"$this->text_botton\",\"$this->url_botton\",\"$this->style_botton\",\"$this->status\",\"$this->order_slider\",NOW())";
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

	// partiendo de que ya tenemos creado un objecto SliderData previamente utilizamos el contexto
		public function update(){
			$sql = "update ".self::$tablename." set title=\"$this->title\",description=\"$this->description\",url_image=\"$this->url_image\",text_botton=\"$this->text_botton\",url_botton=\"$this->url_botton\",style_botton=\"$this->style_botton\",order_slider=\"$this->order_slider\",status=$this->status where id=$this->id";
            Executor::doit($sql);
		}

		public static function getById($id){
			$sql = "select * from ".self::$tablename." where id=$id";
			$query = Executor::doit($sql);
			return Model::one($query[0],new SliderData());
		}

		public static function getAll(){
			$sql = "select * from ".self::$tablename." order by created_at desc";
			$query = Executor::doit($sql);
			return Model::many($query[0],new SliderData());

		}
		
		public static function getAllActive(){
			$sql = "select * from ".self::$tablename." where status=1";
			$query = Executor::doit($sql);
			return Model::many($query[0],new SliderData());

		}

		public static function getAllActiveMain(){
			$sql = "select * from ".self::$tablename." where status=1 order by created_at desc LIMIT 4";
			$query = Executor::doit($sql);
			return Model::many($query[0],new SliderData());

		}

		public static function getLike($q){
			$sql = "select * from ".self::$tablename." where name like '%$q%'";
			$query = Executor::doit($sql);
			return Model::many($query[0],new SliderData());
		}

	}

?>