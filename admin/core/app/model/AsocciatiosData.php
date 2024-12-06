<?php
	class AsocciatiosData {
		public static $tablename = "associations";

		public function AsocciatiosData(){
			$this->name = "";
		}

		public function add(){
			$fecha_Creation =date("d-m-Y h:i:s");
			$sql = "insert into ".self::$tablename." (name, legal_representative, phone, slug, facebook, twitter, instagram, logo, documents, textAsociation, mision, vision, municipality, status, date_creation,item_1,text_item_1,img_item_1,item_2,text_item_2,img_item_2,item_3,text_item_3,img_item_3) ";
			$sql .= "value (\"$this->name\",\"$this->legal_representative\",\"$this->phone\",\"$this->slug\",\"$this->facebook\",\"$this->twitter\",\"$this->instagram\",\"$this->logo\",\"$this->textAsociation\",\"$this->textAsociation\",\"$this->mision\",\"$this->vision\",\"$this->municipality\",\"$this->status\",NOW(),\"$this->item_1\",\"$this->text_item_1\",\"$this->img_item_1\",\"$this->item_2\",\"$this->text_item_2\",\"$this->img_item_2\",\"$this->item_3\",\"$this->text_item_3\",\"$this->img_item_3\")";
			return Executor::doit($sql);
		}

		public function del(){
			$sql = "delete from ".self::$tablename." where id_asocciatios=$this->id_asocciatios";
			Executor::doit($sql);
		}

		// partiendo de que ya tenemos creado un objecto AsocciatiosData previamente utilizamos el contexto
		public function update(){
			$sql = "update ".self::$tablename." set name=\"$this->name\",legal_representative=\"$this->legal_representative\",phone=\"$this->phone\",slug=\"$this->slug\",status=\"$this->status\",facebook=\"$this->facebook\",twitter=\"$this->twitter\",instagram=\"$this->instagram\",logo=\"$this->logo\",documents=\"$this->documents\",textAsociation=\"$this->textAsociation\",mision=\"$this->mision\",vision=\"$this->vision\",municipality=\"$this->municipality\",date_update=NOW(),item_1=\"$this->item_1\",text_item_1=\"$this->text_item_1\",img_item_1=\"$this->img_item_1\",item_2=\"$this->item_2\",text_item_2=\"$this->text_item_2\",img_item_2=\"$this->img_item_2\",item_3=\"$this->item_3\",text_item_3=\"$this->text_item_3\",img_item_3=\"$this->img_item_3\" where id_asocciatios=$this->id_asocciatios";
			Executor::doit($sql);
		}

		public static function getById($id){
			$sql = "select * from ".self::$tablename." where id_asocciatios=$id";
			$query = Executor::doit($sql);
			return Model::one($query[0],new AsocciatiosData());
		}

		public static function getAll(){
			$sql = "select * from ".self::$tablename;
			$query = Executor::doit($sql);
			return Model::many($query[0],new AsocciatiosData());

		}
		
		public static function getLike($q){
			$sql = "select * from ".self::$tablename." where name like '%$q%'";
			$query = Executor::doit($sql);
			return Model::many($query[0],new AsocciatiosData());
		}

	}

?>