<?php
	//include('configuration/conection.php');
	//if((isset($_GET["Producto"]))&&(isset($_GET["Fecha"]))&&(isset($_GET["Fecha2"]))){
		$Producto = $_GET["Producto"];
		$Fecha = $_GET["Fecha"];
		$Fecha2 = $_GET["Fecha2"];
		$CentroAcopio = $_GET["CentroAcopio"];
		header('Content-Type: application/json');
		$mysqli1 =new mysqli('localhost', 'root', 'JhosepH2020', 'bd_gestionproyectos');
		if($CentroAcopio==1){
		   $sqlQuery = "SELECT product, price, updatedate FROM `historyproducstdaneipiales` WHERE (updatedate<='$Fecha2') AND updatedate>='$Fecha' AND product='$Producto'";
		}
		if($CentroAcopio==2){
		   $sqlQuery = "SELECT product, price, updatedate FROM `historyproducstdane` WHERE (updatedate<='$Fecha2') AND updatedate>='$Fecha' AND product='$Producto'";
		}
		$result = mysqli_query($mysqli1,$sqlQuery);
		$data = array();
		$aux = 0;
		foreach ($result as $row) {
			$data[] = $row;
			$aux = 1;
		}
		mysqli_close($mysqli1);
		echo json_encode($data);
	//}
    //else{
    //    echo 
    //    '<script>
    //        window.location = "./";
    //    </script>';
    //}
?>
