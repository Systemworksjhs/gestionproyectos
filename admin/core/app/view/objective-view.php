<section class="content">
    <div class="row">
        <div class="col-md-12">
            <h1>Control Objetivos</h1>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal">
                Nuevo objetivo
            </button>
            <!-- Modal -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Nuevo objetivo</h4>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal" enctype="multipart/form-data" method="post" id="addacerca" action="./?action=objective&opt=add" role="form">
                            <div class="form-group">
                                <label for="title" class="col-sm-3 control-label">Titulo objetivo</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="title" placeholder="Titulo objetivo" required name="title" minlength="4" maxlength="50">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="description" class="col-sm-3 control-label">Descripción</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control " rows="5" id="description" required name="description" minlength="10" maxlength="300"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="status" class="col-sm-3 control-label" >Esta activo ? </label>
                                <div class="col-sm-9">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="status"> 
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div id='loader'></div>
                                <div class='outer_div'></div>
                                <div class="col-sm-offset-3 col-sm-9">
                                    <button type="submit" class="btn btn-success">Agregar nuevo objetivo</button><a href="#" class="btn btn-danger" style="margin-left: 7px;" data-dismiss="modal"><i class="fa fa-times"> </i>&nbsp&nbspCancelar</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <br><br>
        <?php
            $objetives = ObjectiveData::getAll();
            if(count($objetives)>0){
                // si hay objetivos
                ?>
                <div class="box box-primary">
                    <div class="box-body">
                        <table class="table table-bordered table-hover datatable">
                            <thead>
                                <th>Objetivo</th>
                                <th>Descripción</th>
                                <th>Estado</th>
                                <th></th>
                            </thead>
                            <?php
                            foreach($objetives as $objetive){
                                ?>
                                <tr>
                                    <td><?php echo $objetive->title; ?></td>
                                    <td><?php echo $objetive->description; ?></td>
                                    <td>
                                        <?php if($objetive->status==1):?>
											<i class="glyphicon glyphicon-ok"></i>
										<?php endif; 
                                        if($objetive->status==0):?>
											<i class="glyphicon glyphicon-remove"></i>
										<?php endif; ?>
                                    </td>
                                    <td style="width:130px;">
                                        <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#editModal<?php echo $objetive->id_objective; ?>">
                                            Editar
                                        </button>
                                        <a href="./?action=objective&opt=del&id=<?php echo $objetive->id_objective;?>" class="btn btn-danger btn-xs">
                                            Eliminar
                                        </a>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                        </table>
                        <?php foreach($objetives as $objetive):?>
                        <!-- Modal -->
                            <div class="modal fade" id="editModal<?php echo $objetive->id_objective; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header"><img src="" alt="">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel">Editar información del objetivo</h4>
                                        </div>
                                        <div class="modal-body">
                                        <form class="form-horizontal" enctype="multipart/form-data" method="post" id="addcontenido" action="./?action=objective&opt=update" role="form">
                                            
                                            <div class="form-group">
                                                <label for="title" class="col-sm-3 control-label">Objetivo</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="title" value="<?php echo $objetive->title;?>" required name="title" minlength="5" maxlength="50">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="description" class="col-sm-3 control-label">Descripción</label>
                                                <div class="col-sm-9">
                                                    <textarea class="form-control " rows="5" id="description" required name="description" minlength="10" maxlength="300"><?php echo $objetive->description;?></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="status" class="col-sm-3 control-label" >Esta activo ? </label>
                                                <div class="col-sm-9">
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" name="status" <?php if($objetive->status==1){ echo "checked";}?>> 
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div id='loader'></div>
                                                <div class='outer_div'></div>
                                                <div class="col-sm-offset-3 col-sm-9">
                                                    <input type="hidden" name="id_objective" value="<?php echo $objetive->id_objective;?>">
                                                    <button type="submit" class="btn btn-success">Actualizar objetivo</button><a href="#" class="btn btn-danger" style="margin-left: 7px;" data-dismiss="modal"><i class="fa fa-times"> </i>&nbsp&nbspCancelar</a>
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
                echo "<p class='alert alert-danger'>No se encontraron contenidos publicados publicados</p>";
            }
            ?>
        </div>
    </div>
</section>