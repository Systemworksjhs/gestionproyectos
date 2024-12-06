<?php $municipality = MunicipalityData::getAll();?>
<?php $u = UserData::getById($_SESSION["user_id"]); ?>
<?php if($u->kind==1):?>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <h1>Federación</h1>
            <!-- Button trigger modal -->

            <!-- Modal -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel"></h4>
                    </div> 
                    <div class="modal-body">
                        <form class="form-horizontal" enctype="multipart/form-data" method="post" id="addfederation" action="./?action=federation&opt=add" role="form">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="name" class="col-lg-2 control-label">Nombre Federación*</label>
                                    <div class="col-md-6">
                                        <input type="text" name="name" required class="form-control" id="name" placeholder="Nombre Federación" minlength="3" maxlength="50">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="legal_representative" class="col-lg-2 control-label">Representante legal*</label>
                                    <div class="col-md-6">
                                        <input type="text" name="legal_representative" required class="form-control" id="legal_representative" placeholder="Nombre representante legal" minlength="3" maxlength="50">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="contact_legal_representative" class="col-lg-4 control-label">Número contacto*</label>
                                    <div class="col-md-6">
                                        <input type="text" name="contact_legal_representative" required class="form-control" id="contact_legal_representative" placeholder="Número de contacto" minlength="10" maxlength="10">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="facebook" class="col-lg-4 control-label">Facebook</label>
                                    <div class="col-md-6">
                                        <input type="text" name="facebook" class="form-control" id="facebook" placeholder="Facebook" minlength="3" maxlength="50">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="twitter" class="col-lg-4 control-label">Twitter</label>
                                    <div class="col-md-6">
                                        <input type="text" name="twitter" class="form-control" id="twitter" placeholder="Twitter" minlength="3" maxlength="50">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="instagram" class="col-lg-4 control-label">Instagram</label>
                                    <div class="col-md-6">
                                        <input type="text" name="instagram" class="form-control" id="instagram" placeholder="Instagram" minlength="3" maxlength="50">
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group">
                                <label for="logo" class="col-sm-3 control-label">Tamaño recomendado es de 900 x 500 píxeles.</label>
                                <div class="col-md-9 fileinput fileinput-new" data-provides="fileinput">
                                    <div class="fileinput-new thumbnail" style="max-width: 50%;" >
                                        <img class="img-rounded" src="uploads/productos/demo.png" />
                                    </div>
                                    <div>
                                        <span class="btn btn-info btn-file"><span class="fileinput-new">Arrastre o Seleccione una imagen</span>
                                        <input type="file" name="logo" id="logo" required accept="image/png,image/jpeg,image/jpg,image/gif" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="documents" class="col-sm-3 control-label">Acta constitución</label>
                                <div class="col-md-9 fileinput fileinput-new" data-provides="fileinput">
                                    <div>
                                        <span class="btn btn-info btn-file"><span class="fileinput-new">Arrastre o Seleccione un archivo</span>
                                        <input type="file" name="documents" id="documents" class="input-file" value="" accept=".pdf" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="clase" class="col-lg-2 control-label">Municipio *</label>
                                <div class="col-md-6">
                                    <select name="municipality" id="municipality" class="form-control formulario1 mb-5" required rows="3">
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
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="estado" class="col-lg-4 control-label">estado*</label>
                                    <div class="col-md-6">
                                        <select class="form-control" id="status" required name="status">
                                            <option value="">-- Seleccione estado --</option>
                                            <option value="1" >Activo</option>    
                                            <option value="0" >Inactivo</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="slug" class="col-lg-2 control-label">Dirección URL*</label>
                                    <div class="col-md-8">
                                        <input type="text" name="slug" required class="form-control" id="slug" placeholder="Dirección URL" minlength="5" maxlength="30">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="textAsociation" class="col-lg-2 control-label">Descripción general*</label>
                                    <div class="col-md-10">
                                        <textarea name="textAsociation" required rows="8" class="form-control" id="textAsociation" placeholder="Descripcion general"  minlength="50" maxlength="6000"></textarea>
                                    </div>
                                </div>
                            </div> 
                            
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="mision" class="col-lg-2 control-label">Misión*</label>
                                    <div class="col-md-10">
                                        <textarea name="mision" required rows="4" class="form-control" id="mision" placeholder="Descripcion misión"  minlength="50" maxlength="500"></textarea>
                                    </div>
                                </div>
                            </div> 
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="vision" class="col-lg-2 control-label">Visión*</label>
                                    <div class="col-md-10">
                                        <textarea name="vision" required rows="4" class="form-control" id="vision" placeholder="Descripcion visión"  minlength="50" maxlength="500"></textarea>
                                    </div>
                                </div>
                            </div> 
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email" class="col-lg-4 control-label">Correo electrónico</label>
                                    <div class="col-md-6">
                                        <input type="email" name="email" class="form-control" id="email" placeholder="Facebook" minlength="3" maxlength="50">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-offset-2 col-lg-10">
                                    <button type="submit" class="btn btn-primary">Agregar Federación</button><a href="#" class="btn btn-danger" style="margin-left: 7px;" data-dismiss="modal"><i class="fa fa-times"> </i>&nbsp&nbspCancelar</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <br><br>
        <?php
            $federations = FederationData::getAll();
            if(count($federations)>0){
                // si hay Federación
                ?>
                <div class="box box-primary">
                    <div class="box-body">
                        <table class="table table-bordered table-hover datatable">
                            <thead>
                                <th>imagen</th>
                                <th>Documento</th>
                                <th>Federación</th>
                                <th>Representante</th>
                                <th>Número teléfono</th>
                                <th>Dirección</th>
                                <th>Estado</th>
                                <th></th>
                            </thead>
                            <?php
                            foreach($federations as $federation){
                                ?>
                                <tr>
                                <td><img src="uploads/federation/<?php echo $federation->logo;?>" style="width:90px;height:70px" > </td>
                                <td><?php echo $federation->document; ?>
                                    <a href="uploads/federation/<?php echo $federation->document;?>" target="_blank"><button type="button" class="btn btn-warning btn-xs">Ver</a>
                                </td>
                                <td><?php echo $federation->name; ?></td>
                                <td><?php echo $federation->legal_representative; ?></td>
                                <td><?php echo $federation->contact_legal_representative; ?></td>
                                <td><?php echo $federation->address; ?></td>
								<td>
									<?php if($federation->status==1):?>
										<i class="glyphicon glyphicon-ok"></i>
									<?php endif; ?>
									<?php if($federation->status==0):?>
										<i class="glyphicon glyphicon-remove"></i>
									<?php endif; ?>
								</td>
                                <td style="width:130px;">
                                    <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#editModal<?php echo $federation->id_federation; ?>">
                                    Editar
                                </button>
                                <a href="./?action=federation&opt=del&idcitorga=<?php echo base64_encode($federation->id_federation);?>" class="btn btn-danger btn-xs">Eliminar</a>
                            </td>
                            </tr>
                            <?php
                            }
                            ?>
                        </table>
                        <?php foreach($federations as $federation):?>
                        <!-- Modal -->
                        <div class="modal fade" id="editModal<?php echo $federation->id_federation; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel">Editar Federación</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form class="form-horizontal" enctype="multipart/form-data" method="post" id="addfederation" action="./?action=federation&opt=update" role="form">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="name" class="col-lg-2 control-label">Nombre Federación*</label>
                                                    <div class="col-md-6">
                                                        <input type="text" name="name" value="<?php echo $federation->name;?>" class="form-control" id="name" placeholder="Nombre Federación"  minlength="3" maxlength="50">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="legal_representative" class="col-lg-2 control-label">Nombre Representante legal*</label>
                                                    <div class="col-md-6">
                                                        <input type="text" name="legal_representative" value="<?php echo $federation->legal_representative;?>" required class="form-control" id="legal_representative" placeholder="Nombre representante legal" minlength="3" maxlength="50">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="contact_legal_representative" class="col-lg-4 control-label">Número contacto*</label>
                                                    <div class="col-md-6">
                                                        <input type="text" name="contact_legal_representative" value="<?php echo $federation->contact_legal_representative;?>" required class="form-control" id="contact_legal_representative" placeholder="Número de contacto" minlength="10" maxlength="10">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="facebook" class="col-lg-4 control-label">Facebook</label>
                                                    <div class="col-md-6">
                                                        <input type="text" name="facebook" value="<?php echo $federation->facebook_federation;?>" class="form-control" id="facebook" placeholder="Facebook" minlength="3" maxlength="50">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="twitter" class="col-lg-4 control-label">Twitter</label>
                                                    <div class="col-md-6">
                                                        <input type="text" name="twitter" value="<?php echo $federation->twitter_federation;?>" class="form-control" id="twitter" placeholder="Twitter" minlength="3" maxlength="50">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="Instagram" class="col-lg-4 control-label">Instagram</label>
                                                    <div class="col-md-6">
                                                        <input type="text" name="instagram" value="<?php echo $federation->instagram_federation;?>" class="form-control" id="instagram" placeholder="Instagram" minlength="3" maxlength="50">
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="hidden" class="form-control" id="slide_img_aux" value="<?php echo $federation->logo;?>" name="slide_img_aux">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="logo" class="col-sm-4 control-label">Logo Federación 900 x 500 píxeles.</label>
                                                    <div class="col-md-8 fileinput fileinput-new" data-provides="fileinput">
                                                        <div class="fileinput-new thumbnail" style="max-width: 50%;" >
                                                            <img class="img-rounded" src="uploads/federation/<?php echo $federation->logo;?>" style="width:190px;height:120px" />
                                                        </div>
                                                        <div>
                                                            <span class="btn btn-info btn-file"><span class="fileinput-new">Arrastre o Seleccione una imagen</span>
                                                            <input type="file" name="logo" id="logo" accept="image/png,image/jpeg,image/jpg,image/gif" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="hidden" class="form-control" id="slide_img_aux1" value="<?php echo $federation->image;?>" name="slide_img_aux1">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="image" class="col-sm-4 control-label">Imagen Federación 900 x 500 píxeles.</label>
                                                    <div class="col-md-8 fileinput fileinput-new" data-provides="fileinput">
                                                        <div class="fileinput-new thumbnail" style="max-width: 50%;" >
                                                            <img class="img-rounded" src="uploads/federation/<?php echo $federation->image;?>" style="width:190px;height:120px" />
                                                        </div>
                                                        <div>
                                                            <span class="btn btn-info btn-file"><span class="fileinput-new">Arrastre o Seleccione una imagen</span>
                                                            <input type="file" name="image" id="image" accept="image/png,image/jpeg,image/jpg,image/gif" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="hidden" class="form-control" id="acta_aux" value="<?php echo $federation->document;?>" name="acta_aux">
                                            <div class="col-md-6"> 
                                                <div class="form-group">
                                                    <label for="documents" class="col-sm-4 control-label">Acta constitución</label>
                                                    <div class="col-md-4 fileinput fileinput-new" data-provides="fileinput">
                                                        <div>
                                                            <span class="btn btn-info btn-file"><span class="fileinput-new">Arrastre o Seleccione un archivo</span>
                                                            <input type="file" name="documents" id="documents" class="input-file" value="<?php echo $federation->documents;?>" accept=".pdf" >
                                                        </div><a href="uploads/federation/<?php echo $federation->document;?>" target="_blank"><button type="button" class="btn btn-warning btn-xs">Ver</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="estado" class="col-lg-4 control-label">Estado</label>
                                                    <div class="col-md-6">
                                                        <select class="form-control" id="status" required name="status">
                                                            <option value="1" <?php if($federation->status==1){echo "selected";} ?>>Activo</option>    
                                                            <option value="0" <?php if($federation->status==0){echo "selected";} ?>>Inactivo</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="address" class="col-lg-4 control-label">Dirección *</label>
                                                    <div class="col-md-7">
                                                        <input type="text" name="address" value="<?php echo $federation->address;?>" required class="form-control" id="address" placeholder="Dirección URL" minlength="5" maxlength="40">
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="textAsociation" class="col-lg-2 control-label">Descripción general*</label>
                                                    <div class="col-md-10">
                                                        <textarea name="textAsociation" required rows="8" class="form-control" id="textAsociation" placeholder="Descripcion general"  minlength="50" maxlength="6000"><?php echo $federation->description;?></textarea>
                                                    </div>
                                                </div>
                                            </div> 
                                            
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="mision" class="col-lg-2 control-label">Misión*</label>
                                                    <div class="col-md-10">
                                                        <textarea name="mision" required rows="4" class="form-control" id="mision" placeholder="Descripcion misión"  minlength="50" maxlength="500"><?php echo $federation->mision;?></textarea>
                                                    </div>
                                                </div>
                                            </div> 
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="vision" class="col-lg-2 control-label">Visión*</label>
                                                    <div class="col-md-10">
                                                        <textarea name="vision" required rows="4" class="form-control" id="vision" placeholder="Descripcion visión"  minlength="50" maxlength="500"><?php echo $federation->vision;?></textarea>
                                                    </div>
                                                </div>
                                            </div> 
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="email" class="col-lg-4 control-label">Correo electrónico</label>
                                                    <div class="col-md-8">
                                                        <input type="email" name="email" value="<?php echo $federation->emailFederation;?>" class="form-control" id="email" placeholder="Facebook" minlength="3" maxlength="50">
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <div class="col-lg-offset-2 col-lg-10">
                                                    <input type="hidden" name="id_federation" value="<?php echo $federation->id_federation;?>">
                                                    <button type="submit" class="btn btn-primary">Actualizar Federación</button><a href="#" class="btn btn-danger" style="margin-left: 7px;" data-dismiss="modal"><i class="fa fa-times"> </i>&nbsp&nbspCancelar</a>
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
                echo "<p class='alert alert-danger'>No hay Federación</p>";
            }
        ?>
        </div>
    </div>
</section>
<?php endif;?>