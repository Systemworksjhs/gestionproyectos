<?php
    require 'configuration/conection.php';
    $idiniciativa = $_GET["idiniciativa"];
    $identificador = $_GET["identificador"];
    $sql="SELECT id_initiative, id_initiatives, cod_municipality, name_initiative, direction, productHome 
    FROM initiatives_municipalities 
    WHERE (cod_municipality=$identificador and id_initiatives=$idiniciativa)";
    $resultado = $mysqli->query($sql) or die($mysqli->error);
    $sw=0;
    while($row = $resultado->fetch_assoc()) { ?>
        <li id="<?php echo $row['id_initiative']; ?>" class="blog-test list-group-items mb-1"><?php echo $row['name_initiative']; ?>  &nbsp; &nbsp; <img src="img/icons/icon-ubicacion.svg" width="13px"> &nbsp;<?php echo $row['productHome']; ?></li>
        <?php 
        $sw=1;
        } 
        if($sw==0){?>
        <p  class="list-group-items mb-1">No se encontraron registros para este municipio</p>
        <?php
    }
?>
