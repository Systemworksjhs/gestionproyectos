<?php
    $conxs = new mysqli("localhost","root","JhosepH2020","bd_gestionproyectos"); // Conectar a la BD
    $sql = "select * from ventas"; // Consulta SQL
    $query = $conxs->query($sql); // Ejecutar la consulta SQL
    $data = array(); // Array donde vamos a guardar los datos
    while($r = $query->fetch_object()){ // Recorrer los resultados de Ejecutar la consulta SQL
        $data[]=$r; // Guardar los resultados en la variable $data
    }
?>