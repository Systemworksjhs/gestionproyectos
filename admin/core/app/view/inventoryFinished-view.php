<?php $municipality = MunicipalityData::getAll();?>
<?php $providers = providersData::getAll();?>
<?php $producers = ProducersData::getAll();?>
<?php $products = ProductosData::getAll();?>
<?php //echo '<pre>';print_r($_SESSION);echo '<pre>'; ?>
<?php //echo $_SESSION ?>


<section class="content">
    <div class="row">
        <div class="col-md-12">
        <h1>Inventario de almacenamiento de producto terminado</h1>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal">
            Nuevo Registro
        </button>
        <!-- Modal Nuevo registro -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Nuevo Registro</h4>
                    </div>
                    <div class="modal-body">
                    <form class="form-horizontal" method="post" id="addnewregistro" action="./?action=inventoryFinished&opt=add" role="form">
                        <div class="form-group">
                            <label for="dateRegistrer" class="col-lg-2 control-label">Fecha*</label>
                            <div class="col-md-6">
                                <input type="date" name="dateRegistrer" required class="form-control" id="dateRegistrer">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="batch" class="col-lg-2 control-label">Lote*</label>
                            <div class="col-md-6">
                                <input type="text" name="batch" required class="form-control" id="batch" placeholder="Lote" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="supplier" class="col-lg-2 control-label">Nombre proveedor*</label>
                            <div class="col-md-6">
                                <select name="supplier" id="supplier" class="form-control formulario1 mb-5" required>
                                    <option value="">-- Seleccione un proveedor --</option>
                                    <?php foreach($providers as $provider){
                                    ?>
                                        <option value="<?php echo $provider->name; ?>"><?php echo $provider->name; ?></option>
                                    <?php
                                        }
                                    ?>
                                    <?php foreach($producers as $producer){
                                    ?>
                                        <option value="<?php echo $producer->names;?>"><?php echo $producer->names; ?></option>
                                    <?php
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="product" class="col-lg-2 control-label">Producto*</label>
                            <div class="col-md-6">
                                <select name="selectproduct" onchange="viewPresentations(this)" id="selectProduct" class="form-control formulario1 mb-5" required >
                                    <option value="">-- Seleccione un producto --</option>
                                    <?php foreach($products as $product){
                                    ?>
                                        <?php if ($product->municipioId == $_SESSION['id_userMunicipality']): ?>
                                            <option value="<?php echo $product->id_product; ?>"><?php echo $product->name_product; ?></option>
                                        <?php endif ?>
                                    <?php
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        
                        
                        
                        
                        <div class="form-group p-0 ">
                            
                            <label class="col-md-12 control-label mb-4"style="text-align:center;" >Cantidad*</label>
                            <div class="row">
                                <div class="col-md-4 text-left" id="miDiv">
                                
                                </div>
                                <div class="col-md-6" id="miDiv2">
                                
                                </div>
                            </div>
                            
                            
                            
                            

                        </div>
                        
                        
                        
                        <div class="form-group">
                            <label for="decrease" class="col-lg-2 control-label">Merma (kg)*</label>
                            <div class="col-md-6">
                                <input type="number" name="decrease" class="form-control" id="decrease" placeholder="Disminuir" min="0" max="5000" required>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-10">
                                <button type="submit" class="btn btn-primary">Agregar Registro</button><a href="#" class="btn btn-danger" style="margin-left: 7px;" data-dismiss="modal"><i class="fa fa-times"> </i>&nbsp&nbspCancelar</a>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
        <br><br>
        
        
        <?php
            $inventoryfinish = inventoryFinishedData::getAll();
            if(count($inventoryfinish)>0){
                // si hay inventario final
                ?>
                <div class="box box-primary">
                    <div class="box-body">
                        <table class="table table-bordered table-hover datatable">
                            <thead>
                                <th>Fecha</th>
                                <th>Lote</th>
                                <th>Proveedor</th>
                                <th>Producto</th>
                                <th>Cantidad</th>
                                <th>Merma</th>
                                <th></th>
                            </thead>
                            <?php
                            foreach($inventoryfinish as $inventoryf){
                                ?>
                                <tr>
                                <td><?php echo $inventoryf->dateRegistrer;?></td>
                                <td><?php echo $inventoryf->batch;?></td>
                                <td><?php echo $inventoryf->supplier;?></td>
                                <td><?php echo $inventoryf->product; ?></td>
                                <td><?php echo $inventoryf->amount; ?></td>
                                <td><?php echo $inventoryf->decrease; ?></td>
                                <td style="width:130px;">
                                    <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#editModal<?php echo $inventoryf->id_inventory; ?>">
                                    Editar
                                </button>
                                <a href="./?action=inventoryFinished&opt=del&idcitorga=<?php echo base64_encode($inventoryf->id_inventory);?>" class="btn btn-danger btn-xs">Eliminar</a>
                            </td>
                            </tr>
                            <?php
                            }
                            ?>
                        </table>
                        <?php foreach($inventoryfinish as $inventoryf):?>
                        
                        
                        
                        <!-- Modal actualizar registro-->
                        <div class="modal fade" id="editModal<?php echo $inventoryf->id_inventory; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel">Editar Registro</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form class="form-horizontal" enctype="multipart/form-data" method="post" id="addFinished" action="./?action=inventoryFinished&opt=update" role="form">
                                            <div class="form-group">
                                                <label for="dateRegistrer" class="col-lg-2 control-label">Fecha registro*</label>
                                                <div class="col-md-6">
                                                    <input type="text" name="dateRegistrer" value="<?php echo $inventoryf->dateRegistrer; ?>" required class="form-control" id="dateRegistrer" placeholder="Fecha de registro" minlength="10" maxlength="10">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="batch" class="col-lg-2 control-label">Lote*</label>
                                                <div class="col-md-6">
                                                    <input type="text" name="batch" value="<?php echo $inventoryf->batch; ?>" required class="form-control" id="batch" placeholder="Lote">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="supplier" class="col-lg-2 control-label">Nombre proveedor*</label>
                                                <div class="col-md-6">
                                                <select name="supplier" id="supplier" class="form-control formulario1 mb-5" required>
                                                        <option selected value="<?php echo $inventoryf->supplier; ?>"><?php echo $inventoryf->supplier; ?></option>
                                                        <?php foreach($providers as $provider){
                                                        ?>
                                                            <option value="<?php echo $provider->name; ?>"><?php echo $provider->name; ?></option>
                                                        <?php
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="supplier" class="col-lg-2 control-label">Nombre producto*</label>
                                                <div class="col-md-6">
                                                <select onchange="seleccionarProducto()" name="product" id="product" class="product form-control formulario1 mb-5" required>
                                                    
                                                        <?php foreach($products as $product):?>
                                                            <option <?php if($product->id_product == $inventoryf->product):?> <?php echo "selected"?> <?php endif ?> value="<?php echo $product->id_product; ?>"><?php echo $product->name_product; ?></option>
                                                        <?php endforeach ?>
                                                    </select>
                                                </div>
                                            </div>
                                            
                                            <!-- <div class="form-group">
                                                <label for="amount" class="col-lg-2 control-label">Cantidad</label>
                                                <div class="col-md-6">
                                                    <input type="text" name="amount" value="<?php echo $inventoryf->amount; ?>" class="form-control" id="amount" placeholder="Cantidad" required>
                                                </div>
                                            </div> -->
                                            
                                            <div class="form-group p-0 ">
                                                <label for="amount" class="col-md-12 control-label mb-4"style="text-align:center;" >Cantidad*</label>
                                                <div class="row">
                                                    <?php $arreglo = explode("<br>", $inventoryf->amount);?>
                                                    <?php $larreglo = count($arreglo);  ?>
                                                    <input type="hidden" name="inputTotal" value="<?php echo $larreglo?>">

                                                    <div class="col-md-4 text-left" id="miDiv">
                                                         <?php $i=0;?>
                                                        <?php foreach($arreglo as $val):?>
                                                        
                                                            <?php $val2 = explode("=", $val);?>
                                                           
                                                            <div style="margin: 6px;">
                                                                <input type="text" name="inputE<?php echo $i ?>" value="<?php echo $val2[0]?>" readonly class="text-right" style="margin-right: 4px; border: none;">
                                                                    
                                                                </input>
                                                                
                                                            </div>
                                                            <?php $i=$i+1; ?>
                                                        <?php endforeach ?>
                                                    </div>
                                                    
                                                    <div class="col-md-6" id="miDiv2">
                                                        <?php $i=0;?>
                                                        <?php foreach($arreglo as $val):?>
                                                            
                                                            <?php $val2 = explode("=", $val);?>
                                                            <div style="margin: 3px;">
                                                                <input type="number" name="inputP<?php echo $i ?>" value="<?php echo $val2[1] ?>" required>
                                                                   
                                                                </input>
                                                                
                                                            </div>
                                                            <?php $i=$i+1; ?>
                                                        <?php endforeach ?>
                                                    
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            
                                            
                                            <div class="form-group">
                                                <label for="decrease" class="col-lg-2 control-label">Merma en kg</label>
                                                <div class="col-md-6">
                                                    <input type="number" name="decrease" value="<?php echo $inventoryf->decrease; ?>" class="form-control" id="decrease" placeholder="Disminuir" min="1" max="5000" required>
                                                </div>
                                            </div>    
                                            <div class="form-group">
                                                <div class="col-lg-offset-2 col-lg-10">
                                                    <input type="hidden" name="id_inventory" value="<?php echo $inventoryf->id_inventory;?>">
                                                    <button type="submit" class="btn btn-primary">Actualizar registro</button><a href="#" class="btn btn-danger" style="margin-left: 7px;" data-dismiss="modal"><i class="fa fa-times"> </i>&nbsp&nbspCancelar</a>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php
            }else{
                echo "<p class='alert alert-danger'>No hay invetanario catalogado</p>";
            }
        ?>
        </div>
    </div>
    
</section>

<script>
    
        
        
        
        function viewPresentations(productSelect) {
            console.log("ingreso a funcion");
            var productSelect = productSelect.value;
            console.log("producto: ",productSelect);
            
            var settings = {
                "url": "https://api.gestionproyectos.narino.gov.co/"+"productos_dpto_narino?linkTo=id_product&equalTo="+productSelect,
                "method": "GET",
                "timeout": 0
            }
        
            $.ajax(settings).done(function (response) {
                

                if(response.status == 200){
                    console.log("response: ",response.results[0].presentation);
                    var presentations=JSON.parse(response.results[0].presentation);
                    console.log(presentations);
                    
                    var miDiv = document.getElementById("miDiv");
                    miDiv.innerHTML = "";
                    
                    var miDiv2 = document.getElementById("miDiv2");
                    miDiv2.innerHTML = "";
                    
                    
                    var inputTotal = document.createElement("input");
                    inputTotal.type = "hidden";
                    inputTotal.name = "inputTotal";
                    inputTotal.value = presentations.length;
                    
                    for (let i = 0; i < presentations.length; i++) {
                        
                        var div = document.createElement("div");
                        div.style.margin = "6px";
                        
                        var div2 = document.createElement("div");
                        div2.style.margin = "3px";
                        
                        var etiquetainput = document.createElement("input");
                        etiquetainput.style.marginRight = "4px";
                        etiquetainput.setAttribute("type", "text");
                        etiquetainput.value = presentations[i].name;
                        etiquetainput.name = "inputE"+i;
                        etiquetainput.readOnly = true;
                        etiquetainput.style.border = "none";
                        etiquetainput.classList.add('text-right');
                        
                        var input = document.createElement("input");
                        input.type = "number";
                        input.name = "inputP"+i;
                        input.required = true;
                        
                        div.appendChild(etiquetainput);
                        div2.appendChild(input);
                        
                        miDiv.appendChild(div);
                        miDiv2.appendChild(div2);
                          
                    }
                    miDiv.appendChild(inputTotal);
                    
                };
            });
        };
    
    
    
</script>