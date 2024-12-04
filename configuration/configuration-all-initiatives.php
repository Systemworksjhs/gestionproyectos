<?php
    $sqllastupdate="SELECT id_initiative, id_initiatives, cod_municipality, name_initiative, direction 
    FROM initiatives_municipalities 
    WHERE (cod_municipality=$identificador) AND (estado=1) ORDER BY name_initiative ASC";
    $resultconsultlast = $mysqli->query($sqllastupdate) or die($mysqli->error);
    $sw=0;
    while($showregistretlast = $resultconsultlast->fetch_assoc()) { ?>
        <li id="<?php echo $showregistretlast['id_initiative']; ?>" class="section-title section-title-sm position-relative list-group-itemscont blog-test list-group-item mb-1"><?php echo $showregistretlast['name_initiative']; ?>  &nbsp; &nbsp; <img src="img/icons/icon-ubicacion.svg" width="13px"> &nbsp;<?php echo $showregistretlast['direction']; ?></li>
        <?php 
        $sw=1;
        } 
        if($sw==0){?>
        <p  class="list-group-item mb-1">No se encontraron registros para este municipio</p>
        <?php
    }
?>