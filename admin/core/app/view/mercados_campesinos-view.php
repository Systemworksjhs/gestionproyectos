<?php $u = UserData::getById($_SESSION["user_id"]); ?>
<?php if($u->kind==1 or $u->kind==6):?>
<?php $general = mercados_campesinosData::getById(1); 

$mercado2 = mercados_campesinosData::getById(2);
$arrayProductos2 = json_decode($mercado2["productos"], true);

$mercado1 = mercados_campesinosData::getById(1);
$arrayProductos = json_decode($mercado1["productos"], true);
//echo '<pre>';
//print_r($arrayProductos);
//echo '</pre>';




?>
<section class="content">
    
    <div class="row">
        <div class="col-md-12">
            <h1>Mercados campesinos</h1>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModalGeneral">
                Datos generales
            </button>
            
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModalMercado1">
                Configurar Mercado campesino 1
            </button>
            
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModalMercado2">
                Configurar Mercado campesino 2
            </button>
        </div>
    </div>
    
    
    <!-- Modal 1 -->
    
    <div class="modal fade" id="myModalGeneral" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" >Configuración general de la página</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" enctype="multipart/form-data" method="post" id="addproviders1" action="./?action=mercados_campesinos&opt=general" role="form">
                        <div class="form-group">
                            <label for="name1" class="col-lg-2 control-label">Titúlo*: </label>
                            <div class="col-md-6">
                                
                                <input type="text" name="titulo" required class="form-control" id="titulo" placeholder="Título de página" minlength="3" maxlength="60" 
                                    value="<?php echo $general['titulo']?>" >
                            </div>
                        </div>
                    
                        <!--Imagen -->
                        <div class="form-group">
                            <label for="image" class="col-sm-3 control-label">Imagen* (tamaño recomendado es de 1920x700 píxeles)</label>
                            <div class="col-md-9 fileinput fileinput-new" data-provides="fileinput">
                                
                                <div>
                                    <span class="btn btn-info btn-file"><span class="fileinput-new">Seleccione una imagen</span>
                                    <input type="file" name="image" id="image" accept="image/png,image/jpeg,image/jpg,image/gif" />
                                </div>
                            </div>
                        </div>
                    
                        <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-10">
                                <button type="submit" class="btn btn-primary">Guardar</button><a href="#" class="btn btn-danger" style="margin-left: 7px;" data-dismiss="modal"><i class="fa fa-times"> </i>&nbsp&nbspCancelar</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Modal 2 -->
    <div class="modal fade" id="myModalMercado1" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" >Configuración Mercado campesino 1</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" enctype="multipart/form-data" method="post" id="addproviders1" action="./?action=mercados_campesinos&opt=mercado1" role="form">
                        <div class="form-group">
                            <label for="nombre1" class="col-lg-2 control-label">Nombre*: </label>
                            <div class="col-md-6">
                                <input type="text" name="nombre1" required class="form-control" id="nombre1" placeholder="Nombre"
                                    value="<?php echo $mercado1['nombre']?>">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="name1" class="col-lg-2 control-label">Precio*: </label>
                            <div class="col-md-6">
                                <input type="text" name="precio1" required class="form-control" id="precio1" placeholder="Precio" minlength="3" maxlength="60"
                                    value=<?php echo $mercado1["precio"]?>>
                            </div>
                        </div>
                        <?php
                            $products = productosDptoNarinoData::getAll();
                        ?>
                        <div class="form-group">
                            <label for="products" class="col-lg-2 control-label">Productos *</label>
                            <div class="col-md-6">
                                <span class="">Seleccione Productos (Presione Ctrl para seleccionar varias)</span>
                                <select name="products[]" id="productSelect" class="form-control formulario1 mb-5" multiple required size="20" style="height: auto;">
                                    <option value="">-- Seleccione al menos un producto --</option>
                                    <?php foreach ($products as $product) { ?>
                                        <option value="<?php echo $product->id_product; ?>"
                                            <?php  
                                            foreach ($arrayProductos as $prod ){
                                                if ($product->id_product == $prod["producto"]){
                                                    echo "selected";
                                                    
                                                    
                                                }
                                            }
                                            
                                            ?>
                                        >
                                        <?php echo $product->name_product; ?>
                                        
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        
                        <!-- Agrega un contenedor para los campos de entrada -->
                        <div id="additionalFieldsContainer">
                            <?php foreach ($arrayProductos as $index => $prod) { ?>
                            <?php $product = mercados_campesinosData::getProductById($prod["producto"])?>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">
                                        Presentación para <?php echo $product["name_product"] ?>
                                    </label>
                                    <div class="col-md-6">
                                        <input type="text" name="presentacion<?php echo $index + 1; ?>" class="form-control" placeholder="Ingrese información adicional" value="<?php echo $prod["presentation"]; ?>">
                                    </div>
                                </div>
                            <?php } ?>
                            
                        </div>
                        
                        <!-- Script para manejar la visibilidad de los campos de entrada -->
                        <script>
                            $(document).ready(function () {
                                // Escucha el evento de cambio en el elemento select
                                $("#productSelect").change(function () {
                                    // Limpia los campos de entrada existentes
                                    $("#additionalFieldsContainer").empty();
                        
                                    // Por cada opción seleccionada, agrega un campo de entrada
                                    $("#productSelect option:selected").each(function (index) {
                                        // Crea un campo de entrada y agrégalo al contenedor
                                        var inputField = '<div class="form-group">' +
                                            '<label for="presentacion' + (index + 1) + '" class="col-lg-2 control-label">Presentación para ' + $(this).text() + '</label>' +
                                            '<div class="col-md-6">' +
                                            '<input type="text" name="presentacion' + (index + 1) + '" class="form-control" placeholder="Ingrese información adicional">' +
                                            '</div>' +
                                            '</div>';
                        
                                        $("#additionalFieldsContainer").append(inputField);
                                    });
                                });
                                //$("#productSelect").change();
                            });
                            // Disparar manualmente el evento change después de que la página se carga
                            
                        </script>
                    
                        
                    
                        <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-10">
                                <button type="submit" class="btn btn-primary">Guardar</button><a href="#" class="btn btn-danger" style="margin-left: 7px;" data-dismiss="modal"><i class="fa fa-times"> </i>&nbsp&nbspCancelar</a>
                            </div>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
    
    
    
    <!-- Modal 3 -->
    <div class="modal fade" id="myModalMercado2" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" >Configuración Mercado campesino 2</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" enctype="multipart/form-data" method="post" id="addproviders2" action="./?action=mercados_campesinos&opt=mercado2" role="form">
                        <div class="form-group">
                            <label for="nombre2" class="col-lg-2 control-label">Nombre*: </label>
                            <div class="col-md-6">
                                <input type="text" name="nombre2" required class="form-control" id="nombre2" placeholder="Nombre"
                                    value="<?php echo $mercado2['nombre']?>">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="name2" class="col-lg-2 control-label">Precio*: </label>
                            <div class="col-md-6">
                                <input type="text" name="precio2" required class="form-control" id="precio2" placeholder="Precio" minlength="3" maxlength="60"
                                    value=<?php echo $mercado2["precio"]?>>
                            </div>
                        </div>
                        <?php
                            $products = productosDptoNarinoData::getAll();
                        ?>
                        <div class="form-group">
                            <label for="products" class="col-lg-2 control-label">Productos *</label>
                            <div class="col-md-6">
                                <span class="">Seleccione Productos (Presione Ctrl para seleccionar varias)</span>
                                <select name="products2[]" id="productSelect2" class="form-control formulario1 mb-5" multiple required size="20" style="height: auto;">
                                    <option value="">-- Seleccione al menos un producto --</option>
                                    <?php foreach ($products as $product) { ?>
                                        <option value="<?php echo $product->id_product; ?>"
                                            <?php  
                                            foreach ($arrayProductos2 as $prod ){
                                                if ($product->id_product == $prod["producto"]){
                                                    echo "selected";
                                                    
                                                    
                                                }
                                            }
                                            
                                            ?>
                                        >
                                        <?php echo $product->name_product; ?>
                                        
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        
                        <!-- Agrega un contenedor para los campos de entrada -->
                        <div id="additionalFieldsContainer2">
                            <?php foreach ($arrayProductos2 as $index => $prod) { ?>
                            <?php $product = mercados_campesinosData::getProductById($prod["producto"])?>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">
                                        Presentación para <?php echo $product["name_product"] ?>
                                    </label>
                                    <div class="col-md-6">
                                        <input type="text" name="presentacion<?php echo $index + 1; ?>" class="form-control" placeholder="Ingrese información adicional" value="<?php echo $prod["presentation"]; ?>">
                                    </div>
                                </div>
                            <?php } ?>
                            
                        </div>
                        
                        <!-- Script para manejar la visibilidad de los campos de entrada -->
                        <script>
                            $(document).ready(function () {
                                // Escucha el evento de cambio en el elemento select
                                $("#productSelect2").change(function () {
                                    // Limpia los campos de entrada existentes
                                    $("#additionalFieldsContainer2").empty();
                        
                                    // Por cada opción seleccionada, agrega un campo de entrada
                                    $("#productSelect2 option:selected").each(function (index) {
                                        // Crea un campo de entrada y agrégalo al contenedor
                                        var inputField = '<div class="form-group">' +
                                            '<label for="presentacion' + (index + 1) + '" class="col-lg-2 control-label">Presentación para ' + $(this).text() + '</label>' +
                                            '<div class="col-md-6">' +
                                            '<input type="text" name="presentacion' + (index + 1) + '" class="form-control" placeholder="Ingrese información adicional">' +
                                            '</div>' +
                                            '</div>';
                        
                                        $("#additionalFieldsContainer2").append(inputField);
                                    });
                                });
                            });

                        </script>
                    
                        
                    
                        <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-10">
                                <button type="submit" class="btn btn-primary">Guardar</button><a href="#" class="btn btn-danger" style="margin-left: 7px;" data-dismiss="modal"><i class="fa fa-times"> </i>&nbsp&nbspCancelar</a>
                            </div>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
    
    
    
    

            
    
</section>
<?php endif;?>