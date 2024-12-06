<?php 
    
?>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <h1>Tips AgroTic Nariño</h1>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal">
                Nuevo tip
            </button>
            <!-- Modal -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Nuevo tip</h4>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal" enctype="multipart/form-data" method="post" id="addtips" action="./?action=tipsAgrotic&opt=add" role="form">
                            <div class="form-group">
                                <label for="title" class="col-lg-2 control-label">Titulo tips*</label>
                                <div class="col-md-6">
                                    <input type="text" name="title" required class="form-control" id="title" placeholder="Titulo tips" minlength="3" maxlength="50">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="description" class="col-lg-2 control-label">Descripción breve*</label>
                                <div class="col-md-6">
                                    <input type="text" name="description" required class="form-control" id="description" placeholder="Descripción breve" minlength="3" maxlength="200">
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
                                <label for="filespdf" class="col-sm-3 control-label">Tamaño maximo es de 2 megas.</label>
                                <div class="col-md-9 fileinput fileinput-new" data-provides="fileinput">
                                    <div>
                                        <span class="btn btn-info btn-file"><span class="fileinput-new">Arrastre o Seleccione un archivo</span>
                                        <input type="file" name="filespdf" id="filespdf" required accept=".pdf" />
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">    
                                <div class="form-group">
                                    <label for="facebook" class="col-sm-3 control-label">Facebook*</label>
                                    <div class="col-sm-9">
                                        <input type="text" placeholder="Facebook" name="facebook" class="form-control" id="facebook" minlength="5" maxlength="100">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">  
                                <div class="form-group">
                                    <label for="youtube" class="col-sm-3 control-label">Youtube*</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="youtube" class="form-control" id="youtube" placeholder="Youtube" minlength="5" maxlength="100">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">  
                                <div class="form-group">
                                    <label for="instagram" class="col-sm-3 control-label">Instagram*</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="instagram" class="form-control" id="instagram" placeholder="Instagram" minlength="5" maxlength="100">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="status" class="col-sm-3 control-label" >Activo ?</label>
                                    <div class="col-sm-9">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="status" > 
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>  
                            <div class="form-group">
                                <div class="col-lg-offset-2 col-lg-10">
                                    <button type="submit" class="btn btn-primary">Agregar Tip</button><a href="#" class="btn btn-danger" style="margin-left: 7px;" data-dismiss="modal"><i class="fa fa-times"> </i>&nbsp&nbspCancelar</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <br><br>
        <?php
            $tips = tipsAgroticData::getAll();
            if(count($tips)>0){
                // si hay tips
                ?>
                <div class="box box-primary">
                    <div class="box-body">
                        <table class="table table-bordered table-hover datatable">
                            <thead>
                                <th>Titulo</th>
                                <th>Descripcion</th>
                                <th>Imagen</th>
                                <th>Documento</th>
                                <th>Estado</th>
                                <th></th>
                            </thead>
                            <?php
                            foreach($tips as $tip){
                                ?>
                                <tr>
                                    <td><?php echo $tip->title; ?></td>
                                    <td><?php echo $tip->description; ?></td>
                                    <td><img src="uploads/tips/<?php echo $tip->image  ;?>" style="width:90px;height:70px" > </td>
                                    <td>
                                        <a  href="uploads/tips/<?php echo $tip->tipsPdf;?>" target="_blank"><button type="button" class="btn btn-warning btn-xs">Ver</a>
                                    </td>
                                    <td>
                                        <?php if($tip->status==1):?>
                                            <i class="glyphicon glyphicon-ok"></i>
                                        <?php endif; ?>
                                        <?php if($tip->status==0):?>
                                            <i class="glyphicon glyphicon-remove"></i>
                                        <?php endif; ?>
                                    </td>
                                    <td style="width:130px;">
                                        <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#editModal<?php echo $tip->id_tipsAgrotic; ?>">
                                            Editar
                                        </button>
                                        <a href="./?action=tipsAgrotic&opt=del&idcitorga=<?php echo base64_encode($tip->id_tipsAgrotic);?>" class="btn btn-danger btn-xs">Eliminar</a>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </table>
                        <?php foreach($tips as $tip):?>
                        <!-- Modal -->
                        <div class="modal fade" id="editModal<?php echo $tip->id_tipsAgrotic; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel">Editar tip</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form class="form-horizontal" enctype="multipart/form-data" method="post" id="addproducer" action="./?action=tipsAgrotic&opt=update" role="form">
                                            <div class="form-group">
                                                <label for="title" class="col-lg-2 control-label">Titulo tip*</label>
                                                <div class="col-md-6">
                                                    <input type="text" name="title" value="<?php echo $tip->title;?>" required class="form-control" id="title" placeholder="Titulo tip" minlength="3" maxlength="50">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="description" class="col-lg-2 control-label">Descripción breve*</label>
                                                <div class="col-md-6">
                                                    <input type="text" name="description" value="<?php echo $tip->description;?>" required class="form-control" id="description" placeholder="Descripción breve" minlength="3" maxlength="200">
                                                </div>
                                            </div>
                                            <input type="hidden" class="form-control" id="slide_img_aux" value="<?php echo $tip->image;?>" name="slide_img_aux">
                                            <div class="form-group">
                                                <label for="image" class="col-sm-3 control-label">Tamaño recomendado es de 900 x 500 píxeles.</label>
                                                <div class="col-md-9 fileinput fileinput-new" data-provides="fileinput">
                                                    <div class="fileinput-new thumbnail" style="max-width: 50%;" >
                                                        <img class="img-rounded" src="uploads/tips/<?php echo $tip->image;?>" style="width:190px;height:120px" />
                                                    </div>
                                                    <div>
                                                        <span class="btn btn-info btn-file"><span class="fileinput-new">Arrastre o Seleccione una imagen</span>
                                                        <input type="file" name="image" id="image" accept="image/png,image/jpeg,image/jpg,image/gif" />
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="hidden" class="form-control" id="tips_aux"      value="<?php echo $tip->tipsPdf;?>" name="tips_aux">
                                            <div class="form-group">
                                                <label for="filespdf" class="col-sm-3 control-label">Archivo pdf</label>
                                                <div class="col-md-9 fileinput fileinput-new" data-provides="fileinput">
                                                    <div>
                                                        <span class="btn btn-info btn-file"><span class="fileinput-new">Arrastre o Seleccione un archivo</span>
                                                        <input type="file" name="filespdf" id="filespdf" class="input-file" value="<?php echo $tip->tipsPdf;?>" accept=".pdf" >
                                                    </div><a href="uploads/tips/<?php echo $tip->tipsPdf;?>" target="_blank"><button type="button" class="btn btn-warning btn-xs">Ver</a>
                                                </div>
                                            </div>
                                            <div class="col-md-6">    
                                                <div class="form-group">
                                                    <label for="facebook" class="col-sm-3 control-label">Facebook*</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" value="<?php echo $tip->facebook;?>" placeholder="Facebook" name="facebook" class="form-control" id="facebook" minlength="5" maxlength="100">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">  
                                                <div class="form-group">
                                                    <label for="youtube" class="col-sm-3 control-label">Youtube*</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" value="<?php echo $tip->youtube;?>" name="youtube" class="form-control" id="youtube" placeholder="Youtube" minlength="5" maxlength="100">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">  
                                                <div class="form-group">
                                                    <label for="instagram" class="col-sm-3 control-label">Instagram*</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" value="<?php echo $tip->instagram;?>" name="instagram" class="form-control" id="instagram" placeholder="Instagram" minlength="5" maxlength="100">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="status" class="col-sm-3 control-label" >Está activo?</label>
                                                    <div class="col-sm-6">
                                                        <div class="checkbox">
                                                            <label>
                                                            <input type="checkbox" name="status" <?php if($tip->status==1){ echo "checked";}?>> 
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-lg-offset-2 col-lg-10">
                                                    <input type="hidden" name="id_tipsAgrotic" value="<?php echo $tip->id_tipsAgrotic;?>">
                                                    <button type="submit" class="btn btn-primary">Actualizar tip</button><a href="#" class="btn btn-danger" style="margin-left: 7px;" data-dismiss="modal"><i class="fa fa-times"> </i>&nbsp&nbspCancelar</a>
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
                echo "<p class='alert alert-danger'>No hay tips para mostrar</p>";
            }
        ?>
        </div>
    </div>
</section>