<?php
	class mercados_campesinosData {
		public static $tablename = "mercados_campesinos";
        public static $tablename1 = "productos_dpto_narino";
		public function mercados_campesinosData(){
			$this->name = "";
		}

		public function updateGeneral(){
			$sql = "update ".self::$tablename." set titulo=\"$this->titulo\",imagen=\"$this->image\" where id=1";
			Executor::doit($sql);
			
		}
		public function updateMercado1(){
            $sql = "UPDATE ".self::$tablename . " SET nombre='$this->nombre', precio='$this->precio', productos='$this->productos' WHERE id=1";
            Executor::doit($sql);
        }
		public function updateMercado2(){
			$sql = "UPDATE ".self::$tablename." set nombre='$this->nombre',precio='$this->precio', productos='$this->productos' where id=2";
			//echo $sql;
			Executor::doit($sql);
			
		}
		public static function getById($id){
		    
            $sql = "select * from ".self::$tablename." where id=$id";
            
            $result = Executor::doit($sql);
        
            // Verificar si la consulta se ejecut車 correctamente
            if ($result) {
                $query = $result[0];
        
                // Obtener la primera fila como un array asociativo
                $row = mysqli_fetch_assoc($query);
        
                // Liberar el resultado
                mysqli_free_result($query);
        
                return $row;
            } else {
                // Manejar el caso en el que la consulta fall車
                echo "Error en la consulta: " . mysqli_error();
                return null;
            }
		}
        
        public static function getProductById($id){
            $sql = "select * from ".self::$tablename1." where id_product=$id";
            $result = Executor::doit($sql);
        
            // Verificar si la consulta se ejecut車 correctamente
            if ($result) {
                $query = $result[0];
        
                // Obtener la primera fila como un array asociativo
                $row = mysqli_fetch_assoc($query);
        
                // Liberar el resultado
                mysqli_free_result($query);
        
                return $row;
            } else {
                // Manejar el caso en el que la consulta fall車
                echo "Error en la consulta: " . mysqli_error();
                return null;
            }
        }
        
        
        
        
        
        
    

		
	}

?>