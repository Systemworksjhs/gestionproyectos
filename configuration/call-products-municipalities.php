
<?php
    require 'configuration/conection.php';
    $sqlProductosMunicipality="SELECT id_municipality, productsMunicipio FROM municipality WHERE (id_municipality=$identificador)";
    $resulsqlProductosMunicipality = $mysqli->query($sqlProductosMunicipality) or die($mysqli->error);
    $sw=0;
    echo "iniciando";
    while($rowfound = $resulsqlProductosMunicipality->fetch_assoc()) {
        $datos = json_decode($rowfound['productsMunicipio']);
        $i=0;
        echo $i;
        foreach($datos as $fila) {
            ?>
                <option value="<?php echo $fila->product;?>"><?php echo $fila->nameProduct;?></option>
            <?php 
        }
        $i= $i + 1;
    }
?>