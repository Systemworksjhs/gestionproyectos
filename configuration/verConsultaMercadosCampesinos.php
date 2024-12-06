
    <head>
        <link rel="stylesheet" href="../admin/plugins/datatables/dataTables.bootstrap.css">
    </head>

    <?php
        require '../configuration/conection.php';
        require '../configuration/funcscopy.php';
        if((!isset($_GET["dateStart"]))and(!isset($_GET["dateEnd"]))){
            $inicio=$_GET["inicio"];
            $fin=$_GET["fin"];
            $ids=$_GET["ids"];
            $tipo=$_GET["tipo"];
            $resulttwentyFive = consult_sales_mercados_campesinos($inicio,$fin);
            //$resultTen
            ?>
            <div class="box box-primary">
                <div class="box-body">
                    <table class="table table-bordered table-hover datatable1">
                        <thead>
                            <th>Nro.</th>
                            <th>Fecha.</th>
                            <th>Estado</th>
                            <th>Municipio</th>
                            <th>Nombre ciente</th>
                            <th>Secretar&iacute;a</th>
                            <th>Código venta</th>
                            <th>Referencia</th>
                            <th>Medio pago</th>
                            <th>Valor</th>
                            <th>Tipo servicio</th>
                            <th>Costo envio</th>
                        </thead>
                        <?php
                        //$resulEleven = consult_sales_names();
                        $i=1;
                        while($showtwentyFive = $resulttwentyFive->fetch_assoc()) {
                            //if(($showtwentyFive['id_municipality']==$ids)or($tipo==1)or($tipo==6)){ 

                            //if(($showtwentyFive['id_municipality']==$ids)or($tipo==1)or($ids==29)){ 
                                //if( ($showtwentyFive['status']=="Aprobado") or($showtwentyFive['status']=="Empacado") or($showtwentyFive['status']=="En proceso") or ($showtwentyFive['status']=="Listo para recoger") or ($showtwentyFive['status']=="Alistamiento") or ($showtwentyFive['status']=="En ruta") or ($showtwentyFive['status']=="Entregado") ){
                                    $resulEleven = consult_sales_names();
                                    ?>
                                    <tr>
                                        <td><?php echo $i;?></td>
                                        <td>
                                            <?php echo substr($showtwentyFive['date_created_order'],0,10);?>
                                        </td>
                                        <td><?php echo $showtwentyFive['status']; ?></td>
                                        <td><?php echo $showtwentyFive['id_municipality']; ?></td>
                                        <td>
                                            <?php while($results = $resulEleven->fetch_assoc()) 
                                                {
                                                    if($showtwentyFive['id_user_order']==$results['id_user']){ echo $results['names']." ".$results['lastnames'];}
                                                }
                                            ?>
                                        </td>
                                        
                                        <td><?php echo $showtwentyFive['secretaria']; ?></td>
                                        <td><?php echo $showtwentyFive['referenceCode']; ?></td>
                                        <td><?php echo $showtwentyFive['reference_pol']; ?></td>
                                        <td><?php echo $showtwentyFive['pay_method']; ?></td>
                                        <td><?php echo $showtwentyFive['price']; ?></td>
                                        <td><?php echo $showtwentyFive['shipping_method']; ?></td>
                                        <td><?php echo $showtwentyFive['shipping_cost']; ?></td>
                                    </tr>
                                    <?php
                                    $i++;
                                //}
                            //}
                        }
                        ?>
                    </table>
                    <div>
                        <?php
                            $cadena= 'inicio='.$inicio.'&fin='.$fin.'&ids='.$ids;
                            //echo $cadena;
                        ?>
                        <?php
                            if($i>1){ ?>
                                <a href="plantillaMercadoCampesino?<?php echo $cadena;?>" class="btn btn-danger" id="export_data" name="export_data"><span class="fa fa-plus-square"> </span> Exportar secretar&iacute;as</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <a href="plantillaMercadoCampesino1?<?php echo $cadena;?>" class="btn btn-warning" id="export_data" name="export_data"><span class="fa fa-plus-square"> </span> Exportar todos</a>
                            <?php        
                            }
                        ?>
                    </div>
                </div>
            </div>
            <?php
        }
    ?>
    <script src="../admin/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../admin/plugins/datatables/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){
        $(".datatable1").DataTable({
          "language": {
            "sProcessing":    "Procesando...",
            "sLengthMenu":    "Mostrar _MENU_ registros",
            "sZeroRecords":   "No se encontraron resultados",
            "sEmptyTable":    "Ningún dato disponible en esta tabla",
            "sInfo":          "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "sInfoEmpty":     "Mostrando registros del 0 al 0 de un total de 0 registros",
            "sInfoFiltered":  "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix":   "",
            "sSearch":        "Buscar:",
            "sUrl":           "",
            "sInfoThousands":  ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst":    "Primero",
                "sLast":    "Último",
                "sNext":    "Siguiente",
                "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }
        }
        });
      });
    </script>
