<?php
	class receptionRawMaterialsData {
		public static $tablename = "reception_rawmaterials";

		public function receptionRawMaterialsData(){
			$this->name = "";
		}

		public function add(){
			$sql = "insert into ".self::$tablename." (Date_Registration,Batch,Supplier,Product_Tubers,Quantity_Tubers,Product_Fruits,Quantity_Fruits,Product_Pods,Quantity_Pods,Product_Branches,Quantity_Branches) ";
			$sql .= "value (\"$this->Date_Registration\",\"$this->Batch\",\"$this->Supplier\",\"$this->Product_Tubers\",\"$this->Quantity_Tubers\",\"$this->Product_Fruits\",\"$this->Quantity_Fruits\",\"$this->Product_Pods\",\"$this->Quantity_Pods\",\"$this->Product_Branches\",\"$this->Quantity_Branches\")";
			return Executor::doit($sql);
		}

		public function del(){
			$sql = "delete from ".self::$tablename." where id_product_return=$this->id_product_return";
			Executor::doit($sql);
		}

		// partiendo de que ya tenemos creado un objecto receptionRawMaterialsData previamente utilizamos el contexto
		public function update(){
			$sql = "update ".self::$tablename." set Date_Registration=\"$this->Date_Registration\",Batch=\"$this->Batch\",Supplier=\"$this->Supplier\",Product_Tubers=\"$this->Product_Tubers\",Quantity_Tubers=\"$this->Quantity_Tubers\",Product_Fruits=\"$this->Product_Fruits\",Quantity_Fruits=\"$this->Quantity_Fruits\",Product_Pods=\"$this->Product_Pods\",Quantity_Pods=\"$this->Quantity_Pods\",Product_Branches=\"$this->Product_Branches\",Quantity_Branches=\"$this->Quantity_Branches\" where id_product_return=$this->id_product_return";
			Executor::doit($sql);
		}

		public static function getById($id){
			$sql = "select * from ".self::$tablename." where id_product_return=$id";
			$query = Executor::doit($sql);
			return Model::one($query[0],new receptionRawMaterialsData());
		}

		public static function getAll(){
			$sql = "select * from ".self::$tablename;
			$query = Executor::doit($sql);
			return Model::many($query[0],new receptionRawMaterialsData());

		}
		
		public static function getLike($q){
			$sql = "select * from ".self::$tablename." where name like '%$q%'";
			$query = Executor::doit($sql);
			return Model::many($query[0],new receptionRawMaterialsData());
		}

	}

?>