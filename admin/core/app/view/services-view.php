<section class="content">
    <div class="row">
        <div class="col-md-12">
            <h1>Servicios</h1>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal">
                Nuevo servicio
            </button>
            <!-- Modal -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Nuevo servicio</h4>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal" enctype="multipart/form-data" method="post" id="addservice" action="./?action=services&opt=add" role="form">
                            <div class="form-group">
                                <label for="title" class="col-lg-2 control-label">Titulo*</label>
                                <div class="col-md-6">
                                    <input type="text" name="title" required class="form-control" id="title" placeholder="Titulo" minlength="5" maxlength="30">
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
                                <label for="text" class="col-lg-2 control-label">Mensaje*</label>
                                <div class="col-md-6">
                                    <textarea class="form-control bg-light border-0" rows="3" placeholder="descripción del servicio" name="text" id="text"></textarea>
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
                                    <button type="submit" class="btn btn-primary">Agregar servicio</button><a href="#" class="btn btn-danger" style="margin-left: 7px;" data-dismiss="modal"><i class="fa fa-times"> </i>&nbsp&nbspCancelar</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <br><br>
        <?php
            $services = servicesData::getAll();
            if(count($services)>0){
                // si hay servicios
                ?>
                <div class="box box-primary">
                    <div class="box-body">
                        <table class="table table-bordered table-hover datatable">
                            <thead>
                                <th>Titulo</th>
                                <th>Imagen</th>
                                <th>Texto</th>
                                <th>Estado</th>
                                <th></th>
                            </thead>
                            <?php
                            foreach($services as $service){
                                ?>
                                <tr>
                                <td><?php echo $service->title; ?></td>
                                <td><img src="uploads/services/<?php echo $service->image;?>" style="width:90px;height:70px" > </td>
                                <td><?php echo $service->text; ?></td>
								<td>
									<?php if($service->status==1):?>
										<i class="glyphicon glyphicon-ok"></i>
									<?php endif; ?>
									<?php if($service->status==0):?>
										<i class="glyphicon glyphicon-remove"></i>
									<?php endif; ?>
								</td>
                                <td style="width:130px;">
                                    <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#editModal<?php echo $service->id_service; ?>">
                                    Editar
                                </button>
                                <a href="./?action=services&opt=del&idcitorga=<?php echo base64_encode($service->id_service);?>" class="btn btn-danger btn-xs">Eliminar</a>
                            </td>
                            </tr>
                            <?php
                            }
                            ?>
                        </table>
                        <?php foreach($services as $service):?>
                        <!-- Modal -->
                        <div class="modal fade" id="editModal<?php echo $service->id_service; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel">Editar servicio</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form class="form-horizontal" enctype="multipart/form-data" method="post" id="addservices" action="./?action=services&opt=update" role="form">
                                            <div class="form-group">
                                                <label for="title" class="col-lg-2 control-label">Titulo*</label>
                                                <div class="col-md-6">
                                                    <input type="text" name="title" value="<?php echo $service->title;?>" class="form-control" id="title" placeholder="Titulo"  minlength="3" maxlength="30">
                                                </div>
                                            </div>
                                            <input type="hidden" class="form-control" id="slide_img_aux" value="<?php echo $service->image;?>" name="slide_img_aux">
                                            <div class="form-group">
                                                <label for="image" class="col-sm-3 control-label">Tamaño recomendado es de 900 x 500 píxeles.</label>
                                                <div class="col-md-9 fileinput fileinput-new" data-provides="fileinput">
                                                    <div class="fileinput-new thumbnail" style="max-width: 50%;" >
                                                        <img class="img-rounded" src="uploads/services/<?php echo $service->image;?>" style="width:190px;height:120px" />
                                                    </div>
                                                    <div>
                                                        <span class="btn btn-info btn-file"><span class="fileinput-new">Arrastre o Seleccione una imagen</span>
                                                        <input type="file" name="image" id="image" accept="image/png,image/jpeg,image/jpg,image/gif" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="text" class="col-lg-2 control-label">Texto servicio*</label>
                                                <div class="col-md-6">
                                                    <textarea rows="5" name="text" required class="form-control" id="text" placeholder="Texto del servicio" minlength="5" maxlength="3000"><?php echo $service->text;?></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="status" class="col-lg-4 control-label" >Está activo?</label>
                                                <div class="col-md-6">
                                                    <div class="checkbox">
                                                        <label>
                                                        <input type="checkbox" name="status" <?php if($service->status==1){ echo "checked";}?>> 
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-lg-offset-2 col-lg-10">
                                                    <input type="hidden" name="id_service" value="<?php echo $service->id_service;?>">
                                                    <button type="submit" class="btn btn-primary">Actualizar servicio</button><a href="#" class="btn btn-danger" style="margin-left: 7px;" data-dismiss="modal"><i class="fa fa-times"> </i>&nbsp&nbspCancelar</a>
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
                echo "<p class='alert alert-danger'>No hay servicios</p>";
            }
        ?>
        </div>
    </div>
</section>