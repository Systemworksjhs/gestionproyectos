
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
            $id_user_contable=$_SESSION['user_id'];
            //echo "Id user-> $ids<br>";
            //echo "Inicio--> $inicio<br>";
            //echo "Fin-----> $fin<br>";
            //echo "Kind----> $tipo<br>";
            $resultFifteen = consultSalesTeamContables($inicio,$fin);
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
                        while($showFifteen = $resultFifteen->fetch_assoc()) {
                            if(($id_user_contable=29)or($tipo==1)){ 
                                if(($showFifteen['status']=="Aprobado")or($showFifteen['status']=="Empacado")or($showFifteen['status']=="En ruta")or($showFifteen['status']=="Entregado")){
                                    $resulEleven = consult_sales_names();
                                    ?>
                                    <tr>
                                        <td><?php echo $i;?></td>
                                        <td>
                                            <?php echo substr($showFifteen['date_created_order'],0,10);
                                            ?>
                                        </td>
                                        <td><?php echo $showFifteen['status']; ?></td>
    
                                        <td>
                                            <?php while($results = $resulEleven->fetch_assoc()) 
                                                {
                                                    if($showFifteen['id_user_order']==$results['id_user']){ echo $results['names']." ".$results['lastnames'];}
                                                }
                                            ?>
                                        </td>
                                        <td><?php echo $showFifteen['referenceCode']; ?></td>
                                        <td><?php echo $showFifteen['pay_method']; ?></td>
                                        <td><?php echo $showFifteen['price']; ?></td>
                                        <td><?php echo $showFifteen['shipping_method']; ?></td>
                                        <td><?php echo $showFifteen['shipping_cost']; ?></td>
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
                                <a href="plantillaReportMensual?<?php echo $cadena;?>" class="btn btn-danger" id="export_data" name="export_data"><span class="fa fa-plus-square"> </span> Exportar a excel</a>
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
