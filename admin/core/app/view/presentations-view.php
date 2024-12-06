
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
                        <form class="form-horizontal" enctype="multipart/form-data" method="post" id="addpresentations" action="./?action=presentations&opt=add" role="form">
                            <div class="form-group">
                                <label for="name" class="col-lg-2 control-label">Nombre de la presentación*</label>
                                <div class="col-md-6">
                                    <input type="text" name="name" required class="form-control" id="name" placeholder="Nombre de presentación" minlength="3" maxlength="60">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="nit" class="col-lg-2 control-label">Gramaje*</label>
                                <div class="col-md-6">
                                    <input type="number" name="gramaje" required class="form-control" id="gramaje" placeholder="Gramaje" minlength="1" maxlength="10">
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
            <!-- FIN Modal nueva presentación -->
        </div>
        
        <br><br>
        <?php
            $presentations = presentationsData::getAll();
            if(count($presentations)>0){
                // si hay proveedores
                ?>
                <div class="box box-primary">
                    <div class="box-body">
                        
                        <!-- Inicio tabla-->
                        <table class="table table-bordered table-hover datatable">
                            <thead>
                                <th>Id</th>
                                <th>Nombre</th>
                                <th>Gramaje</th>
                                <th></th>
                            </thead>
                            <?php
                            $id_aux=0;
                            foreach($presentations as $presentation){
                                ?>
                                <tr>
                                    <td><?php echo $presentation->id; ?></td>
                                    <td><?php echo $presentation->name; ?></td>
                                    <td><?php echo $presentation->grams; ?></td>
                                    
                                    
                                    <td style="width:130px;">
                                        <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#editModal<?php echo $presentation->id; ?>">
                                        Editar
                                    </button>
                                        <a href="./?action=presentations&opt=del&idcitorga=<?php echo base64_encode($presentation->id);?>" class="btn btn-danger btn-xs">Eliminar</a>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </table>
                        <!-- Fin tabla-->
                        
                        
                        <!-- Modal Editar-->
                        <?php foreach($presentations as $presentation):?>
                        <div class="modal fade" id="editModal<?php echo $presentation->id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel">Editar Presentación</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form class="form-horizontal" enctype="multipart/form-data" method="post" id="addpresentations" action="./?action=presentations&opt=update" role="form">
                                            <div class="form-group">
                                                <label for="name" class="col-lg-2 control-label">Nombre presentación*</label>
                                                <div class="col-md-6">
                                                    <input type="text" name="name" value="<?php echo $presentation->name;?>" required class="form-control" id="name" placeholder="Nombre" minlength="3" maxlength="60">
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="nit" class="col-lg-2 control-label">Gramaje*</label>
                                                <div class="col-md-6">
                                                    <input type="number" name="gramaje" value="<?php echo $presentation->grams;?>" required class="form-control" id="gramaje" placeholder="Gramaje" minlength="1" maxlength="13">
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <div class="col-lg-offset-2 col-lg-10">
                                                    <input type="hidden" name="id_presentation" value="<?php echo $presentation->id;?>">
                                                    <button type="submit" class="btn btn-primary">Actualizar Presentación</button><a href="#" class="btn btn-danger" style="margin-left: 7px;" data-dismiss="modal"><i class="fa fa-times"> </i>&nbsp&nbspCancelar</a>
                                                </div>
                                            </div>
                                        </form>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                        <!-- Fin Modal Editar-->
                        
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