<section class="content">
    <div class="row">
        <div class="col-md-12">
            <h1>Patrocinadores</h1>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal">
                Nuevo patrocinador
            </button>
            <!-- Modal -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Nuevo patrocinador</h4>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal" enctype="multipart/form-data" method="post" id="addsponsor" action="./?action=sponsors&opt=add" role="form">
                            <div class="form-group">
                                <label for="name" class="col-lg-2 control-label">Nombre Patrocinador*</label>
                                <div class="col-md-6">
                                    <input type="text" name="name" required class="form-control" id="name" placeholder="Nombre Patrocinador" minlength="5" maxlength="30">
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
                                    <button type="submit" class="btn btn-primary">Agregar patrocinador</button><a href="#" class="btn btn-danger" style="margin-left: 7px;" data-dismiss="modal"><i class="fa fa-times"> </i>&nbsp&nbspCancelar</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <br><br>
        <?php
            $sponsors = sponsorsData::getAll();
            if(count($sponsors)>0){
                // si hay patrocinadores
                ?>
                <div class="box box-primary">
                    <div class="box-body">
                        <table class="table table-bordered table-hover datatable">
                            <thead>
                                <th>Nombre</th>
                                <th>Imagen</th>
                                <th>Estado</th>
                                <th></th>
                            </thead>
                            <?php
                            foreach($sponsors as $sponsor){
                                ?>
                                <tr>
                                <td><?php echo $sponsor->name; ?></td>
                                <td><img src="uploads/sponsors/<?php echo $sponsor->image;?>" style="width:90px;height:70px" > </td>
								<td>
									<?php if($sponsor->status==1):?>
										<i class="glyphicon glyphicon-ok"></i>
									<?php endif; ?>
									<?php if($sponsor->status==0):?>
										<i class="glyphicon glyphicon-remove"></i>
									<?php endif; ?>
								</td>
                                <td style="width:130px;">
                                    <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#editModal<?php echo $sponsor->id_sponsor; ?>">
                                    Editar
                                </button>
                                <a href="./?action=sponsors&opt=del&idcitorga=<?php echo base64_encode($sponsor->id_sponsor);?>" class="btn btn-danger btn-xs">Eliminar</a>
                            </td>
                            </tr>
                            <?php
                            }
                            ?>
                        </table>
                        <?php foreach($sponsors as $sponsor):?>
                        <!-- Modal -->
                        <div class="modal fade" id="editModal<?php echo $sponsor->id_sponsor; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel">Editar Patrocinador Agrotic</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form class="form-horizontal" enctype="multipart/form-data" method="post" id="addsponsors" action="./?action=sponsors&opt=update" role="form">
                                            <div class="form-group">
                                                <label for="name" class="col-lg-2 control-label">Area*</label>
                                                <div class="col-md-6">
                                                    <input type="text" name="name" value="<?php echo $sponsor->name;?>" class="form-control" id="name" placeholder="Nombre patrocinador"  minlength="3" maxlength="30">
                                                </div>
                                            </div>
                                            <input type="hidden" class="form-control" id="slide_img_aux" value="<?php echo $sponsor->image;?>" name="slide_img_aux">
                                            <div class="form-group">
                                                <label for="image" class="col-sm-3 control-label">Tamaño recomendado es de 900 x 500 píxeles.</label>
                                                <div class="col-md-9 fileinput fileinput-new" data-provides="fileinput">
                                                    <div class="fileinput-new thumbnail" style="max-width: 50%;" >
                                                        <img class="img-rounded" src="uploads/sponsors/<?php echo $sponsor->image;?>" style="width:190px;height:120px" />
                                                    </div>
                                                    <div>
                                                        <span class="btn btn-info btn-file"><span class="fileinput-new">Arrastre o Seleccione una imagen</span>
                                                        <input type="file" name="image" id="image" accept="image/png,image/jpeg,image/jpg,image/gif" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="status" class="col-lg-4 control-label" >Está activo?</label>
                                                <div class="col-md-6">
                                                    <div class="checkbox">
                                                        <label>
                                                        <input type="checkbox" name="status" <?php if($sponsor->status==1){ echo "checked";}?>> 
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-lg-offset-2 col-lg-10">
                                                    <input type="hidden" name="id_sponsor" value="<?php echo $sponsor->id_sponsor;?>">
                                                    <button type="submit" class="btn btn-primary">Actualizar patrocinador</button><a href="#" class="btn btn-danger" style="margin-left: 7px;" data-dismiss="modal"><i class="fa fa-times"> </i>&nbsp&nbspCancelar</a>
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
                echo "<p class='alert alert-danger'>No hay patrocinadores</p>";
            }
        ?>
        </div>
    </div>
</section>