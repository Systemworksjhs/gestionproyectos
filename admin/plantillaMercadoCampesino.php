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
            //echo "tipo de usuario: ", $tipo_usuario;
            $inicio =$_GET["inicio"];
            $fin    =$_GET["fin"];
            $ids    =$_GET["ids"];
            echo "<b>Reporte de ventas</b><br> Periodo: $inicio - $fin <br>";
            //echo "Tipo   : $tipo_usuario <br>";
            //echo "Municipio   : $ids <br>";
                $where = "WHERE str_to_date(left(date_created_order,10), '%Y-%m-%d')>=date('$inicio') AND str_to_date(left(date_created_order,10), '%Y-%m-%d')<=date('$fin') and (funcionario=1 OR funcionario=0 ) and AND (details LIKE '%Mercado%') AND (details LIKE '%Mercado%') ORDER BY id_order DESC";
            	
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
    
    $salida .= "<thead>
                    <th>Item</th>
                    <th>Nombre cliente</th>
                    <th>Identif. cliente</th> 
                    <th>C&oacute;digo de referencia</th>
                    <th># Transacci&oacute;n</th>
                    <th>M&eacute;todo de pago</th>
                    <th>Estado</th>
                    <th>Precio total</th>
                    <th>Secretar&iacute;a</th>
                    
                    
                    <th>Servicio</th>
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
                            <td>".utf8_decode($results['names']).' '.utf8_decode($results['lastnames'])."</td>
                            <td>".$results['identificacion']."</td>
                            <td>".$r->referenceCode."</td>
                            <td>".$r->reference_pol."</td>
                            <td>".$r->pay_method."</td>
                            <td>".$r->status."</td>
                            <td>".$r->price."</td>
                            <td>".utf8_decode($r->secretaria)."</td>
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
                        <td>".utf8_decode($r->shipping_method)."</td>
                        <td>".utf8_decode($r->address)."</td>
                        <td>".$r->date_created_order."</td>
                        <td>".$r->update_date."</td>
                    </tr>";
                    $totalOrders=$totalOrders+$r->price;
                    $datos = json_decode($r->details);
                    $i=1;
                    $varnull="";
                    //foreach($datos as $fila) {
                    //    $salida .=
                        "<tr> 
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>".$i."</td>
                            <td>".$varnull."</td>
                            <td>".$varnull."</td>
                            <td>".$varnull."</td>
                            <td>".$varnull."</td>
                            <td>".$varnull."</td>
                        </tr>";
                        $i++;
                    //}
                    $item ++;
                }
                $salida .= 
                "<tr style='BACKGROUND-COLOR: #00B0F0'> 
                    <td></td>
                    <td></td>
                    <td>Total venta:</td>
                    <td>".$totalOrders."</td>
                </tr>";
                $salida .= "</table>";
    //}
    


    header("Content-type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename=VentasAgrotic_".time().".xls");
    header("Pragma: no-cache");
    header("Expires: 0");
    echo $salida;