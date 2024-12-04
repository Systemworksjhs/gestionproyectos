<?php
    require 'conection.php';
    $sqlall="SELECT `municipality`.`id_municipality` as municipioId, `municipality`.`name_municipality` as Municipio, COUNT(`initiatives_municipalities`.`id_initiative`) AS Iniciatives, COUNT(`initiatives`.`name_initiative`) as Categoria, `initiatives`.`name_initiative` as Nombre_categoria 
            FROM `initiatives_municipalities`,`municipality`,`initiatives` 
            WHERE (initiatives.id_initiatives=initiatives_municipalities.id_initiatives AND initiatives_municipalities.cod_municipality=municipality.id_municipality)AND(initiatives_municipalities.id_initiatives=initiatives.id_initiatives) GROUP BY `municipality`.`id_municipality`, `municipality`.`name_municipality`, `initiatives`.`name_initiative` ORDER BY id_municipality ASC";
    $resultallinitiatives = $mysqli->query($sqlall) or die($mysqli->error);         
?>
            <div>
                <p  class="list-group-item mb-3 mt-3 text-center">Consolidado Asociaciones Gobernación de Nariño</p>
            </div>
            <div class="card mb-3">
                <div class="card-body ">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <th>Nro</th>
                                <th>Municipio</th>
                                <th>Categoria</th>
                                <th>Cantidad</th>
                            </thead>
                            <tfoot>
                                <th>Nro</th>
                                <th>Municipio</th>
                                <th>Categoria</th>
                                <th>Cantidad</th>
                            </tfoot>
                            <tbody>   
                                <?php
                                    while($showalls = $resultallinitiatives->fetch_assoc()) { ?>
                                        <tr>
                                            <td><?php echo $showalls['municipioId']; ?></td>
                                            <td><?php echo $showalls['Municipio']; ?></td>
                                            <td><?php echo $showalls['Nombre_categoria']; ?></td>
                                            <td><?php echo $showalls['Categoria']; ?></td>
                                        </tr>
                                        <?php
                                    }
                                ?>    
                            </tbody>
                        </table>
                    </div>
                </div></br>
                <a href="./directorio"><button class="btn-tres btn btn-primary btn-round" id="btn-alldetails">Cerrar</button></a>
            </div>
            <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
            <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
            <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
            <script src="../assets/js/datatables-demo.js"></script>

