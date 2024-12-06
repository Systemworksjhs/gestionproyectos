
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
            //echo "Id user-> $ids<br>";
            //echo "Inicio--> $inicio<br>";
            //echo "Fin-----> $fin<br>";
            //echo "Kind----> $tipo<br>";
            $resultFourteen = consultSalesApoyoLogistico($inicio,$fin);
            ?>
            <div class="box box-primary">
                <div class="box-body">
                    <table class="table table-bordered table-hover datatable">
                        <thead>
                            <th>Nro.</th>
                            <th>Fecha.</th>
                            <th>Estado</th>
                            <th>Nombre ciente</th>
                            <th>C&oacute;digo venta</th>
                            <th>Medio pago</th>
                            <th>Valor</th>
                            <th>Tipo servicio</th>
                            <th>Costo envio</th>
                        </thead>
                        <?php
                        //$resulEleven = consult_sales_names();
                        $i=1;
                        while($showTen = $resultFourteen->fetch_assoc()) {
                            if(($showTen['id_municipality']==$ids)or($tipo==1)){ 
                                if(($showTen['status']=="Aprobado")or($showTen['status']=="Empacado")or($showTen['status']=="En ruta")or($showTen['status']=="Entregado")){
                                    $resulEleven = consult_sales_names();
                                    ?>
                                    <tr>
                                        <td><?php echo $i;?></td>
                                        <td>
                                            <?php echo substr($showTen['date_created_order'],0,10);
                                            ?>
                                        </td>
                                        <td><?php echo $showTen['status']; ?></td>
    
                                        <td>
                                            <?php while($results = $resulEleven->fetch_assoc()) 
                                                {
                                                    if($showTen['id_user_order']==$results['id_user']){ echo $results['names']." ".$results['lastnames'];}
                                                }
                                            ?>
                                        </td>
                                        <td><?php echo $showTen['referenceCode']; ?></td>
                                        <td><?php echo $showTen['pay_method']; ?></td>
                                        <td><?php echo $showTen['price']; ?></td>
                                        <td><?php echo $showTen['shipping_method']; ?></td>
                                        <td><?php echo $showTen['shipping_cost']; ?></td>
                                    </tr>
                                    <?php
                                    $i++;
                                }
                            }
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
                                <a href="plantillaReportApoyoLogistico?<?php echo $cadena;?>" class="btn btn-danger" id="export_data" name="export_data"><span class="fa fa-plus-square"> </span> Exportar a excel</a>
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
        $(".datatable").DataTable({
          "language": {
            "sProcessing":    "Procesando...",
            "sLengthMenu":    "Mostrar _MENU_ registros",
            "sZeroRecords":   "No se encontraron resultados",
            "sEmptyTable":    "Ning煤n dato disponible en esta tabla",
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
                "sLast":    "脷ltimo",
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
