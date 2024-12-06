<section class="content">
    <div class="row">
        <div class="col-md-12">
            <h1>Configuración global Agrotic</h1>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-default" data-toggle="modal" data-target="">
                Nueva configuración
            </button>
            <!-- Modal -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Nueva configuración</h4>
                    </div>
                </div>
            </div>
        </div>
        <br><br>
        <?php
            $setups = configurationData::getAll();
            if(count($setups)>0){
                // si hay setup inicial
                ?>
                <div class="box box-primary">
                    <div class="box-body">
                        <table class="table table-bordered table-hover datatable">
                            <thead>
                                <th>Id</th>
                                <th>Logo login</th>
                                <th>Fondo Login</th>
                                <th>Favicon</th>
                                <th>Cargando</th>
                                <th>Creado</th>
                                <th></th>
                            </thead>
                            <?php
                            foreach($setups as $setup){
                                ?>
                                <tr>
                                    <td><?php echo $setup->id_configuration; ?></td>
                                    <td><img src="uploads/setup/<?php echo $setup->logoLogin;?>" style="width:90px;height:90px" > </td>
                                    <td><img src="uploads/setup/<?php echo $setup->fondoLogin;?>" style="width:90px;height:90px" > </td>
                                    <td><img src="uploads/setup/<?php echo $setup->favicon;?>" style="width:90px;height:90px" > </td>
                                    <td><img src="uploads/setup/<?php echo $setup->loading;?>" style="width:90px;height:90px" > </td>
                                    <td><?php echo $setup->created_at; ?></td>
                                    <td style="width:130px;">
                                        <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#editModal<?php echo $setup->id_configuration; ?>">
                                            Editar
                                        </button>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                        </table>
                        <?php foreach($setups as $setup):?>
                        <!-- Modal -->
                            <div class="modal fade" id="editModal<?php echo $setup->id_configuration; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel">Editar Configuración</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form class="form-horizontal" enctype="multipart/form-data" method="post" id="addsetup" action="./?action=configuration&opt=update" role="form">
                                                <div class="form-group">
                                                    <input type="hidden" class="form-control" id="slide_img_aux1" value="<?php echo $setup->logoLogin;?>" name="slide_img_aux1">
                                                    <label for="logoLogin" class="col-sm-3 control-label">Tamaño recomendado es de 900 x 500 píxeles.</label>
                                                    <div class="col-md-9 fileinput fileinput-new" data-provides="fileinput">
                                                        <div class="fileinput-new thumbnail" style="max-width: 50%;" >
                                                            <img class="img-rounded" src="uploads/setup/<?php echo $setup->logoLogin;?>" style="width:190px;height:120px" />
                                                        </div>
                                                        <div>
                                                            <span class="btn btn-info btn-file"><span class="fileinput-new">Arrastre o Seleccione una imagen</span>
                                                            <input type="file" name="logoLogin" id="logoLogin" accept="image/png,image/jpeg,image/jpg,image/gif" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <input type="hidden" class="form-control" id="slide_img_aux2" value="<?php echo $setup->logoLogin;?>" name="slide_img_aux2">
                                                    <label for="fondoLogin" class="col-sm-3 control-label">Tamaño recomendado es de 900 x 500 píxeles.</label>
                                                    <div class="col-md-9 fileinput fileinput-new" data-provides="fileinput">
                                                        <div class="fileinput-new thumbnail" style="max-width: 50%;" >
                                                            <img class="img-rounded" src="uploads/setup/<?php echo $setup->fondoLogin;?>" style="width:190px;height:120px" />
                                                        </div>
                                                        <div>
                                                            <span class="btn btn-info btn-file"><span class="fileinput-new">Arrastre o Seleccione una imagen</span>
                                                            <input type="file" name="fondoLogin" id="fondoLogin" accept="image/png,image/jpeg,image/jpg,image/gif" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <input type="hidden" class="form-control" id="slide_img_aux3" value="<?php echo $setup->favicon;?>" name="slide_img_aux3">
                                                    <label for="favicon" class="col-sm-3 control-label">Tamaño recomendado es de 900 x 500 píxeles.</label>
                                                    <div class="col-md-9 fileinput fileinput-new" data-provides="fileinput">
                                                        <div class="fileinput-new thumbnail" style="max-width: 50%;" >
                                                            <img class="img-rounded" src="uploads/setup/<?php echo $setup->favicon;?>" style="width:190px;height:120px" />
                                                        </div>
                                                        <div>
                                                            <span class="btn btn-info btn-file"><span class="fileinput-new">Arrastre o Seleccione una imagen</span>
                                                            <input type="file" name="favicon" id="favicon" accept="image/png,image/jpeg,image/jpg,image/gif" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <input type="hidden" class="form-control" id="slide_img_aux3" value="<?php echo $setup->favicon;?>" name="slide_img_aux4">
                                                    <label for="loading" class="col-sm-3 control-label">Tamaño recomendado es de 900 x 500 píxeles.</label>
                                                    <div class="col-md-9 fileinput fileinput-new" data-provides="fileinput">
                                                        <div class="fileinput-new thumbnail" style="max-width: 50%;" >
                                                            <img class="img-rounded" src="uploads/setup/<?php echo $setup->loading;?>" style="width:190px;height:120px" />
                                                        </div>
                                                        <div>
                                                            <span class="btn btn-info btn-file"><span class="fileinput-new">Arrastre o Seleccione una imagen</span>
                                                            <input type="file" name="loading" id="loading" accept="image/png,image/jpeg,image/jpg,image/gif" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-lg-offset-2 col-lg-10">
                                                    <input type="hidden" name="id_configuration" value="<?php echo $setup->id_configuration;?>">
                                                    <button type="submit" class="btn btn-primary">Actualizar configuración</button><a href="#" class="btn btn-danger" style="margin-left: 7px;" data-dismiss="modal"><i class="fa fa-times"> </i>&nbsp&nbspCancelar</a>
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
                echo "<p class='alert alert-danger'>No hay configuración inicial</p>";
            }
            ?>
        </div>
    </div>
</section>