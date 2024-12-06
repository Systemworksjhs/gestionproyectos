<?php $municipality = MunicipalityData::getAll();?>
<?php $u = UserData::getById($_SESSION["user_id"]); ?>
<?php if($u->kind==1):?>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <h1>Asociaciones</h1>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal">
                Nueva Asociación
            </button>
            <!-- Modal -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Nueva Asociación</h4>
                    </div> 
                    <div class="modal-body">
                        <form class="form-horizontal" enctype="multipart/form-data" method="post" id="addasocciatios" action="./?action=asocciatios&opt=add" role="form">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="name" class="col-lg-2 control-label">Nombre Asociación*</label>
                                    <div class="col-md-6">
                                        <input type="text" name="name" required class="form-control" id="name" placeholder="Nombre asociación" minlength="3" maxlength="50">
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
                                    <label for="phone" class="col-lg-4 control-label">Número contacto*</label>
                                    <div class="col-md-6">
                                        <input type="text" name="phone" required class="form-control" id="phone" placeholder="Número de contacto" minlength="10" maxlength="10">
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
                           </div><hr><br> 


                           <div class="col-md-6">
                                <div class="form-group">
                                    <label for="item-1" class="col-lg-4 control-label">Item 1</label>
                                    <div class="col-md-6">
                                        <input type="text" name="item-1" class="form-control" id="item-1" placeholder="Descripción item 1" minlength="8" maxlength="30">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="item_img_1" class="col-sm-3 control-label">Tamaño recomendado es de 900 x 500 píxeles.</label>
                                    <div class="col-md-6 fileinput fileinput-new" data-provides="fileinput">
                                        <div class="fileinput-new thumbnail" style="max-width: 50%;" >
                                            <img class="img-rounded" style="width:190px;height:120px" />
                                        </div>
                                        <div>
                                            <span class="btn btn-info btn-file"><span class="fileinput-new">Arrastre o Seleccione una imagen</span>
                                            <input type="file" name="item_img_1" id="item_img_1" accept="image/png,image/jpeg,image/jpg,image/gif" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="text-item-2" class="col-lg-2 control-label">Descripción item 1 *</label>
                                    <div class="col-md-10">
                                        <textarea name="text-item-1" rows="2" class="form-control" id="text-item-1" placeholder="Descripción item 1"  minlength="30" maxlength="490"></textarea>
                                    </div>
                                </div>
                            </div></hr>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="item-2" class="col-lg-4 control-label">Item 2</label>
                                    <div class="col-md-6">
                                        <input type="text" name="item-2" class="form-control" id="item-2" placeholder="Descripción item 2" minlength="8" maxlength="30">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="item_img_2" class="col-sm-3 control-label">Tamaño recomendado es de 900 x 500 píxeles.</label>
                                    <div class="col-md-6 fileinput fileinput-new" data-provides="fileinput">
                                        <div class="fileinput-new thumbnail" style="max-width: 50%;" >
                                            <img class="img-rounded" style="width:190px;height:120px" />
                                        </div>
                                        <div>
                                            <span class="btn btn-info btn-file"><span class="fileinput-new">Arrastre o Seleccione una imagen</span>
                                            <input type="file" name="item_img_2" id="item_img_2" accept="image/png,image/jpeg,image/jpg,image/gif" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="text-item-2" class="col-lg-2 control-label">Descripción item 2 *</label>
                                    <div class="col-md-10">
                                        <textarea name="text-item-2" rows="2" class="form-control" id="text-item-2" placeholder="Descripción item 2"  minlength="30" maxlength="490"></textarea>
                                    </div>
                                </div>
                            </div></hr>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="item-3" class="col-lg-4 control-label">Item 3</label>
                                    <div class="col-md-6">
                                        <input type="text" name="item-3" class="form-control" id="item-3" placeholder="Descripción item 3 " minlength="8" maxlength="30">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <input type="hidden" class="form-control" id="slide_img_aux_4" name="slide_img_aux_4">
                                <div class="form-group">
                                    <label for="item_img_3" class="col-sm-3 control-label">Tamaño recomendado es de 900 x 500 píxeles.</label>
                                    <div class="col-md-6 fileinput fileinput-new" data-provides="fileinput">
                                        <div class="fileinput-new thumbnail" style="max-width: 50%;" >
                                            <img class="img-rounded" style="width:190px;height:120px" />
                                        </div>
                                        <div>
                                            <span class="btn btn-info btn-file"><span class="fileinput-new">Arrastre o Seleccione una imagen</span>
                                            <input type="file" name="item_img_3" id="item_img_3" accept="image/png,image/jpeg,image/jpg,image/gif" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="text-item-3" class="col-lg-2 control-label">Descripción item 3 *</label>
                                    <div class="col-md-10">
                                        <textarea name="text-item-3" rows="2" class="form-control" id="text-item-3" placeholder="Descripción item 3"  minlength="30" maxlength="490"></textarea>
                                    </div>
                                </div>
                            </div></hr>


                            <div class="form-group">
                                <div class="col-lg-offset-2 col-lg-10">
                                    <button type="submit" class="btn btn-primary">Agregar Asociación</button><a href="#" class="btn btn-danger" style="margin-left: 7px;" data-dismiss="modal"><i class="fa fa-times"> </i>&nbsp&nbspCancelar</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <br><br>
        <?php
            $asociations = AsocciatiosData::getAll();
            if(count($asociations)>0){
                // si hay asociaciones
                ?>
                <div class="box box-primary">
                    <div class="box-body">
                        <table class="table table-bordered table-hover datatable">
                            <thead>
                                <th>imagen</th>
                                <th>Documento</th>
                                <th>Asociación</th>
                                <th>Representante</th>
                                <th>Número teléfono</th>
                                <th>Municipio</th>
                                <th>Estado</th>
                                <th></th>
                            </thead>
                            <?php
                            foreach($asociations as $asociation){
                                ?>
                                <tr>
                                <td><img src="uploads/images/<?php echo $asociation->logo;?>" style="width:90px;height:70px" > </td>
                                <td><?php echo $asociation->documents; ?>
                                    <a href="uploads/documents/<?php echo $asociation->documents;?>" target="_blank"><button type="button" class="btn btn-warning btn-xs">Ver</a>
                                </td>
                                <td><?php echo $asociation->name; ?></td>
                                <td><?php echo $asociation->legal_representative; ?></td>
                                <td><?php echo $asociation->phone; ?></td>
                                <td><?php echo $asociation->municipality; ?></td>
								<td>
									<?php if($asociation->status==1):?>
										<i class="glyphicon glyphicon-ok"></i>
									<?php endif; ?>
									<?php if($asociation->status==0):?>
										<i class="glyphicon glyphicon-remove"></i>
									<?php endif; ?>
								</td>
                                <td style="width:130px;">
                                    <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#editModal<?php echo $asociation->id_asocciatios; ?>">
                                    Editar
                                </button>
                                <a href="./?action=asocciatios&opt=del&idcitorga=<?php echo base64_encode($asociation->id_asocciatios);?>" class="btn btn-danger btn-xs">Eliminar</a>
                            </td>
                            </tr>
                            <?php
                            }
                            ?>
                        </table>
                        <?php foreach($asociations as $asociation):?>
                        <!-- Modal -->
                        <div class="modal fade" id="editModal<?php echo $asociation->id_asocciatios; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel">Editar Asociación</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form class="form-horizontal" enctype="multipart/form-data" method="post" id="addassociations" action="./?action=asocciatios&opt=update" role="form">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="name" class="col-lg-2 control-label">Nombre asociación*</label>
                                                    <div class="col-md-6">
                                                        <input type="text" name="name" value="<?php echo $asociation->name;?>" class="form-control" id="name" placeholder="Nombre asociación"  minlength="3" maxlength="50">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="legal_representative" class="col-lg-2 control-label">Nombre Representante legal*</label>
                                                    <div class="col-md-6">
                                                        <input type="text" name="legal_representative" value="<?php echo $asociation->legal_representative;?>" required class="form-control" id="legal_representative" placeholder="Nombre representante legal" minlength="3" maxlength="50">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="phone" class="col-lg-4 control-label">Número contacto*</label>
                                                    <div class="col-md-6">
                                                        <input type="text" name="phone" value="<?php echo $asociation->phone;?>" required class="form-control" id="phone" placeholder="Número de contacto" minlength="10" maxlength="10">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="facebook" class="col-lg-4 control-label">Facebook</label>
                                                    <div class="col-md-6">
                                                        <input type="text" name="facebook" value="<?php echo $asociation->facebook;?>" class="form-control" id="facebook" placeholder="Facebook" minlength="3" maxlength="50">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="twitter" class="col-lg-4 control-label">Twitter</label>
                                                    <div class="col-md-6">
                                                        <input type="text" name="twitter" value="<?php echo $asociation->twitter;?>" class="form-control" id="twitter" placeholder="Twitter" minlength="3" maxlength="50">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="Instagram" class="col-lg-4 control-label">Instagram</label>
                                                    <div class="col-md-6">
                                                        <input type="text" name="instagram" value="<?php echo $asociation->instagram;?>" class="form-control" id="instagram" placeholder="Instagram" minlength="3" maxlength="50">
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="hidden" class="form-control" id="slide_img_aux" value="<?php echo $asociation->logo;?>" name="slide_img_aux">
                                            <div class="form-group">
                                                <label for="logo" class="col-sm-3 control-label">Tamaño recomendado es de 900 x 500 píxeles.</label>
                                                <div class="col-md-9 fileinput fileinput-new" data-provides="fileinput">
                                                    <div class="fileinput-new thumbnail" style="max-width: 100%;" >
                                                        <img class="img-rounded" src="uploads/images/<?php echo $asociation->logo;?>" style="width:190px;height:170px" />
                                                    </div>
                                                    <div>
                                                        <span class="btn btn-info btn-file"><span class="fileinput-new">Arrastre o Seleccione una imagen</span>
                                                        <input type="file" name="logo" id="logo" accept="image/png,image/jpeg,image/jpg,image/gif" />
                                                    </div>
                                                </div>
                                            </div>

                                            <input type="hidden" class="form-control" id="acta_aux" value="<?php echo $asociation->documents;?>" name="acta_aux">
                                            <div class="form-group">
                                                <label for="documents" class="col-sm-3 control-label">Acta constitución</label>
                                                <div class="col-md-9 fileinput fileinput-new" data-provides="fileinput">
                                                    <div>
                                                        <span class="btn btn-info btn-file"><span class="fileinput-new">Arrastre o Seleccione un archivo</span>
                                                        <input type="file" name="documents" id="documents" class="input-file" value="<?php echo $asociation->documents;?>" accept=".pdf" >
                                                    </div><a href="uploads/documents/<?php echo $asociation->documents;?>" target="_blank"><button type="button" class="btn btn-warning btn-xs">Ver</a>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="clase" class="col-lg-2 control-label">Municipio *</label>
                                                <div class="col-md-6">
                                                    <select name="municipality" id="municipality" class="form-control formulario1 mb-5" required rows="3">
                                                        <option value="<?php echo $asociation->municipality;?>" selected><?php echo $asociation->municipality;?></option>
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
                                                    <label for="estado" class="col-lg-4 control-label">Estado</label>
                                                    <div class="col-md-6">
                                                        <select class="form-control" id="status" required name="status">
                                                            <option value="1" <?php if($asociation->status==1){echo "selected";} ?>>Activo</option>    
                                                            <option value="0" <?php if($asociation->status==0){echo "selected";} ?>>Inactivo</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="slug" class="col-lg-4 control-label">Dirección URL*</label>
                                                    <div class="col-md-6">
                                                        <input type="text" name="slug" value="<?php echo $asociation->slug;?>" required class="form-control" id="slug" placeholder="Dirección URL" minlength="5" maxlength="30">
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="textAsociation" class="col-lg-2 control-label">Descripción general*</label>
                                                    <div class="col-md-10">
                                                        <textarea name="textAsociation" required rows="8" class="form-control" id="textAsociation" placeholder="Descripcion general"  minlength="50" maxlength="6000"><?php echo $asociation->textAsociation;?></textarea>
                                                    </div>
                                                </div>
                                            </div> 
                                            
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="mision" class="col-lg-2 control-label">Misión*</label>
                                                    <div class="col-md-10">
                                                        <textarea name="mision" required rows="4" class="form-control" id="mision" placeholder="Descripcion misión"  minlength="50" maxlength="500"><?php echo $asociation->mision;?></textarea>
                                                    </div>
                                                </div>
                                            </div> 
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="vision" class="col-lg-2 control-label">Visión*</label>
                                                    <div class="col-md-10">
                                                        <textarea name="vision" required rows="4" class="form-control" id="vision" placeholder="Descripcion visión"  minlength="50" maxlength="500"><?php echo $asociation->vision;?></textarea>
                                                    </div>
                                                </div>
                                            </div></br></hr> 
                                            
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="text-item-1" class="col-lg-4 control-label">Item 1</label>
                                                    <div class="col-md-6">
                                                        <input type="text" name="item-1" value="<?php echo $asociation->item_1;?>" class="form-control" id="item-1" placeholder="Descripción item 1" minlength="8" maxlength="30">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="hidden" class="form-control" id="slide_img_aux_2" value="<?php echo $asociation->img_item_1;?>" name="slide_img_aux_2">
                                                <div class="form-group">
                                                    <label for="item_img_1" class="col-sm-3 control-label">Tamaño recomendado es de 900 x 500 píxeles.</label>
                                                    <div class="col-md-6 fileinput fileinput-new" data-provides="fileinput">
                                                        <div class="fileinput-new thumbnail" style="max-width: 100%;" >
                                                            <img class="img-rounded" src="uploads/asociaciones/<?php echo $asociation->img_item_1;?>" style="width:190px;height:120px" />
                                                        </div>
                                                        <div>
                                                            <span class="btn btn-info btn-file"><span class="fileinput-new">Arrastre o Seleccione una imagen</span>
                                                            <input type="file" name="item_img_1" id="item_img_1" accept="image/png,image/jpeg,image/jpg,image/gif" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="text-item-1" class="col-lg-2 control-label">Descripción item 1 *</label>
                                                    <div class="col-md-10">
                                                        <textarea name="text-item-1" rows="2" class="form-control" id="text-item-1" placeholder="Descripción item 1"  minlength="30" maxlength="490"><?php echo $asociation->text_item_1;?></textarea>
                                                    </div>
                                                </div>
                                            </div></hr>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="item-2" class="col-lg-4 control-label">Item 2</label>
                                                    <div class="col-md-6">
                                                        <input type="text" name="item-2" value="<?php echo $asociation->item_2;?>" class="form-control" id="item-2" placeholder="Descripción item 2" minlength="8" maxlength="30">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="hidden" class="form-control" id="slide_img_aux_3" value="<?php echo $asociation->img_item_2;?>" name="slide_img_aux_3">
                                                <div class="form-group">
                                                    <label for="item_img_2" class="col-sm-3 control-label">Tamaño recomendado es de 900 x 500 píxeles.</label>
                                                    <div class="col-md-6 fileinput fileinput-new" data-provides="fileinput">
                                                        <div class="fileinput-new thumbnail" style="max-width: 100%;" >
                                                            <img class="img-rounded" src="uploads/asociaciones/<?php echo $asociation->img_item_2;?>" style="width:190px;height:120px" />
                                                        </div>
                                                        <div>
                                                            <span class="btn btn-info btn-file"><span class="fileinput-new">Arrastre o Seleccione una imagen</span>
                                                            <input type="file" name="item_img_2" id="item_img_2" accept="image/png,image/jpeg,image/jpg,image/gif" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="text-item-2" class="col-lg-2 control-label">Descripción item 2 *</label>
                                                    <div class="col-md-10">
                                                        <textarea name="text-item-2" rows="2" class="form-control" id="text-item-2" placeholder="Descripción item 2"  minlength="30" maxlength="490"><?php echo $asociation->text_item_2;?></textarea>
                                                    </div>
                                                </div>
                                            </div></hr>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="item-3" class="col-lg-4 control-label">Item 3</label>
                                                    <div class="col-md-6">
                                                        <input type="text" name="item-3" value="<?php echo $asociation->item_3;?>" class="form-control" id="item-3" placeholder="Descripción item 3 " minlength="8" maxlength="30">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="hidden" class="form-control" id="slide_img_aux_4" value="<?php echo $asociation->img_item_3;?>" name="slide_img_aux_4">
                                                <div class="form-group">
                                                    <label for="item_img_3" class="col-sm-3 control-label">Tamaño recomendado es de 900 x 500 píxeles.</label>
                                                    <div class="col-md-6 fileinput fileinput-new" data-provides="fileinput">
                                                        <div class="fileinput-new thumbnail" style="max-width: 100%;" >
                                                            <img class="img-rounded" src="uploads/asociaciones/<?php echo $asociation->img_item_3;?>" style="width:190px;height:120px" />
                                                        </div>
                                                        <div>
                                                            <span class="btn btn-info btn-file"><span class="fileinput-new">Arrastre o Seleccione una imagen</span>
                                                            <input type="file" name="item_img_3" id="item_img_3" accept="image/png,image/jpeg,image/jpg,image/gif" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="text-item-3" class="col-lg-2 control-label">Descripción item 3 *</label>
                                                    <div class="col-md-10">
                                                        <textarea name="text-item-3"  rows="2" class="form-control" id="text-item-3" placeholder="Descripción item 3"  minlength="30" maxlength="490"><?php echo $asociation->text_item_3;?></textarea>
                                                    </div>
                                                </div>
                                            </div></hr>

                                            <div class="form-group">
                                                <div class="col-lg-offset-2 col-lg-10">
                                                    <input type="hidden" name="id_asocciatios" value="<?php echo $asociation->id_asocciatios;?>">
                                                    <button type="submit" class="btn btn-primary">Actualizar Asociación</button><a href="#" class="btn btn-danger" style="margin-left: 7px;" data-dismiss="modal"><i class="fa fa-times"> </i>&nbsp&nbspCancelar</a>
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
                echo "<p class='alert alert-danger'>No hay asociaciones</p>";
            }
        ?>
        </div>
    </div>
</section>
<?php endif;?>