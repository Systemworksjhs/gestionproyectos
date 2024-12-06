<section class="content">
    <div class="row">
        <div class="col-md-12">
            <h1>Testimonios</h1>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal">
                Nuevo testimonio
            </button>
            <!-- Modal -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Nuevo testimonio</h4>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal" enctype="multipart/form-data" method="post" id="addtestimonial" action="./?action=testimonials&opt=add" role="form">
                            <div class="form-group">
                                <label for="names" class="col-lg-2 control-label">Nombres*</label>
                                <div class="col-md-6">
                                    <input type="text" name="names" required class="form-control" id="names" placeholder="Nombres" minlength="5" maxlength="50">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="image" class="col-sm-3 control-label">Tamaño recomendado es de 900 x 500 píxeles.</label>
                                <div class="col-md-9 fileinput fileinput-new" data-provides="fileinput">
                                    <div class="fileinput-new thumbnail" style="max-width: 50%;" >
                                        <img class="img-rounded" src="uploads/productos/demo.png" />
                                    </div>
                                    <div>
                                        <span class="btn btn-info btn-file"><span class="fileinput-new">Arrastre o Seleccione una imagen</span>
                                        <input type="file" name="image" id="image" required accept="image/png,image/jpeg,image/jpg,image/gif" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="message" class="col-lg-2 control-label">Mensaje*</label>
                                <div class="col-md-6">
                                    <textarea class="form-control bg-light border-0" rows="3" placeholder="Mensaje" name="message" id="message"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="occupation" class="col-lg-2 control-label">Ocupación y/o cargo*</label>
                                <div class="col-md-6">
                                    <input type="text" name="occupation" required class="form-control" id="occupation" placeholder="Ocupación y/o cargo" minlength="5" maxlength="20">
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
                                    <button type="submit" class="btn btn-primary">Agregar testimonio</button><a href="#" class="btn btn-danger" style="margin-left: 7px;" data-dismiss="modal"><i class="fa fa-times"> </i>&nbsp&nbspCancelar</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <br><br>
        <?php
            $testimonials = testimonialsData::getAll();
            if(count($testimonials)>0){
                // si hay testimonios
                ?>
                <div class="box box-primary">
                    <div class="box-body">
                        <table class="table table-bordered table-hover datatable">
                            <thead>
                                <th>Nombres</th>
                                <th>Imagen</th>
                                <th>Cargo y/o ocupación</th>
                                <th>Mensaje</th>
                                <th>Estado</th>
                                <th></th>
                            </thead>
                            <?php
                            foreach($testimonials as $testimonial){
                                ?>
                                <tr>
                                <td><?php echo $testimonial->names; ?></td>
                                <td><img src="uploads/testimonials/<?php echo $testimonial->image;?>" style="width:90px;height:70px" > </td>
                                <td><?php echo $testimonial->occupation; ?></td>
                                <td><?php echo $testimonial->message; ?></td>
								<td>
									<?php if($testimonial->status==1):?>
										<i class="glyphicon glyphicon-ok"></i>
									<?php endif; ?>
									<?php if($testimonial->status==0):?>
										<i class="glyphicon glyphicon-remove"></i>
									<?php endif; ?>
								</td>
                                <td style="width:130px;">
                                    <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#editModal<?php echo $testimonial->id_testimonials; ?>">
                                    Editar
                                </button>
                                <a href="./?action=testimonials&opt=del&idcitorga=<?php echo base64_encode($testimonial->id_testimonials);?>" class="btn btn-danger btn-xs">Eliminar</a>
                            </td>
                            </tr>
                            <?php
                            }
                            ?>
                        </table>
                        <?php foreach($testimonials as $testimonial):?>
                        <!-- Modal -->
                        <div class="modal fade" id="editModal<?php echo $testimonial->id_testimonials; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel">Editar testimonio</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form class="form-horizontal" enctype="multipart/form-data" method="post" id="addassociations" action="./?action=testimonials&opt=update" role="form">
                                            <div class="form-group">
                                                <label for="names" class="col-lg-2 control-label">Nombres*</label>
                                                <div class="col-md-6">
                                                    <input type="text" name="names" value="<?php echo $testimonial->names;?>" class="form-control" id="name" placeholder="Nombres"  minlength="3" maxlength="50">
                                                </div>
                                            </div>
                                            <input type="hidden" class="form-control" id="slide_img_aux" value="<?php echo $testimonial->image;?>" name="slide_img_aux">
                                            <div class="form-group">
                                                <label for="image" class="col-sm-3 control-label">Tamaño recomendado es de 900 x 500 píxeles.</label>
                                                <div class="col-md-9 fileinput fileinput-new" data-provides="fileinput">
                                                    <div class="fileinput-new thumbnail" style="max-width: 50%;" >
                                                        <img class="img-rounded" src="uploads/testimonials/<?php echo $testimonial->image;?>" style="width:190px;height:120px" />
                                                    </div>
                                                    <div>
                                                        <span class="btn btn-info btn-file"><span class="fileinput-new">Arrastre o Seleccione una imagen</span>
                                                        <input type="file" name="image" id="image" accept="image/png,image/jpeg,image/jpg,image/gif" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="occupation" class="col-lg-2 control-label">Ocupación y/o cargo*</label>
                                                <div class="col-md-6">
                                                    <input type="text" name="occupation" value="<?php echo $testimonial->occupation;?>" class="form-control" id="occupation" placeholder="Ocupación y/o cargo"  minlength="3" maxlength="50">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="response" class="col-lg-2 control-label">Txto testimonio*</label>
                                                <div class="col-md-6">
                                                    <textarea rows="5" name="message" required class="form-control" id="message" placeholder="Texto del testimonio" minlength="5" maxlength="3000"><?php echo $testimonial->message;?></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="status" class="col-lg-4 control-label" >Está activa?</label>
                                                <div class="col-md-6">
                                                    <div class="checkbox">
                                                        <label>
                                                        <input type="checkbox" name="status" <?php if($testimonial->status==1){ echo "checked";}?>> 
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-lg-offset-2 col-lg-10">
                                                    <input type="hidden" name="id_testimonials" value="<?php echo $testimonial->id_testimonials;?>">
                                                    <button type="submit" class="btn btn-primary">Actualizar testimonio</button><a href="#" class="btn btn-danger" style="margin-left: 7px;" data-dismiss="modal"><i class="fa fa-times"> </i>&nbsp&nbspCancelar</a>
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
                echo "<p class='alert alert-danger'>No hay testimonios</p>";
            }
        ?>
        </div>
    </div>
</section>