<?php
	session_start();
	if(!isset($_SESSION['user_id'])){
		header("Location: ./");
	}
    header("Content-Type: application/vnd.ms-excel; charset=iso-8859-1");
    require "../configuration/conectionpdo.php";
    require "../configuration/conection.php";
    require "../configuration/funcscopy.php";
    class ConsultaP{
        public function __construct(){
            $this->_db = new Connection();
        }
        public function buscarP(){
            $this->_db->open();
            $tipo_usuario = $_SESSION['kind'];
            $consulta = $this->_db->conn->prepare("SELECT * FROM `producers`");
            $consulta->execute();
            while($row = $consulta->fetch(PDO::FETCH_OBJ)){
                $this->list_producers[] =$row;
            }
            $this->_db->close();
            return $this->list_producers;
        }
    }
    if($_SESSION['kind'] == 5 or $_SESSION['kind'] == 6 or $_SESSION['kind'] == 1){
        $usuario = new ConsultaP();
        $salida ="";
        $salida .= "<table border='1' align=center cellPadding=1 cellSpacing=0 borderColor=#a1aeb2>";
        $salida .= "<thead>
                        <th>Item</th>
                        <th>Estado</th>
                        <th>Nombres</th>
                        <th>Nro identificaci&oacute;n</th>
                        <th>Cargo</th>
                        <th>Establecimiento - Otros</th>
                        <th>Nro tel&eacute;fono</th>
                        <th>Municipio</th>
                        <th>Direcci&oacute;n</th> 
                        <th>Ubicaci&oacute;n geogr&aacute;fica</th>
                        <th>Zona</th>
                        <th>Productos</th>
                    </thead>";
                    $item=1;
                    $totalOrders=0;
                    foreach($usuario->buscarP() as $r){
                		$productoS = str_replace("\r", " - ", $r->products);
                		$estado= $r->status;
                		if($estado==1){
                		    $estado="Activo";
                		}else{
                		    $estado="Inactivo";
                		}
                        $salida .= 
                        "<tr> 
                            <td>".$item."</td>
                            <td>".$estado."</td>
                            <td>".utf8_decode($r->names)."</td>
                            <td>".utf8_decode($r->nroIdentification)."</td>
                            <td>".utf8_decode($r->position)."</td>
                            <td>".utf8_decode($r->establishment)."</td>
                            <td>".$r->phone."</td>
                            <td>".utf8_decode($r->municipality)."</td>
                            <td>".utf8_decode($r->address)."</td>
                            <td>".utf8_decode($r->geographic_location)."</td>
                            <td>".utf8_decode($r->location_area)."</td>
                            <td>".utf8_decode($productoS)."</td>
                        </tr>";
                        $item ++;
                    }
                    $salida .= "</table>";
    }
    header("Content-type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename=Productores_".time().".xls");
    header("Pragma: no-cache");
    header("Expires: 0");
    echo $salida;
    