<?php
	//include('configuration/conection.php');
	if((isset($_GET["Producto"]))&&(isset($_GET["Fecha"]))&&(isset($_GET["Fecha2"]))){
		$Producto = $_GET["Producto"];
		$Fecha = $_GET["Fecha"];
		$Fecha2 = $_GET["Fecha2"];
		header('Content-Type: application/json');
		$mysqli1=new mysqli('localhost', 'root', 'JhosepH2020', 'bd_gestionproyectos'); //servidor, usuario de base de datos, contraseña del usuario, nombre de base de datos
		//$sqlQuery = "SELECT product_id,product_name,marks FROM tbl_marks ORDER BY product_id";
		$sqlQuery = "SELECT nameProduct, costSondeo, dateSondeo FROM `sondeos` WHERE (dateSondeo<='$Fecha2') AND dateSondeo>='$Fecha' AND nameProduct='$Producto'";
		$result = mysqli_query($mysqli1,$sqlQuery);
		$data = array();
		foreach ($result as $row) {
			$data[] = $row;
		}
		mysqli_close($mysqli1);
		echo json_encode($data);
	}
    else{
        echo 
        '<script>
            window.location = "./";
        </script>';
    }
?>
