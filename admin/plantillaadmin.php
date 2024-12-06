<?php
	
	session_start();
	if(!isset($_SESSION['user_id'])){
		header("Location: ./");
	}
    header("Content-Type: application/vnd.ms-excel; charset=iso-8859-1");
    require "../configuration/conectionpdo.php";
    require "../configuration/conection.php";
    require "../configuration/funcscopy.php";
    class Consulta{
        private $_db;
        private  $list_orders;
        public function __construct(){
            $this->_db = new Connection();
        }
        public function buscar(){
            $this->_db->open();
            $tipo_usuario = $_SESSION['kind'];
            $inicio =$_GET["inicio"];
            $fin    =$_GET["fin"];
            $ids    =$_GET["ids"];
            $tips   =$_GET["tips"];
            echo "<b>Reporte de ventas</b><br> Periodo: $inicio - $fin <br>";
            $where = "WHERE str_to_date(left(date_created_order,10), '%Y-%m-%d')>=date('$inicio') AND str_to_date(left(date_created_order,10), '%Y-%m-%d')<=date('$fin') AND id_municipality=64 ORDER BY id_order DESC";
            $consulta = $this->_db->conn->prepare("SELECT * FROM orders $where");
            $consulta->execute();
            while($row = $consulta->fetch(PDO::FETCH_OBJ)){
                $this->list_orders[] =$row;
            }
            $this->_db->close();
            return $this->list_orders;
        }
    }
    
    //Plantilla administrador todos los municipios


    $usuario = new Consulta();
    $salida ="";
    $salida .= "<br>";
    $salida .= "<hr>";
    $salida .= "Municipio de Pasto";
    $salida .= "<table border='1' align=center cellPadding=1 cellSpacing=0 borderColor=#a1aeb6>";
    $salida .= "<thead>
                    <th>Item</th>
                    <th>C&oacute;digo de referencia</th>
                    <th>Nombre cliente</th>
                    <th>Identif. cliente</th>
                    <th>Correo elec.</th>
                    <th>No. telefono</th> 
                    <th>Estado</th>
                    <th>Precio total</th>
                    <th>Pres.</th>
                    <th>Cant</th>
                    <th>Valor</th>
                    <th>Subtotal</th>
                    <th>Direcci&oacute;n</th>
                    <th>Fecha compra</th>
                    <th>Fecha actualizaci&oacute;n</th>
                </thead>";
                $item=1;
                $totalOrders=0;
                foreach($usuario->buscar() as $r){
                    $idAux=$r->id_user_order;
                    $resulThirteen= consult_sales_names_export($idAux);
                    while($results = $resulThirteen->fetch_assoc()) 
                    {
                        $salida .= 
                        "<tr style='BACKGROUND-COLOR: #E2EFDA'> 
                            <td>".$item."</td>
                            <td>".$r->referenceCode."</td>
                            <td>".utf8_decode($results['names']).' '.utf8_decode($results['lastnames'])."</td>
                            <td>".$results['identificacion']."</td>
                            <td>".$r->email."</td>
                            <td>".$r->phone."</td>
                            <td>".$r->status."</td>
                            <td>".$r->price."</td>
                        </tr>";
                    }
                    $salida .= 
                    "<tr style='BACKGROUND-COLOR: #F2F2F2'> 
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>".utf8_decode($r->address)."</td>
                        <td>".$r->date_created_order."</td>
                        <td>".$r->update_date."</td>
                    </tr>";
                    
                    $totalOrders=$totalOrders+$r->price;
                    $datos = json_decode($r->details);
                    $i=1;
                    foreach($datos as $fila) {
                        $salida .=
                        "<tr> 
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>".$i."</td>
                            <td>".utf8_decode($fila->nameProduct)."</td>
                            <td>".$fila->nombrePres."</td>
                            <td>".$fila->cantidad."</td>
                            <td>".$fila->precio."</td>
                            <td>".$fila->precio*$fila->cantidad."</td>
                        </tr>";
                        $i++;
                    }
                    $item ++;
                    $salida .= 
                    "<tr style='BACKGROUND-COLOR: #FFF'> 
                        
                    </tr>";
                }
    //echo "Total Venta: $totalOrders";
    $salida .= 
    "<tr style='BACKGROUND-COLOR: #00B0F0'> 
        <td></td>
        <td></td>
        <td>Total venta:</td>
        <td>".$totalOrders."</td>
    </tr>";
    $salida .= "</table>";
    $salida .= "<br>";
    $salida .= "<hr>";
    $salida .= "Municipio de Ipiales";

    class ConsultaTwo{
        private $_db;
        private  $list_orders;
        public function __construct(){
            $this->_db = new Connection();
        }
        public function buscar(){
            $this->_db->open();
            $tipo_usuario = $_SESSION['kind'];
            $inicio =$_GET["inicio"];
            $fin    =$_GET["fin"];
            $ids    =$_GET["ids"];
            //echo "<b>Reporte de ventas.</b><br> Periodo: $inicio - $fin <br>";
            //echo "Tipo   : $tipo_usuario <br>";
            //echo "Municipio   : $ids <br>";
            $where = "WHERE str_to_date(left(date_created_order,10), '%Y-%m-%d')>=date('$inicio') AND str_to_date(left(date_created_order,10), '%Y-%m-%d')<=date('$fin') AND id_municipality=28 AND (status='Aprobado' OR status='Alistamiento' OR status='En proceso' OR status='Empacado' OR status='En ruta' OR status='Listo para recoger' OR status='Entregado') ORDER BY date_created_order DESC";
            $consultatwo = $this->_db->conn->prepare("SELECT * FROM orders $where");
            $consultatwo->execute();
            while($row = $consultatwo->fetch(PDO::FETCH_OBJ)){
                $this->list_orders[] =$row;
            }
            $this->_db->close();
            return $this->list_orders;
        }
    }
    
    $usuario = new ConsultaTwo();
    $salida .= "<table border='1' align=center cellPadding=1 cellSpacing=0 borderColor=#a1aeb6>";
    $salida .= "<thead>
                <th>Item</th>
                <th>C&oacute;digo de referencia</th>
                <th>Nombre cliente</th>
                <th>Identif. cliente</th>
                <th>Correo elec.</th>
                <th>No. telefono</th> 
                <th>Estado</th>
                <th>Precio total</th>
                <th>Pres.</th>
                <th>Cant</th>
                <th>Valor</th>
                <th>Subtotal</th>
                <th>Direcci&oacute;n</th>
                <th>Fecha compra</th>
                <th>Fecha actualizaci&oacute;n</th>
            </thead>";
            $item=1;
            $totalOrders=0;
            foreach($usuario->buscar() as $r){
                $idAux=$r->id_user_order;
                $resulThirteen= consult_sales_names_export($idAux);
                while($results = $resulThirteen->fetch_assoc()) 
                {
                    $salida .= 
                    "<tr style='BACKGROUND-COLOR: #E2EFDA'> 
                        <td>".$item."</td>
                        <td>".$r->referenceCode."</td>
                        <td>".utf8_decode($results['names']).' '.utf8_decode($results['lastnames'])."</td>
                        <td>".$results['identificacion']."</td>
                        <td>".$r->email."</td>
                        <td>".$r->phone."</td>
                        <td>".$r->status."</td>
                        <td>".$r->price."</td>
                    </tr>";
                }
                $salida .= 
                "<tr style='BACKGROUND-COLOR: #F2F2F2'> 
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>".utf8_decode($r->address)."</td>
                    <td>".$r->date_created_order."</td>
                    <td>".$r->update_date."</td>
                </tr>";
                $totalOrders=$totalOrders+$r->price;
                $datos = json_decode($r->details);
                $i=1;
                foreach($datos as $fila) {
                    $salida .=
                    "<tr> 
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>".$i."</td>
                        <td>".utf8_decode($fila->nameProduct)."</td>
                        <td>".$fila->nombrePres."</td>
                        <td>".$fila->cantidad."</td>
                        <td>".$fila->precio."</td>
                        <td>".$fila->precio*$fila->cantidad."</td>
                    </tr>";
                    $i++;
                }
                $item ++;
                $salida .= 
                "<tr style='BACKGROUND-COLOR: #FFF'> 
                    
                </tr>";
            }
            //echo "Total Venta: $totalOrders";
            $salida .= 
            "<tr style='BACKGROUND-COLOR: #00B0F0'> 
                <td></td>
                <td></td>
                <td>Total venta:</td>
                <td>".$totalOrders."</td>
            </tr>";
            $salida .= "</table>";
            $salida .= "<br>";
            $salida .= "<hr>";
            $salida .= "Municipio de Tumaco";

        class ConsultaThree{
            private $_db;
            private  $list_orders;
            public function __construct(){
                $this->_db = new Connection();
            }
            public function buscar(){
                $this->_db->open();
                $tipo_usuario = $_SESSION['kind'];
                $inicio =$_GET["inicio"];
                $fin    =$_GET["fin"];
                $ids    =$_GET["ids"];
                //echo "Reporte de ventas periodo: $inicio - $fin <br>";
                //echo "Tipo   : $tipo_usuario <br>";
                //echo "Municipio   : $ids <br>";
                $where = "WHERE str_to_date(left(date_created_order,10), '%Y-%m-%d')>=date('$inicio') AND str_to_date(left(date_created_order,10), '%Y-%m-%d')<=date('$fin') AND id_municipality=61 AND (status='Aprobado' OR status='Alistamiento' OR status='En proceso' OR status='Empacado' OR status='En ruta' OR status='Listo para recoger' OR status='Entregado') ORDER BY date_created_order DESC";
                $consultatwo = $this->_db->conn->prepare("SELECT * FROM orders $where");
                $consultatwo->execute();
                while($row = $consultatwo->fetch(PDO::FETCH_OBJ)){
                    $this->list_orders[] =$row;
                }
                $this->_db->close();
                return $this->list_orders;
            }
        }
        $usuario = new ConsultaThree();
        $salida .= "<table border='1' align=center cellPadding=1 cellSpacing=0 borderColor=#a1aeb6>";
        $salida .= "<thead>
                        <th>Item</th>
                        <th>C&oacute;digo de referencia</th>
                        <th>Nombre cliente</th>
                        <th>Identif. cliente</th>
                        <th>Correo elec.</th>
                        <th>No. telefono</th> 
                        <th>Estado</th>
                        <th>Precio total</th>
                        <th>Pres.</th>
                        <th>Cant</th>
                        <th>Valor</th>
                        <th>Subtotal</th>
                        <th>Direcci&oacute;n</th>
                        <th>Fecha compra</th>
                        <th>Fecha actualizaci&oacute;n</th>
                </thead>";
                $item=1;
                $totalOrders=0;
                foreach($usuario->buscar() as $r){
                    $idAux=$r->id_user_order;
                    $resulThirteen= consult_sales_names_export($idAux);
                    while($results = $resulThirteen->fetch_assoc()) 
                    {
                        $salida .= 
                        "<tr style='BACKGROUND-COLOR: #E2EFDA'> 
                            <td>".$item."</td>
                            <td>".$r->referenceCode."</td>
                            <td>".utf8_decode($results['names']).' '.utf8_decode($results['lastnames'])."</td>
                            <td>".$results['identificacion']."</td>
                            <td>".$r->email."</td>
                            <td>".$r->phone."</td>
                            <td>".$r->status."</td>
                            <td>".$r->price."</td>
                        </tr>";
                    }
                    $salida .= 
                    "<tr style='BACKGROUND-COLOR: #F2F2F2'> 
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>".utf8_decode($r->address)."</td>
                        <td>".$r->date_created_order."</td>
                        <td>".$r->update_date."</td>
                    </tr>";
                    $totalOrders=$totalOrders+$r->price;
                    $datos = json_decode($r->details);
                    $i=1;
                    foreach($datos as $fila) {
                        $salida .=
                        "<tr> 
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>".$i."</td>
                            <td>".utf8_decode($fila->nameProduct)."</td>
                            <td>".$fila->nombrePres."</td>
                            <td>".$fila->cantidad."</td>
                            <td>".$fila->precio."</td>
                            <td>".$fila->precio*$fila->cantidad."</td>
                        </tr>";
                        $i++;
                    }
                    $item ++;
                    $salida .= 
                    "<tr style='BACKGROUND-COLOR: #FFF'> 
                        
                    </tr>";
                }
                //echo "Total Venta: $totalOrders";
                $salida .= 
                "<tr style='BACKGROUND-COLOR: #00B0F0'> 
                    <td></td>
                    <td></td>
                    <td>Total venta:</td>
                    <td>".$totalOrders."</td>
                </tr>";
                $salida .= "</table>";
                $salida .= "<br>";
                $salida .= "<hr>";
    
    
    
    

    header("Content-type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename=VentasAgrotic_".time().".xls");
    header("Pragma: no-cache");
    header("Expires: 0");
    echo $salida;