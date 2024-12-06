<?php
	class FederationData {
		public static $tablename = "federation";

		public function FederationData(){
			$this->name = "";
		}

		public function add(){
			$fecha_Creation =date("d-m-Y h:i:s");
			$sql = "insert into ".self::$tablename." (name, legal_representative, contact_legal_representative, address, facebook_federation, twitter_federation, instagram_federation, logo, image, document, description, mision, vision, status, emailFederation, data_created ) ";
			$sql .= "value (\"$this->name\",\"$this->legal_representative\",\"$this->contact_legal_representative\",\"$this->address\",\"$this->facebook\",\"$this->twitter\",\"$this->instagram\",\"$this->logo\",\"$this->image\",\"$this->documents\",\"$this->textAsociation\",\"$this->mision\",\"$this->vision\",\"$this->municipality\",\"$this->status\",\"$this->emailFederation\",NOW())";
			return Executor::doit($sql);
		}

		public function del(){
			$sql = "delete from ".self::$tablename." where id_federation=$this->id_federation";
			Executor::doit($sql);
		}

		// partiendo de que ya tenemos creado un objecto FederationData previamente utilizamos el contexto
		public function update(){
			$sql = "update ".self::$tablename." set name=\"$this->name\",legal_representative=\"$this->legal_representative\",contact_legal_representative=\"$this->contact_legal_representative\",address=\"$this->address\",status=\"$this->status\",facebook_federation=\"$this->facebook\",twitter_federation=\"$this->twitter\",instagram_federation=\"$this->instagram\",logo=\"$this->logo\",image=\"$this->image\",document=\"$this->documents\",description=\"$this->textAsociation\",mision=\"$this->mision\",vision=\"$this->vision\",emailFederation=\"$this->emailFederation\",data_created=NOW() where id_federation=$this->id_federation";
			Executor::doit($sql);
		}

		public static function getById($id){
			$sql = "select * from ".self::$tablename." where id_federation=$id";
			$query = Executor::doit($sql);
			return Model::one($query[0],new FederationData());
		}

		public static function getAll(){
			$sql = "select * from ".self::$tablename;
			$query = Executor::doit($sql);
			return Model::many($query[0],new FederationData());

		}
		
		public static function getLike($q){
			$sql = "select * from ".self::$tablename." where name like '%$q%'";
			$query = Executor::doit($sql);
			return Model::many($query[0],new FederationData());
		}

	}

?>