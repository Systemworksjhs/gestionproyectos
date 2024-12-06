<?php
		$Producto = $_GET["Producto"];
		$Fecha = $_GET["Fecha"];
		$Fecha2 = $_GET["Fecha2"];
		header('Content-Type: application/json');
		$mysqli1 =new mysqli('localhost', 'root', 'JhosepH2020', 'bd_gestionproyectos');
		$sqlQuery = "SELECT product, price, updatedate FROM `historyproducstdane` WHERE (updatedate<='$Fecha2') AND updatedate>='$Fecha' AND product='$Producto'";
		$result = mysqli_query($mysqli1,$sqlQuery);
		$data = array();
		foreach ($result as $row) {
			$data[] = $row;
		}
		mysqli_close($mysqli1);
		echo json_encode($data);
?>