<div>
    <p  class="list-group-items mb-1 text-center">&Uacute;ltima actualizaci&oacute;n registrada</p>
</div>
<?php
    $sqllastupdate="SELECT id_initiative, id_initiatives, cod_municipality, name_initiative, direction, productHome, comprasPublicas 
    FROM initiatives_municipalities 
    WHERE (cod_municipality=$identificador) AND (id_initiatives=$idproductS) AND (estado=1) ORDER BY id_initiative DESC";
    $resultconsultlast = $mysqli->query($sqllastupdate) or die($mysqli->error);
    $sw=0;
    while($showregistretlast = $resultconsultlast->fetch_assoc()) { 
        if($showregistretlast['comprasPublicas']==1){ ?>
            <li id="<?php echo $showregistretlast['id_initiative']; ?>" class="position-relative list-group-itemscont blog-test list-group-item mb-1"><?php echo $showregistretlast['name_initiative']; ?>  &nbsp; &nbsp; <img src="img/icons/icon-ubicacion.svg" width="13px"> &nbsp;<?php echo $showregistretlast['productHome']; ?></li>
        <?php
        }
        else
        {?>
            <li id="<?php echo $showregistretlast['id_initiative']; ?>" class="position-relative list-group-itemscont blog-test list-group-item mb-1"><img src="img/insignias/basico.png" width="30px" style="margin-right:5px" alt="Hitos logrados"><?php echo $showregistretlast['name_initiative']; ?>  &nbsp; &nbsp; <img src="img/icons/icon-ubicacion.svg" width="13px"> &nbsp;<?php echo $showregistretlast['productHome']; ?></li> 
        <?php 
        }
        $sw=1;
    } 
    if($sw==0){?>
        <p  class="list-group-item mb-1">Por favor seleccione un producto para iniciar la búsqueda</p>
        <?php
    }
?>