<?php 
    //$municipality = MunicipalityData::getAll();
    //$departaments = DepartamentsData::getAll();
    //$products = productosDptoNarinoData::getAll();
?>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <h1>Productores</h1>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal">
                Nuevo productor
            </button>
            <!-- Modal -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Nuevo productor</h4>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal" enctype="multipart/form-data" method="post" id="addaproducers" action="./?action=producers&opt=add" role="form">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="names" class="col-lg-4 control-label">Nombre Productor*</label>
                                        <div class="col-md-8">
                                            <input type="text" name="names" required class="form-control" id="names" placeholder="Nombre productor" minlength="3" maxlength="50">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="cedula" class="col-lg-4 control-label">Cédula*</label>
                                        <div class="col-md-8">
                                            <input type="text" name="cedula" required class="form-control" id="cedula" placeholder="Cédula" minlength="3" maxlength="50">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="position" class="col-lg-2 control-label">Cargo*</label>
                                <div class="col-md-6">
                                    <input type="text" name="position" required class="form-control" id="position" placeholder="Cargo en la empresa" minlength="3" maxlength="50">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="phone" class="col-lg-4 control-label">Número contacto*</label>
                                        <div class="col-md-6">
                                            <input type="text" name="phone" required class="form-control" id="phone" placeholder="Número de contacto" minlength="10" maxlength="10">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="establishment" class="col-lg-4 control-label">Nombre de la Finca*</label>
                                        <div class="col-md-8">
                                            <input type="text" name="establishment" class="form-control" id="establishment" required placeholder="Nombre de la Finca" minlength="3" maxlength="50">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="image" class="col-sm-3 control-label">Tamaño recomendado es de 900 x 500 píxeles.</label>
                                <div class="col-md-9 fileinput fileinput-new" data-provides="fileinput">
                                    <div class="fileinput-new thumbnail" style="max-width: 50%;" >
                                        <img class="img-rounded" src="uploads/productos/logogober1.png" />
                                    </div>
                                    <div>
                                        <span class="btn btn-info btn-file"><span class="fileinput-new">Arrastre o Seleccione una imagen</span>
                                        <input type="file" name="image" id="image" required accept="image/png,image/jpeg,image/jpg,image/gif" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="products" class="col-lg-2 control-label">Productos *</label>
                                <div class="col-md-6">
                                <span class="" > Seleccione al menos un producto (Presione Ctrl para seleccionar varias)</span>
                                    <select name="products[]" class="form-control formulario1 mb-5" multiple required rows="7">
                                        <option value="">-- Seleccione al menos un producto --</option>
                                        <?php
                                            $products = productosDptoNarinoData::getAll();
                                            foreach($products as $product){
                                        ?>
                                            <option value="<?php echo $product->name_product; ?>"><?php echo $product->name_product; ?></option>
                                        <?php
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <label for="address" class="col-lg-2 control-label">Dirección*</label>
                                <div class="col-md-6">
                                    <input type="text" name="address" class="form-control" id="address" required placeholder="Dirección" minlength="3" maxlength="50">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="clase" class="col-lg-4 control-label">Departamento *</label>
                                        <div class="col-md-8">
                                            <select name="department" id="department" class="form-control formulario1 mb-5" required rows="3">
                                                <option value="">-- Seleccione un departamento --</option>
                                                <?php
                                                    $departaments = DepartamentsData::getAll();
                                                    foreach($departaments as $departament){
                                                ?>
                                                    <option value="<?php echo $departament->departament; ?>"><?php echo $departament->departament; ?></option>
                                                <?php
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="clase" class="col-lg-4 control-label">Municipio *</label>
                                        <div class="col-md-8">
                                            <select name="municipality" id="municipality" class="form-control formulario1 mb-5" required rows="3">
                                                <option value="">-- Seleccione un municipio --</option>
                                                <?php 
                                                    $municipality = MunicipalityData::getAll();
                                                    foreach($municipality as $municipalitiess){
                                                ?>
                                                    <option value="<?php echo $municipalitiess->name_municipality; ?>"><?php echo $municipalitiess->name_municipality; ?></option>
                                                <?php
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="clase" class="col-lg-2 control-label">Zona *</label>
                                <div class="col-md-6">
                                    <select name="location_area" id="location_area" class="form-control formulario1 mb-5" required rows="3">
                                        <option value="">-- Seleccione una zona --</option>
                                        <option value="Rural">Rural</option>
                                        <option value="Urbana">Urbana</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="geographic_location" class="col-lg-2 control-label">Ubicación geográfica*</label>
                                <div class="col-md-6">
                                    <input type="text" name="geographic_location" class="form-control" id="geographic_location" required placeholder="Ubicación geográfica" minlength="10" maxlength="30">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="status" class="col-lg-4 control-label" >Activo ?</label>
                                <div class="col-md-6">
                                    <div class="checkbox">
                                        <label>
                                        <input type="checkbox" name="status" > 
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-offset-2 col-lg-10">
                                    <button type="submit" class="btn btn-primary">Agregar productor</button><a href="#" class="btn btn-danger" style="margin-left: 7px;" data-dismiss="modal"><i class="fa fa-times"> </i>&nbsp&nbspCancelar</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <br><br>
        <?php
            $producers = ProducersData::getAll();
            if(count($producers)>0){
                // si hay productores
                ?>
                <div class="box box-primary">
                    <div class="box-body">
                        <table class="table table-bordered table-hover datatable">
                            <thead>
                                <th>Nombre</th>
                                <th>Finca</th>
                                <th>Dirección</th>
                                <th>Ubicación geográfica</th>
                                <th>Número teléfono</th>
                                <th>Municipio</th>
                                <th>Estado</th>
                                <th></th>
                            </thead>
                            <?php
                            foreach($producers as $producer){
                                ?>
                                <tr>
                                    <td><?php echo $producer->names; ?></td>
                                    <td><?php echo $producer->establishment; ?></td>
                                    <td><?php echo $producer->address; ?></td>
                                    <td><?php echo $producer->geographic_location; ?></td>
                                    <td><?php echo $producer->phone; ?></td>
                                    <td><?php echo $producer->municipality; ?></td>
                                    <td>
                                        <?php if($producer->status==1):?>
                                            <i class="glyphicon glyphicon-ok"></i>
                                        <?php endif; ?>
                                        <?php if($producer->status==0):?>
                                            <i class="glyphicon glyphicon-remove"></i>
                                        <?php endif; ?>
                                    </td>
                                    <td style="width:130px;">
                                        <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#editModal<?php echo $producer->id_producers; ?>">
                                            Editar
                                        </button>
                                        <a href="./?action=producers&opt=del&idcitorga=<?php echo base64_encode($producer->id_producers);?>" class="btn btn-danger btn-xs">Eliminar</a>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </table>
                        <?php foreach($producers as $producer):?>
                        <!-- Modal -->
                        <div class="modal fade" id="editModal<?php echo $producer->id_producers; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel">Editar productor</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form class="form-horizontal" enctype="multipart/form-data" method="post" id="addproducer" action="./?action=producers&opt=update" role="form">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="names" class="col-lg-4 control-label">Nombre productor*</label>
                                                        <div class="col-md-8">
                                                            <input type="text" name="names" value="<?php echo $producer->names;?>" required class="form-control" id="names" placeholder="Nombre productor" minlength="3" maxlength="50">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="cedula" class="col-lg-4 control-label">Cédula*</label>
                                                        <div class="col-md-8">
                                                            <input type="text" name="cedula" value="<?php echo $producer->nroIdentification;?>" required class="form-control" id="cedula" placeholder="Cédula" minlength="3" maxlength="50">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="position" class="col-lg-2 control-label">Cargo*</label>
                                                <div class="col-md-6">
                                                    <input type="text" name="position" value="<?php echo $producer->position;?>" required class="form-control" id="position" placeholder="Cargo en la empresa" minlength="3" maxlength="50">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="phone" class="col-lg-4 control-label">Número contacto*</label>
                                                        <div class="col-md-6">
                                                            <input type="text" name="phone" value="<?php echo $producer->phone;?>" required class="form-control" id="phone" placeholder="Número de contacto" minlength="10" maxlength="10">
                                                        </div>
                                                    </div>
                                                </div>   
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="establishment" class="col-lg-4 control-label">Nombre de la Finca*</label>
                                                        <div class="col-md-8">
                                                            <input type="text" name="establishment" value="<?php echo $producer->establishment;?>" required class="form-control" id="establishment" placeholder="Nombre de la Finca" minlength="3" maxlength="50">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="hidden" class="form-control" id="slide_img_aux" value="<?php echo $producer->image;?>" name="slide_img_aux">
                                            <div class="form-group">
                                                <label for="imagen" class="col-sm-3 control-label">Tamaño recomendado es de 900 x 500 píxeles.</label>
                                                <div class="col-md-9 fileinput fileinput-new" data-provides="fileinput">
                                                    <div class="fileinput-new thumbnail" style="max-width: 50%;" >
                                                        <img class="img-rounded" src="uploads/producers/<?php echo $producer->image;?>" style="width:190px;height:190px" />
                                                    </div>
                                                    <div>
                                                        <span class="btn btn-info btn-file"><span class="fileinput-new">Arrastre o Seleccione una imagen</span>
                                                        <input type="file" name="image" id="image" accept="image/png,image/jpeg,image/jpg,image/gif" />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-sm-3 col-xs-3">
                                                <span class="help-block-regalias text-muted-regalias small-font-regalias" > Sus productos</span>
                                                <textarea rows="4" cols=""  class="form-control" name="ProductAux" readonly><?php echo $producer->products;?></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="products" class="col-lg-2 control-label">Productos *</label>
                                                <div class="col-md-6">
                                                <span class="" > Seleccione al menos un producto (Presione Ctrl para seleccionar varias)</span>
                                                    <select name="products[]" class="form-control formulario1 mb-5" multiple rows="7">
                                                        <option value="">-- Seleccione al menos un producto --</option>
                                                        <?php foreach($products as $product){
                                                        ?>
                                                            <option value="<?php echo $product->name_product; ?>"><?php echo $product->name_product; ?></option>
                                                        <?php
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <input type="hidden" id="Aux" name="Aux" value ="<?php echo $producer->products;?>" />

                                            <div class="form-group">
                                                <label for="address" class="col-lg-2 control-label">Dirección*</label>
                                                <div class="col-md-6">
                                                    <input type="text" name="address" class="form-control" id="address" value="<?php echo $producer->address;?>" required placeholder="Dirección" minlength="3" maxlength="50">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="clase" class="col-lg-4 control-label">Departamento *</label>
                                                        <div class="col-md-8">
                                                            <select name="department" id="department" class="form-control formulario1 mb-5" required rows="3">
                                                                <option value="<?php echo $producer->department;?>" selected><?php echo $producer->department;?></option>
                                                                <option value="">-- Seleccione un departamento --</option>
                                                                <?php foreach($departaments as $departament){
                                                                ?>
                                                                    <option value="<?php echo $departament->departament; ?>"><?php echo $departament->departament; ?></option>
                                                                <?php
                                                                    }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="clase" class="col-lg-4 control-label">Municipio *</label>
                                                        <div class="col-md-8">
                                                            <select name="municipality" id="municipality" class="form-control formulario1 mb-5" required rows="3">
                                                                <option value="<?php echo $producer->municipality;?>" selected><?php echo $producer->municipality;?></option>
                                                                <option value="">-- Seleccione un municipio --</option>
                                                                <?php foreach($municipality as $municipalitiess){
                                                                ?>
                                                                    <option value="<?php echo $municipalitiess->name_municipality; ?>"><?php echo $municipalitiess->name_municipality; ?></option>
                                                                <?php
                                                                    }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="clase" class="col-lg-4 control-label">Zona *</label>
                                                        <div class="col-md-8">
                                                            <select name="location_area" id="location_area" class="form-control formulario1 mb-5" required rows="3">
                                                                <option value="<?php echo $producer->location_area;?>" selected><?php echo $producer->location_area;?></option>
                                                                <option value="">-- Seleccione una zona --</option>
                                                                <option value="Rural">Rural</option>
                                                                <option value="Urbana">Urbana</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="geographic_location" class="col-lg-4 control-label">Ubicación geográfica*</label>
                                                        <div class="col-md-8">
                                                            <input type="text" name="geographic_location" class="form-control" id="geographic_location" value="<?php echo $producer->geographic_location;?>" required placeholder="Ubicación geográfica" minlength="10" maxlength="30">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="status" class="col-lg-4 control-label" >Está activo?</label>
                                                <div class="col-md-6">
                                                    <div class="checkbox">
                                                        <label>
                                                        <input type="checkbox" name="status" <?php if($producer->status==1){ echo "checked";}?>> 
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-lg-offset-2 col-lg-10">
                                                    <input type="hidden" name="id_producers" value="<?php echo $producer->id_producers;?>">
                                                    <button type="submit" class="btn btn-primary">Actualizar productor</button><a href="#" class="btn btn-danger" style="margin-left: 7px;" data-dismiss="modal"><i class="fa fa-times"> </i>&nbsp&nbspCancelar</a>
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
                <a href="plantillaProducers" class="btn btn-success" id="export_data" name="export_data"><span class="fa fa-plus-square"> </span> Exportar productores</a>
                                
            <?php
            }else{
                echo "<p class='alert alert-danger'>No hay Productores</p>";
            }
        ?>
        </div>
    </div>
</section>