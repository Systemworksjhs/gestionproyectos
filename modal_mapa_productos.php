<!-- Modal detalles Agrotic-->
<?php

	$var = $_GET['var'];
	echo "<button id='btn-signup' type='button' class='btn btn-warning'><a href=''><i class='icon-hand-right' ></i>Ver detalles..</a></button>"; 
	$mysqli2 = new mysqli("localhost", "root", "JhosepH2020", "bd_gestionproyectos");
	$sql2="SELECT `municipality`.`id_municipality` as municipioId, `municipality`.`name_municipality` as municipio, count(*) as totalproductos FROM `municipality` left join `productos_dpto_narino` on `productos_dpto_narino`.`municipioId` = `municipality`.`id_municipality` WHERE municipioId = '$var' group by `municipality`.`id_municipality`, `municipality`.`name_municipality`";
    $sql3="SELECT `name_product` FROM `productos_dpto_narino` WHERE municipioId = '$var'";
    $resultado2 = $mysqli2->query($sql2);
    $resultado3 = $mysqli2->query($sql3);
	?>
	<div class="table-responsive">
		<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
			<tbody>
				<?php
					while($row2 = $resultado2->fetch_assoc()) { 
						$municipios= $row2['municipio'];
						$totalproductos = $row2['totalproductos'];
						?>
						<tr>
							<th>Municipio</th><th><?php echo $municipios;?></th>
						</tr>
						<tr>
							<th>Cantidad de productos</th><th><?php echo $totalproductos;?></th>
						</tr>
					<?php
				}?>
			</tbody>
		</table>
	</div>
    <?php
        while($row3 = $resultado3->fetch_assoc()) { 
            $nombre = $row3['name_product'];
            echo "$nombre </br>";
    }?>

