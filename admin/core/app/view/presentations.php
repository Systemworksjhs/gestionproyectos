
<?php $u = UserData::getById($_SESSION["user_id"]); ?>
<?php if($u->kind==1 or $u->kind==6):?>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <h1>Presentaciones</h1>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal">
                Nueva presentación
            </button>
            <!-- Modal nueva presentación -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Nueva presentación</h4>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal" enctype="multipart/form-data" method="post" id="addproviders" action="./?action=providers&opt=add" role="form">
                            <div class="form-group">
                                <label for="name" class="col-lg-2 control-label">Nombre de la presentación*</label>
                                <div class="col-md-6">
                                    <input type="text" name="name" required class="form-control" id="name" placeholder="Nombre" minlength="3" maxlength="60">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="nit" class="col-lg-2 control-label">Gramaje*</label>
                                <div class="col-md-6">
                                    <input type="text" name="nit" required class="form-control" id="nit" placeholder="Nit" minlength="7" maxlength="13">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <div class="col-lg-offset-2 col-lg-10">
                                    <button type="submit" class="btn btn-primary">Crear presentación</button><a href="#" class="btn btn-danger" style="margin-left: 7px;" data-dismiss="modal"><i class="fa fa-times"> </i>&nbsp&nbspCancelar</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <br><br>
        <?php
            $providers = providersData::getAll();
            if(count($providers)>0){
                // si hay proveedores
                ?>
                <div class="box box-primary">
                    <div class="box-body">
                        <table class="table table-bordered table-hover datatable">
                            <thead>
                                <th>Id</th>
                                <th>Nombres</th>
                                <th>Imagen</th>
                                <th>Nit</th>
                                <th>Teléfono</th>
                                <th>Dirección</th>
                                <th>Municipio</th>
                                <th>Estado</th>
                                <th></th>
                            </thead>
                            <?php
                            $id_aux=0;
                            foreach($providers as $provider){
                                ?>
                                <tr>
                                    <td><?php echo $provider->id_provider; ?></td>
                                    <td><?php echo $provider->name; ?></td>
                                    <td><img src="uploads/providers/<?php echo $provider->image;?>" style="width:90px;height:70px" > </td>
                                    <td><?php echo $provider->nit; ?></td>
                                    <td><?php echo $provider->phone; ?></td>
                                    <td><?php echo $provider->address; ?></td>
                                    <td><?php echo $provider->municipality; ?></td>
                                    <td>
                                        <?php if($provider->status==1):?>
                                            <i class="glyphicon glyphicon-ok"></i>
                                        <?php endif; ?>
                                        <?php if($provider->status==0):?>
                                            <i class="glyphicon glyphicon-remove"></i>
                                        <?php endif; ?>
                                    </td>
                                    <td style="width:130px;">
                                        <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#editModal<?php echo $provider->id_provider; ?>">
                                        Editar
                                    </button>
                                        <a href="./?action=providers&opt=del&idcitorga=<?php echo base64_encode($provider->id_provider);?>" class="btn btn-danger btn-xs">Eliminar</a>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </table>
                        <?php foreach($providers as $provider):?>
                        <!-- Modal -->
                        <div class="modal fade" id="editModal<?php echo $provider->id_provider; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel">Editar Proveedor</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form class="form-horizontal" enctype="multipart/form-data" method="post" id="addproviderss" action="./?action=providers&opt=update" role="form">
                                            <div class="form-group">
                                                <label for="name" class="col-lg-2 control-label">Nombre proveedor*</label>
                                                <div class="col-md-6">
                                                    <input type="text" name="name" value="<?php echo $provider->name;?>" required class="form-control" id="name" placeholder="Nombre" minlength="3" maxlength="60">
                                                </div>
                                            </div>
                                            <input type="hidden" class="form-control" id="slide_img_aux" value="<?php echo $provider->image;?>" name="slide_img_aux">
                                            <div class="form-group">
                                                <label for="image" class="col-sm-3 control-label">Tamaño recomendado es de 900 x 500 píxeles.</label>
                                                <div class="col-md-9 fileinput fileinput-new" data-provides="fileinput">
                                                    <div class="fileinput-new thumbnail" style="max-width: 50%;" >
                                                        <img class="img-rounded" src="uploads/providers/<?php echo $provider->image;?>" style="width:190px;height:210px" />
                                                    </div>
                                                    <div>
                                                        <span class="btn btn-info btn-file"><span class="fileinput-new">Arrastre o Seleccione una image</span>
                                                        <input type="file" name="image" id="image" accept="image/png,image/jpeg,image/jpg,image/gif" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="nit" class="col-lg-2 control-label">Nit*</label>
                                                <div class="col-md-6">
                                                    <input type="text" name="nit" value="<?php echo $provider->nit;?>" required class="form-control" id="nit" placeholder="Nit" minlength="7" maxlength="13">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="phone" class="col-lg-4 control-label">Teléfono de contacto*</label>
                                                        <div class="col-md-6">
                                                            <input type="text" name="phone" value="<?php echo $provider->phone;?>" required class="form-control" id="phone" placeholder="contacto" minlength="10" maxlength="10">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="address" class="col-lg-4 control-label">Dirección*</label>
                                                        <div class="col-md-6">
                                                            <input type="text" name="address" value="<?php echo $provider->address;?>" required class="form-control" id="address" placeholder="Dirección" minlength="5" maxlength="30">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-3 col-xs-3">
                                                <span class="help-block-regalias text-muted-regalias small-font-regalias" > Sus productos</span>
                                                <textarea rows="4" cols=""  class="form-control" name="ProductAux" readonly><?php echo $provider->products;?></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="products" class="col-lg-2 control-label">Seleccionar más productos*</label>
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
                                            <input type="hidden" id="Aux" name="Aux" value ="<?php echo $provider->products;?>" />
                                            <div class="form-group">
                                                <label for="clase" class="col-lg-2 control-label">Municipio *</label>
                                                <div class="col-md-6">
                                                    <select name="municipality" id="municipality" class="form-control formulario1 mb-5" required rows="5">
                                                        <option value="<?php echo $provider->municipality;?>" selected><?php echo $provider->municipality;?></option>
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
                                            <input type="hidden" class="form-control" id="certification_aux" value="<?php echo $provider->certification;?>" name="certification_aux">
                                            <div class="form-group">
                                                <label for="files" class="col-sm-3 control-label">Certificación</label>
                                                <div class="col-md-9 fileinput fileinput-new" data-provides="fileinput">
                                                    <div>
                                                        <span class="btn btn-info btn-file"><span class="fileinput-new">Arrastre o Seleccione un archivo</span>
                                                        <input type="file" name="files" id="files" class="input-file" value="<?php echo $provider->certification;?>" accept=".pdf" >
                                                    </div><a href="uploads/providers/<?php echo $provider->certification;?>" target="_blank"><button type="button" class="btn btn-warning btn-xs">Ver certificado</a>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="status" class="col-lg-4 control-label" >Está activo?</label>
                                                <div class="col-md-6">
                                                    <div class="checkbox">
                                                        <label>
                                                        <input type="checkbox" name="status" <?php if($provider->status==1){ echo "checked";}?>> 
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-lg-offset-2 col-lg-10">
                                                    <input type="hidden" name="id_provider" value="<?php echo $provider->id_provider;?>">
                                                    <button type="submit" class="btn btn-primary">Actualizar Proveedor</button><a href="#" class="btn btn-danger" style="margin-left: 7px;" data-dismiss="modal"><i class="fa fa-times"> </i>&nbsp&nbspCancelar</a>
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
                echo "<p class='alert alert-danger'>No hay provedores</p>";
            }
        ?>
        </div>
    </div>
</section>
<?php endif;?>