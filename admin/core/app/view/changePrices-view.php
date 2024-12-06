 <?php 
    $u = UserData::getById($_SESSION["user_id"]);
    if(($u->kind==1 )or($u->kind==6)):
  
    ?>
    <section class="content">
        <div class="row">
            <h1>Ajustar precios a productos Agrotic Nari√±o</h1>
            <!-- Button trigger modal -->
            <?php
                $changesprices = changePricesData::getAll(); 
                if(count($changesprices)>0){
                    // si hay productos
                    ?>
                    <div class="box box-primary">
                        <div class="box-body">
                            <table class="table table-bordered table-hover datatable">
                                <thead>
                                    <th>Cod.</th>
                                    <th>Imagen</th>
                                    <th>Producto</th>
                                    
                                    <!-- <th>Descripci&oacute;n</th> -->
                                    <th>Municipio</th>
                                    <!-- <th>Visitas</th> -->
                                    <th>Estado</th>
                                    <th></th>
                                </thead>
                                <?php
                                $id_aux=0;
                                foreach($changesprices as $producto){
                                    if(($producto->municipioId==$_SESSION['id_userMunicipality'])or($_SESSION['kind']==1)or($_SESSION["user_id"]==29)){
                                        ?>
                                        <tr>
                                            <td><?php echo $producto->id_product; ?></td>
                                            <td><img src="./../images/products/<?php echo $producto->image;?>" style="width:90px;height:70px" > </td>
                                            <td><?php echo $producto->name_product; ?></td>
                                            
                                            <!-- <td><?php echo $producto->description; ?></td> -->
                                            <td>
                                                <?php foreach(MunicipalityData::getAll() as $g):?>
                                                    <?php if($producto->municipioId==$g->id_municipality){ echo "$g->name_municipality";}
                                                endforeach; ?>
                                            </td>
                                            <!-- <td><?php echo $producto->view; ?></td> -->
                                            <td>
                                                <?php if($producto->enabled==1):?>
                                                    <i class="glyphicon glyphicon-ok"></i>
                                                <?php endif; ?>
                                                <?php if($producto->enabled==0):?>
                                                    <i class="glyphicon glyphicon-remove"></i>
                                                <?php endif; ?>
                                            </td>
                                            <td style="width:130px;">
                                                <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#editModal<?php echo $producto->id_product; ?>">
                                                    Editar
                                                </button>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                    $id_aux++;
                                }
                                ?>
                            </table>
                            
                            
                            <?php foreach($changesprices as $producto):?>
                            
                            <!-- Modal -->
                            <div class="modal fade" id="editModal<?php echo $producto->id_product; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel">Editar Producto</h4></br>
                                        </div>
                                        
                                        <!-- Inicio de formulario -->
                                        <div class="modal-body">
                                            <form class="form-horizontal" method="post" id="updateprice" action="./?action=UpdateProductosPrice&opt=update" role="form">
                                                <input type="hidden" name="id_productNew" id="id_productNew"  value="<?php echo $countProductsRegistrer;?>">
                                                
                                                <!-- Nombre del producto -->
                                                <div class="form-group">
                                                    <label for="name_product" class="col-lg-6 control-label">Nombre del producto*</label>
                                                    <div class="col-md-4 col-lg-4">
                                                        <input type="text" name="name_product" value="<?php echo $producto->name_product;?>" readonly class="form-control" id="name_product" placeholder="Nombre" minlength="3" maxlength="24">
                                                    </div>
                                                </div>
                                                
                                                <!-- Mismo precio -->
                                                <div class="form-group">
                                                    <label for="name_product" class="col-lg-6 control-label">Modificar todos los precios</label>
                                                    <div class="col-md-4 col-lg-4">
                                                        <input type="number" onkeyup="mismoPrecio(<?php echo count(json_decode($producto->presentation)) ?>,<?php echo $producto->id_product?>)" class="inputMismoPrecio" step="0.1"  placeholder="Precio global">
                                                    </div>
                                                </div>
                                                
                                                <!-- Incremento -->
                                                <div class="form-group">
                                                    <label for="name_product" class="col-lg-6 control-label">Incremento*</label>
                                                    <div class="col-md-4 col-lg-4">
                                                        <input type="number" onchange="modificarInput(<?php echo $producto->id_product;?> )" onkeyup="modificarInput(<?php echo $producto->id_product;?> )"  class="inputIncremento<?php echo $producto->id_product;?> " step="0.1"  placeholder="% incremento" required>
                                                    </div>
                                                </div>
                                                
                                                <!-- <input type="hidden" class="form-control" id="slide_img_aux" value="<?php echo $producto->image;?>" name="slide_img_aux"> -->
                                                
                                                <hr>

                                                <div class="form-group">
                                                    
                                                    <!-- Precio sin incremento -->
                                                    <div class="col-md-6">
                                                        <div class="">
                                                        <label for="price" class="col-lg-12 control-label" style="text-align:center;">Precio sin incremento*</label>
                                                        </div>
                                                        <?php $contadorJ=1;?>
                                                        <?php foreach(json_decode($producto->presentation) as $key=>$value):?>
                                                            <label for="pricePresentation" class="col-lg-12 control-label labelPresentacion<?php echo $producto->id_product;?>" style="text-align:left;"><?php echo $value->name;?></label>
                                                            <input  type="number" onchange="modificarInput(<?php echo $producto->id_product;?> )" onkeyup="modificarInput(<?php echo $producto->id_product;?>)" class="inputPrecioSin<?php echo $producto->id_product;?> inputSin<?php echo $contadorJ?>" value="<?php echo $value->priceGram;?>" required step="0.01">
                                                            
                                                            <input type="hidden" class="grams<?php echo $producto->id_product;?>" value="<?php echo $value->grams;?>">
                                                        <?php $contadorJ=$contadorJ+1?>
                                                        <?php endforeach?>
                                                    </div>
                                                    
                                                    <!-- Precio con incremento -->
                                                    <div class="col-md-6">
                                                        <div class="">
                                                            <label for="price" class="col-lg-12 control-label" style="text-align:center;">Precio con incremento*</label>
                                                        </div>
                                                        <?php foreach(json_decode($producto->presentation) as $key=>$value):?>
                                                            <label for="pricePresentation" class="col-lg-12 control-label" style="text-align:left;"><?php echo $value->name;?></label>
                                                            <input  type="number" onchange="modificarInput(<?php echo $producto->id_product;?> )" onkeyup="modificarInput(<?php echo $producto->id_product;?> )" class="inputPrecioCon<?php echo $producto->id_product;?>"  value="<?php echo $value->incrementPrice;?>" step="0.01" readonly required >
                                                        <?php endforeach?>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label for="enabled" class="col-lg-4 control-label" >Se encuentra activo?</label>
                                                    <div class="col-md-6">
                                                        <div class="checkbox">
                                                            <label>
                                                            <input type="checkbox" id="check<?php echo $producto->id_product;?>" name="enabled" <?php if($producto->enabled==1){ echo "checked";}?>> 
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <div class="col-lg-offset-2 col-lg-10">
                                                        <input type="hidden" name="id_product" value="<?php echo $producto->id_product;?>">
                                                        <input type="text" name="strJson" class="strJson<?php echo $producto->id_product;?>" value="" readonly style="width:0px;height:0px;border:none;">
                                                        <button type="submit" class="btn btn-success" id="botonUpdatePrices">Actualizar Precios</button><a href="#" class="btn btn-danger" style="margin-left: 7px;" data-dismiss="modal"><i class="fa fa-times"> </i>&nbsp&nbspCancelar</a>
                                                     </div>
                                                </div>
                                                
                                            </form>
                                        </div>
                                        <!-- Fin de formulario -->
                                        
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                            <!-- Fin de modal -->

                        </div>
                    </div>
                <?php
                }else{
                    echo "<p class='alert alert-danger'>No hay productos</p>";
                }
            ?>
            </div>
        </div>
    </section>
<?php endif;?>

<script type="text/javascript">

    //Funciè´—n crea Json para actualizar campo presentation en bd
    //var idp=<?php echo $producto->id_product ?>
    //modificarInput(idp);
    var jsonPreString = "";
    function modificarInput(idProducto){
        //console.log("ingreso a funciè´—n!");
        var jsonPresentation = [];
        var incremento = $(".inputIncremento"+idProducto).val();
        var precioSin = $(".inputPrecioSin"+idProducto);
        var precioCon = $(".inputPrecioCon"+idProducto);
        var label = $(".labelPresentacion"+idProducto);
        var grams = $(".grams"+idProducto);
        var strJson = $(".strJson"+idProducto);
        console.log("strJson",strJson);
        if(precioSin.length > 0) {
            precioSin.each(function(i){
                //Calculamos el incremento para cada presentaciè´—n
                var pIncre=Number(precioSin[i].value)+Number(precioSin[i].value)*Number(incremento)/100;
                //Formato 2 decimales
                pIncre= pIncre.toFixed(2);
                //Actualizamos valor de precio de incremento en los input
                precioCon[i].value=(pIncre);
                
                jsonPresentation.push({
                    "name": label[i].textContent,
                    "grams": grams[i].value,
                    "priceGram": precioSin[i].value,
                    "incrementPrice": pIncre
                })
            })
        }
        //Convertimos json en string
        jsonPreString=JSON.stringify(jsonPresentation);
        strJson[0].value=(jsonPreString);
        //document.getElementById("stringJson").value = jsonPreString;
        //console.log(jsonPreString);
        
    }
    
    
    
    
    

    
</script>

<script>
function mismoPrecio(numInputs, idp) {
    const inputMismoPrecio = document.querySelector('#editModal' + idp + ' .inputMismoPrecio');
    const inputValue = inputMismoPrecio.value;

    for (let i = 1; i <= numInputs; i++) {
        const inputId = 'inputSin' + i;
        const inputElement = document.querySelector('#editModal' + idp + ' .' + inputId);
        if (inputElement) {
            inputElement.value = inputValue;
        }
    }
    modificarInput(idp);
}
</script>











