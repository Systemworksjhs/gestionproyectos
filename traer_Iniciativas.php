<?php
    require 'configuration/conection.php';
    $idiniciativa = $_GET["idiniciativa"];
    $identificador = $_GET["identificador"];
    $sql="SELECT id_initiative, id_initiatives, cod_municipality, name_initiative, direction, estado, productHome, comprasPublicas 
    FROM initiatives_municipalities 
    WHERE (cod_municipality=$identificador and id_initiatives=$idiniciativa) AND (estado=1)";
    $resultado = $mysqli->query($sql) or die($mysqli->error);
    $sw=0;
    while($row = $resultado->fetch_assoc()) { 
        if($row['comprasPublicas']==1){
            ?>
            <li id="<?php echo $row['id_initiative']; ?>" 
                class="blog-test list-group-items mb-1">
                <svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" fill="var(--primary)" class="bi bi-check-circle" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                    <path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z"/>
                </svg>
                <?php echo $row['name_initiative']; ?>  &nbsp; &nbsp; <img src="img/icons/icon-ubicacion.svg" width="13px"> &nbsp;<?php echo $row['productHome']; ?>
            </li>
            <?php
        }
        else
        {
            ?>
            <li id="<?php echo $row['id_initiative']; ?>" 
                class="blog-test list-group-items mb-1 pl-3">
                <img src="img/insignias/basico.png" width="30px"  alt="Hitos logrados">
                <?php echo $row['name_initiative']; ?>  &nbsp; &nbsp; <img src="img/icons/icon-ubicacion.svg" width="13px"> &nbsp;<?php echo $row['productHome']; ?>
            
            </li>
            <?php 
            $sw=1;
        }
    } 
    if($sw==0){?>
        <p class="list-group-items mb-1">Por favor seleccione un producto para iniciar la búsqueda</p>
        <?php
    }
?>  


