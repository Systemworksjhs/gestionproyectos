<?php 
    $users = UserStandarData::getAll();
    $municipality = MunicipalityData::getAll();
    
?>
<section class="content">
    <div class="row">
        <div class="col-md-12 mb-5">
            <h1>Registro secretarías Mercados Campesino AgroticNariño</h1>
        </div>
        <br><br><br><br>
        <?php
            $orderss = ordersData::getAllOrdersSecretaries();
            if(count($orderss)>0){
                // si hay registros
                ?>
                <div class="box box-primary">
                    <div class="box-body">
                        <table class="table table-bordered table-hover datatable">
                            <thead>
                                <th>Item</th>
                                <th>Secretarías</th>
                                <th>Total registrados</th>
                            </thead>
                            <?php
                            $id_aux=1;
                            $contAlls=0;
                            foreach($orderss as $orders){
                                ?>
                                <tr>
                                    <td><?php echo $id_aux?></td>
                                    <td><?php echo $orders->secretaria; ?></td>
                                    <td><?php echo $orders->Secretarias; ?></td>
                                </tr>
                                <?php
                                $id_aux++;
                                $contAlls +=$orders->Secretarias;
                            }
                            ?>
                        </table>
                    </div>
                    <?php echo "<p class='alert alert-success'>Nro Registros: $contAlls </p>";?>
                </div>
            <?php
            }else{
                echo "<p class='alert alert-danger'>No Registros</p>";
            }
        ?>
        
        <div class="row ml-3">
            <div class="col-md-12">
                <h1>Consulta de pedidos</h1>
            </div>
            <div class="form-group ml-5 box box-primary">
                <div class="box-body">
                    <div class="col-md-2">
                        <label for="dateStart" class="col-lg-3 control-label">Fecha inicial*</label>
                        <input type="date" name="dateStart" required class="form-control" id="dateStart">
                    </div>
                    <div class="col-md-2">
                        <label for="dateEnd" class="col-lg-3 control-label">Fecha final*</label>
                        <input type="date" name="dateEnd" required class="form-control" id="dateEnd">
                    </div>
                    <div class="col-md-2 mt-3"><br><br>
                        <button onclick="ejecutedSearchDate()" type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">Consultar ventas</button>
                    </div>
                </div>
            </div>
        </div><br>
        <div id="resultado">
            <!-- Aqui resultado de la consulta -->
        </div>
    </div>
</section>
    <!--Opcion seleccionada-->
    <script type="text/javascript">
        $(function ejecutedSearchDate() {
            $('button').click(function() {
                var mensaje = this.id;
                let inicio = document.querySelector('input#dateStart').value;
                let fin = document.querySelector('input#dateEnd').value;
                $(function() {
                    getInfo(mensaje);
                });
                function getInfo(id) {
                    //let href = "../configuration/verconsulta?inicio=" + inicio + "&fin=" + fin;
                    const ids = "<?php echo $_SESSION['id_userMunicipality']?>";
                    const tipo = "<?php echo $_SESSION['kind']?>";
                    <?php echo "tipo: ". $_SESSION['kind'] ?>;
                    let href = "../configuration/verConsultaMercadosCampesinos?inicio=" + inicio + "&fin=" + fin + "&ids=" + ids + "&tipo=" + tipo;
                    $.ajax({
                        url: href,
                        beforeSend: function() {
                            //$('#loader').show();
                        },
                        // return the result
                        success: function(result) {
                            $('#resultado').html(result);
                        },
                        complete: function() {
                            //$('#loader').hide();
                        },
                        error: function(jqXHR, testStatus, error) {
                            console.log(error);
                            alert("Página " + href + " NO se puede abrir. Error:" + error);
                            //$('#loader').hide();
                        },
                        timeout: 8000
                    });
                }
            });
        });
    </script>
