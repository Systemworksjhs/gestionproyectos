<?php
	
	session_start();
	if(!isset($_SESSION['user_id'])){
		header("Location: ./");
	}
    header("Content-Type: application/vnd.ms-excel; charset=iso-8859-1");
    require "../configuration/conectionpdo.php";
    require "../configuration/conection.php";
    require "../configuration/funcscopy.php";
    //$u = UserData::getById($_SESSION["user_id"]);
    
    class ConsultaP{
        
        public function __construct(){
            $this->_db = new Connection();
        }
        
        public function buscarP(){
            
            $this->_db->open();
            $tipo_usuario = $_SESSION['kind'];
            $id_userMunicipality =$_GET["idmu"];
            	
            $consulta = $this->_db->conn->prepare("SELECT * FROM `productos_dpto_narino` WHERE municipioId =".$id_userMunicipality);
            $consulta->execute();
            while($row = $consulta->fetch(PDO::FETCH_OBJ)){
                $this->list_orders[] =$row;
            }
            $this->_db->close();
            return $this->list_orders;
        }
    }
    
    //Plantilla para logistico de un solo municipio...
    if($_SESSION['kind'] == 5 or $_SESSION['kind'] == 6){
        //echo "tipo: ".$_SESSION['kind'];
        $usuario = new ConsultaP();
        $salida ="";
        $salida .= "<table border='1' align=center cellPadding=1 cellSpacing=0 borderColor=#a1aeb2>";
        $salida .= "<thead>
                        <th>Item</th>
                        <th>Cod.</th>
                        <th>Producto</th>
                        <th>".utf8_decode('Presentación y precio')."</th> 
                        
                        
                    </thead>";
                    $item=1;
                    $totalOrders=0;
                    foreach($usuario->buscarP() as $r){
                        $Presentaciones = json_decode($r->presentation);
                        $contenido="";
                            
                        foreach($Presentaciones as $fila) {
                            $contenido .= $fila->name." = ".$fila->incrementPrice*$fila->grams." / ";
                    
                        }
                        
                        $salida .= 
                        "<tr style='BACKGROUND-COLOR: #F2F2F2'> 
                            
                            <td>".$item."</td>
                            <td>".$r->id_product."</td>
                            <td>".utf8_decode($r->name_product)."</td>
                            <td>".$contenido."</td>
                            
                        </tr>";
                        
                        
                        $item ++;
                    }
                    
                    $salida .= "</table>";
    }
    
    

    header("Content-type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename=Productos_".time().".xls");
    header("Pragma: no-cache");
    header("Expires: 0");
    echo $salida;
    