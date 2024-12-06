
<?php 
    $u = UserData::getById($_SESSION["user_id"]);
    //print_r($u);
    
    if($u->kind==1 or $u->kind==6 or $u->kind==5 ):
        $category = categorias_ProductosDptoData::getAll();
        $municipality = MunicipalityData::getAll();
        $presentations = presentationsData::getAll();
    ?>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <h1>Productos Agrotic Nariño</h1>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal">
                    Nuevo Producto
                </button>
                
                <a href="plantillaProductos?idmu=<?php echo $u->id_userMunicipality ?>" class="btn btn-danger" id="export_data" name="export_data"><span class="fa fa-plus-square"> </span> Exportar a excel</a>

                
                <!-- Modal NUEVO PRODUCTO-->
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Nuevo Producto</h4>
                        </div>
                        <div class="modal-body">
                            <form class="form-horizontal" enctype="multipart/form-data" method="post" id="addproducto" action="./?action=productosDpto&opt=add" role="form">
                            
                                <?php 
                                    $countProductsRegistrer=0;
                                    $productonew = productosDptoData::getAlls();
                                    foreach($productonew as $productonews){$countProductsRegistrer++;}
                                    $countProductsRegistrer++;
                                ?>
                                <input type="hidden" name="id_productNew" id="id_productNew"  value="<?php echo $countProductsRegistrer;?>">
                                
                                <!--Nombre de producto -->
                                <div class="form-group">
                                    <label for="name_product" class="col-lg-2 control-label">Nombre producto*</label>
                                    <div class="col-md-6">
                                        <input type="text" name="name_product" required class="form-control" id="name_product" placeholder="Nombre" minlength="3" maxlength="24">
                                    </div>
                                </div>
                                
                                <!-- Nombre científico de producto -->
                                <div class="form-group">
                                    <label for="scientific_name" class="col-lg-2 control-label">Nombre científico*</label>
                                    <div class="col-md-6">
                                        <input type="text" name="scientific_name" value="<?php echo $producto->scientific_name;?>" required class="form-control" id="scientific_name" placeholder="Nombre científico" minlength="3" maxlength="24">
                                    </div>
                                </div>
                                
                                <!-- Variedad de producto -->
                                <div class="form-group">
                                    <label for="various" class="col-lg-2 control-label">Variedad de producto (opcional)</label>
                                    <div class="col-md-6">
                                        <input type="text" name="various" value="<?php echo $producto->various;?>" class="form-control" id="various" placeholder="Variedad" minlength="3" maxlength="24">
                                    </div>
                                </div>
                                
                                <!--Imagen -->
                                <div class="form-group">
                                    <label for="image" class="col-sm-3 control-label">Imagen* (tamaño recomendado es de 900x500 píxeles)</label>
                                    <div class="col-md-9 fileinput fileinput-new" data-provides="fileinput">
                                        
                                        <div>
                                            <span class="btn btn-info btn-file"><span class="fileinput-new">Seleccione una imagen</span>
                                            <input type="file" name="image" id="image" required accept="image/png,image/jpeg,image/jpg,image/gif" />
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Municipio -->
                                <div class="form-group">
                                    <label for="municipioId" class="col-lg-2 control-label">Municipio *</label>
                                    <div class="col-md-6">
                                        <select name="municipioId" id="municipioId" class="form-control formulario1 mb-5" required rows="3">
                                            <option value="">-- Seleccione un municipio --</option>
                                            <?php foreach($municipality as $municipalitiess){?>
                                                <?php if($municipalitiess->id_municipality == 28 or $municipalitiess->id_municipality == 61 or $municipalitiess->id_municipality == 64){?>
                                                    <option value="<?php echo $municipalitiess->id_municipality; ?>"><?php echo $municipalitiess->name_municipality; ?></option>
                                                <?php } ?>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                
                                
                                <!-- Categoría -->
                                <div class="form-group">
                                    <label for="id_category_product" class="col-lg-2 control-label">Categoria *</label>
                                    <div class="col-md-6">
                                        <select name="id_category_product" id="id_category_product" class="form-control formulario1 mb-5" required rows="3">
                                            <option value="">-- Seleccione una categoría --</option>
                                            <?php foreach($category as $clases){ ?>
                                                <option value="<?php echo $clases->id_category; ?>">
                                                    <?php 
                                                    if($clases->id_municipality_category == 28){
                                                        echo "Ipiales - ".$clases->name_category;
                                                    }elseif($clases->id_municipality_category == 61){
                                                        echo "Tumaco - ".$clases->name_category;
                                                    }elseif($clases->id_municipality_category == 64){
                                                        echo "Pasto - ".$clases->name_category;

                                                    } 
                                                    ?>
                                                    
                                                </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                <!-- Presentaciones-->
                                
                                <div class="form-group">
                                    <label for="presentation" class="col-lg-2 control-label">Presentaciones*</label>
                                    
                                    <div class="col-md-3">
                                         <select name="presentation[]" id="presentation"  multiple aria-label="multiple select example">
                                            <?php foreach($presentations as $presentation):?>
                                                <option  value="<?php echo $presentation->name.",".$presentation->grams; ?>">
                                                    <?php echo $presentation->name;?>
                                                </option>
                                            <?php endforeach?>
                                        </select>
                                    </div>
                                </div>
                                                

                                <div class="form-group">
                                    <label for="description" class="col-lg-2 control-label">Descripcion*</label>
                                    <div class="col-md-10">
                                        <textarea name="description" required rows="4" class="form-control" id="description" placeholder="Descripcion Breve"  minlength="20" maxlength="800"></textarea>
                                    </div>
                                </div>

                                

                                <div class="form-group">
                                    <label for="url_product" class="col-lg-2 control-label">Url producto*</label>
                                    <div class="col-md-10">
                                        <input type="text" name="url_product" required class="form-control" id="url_product" placeholder="Url producto" minlength="3" maxlength="15">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="enabled" class="col-lg-4 control-label" >Activo ?</label>
                                    <div class="col-md-6">
                                        <div class="checkbox">
                                            <label>
                                            <input type="checkbox" name="enabled" > 
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-lg-offset-2 col-lg-10">
                                        <button type="submit" class="btn btn-primary">Agregar Producto</button><a href="#" class="btn btn-danger" style="margin-left: 7px;" data-dismiss="modal"><i class="fa fa-times"> </i>&nbsp&nbspCancelar</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <br><br>
            
            <?php
                $productos = productosDptoData::getAll();
                $presentations = presentationsData::getAll();
                
                if(count($productos)>0){
                    // si hay productos
                    ?>
                    <div class="box box-primary">
                        <div class="box-body">
                            <table class="table table-bordered table-hover datatable">
                                <thead>
                                    <th>Cod.</th>
                                    <th>imagen</th>
                                    <th>Producto</th>
                                    <th>Municipio</th>
                                    <th>Visitas</th>
                                    <th>Estado</th>
                                    <th></th>
                                </thead>
                                <?php
                                $id_aux=0;
                                foreach($productos as $producto){
                                    ?>
                                    <?php if($u->kind==1 or $u->id_userMunicipality==$producto->municipioId): ?>
                                    <?php //if(($u->id_userMunicipality==$producto->municipioId) or $u->kind==1 or $u->id==29): ?>

                                        <tr>
                                            <td><?php echo $producto->id_product; ?></td>
                                            <td><img src="./../images/products/<?php echo $producto->image;?>" style="width:90px;height:70px" > </td>
                                            <td><?php echo $producto->name_product; ?></td>
                                            
                                            
                                            <td>
                                                <?php foreach(MunicipalityData::getAll() as $g):?>
                                                    <?php if($producto->municipioId==$g->id_municipality){ echo "$g->name_municipality";}
                                                endforeach; ?>
                                            </td>
                                            <td><?php echo $producto->view; ?></td>
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
                                                <a href="./?action=productosDpto&opt=del&idcitorga=<?php echo base64_encode($producto->id_product);?>" class="btn btn-danger btn-xs">Eliminar</a>
                                            </td>
                                        </tr>
                                    <?php endif ?>
                                    
                                    <?php
                                    $id_aux++;
                                    }
                                    ?>
                            </table>
                            
                            
                            
                            <?php foreach($productos as $producto):?>
                            
                            
                            <!-- Modal EDITAR PRODUCTO -->
                            
                            <div class="modal fade" id="editModal<?php echo $producto->id_product; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel">Editar Producto</h4></br>
                                        </div>
                                        <div class="modal-body">
                                            <form class="form-horizontal" enctype="multipart/form-data" method="post" id="addproduct" action="./?action=productosDpto&opt=update" role="form">
                                                <input type="hidden" name="id_productNew" id="id_productNew"  value="<?php echo $countProductsRegistrer;?>">

                                                <!-- Nombre de producto -->
                                                <div class="form-group">
                                                    <label for="name_product" class="col-lg-2 control-label">Nombre producto*</label>
                                                    <div class="col-md-6">
                                                        <input type="text" name="name_product" value="<?php echo $producto->name_product;?>" required class="form-control" id="name_product" placeholder="Nombre" minlength="3" maxlength="24">
                                                    </div>
                                                </div>
                                                
                                                <!-- Nombre científico de producto -->
                                                <div class="form-group">
                                                    <label for="scientific_name" class="col-lg-2 control-label">Nombre científico*</label>
                                                    <div class="col-md-6">
                                                        <input type="text" name="scientific_name" value="<?php echo $producto->scientific_name;?>" required class="form-control" id="scientific_name" placeholder="Nombre científico" minlength="3" maxlength="24">
                                                    </div>
                                                </div>
                                                
                                                <!-- Variedad de producto -->
                                                <div class="form-group">
                                                    <label for="various" class="col-lg-2 control-label">Variedad de producto (opcional)</label>
                                                    <div class="col-md-6">
                                                        <input type="text" name="various" value="<?php echo $producto->various;?>" class="form-control" id="various" placeholder="Variedad" minlength="3" maxlength="24">
                                                    </div>
                                                </div>
                                                
                                                <!-- Imagen -->
                                                <input type="hidden" class="form-control" id="slide_img_aux" value="<?php echo $producto->image;?>" name="slide_img_aux">
                                                <div class="form-group">
                                                    <label for="image" class="col-sm-3 control-label">Tamaño recomendado es de 900 x 500 píxeles.</label>
                                                    <div class="col-md-9 fileinput fileinput-new" data-provides="fileinput">
                                                        <div class="fileinput-new thumbnail" style="max-width: 50%;" >
                                                            <img class="img-rounded" src="./../images/products/<?php echo $producto->image;?>" />
                                                        </div>
                                                        <div>
                                                            <span class="btn btn-info btn-file"><span class="fileinput-new">Arrastre o Seleccione una imagen</span>
                                                            <input type="file" name="image" id="image" accept="image/png,image/jpeg,image/jpg,image/gif" />
                                                        </div>
                                                    </div>
                                                </div>
                                                

                                               
                                                
                                               
                                                <!-- Categoria -->
                                                <div class="form-group ">
                                                    <label for="id_category_product" class="col-lg-2 control-label">Categoria *</label>
                                                    <div class="col-md-6">
                                                        
                                                        <select name="id_category_product" id="id_category_product" class="form-control formulario1 mb-5" required rows="3">
                                                        <option value="">-- Seleccione una categoría --</option>
                                                            <?php foreach(categorias_ProductosDptoData::getAll() as $g):?>
                                                                <?php if($g->id_municipality_category == $producto->municipioId):?> 
                                                                    <option value="<?php echo $g->id_category;  ?>" <?php if($producto->id_category_product==$g->id_category){ echo "selected"; }?>><?php echo $g->name_category; ?></option>
                                                                <?php endif; ?> 
                                                            <?php endforeach; ?>    

                                                            <?php foreach($category as $clases){?>
                                                                <?php if($category->id_municipality_category == $producto->municipioId):?> 
                                                                    <option value="<?php echo $clases->id_category; ?>"><?php echo $clases->name_category; ?></option>
                                                                <?php endif; ?> 

                                                            <?php
                                                                }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                
                                                <!-- Presentaciones -->
                                                
                                                <div class="form-group">
                                                    <div class="row">
                                                        <label for="presentation" class="col-lg-2 control-label">Presentación*</label>
                                                    </div>
                                                
                                                    <div class="container-fluid">
                                                        <div class="col-md-10 mb-3" style="margin-bottom: 2rem; margin-top: 2rem;">
                                                            <a class="btn btn-info" onclick="agregarNuevaPresentacion(<?php echo $producto->id_product; ?>)"><span class="">Agregar nueva presentación</span></a>
                                                        </div>
                                                
                                                        <?php foreach(json_decode($producto->presentation) as $key=>$value):?>
                                                            <div class="col-md-3 ps-md-5">
                                                                <select class="form-select" class="" readonly>
                                                                    <option><?php echo $value->name?></option>
                                                                </select>
                                                            </div> 
                                                            <div class="col-md-3" style="margin-bottom: 1rem;">
                                                                <input class="mt-md-3" value="<?php echo $value->incrementPrice?>" readonly></input>
                                                            </div>
                                                        <?php endforeach?>
                                                
                                                        <div class="col-md-3 incrementarPres">
                                                            <div class="col-md-12 ps-md-5">
                                                                <select class="form-select w-50" >
                                                                    <option selected disabled>Seleccione presentación</option>
                                                                    <?php foreach($presentations as $presentation):?>
                                                                        <option value="<?php echo $presentation->name?>"><?php echo $presentation->name?></option>
                                                                    <?php endforeach?>
                                                                </select>
                                                            </div>
                                                            
                                                            <div class="col-md-12 ps-md-5">
                                                                <select class="form-select w-50" >
                                                                    <option selected disabled>Seleccione presentación</option>
                                                                    <?php foreach($presentations as $presentation):?>
                                                                        <option value="<?php echo $presentation->name?>"><?php echo $presentation->name?></option>
                                                                    <?php endforeach?>
                                                                </select>
                                                            </div>
                                                      
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                
                                        
                                                
                                                

                                                <!-- Descripción -->
                                                <div class="form-group">
                                                    <label for="description" class="col-lg-2 control-label">Descripcion Breve*</label>
                                                    <div class="col-md-10">
                                                        <textarea name="description" required rows="10" class="form-control" id="description" placeholder="Descripcion Breve"  minlength="20" maxlength="300"><?php echo $producto->description;?></textarea>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="clase" class="col-lg-2 control-label">Municipio *</label>
                                                    <div class="col-md-6">
                                                        <select name="municipioId" id="municipioId" class="form-control formulario1 mb-5" required rows="5">
                                                            <option value="<?php echo $producto->municipioId;?>" selected><?php echo $producto->municipioId;?></option>
                                                            <option value="">-- Seleccione un municipio --</option>
                                                            <?php foreach(MunicipalityData::getAll() as $g):?>
                                                                <option value="<?php echo $g->id_municipality;  ?>" <?php if($producto->municipioId==$g->id_municipality){ echo "selected"; }?>><?php echo $g->name_municipality; ?></option>
                                                            <?php endforeach; ?>
                                                            <?php foreach($municipality as $municipalitiess){
                                                            ?>
                                                                <option value="<?php echo $municipalitiess->id_municipality; ?>"><?php echo $municipalitiess->name_municipality; ?></option>
                                                            <?php
                                                                }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="url_product" class="col-lg-2 control-label">Url producto*</label>
                                                    <div class="col-md-6">
                                                        <input type="text" name="url_product" value="<?php echo $producto->url_product;?>" required class="form-control" id="url_product" placeholder="Url producto" minlength="3" maxlength="15">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="enabled" class="col-lg-4 control-label" >Está activo?</label>
                                                    <div class="col-md-6">
                                                        <div class="checkbox">
                                                            <label>
                                                            <input type="checkbox" name="enabled" <?php if($producto->enabled==1){ echo "checked";}?>> 
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="col-lg-offset-2 col-lg-10">
                                                        <input type="hidden" name="id_product" value="<?php echo $producto->id_product;?>">
                                                        <button type="submit" class="btn btn-primary">Actualizar Producto</button><a href="#" class="btn btn-danger" style="margin-left: 7px;" data-dismiss="modal"><i class="fa fa-times"> </i>&nbsp&nbspCancelar</a>
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
                    echo "<p class='alert alert-danger'>No hay productos</p>";
                }
            ?>
            </div>
        </div>
    </section>
<?php endif;?>


<script>
    function agregarNuevaPresentacion(idp) {
  var selectElement = document.createElement("select");
  selectElement.classList.add("form-select");

  var defaultOption = document.createElement("option");
  defaultOption.setAttribute("selected", "selected");
  defaultOption.setAttribute("disabled", "disabled");
  defaultOption.textContent = "Seleccione presentación";
  selectElement.appendChild(defaultOption);

  // Agregar opciones al select
  <?php foreach($presentations as $presentation):?>
    var option = document.createElement("option");
    option.value = "<?php echo $presentation->name?>";
    option.textContent = "<?php echo $presentation->name?>";
    selectElement.appendChild(option);
  <?php endforeach?>

  var incrementarPresDiv = document.querySelector("#editModal"+idp+" .incrementarPres");
  incrementarPresDiv.appendChild(selectElement);
}
</script>
