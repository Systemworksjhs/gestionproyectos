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
            $ids    =64;
            $minicipality="San Juan de Pasto";
            //if ($ids==61){$minicipality="Tumaco";}
            //if ($ids==28){$minicipality="Ipiales";}
            echo "Reporte de ventas periodo: $inicio - $fin <br>";
            //echo "Tipo   : $tipo_usuario <br>";
            echo "Municipio   : $minicipality <br>";
            if($tipo_usuario == 1){
                $where = "WHERE str_to_date(left(date_created_order,10), '%Y-%m-%d')>=date('$inicio') AND str_to_date(left(date_created_order,10), '%Y-%m-%d')<=date('$fin') ORDER BY date_created_order DESC";
            }
            if($tipo_usuario == 6){
                $where = "WHERE str_to_date(left(date_created_order,10), '%Y-%m-%d')>=date('$inicio') AND str_to_date(left(date_created_order,10), '%Y-%m-%d')<=date('$fin') and id_municipality=$ids AND (status='Aprobado' OR status='Empacado' OR status='En ruta' OR status='Entregado') ORDER BY date_created_order DESC";
            }	
            $consulta = $this->_db->conn->prepare("SELECT * FROM orders $where");
            $consulta->execute();
            while($row = $consulta->fetch(PDO::FETCH_OBJ)){
                $this->list_orders[] =$row;
            }
            $this->_db->close();
            return $this->list_orders;
        }
    }
    $usuario = new Consulta();
    $salida ="";
    $salida .= "<table border='1' align=center cellPadding=1 cellSpacing=0 borderColor=#a1aeb6>";
    $salida .= "<thead style='BACKGROUND-COLOR: #00B050'>
                    <th>Item</th> 
                    <th>C&oacute;digo de referencia</th>
                    <th>Estado</th>
                    <th>Productos</th>
                    <th>Cant</th>
                    <th>Valor</th>
                    <th>Subtotal</th>
                    <th>M&eacute;todo envio</th>
                    <th>Costo envio</th>
                    <th>E-mail</th>
                    <th>Tel&eacute;fono</th>
                    <th>Direcci&oacute;n</th>
                    <th>Fecha compra</th>
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
                            <td>".$r->status."</td>
                        </tr>";
                    }
                    $sumGrams = 0;
                    $datos = json_decode($r->details);
                    foreach($datos as $fila) {
                        if (isset($fila->gramosPres)) {
                            $sumGrams += $fila->gramosPres * $fila->cantidad;
                          } elseif (isset($fila->gramaie)) {
                            $sumGrams += intval($fila->gramaje) * $fila->cantidad;
                          }
                    }
                    $sumGrams = ($sumGrams/1000);
                    $salida .= 
                    "<tr style='BACKGROUND-COLOR: #F2F2F2'> 
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>Item(s)</td>
                        <td>".$r->price."</td>
                        <td>Peso:</td>
                        <td>".$sumGrams."</td>
                        <td>".utf8_decode($r->shipping_method)."</td>
                        <td>".utf8_decode($r->shipping_cost)."</td>
                        <td>".utf8_decode($r->email)."</td>
                        <td>".utf8_decode($r->phone)."</td>
                        <td>".utf8_decode($r->address)."</td>
                        <td>".$r->date_created_order."</td>
                    </tr>";
                    $totalOrders=$totalOrders+$r->price;
                    $datos = json_decode($r->details);
                    $i=1;
                    foreach($datos as $fila) {
                        if (isset($fila->gramosPres)) {
                            $subTotalGrms = ($fila->gramosPres * $fila->cantidad) / 1000;
                          } elseif (isset($fila->gramaje)) {
                            $subTotalGrms = (intval($fila->gramaje) * $fila->cantidad) / 1000;
                          }
                        $subTotalGrms = number_format($subTotalGrms, 2, ',', '.');
                        $salida .=
                        "<tr> 
                            <td></td>
                            <td></td>
                          
                            <td>".$i."</td>
                            <td>".utf8_decode($fila->nameProduct)."</td>
                            <td>".$fila->cantidad."</td>
                            <td>".$subTotalGrms."</td>
                            <td>".$fila->precio."</td>
                            <td>".$fila->precio*$fila->cantidad."</td>
                        </tr>";
                        $i++;
                    }
                    $item ++;
                }
    //echo "Total Venta: $totalOrders";
    $salida .= 
    "<tr style='BACKGROUND-COLOR: #00B0F0'> 
        <td></td>
        <td></td>
        <td>Total venta:</td>
        <td>".$totalOrders."</td>
    </tr>";
    $salida .= 
    "<tr'> 
        <td></td>
    </tr>";
    $salida .= 
    "<tr> 
        <td></td>
    </tr>";
    $salida .= "</table>";
    header("Content-type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename=VentasAgrotic_Consolidado".time().".xls");
    header("Pragma: no-cache");
    header("Expires: 0");
    echo $salida;
    
    
    class Consulta1{
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
            $ids    =61;
            $minicipality="Tumaco";
            //if ($ids==61){$minicipality="Tumaco";}
            //if ($ids==28){$minicipality="Ipiales";}
            echo "Reporte de ventas periodo: $inicio - $fin <br>";
            //echo "Tipo   : $tipo_usuario <br>";
            echo "Municipio   : $minicipality <br>";
            if($tipo_usuario == 1){
                $where = "WHERE str_to_date(left(date_created_order,10), '%Y-%m-%d')>=date('$inicio') AND str_to_date(left(date_created_order,10), '%Y-%m-%d')<=date('$fin') ORDER BY date_created_order DESC";
            }
            if($tipo_usuario == 6){
                $where = "WHERE str_to_date(left(date_created_order,10), '%Y-%m-%d')>=date('$inicio') AND str_to_date(left(date_created_order,10), '%Y-%m-%d')<=date('$fin') and id_municipality=$ids AND (status='Aprobado' OR status='Empacado' OR status='En ruta' OR status='Entregado') ORDER BY date_created_order DESC";
            }	
            $consulta1 = $this->_db->conn->prepare("SELECT * FROM orders $where");
            $consulta1->execute();
            while($row = $consulta1->fetch(PDO::FETCH_OBJ)){
                $this->list_orders[] =$row;
            }
            $this->_db->close();
            return $this->list_orders;
        }
    }
    $usuario = new Consulta1();
    $salida ="";
    $salida .= "<table border='1' align=center cellPadding=1 cellSpacing=0 borderColor=#a1aeb6>";
    $salida .= "<thead style='BACKGROUND-COLOR: #00B050'>
                    <th>Item</th> 
                    <th>C&oacute;digo de referencia</th>
                    <th>Estado</th>
                    <th>Productos</th>
                    <th>Cant</th>
                    <th>Valor</th>
                    <th>Subtotal</th>
                    <th>M&eacute;todo envio</th>
                    <th>Costo envio</th>
                    <th>E-mail</th>
                    <th>Tel&eacute;fono</th>
                    <th>Direcci&oacute;n</th>
                    <th>Fecha compra</th>
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
                            <td>".$r->status."</td>
                        </tr>";
                    }
                    $sumGrams = 0;
                    $datos = json_decode($r->details);
                    foreach($datos as $fila) {
                        if (isset($fila->gramosPres)) {
                            $sumGrams = $sumGrams + ($fila->gramosPres*$fila->cantidad);
                          } elseif (isset($fila->gramaje)) {
                            $sumGrams = $sumGrams + (intval($fila->gramaje)*$fila->cantidad);
                          }
                    }
                    $sumGrams = ($sumGrams/1000);
                    $salida .= 
                    "<tr style='BACKGROUND-COLOR: #F2F2F2'> 
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>Item(s)</td>
                        <td>".$r->price."</td>
                        <td>Peso:</td>
                        <td>".$sumGrams."</td>
                        <td>".utf8_decode($r->shipping_method)."</td>
                        <td>".utf8_decode($r->shipping_cost)."</td>
                        <td>".utf8_decode($r->email)."</td>
                        <td>".utf8_decode($r->phone)."</td>
                        <td>".utf8_decode($r->address)."</td>
                        <td>".$r->date_created_order."</td>
                    </tr>";
                    $totalOrders=$totalOrders+$r->price;
                    $datos = json_decode($r->details);
                    $i=1;
                    foreach($datos as $fila) {
                        if (isset($fila->gramosPres)) {
                            $subTotalGrms = ($fila->gramosPres*$fila->cantidad)/1000;
                          } elseif (isset($fila->gramaje)) {
                            $subTotalGrms = (intval($fila->gramaje) * $fila->cantidad) / 1000;
                          }
                        $subTotalGrms = number_format($subTotalGrms, 2, ',', '.');
                        $salida .=
                        "<tr> 
                            <td></td>
                            <td></td>
                          
                            <td>".$i."</td>
                            <td>".utf8_decode($fila->nameProduct)."</td>
                            <td>".$fila->cantidad."</td>
                            <td>".$subTotalGrms."</td>
                            <td>".$fila->precio."</td>
                            <td>".$fila->precio*$fila->cantidad."</td>
                        </tr>";
                        $i++;
                    }
                    $item ++;
                }
    //echo "Total Venta: $totalOrders";
    $salida .= 
    "<tr style='BACKGROUND-COLOR: #00B0F0'> 
        <td></td>
        <td></td>
        <td>Total venta:</td>
        <td>".$totalOrders."</td>
    </tr>";
        $salida .= 
    "<tr'> 
        <td></td>
    </tr>";
    $salida .= 
    "<tr> 
        <td></td>
    </tr>";
    $salida .= "</table>";
    header("Content-type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename=VentasAgrotic_Pasto".time().".xls");
    header("Pragma: no-cache");
    header("Expires: 0");
    echo $salida;
    
        
    
    class Consulta2{
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
            $ids    =28;
            $minicipality="Ipiales";
            //if ($ids==61){$minicipality="Tumaco";}
            //if ($ids==28){$minicipality="Ipiales";}
            echo "Reporte de ventas periodo: $inicio - $fin <br>";
            //echo "Tipo   : $tipo_usuario <br>";
            echo "Municipio   : $minicipality <br>";
            if($tipo_usuario == 1){
                $where = "WHERE str_to_date(left(date_created_order,10), '%Y-%m-%d')>=date('$inicio') AND str_to_date(left(date_created_order,10), '%Y-%m-%d')<=date('$fin') ORDER BY date_created_order DESC";
            }
            if($tipo_usuario == 6){
                $where = "WHERE str_to_date(left(date_created_order,10), '%Y-%m-%d')>=date('$inicio') AND str_to_date(left(date_created_order,10), '%Y-%m-%d')<=date('$fin') and id_municipality=$ids AND (status='Aprobado' OR status='Empacado' OR status='En ruta' OR status='Entregado') ORDER BY date_created_order DESC";
            }	
            $consulta2 = $this->_db->conn->prepare("SELECT * FROM orders $where");
            $consulta2->execute();
            while($row = $consulta2->fetch(PDO::FETCH_OBJ)){
                $this->list_orders[] =$row;
            }
            $this->_db->close();
            return $this->list_orders;
        }
    }
    $usuario = new Consulta2();
    $salida ="";
    $salida .= "<table border='1' align=center cellPadding=1 cellSpacing=0 borderColor=#a1aeb6>";
    $salida .= "<thead style='BACKGROUND-COLOR: #00B050'>
                    <th>Item</th> 
                    <th>C&oacute;digo de referencia</th>
                    <th>Estado</th>
                    <th>Productos</th>
                    <th>Cant</th>
                    <th>Valor</th>
                    <th>Subtotal</th>
                    <th>M&eacute;todo envio</th>
                    <th>Costo envio</th>
                    <th>E-mail</th>
                    <th>Tel&eacute;fono</th>
                    <th>Direcci&oacute;n</th>
                    <th>Fecha compra</th>
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
                            <td>".$r->status."</td>
                            
                        </tr>";
                    }
                    $sumGrams = 0;
                    $datos = json_decode($r->details);
                    foreach($datos as $fila) {
                        if (isset($fila->gramosPres)) {
                            $sumGrams = $sumGrams + ($fila->gramosPres*$fila->cantidad);
                          } elseif (isset($fila->gramaje)) {
                            $sumGrams = $sumGrams + (intval($fila->gramaje)*$fila->cantidad);
                          }
                    }
                    $sumGrams = ($sumGrams/1000);
                    $salida .= 
                    "<tr style='BACKGROUND-COLOR: #F2F2F2'> 
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>Item(s)</td>
                        <td>".$r->price."</td>
                        <td>Peso:</td>
                        <td>".$sumGrams."</td>
                        <td>".utf8_decode($r->shipping_method)."</td>
                        <td>".utf8_decode($r->shipping_cost)."</td>
                        <td>".utf8_decode($r->email)."</td>
                        <td>".utf8_decode($r->phone)."</td>
                        <td>".utf8_decode($r->address)."</td>
                        <td>".$r->date_created_order."</td>
                    </tr>";
                    $totalOrders=$totalOrders+$r->price;
                    $datos = json_decode($r->details);
                    $i=1;
                    foreach($datos as $fila) {
                        if (isset($fila->gramosPres)) {
                            $subTotalGrms = ($fila->gramosPres*$fila->cantidad)/1000;
                          } elseif (isset($fila->gramaje)) {
                            $subTotalGrms = (intval($fila->gramaje)* $fila->cantidad) / 1000;
                          }
                        $subTotalGrms = number_format($subTotalGrms, 2, ',', '.');
                        $salida .=
                        "<tr> 
                            <td></td>
                            <td></td>
                          
                            <td>".$i."</td>
                            <td>".utf8_decode($fila->nameProduct)."</td>
                            <td>".$fila->cantidad."</td>
                            <td>".$subTotalGrms."</td>
                            <td>".$fila->precio."</td>
                            <td>".$fila->precio*$fila->cantidad."</td>
                        </tr>";
                        $i++;
                    }
                    $item ++;
                }
    //echo "Total Venta: $totalOrders";
    $salida .= 
    "<tr style='BACKGROUND-COLOR: #00B0F0'> 
        <td></td>
        <td></td>
        <td>Total venta:</td>
        <td>".$totalOrders."</td>
    </tr>";
        $salida .= 
    "<tr'> 
        <td></td>
    </tr>";
    $salida .= 
    "<tr> 
        <td></td>
    </tr>";
    $salida .= "</table>";
    header("Content-type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename=VentasAgrotic_Pasto".time().".xls");
    header("Pragma: no-cache");
    header("Expires: 0");
    echo $salida;