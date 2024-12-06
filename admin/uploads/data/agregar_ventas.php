<?php
  // Declaramos el fichero de conexion
  $host = "localhost";
  $dbname = "bd_gestionproyectos";
  $username = "agroticn_agroticnadmin";
  $password = "JhosepH2020";
  // Conexion PDO	
  try {
      // Cree un nuevo objeto PDO y guardelo en la variable $ db
      $db = new PDO("mysql:host={$host};dbname={$dbname}", $username, $password);
      // Configure el modo de error en PDO para mostrar inmediatamente las excepciones cuando haya errores
      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      } catch (PDOException $exception){
      die("Connection error: " . $exception->getMessage());
  }
  error_reporting(0);

  //Variables enviadas por el formulario
  $monto = $_POST['monto'];
  $venta_fecha = $_POST['venta_fecha'];

  // Datos de estado de cuenta preparados
  $query = $db->prepare("INSERT INTO `tbl_ventas` (`monto`, `venta_fecha`)
  VALUES (:monto, :venta_fecha)");
  $query->bindParam(":monto", $monto);
  $query->bindParam(":venta_fecha", $venta_fecha);
  // Ejecuta SQL
  $query->execute();
  
  // redireccion a URL
  header("Location: https://gestionproyectos.narino.gov.co/admin/?view=home");
  //Core::redir("./?view=home");
  /*echo("<script>location.href = index.php';</script>");*/
?>