<?php 
    $users = UserStandarData::getAll();
    $municipality = MunicipalityData::getAll();
?>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <h1>Consulta de pedidos mensual por Centros de Acopio</h1>
        </div>
        <div class="form-group">
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
    </div><br>
    <div class="row">

    </div>
    <div id="resultado">

    <!-- Aqui resultado de la consulta -->
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
                    let href = "../configuration/verconsultamensual?inicio=" + inicio + "&fin=" + fin + "&ids=" + ids + "&tipo=" + tipo;
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