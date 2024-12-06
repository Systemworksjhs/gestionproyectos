<?php $u = UserData::getById($_SESSION["user_id"]); ?>
<?php if(($u->kind==1)or($u->kind==5)or($u->kind==5)):?>
    <section class="content">
    <div class="row">
        <div class="col-md-12">
            <h1>Activar productores</h1>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal">
                Nuevo productor
            </button>
            <!-- Modal -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Nuevo productor</h4>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal" enctype="multipart/form-data" method="post" id="addcategory" action="index.php?action=productores&opt=add" role="form">
                            <div class="form-group">
                                <label for="title" class="col-lg-2 control-label">Titulo*</label>
                                <div class="col-md-10">
                                    <input type="text" name="title" required class="form-control" id="title" placeholder="Titulo"  minlength="10" maxlength="160">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="brief" class="col-lg-2 control-label">Descripcion Breve*</label>
                                <div class="col-md-10">
                                    <textarea name="brief" required rows="4" class="form-control" id="brief" placeholder="Descripcion Breve"  minlength="20" maxlength="300"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="content" class="col-lg-2 control-label">Contenido *</label>
                                <div class="col-md-10">
                                    <textarea name="content" required rows="6" required class="form-control" id="content" placeholder="Contenido " minlength="20" maxlength="2500"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="image" class="col-lg-2 control-label">Imagen destacada (1920x1080)*</label>
                                <div class="col-md-6">
                                    <input type="file" name="image" required accept="image/png,image/jpeg,image/jpg,image/gif" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="posturl" class="col-lg-2 control-label">Url externa</label>
                                <div class="col-md-10">
                                    <input type="text" name="posturl" class="form-control" id="posturl" placeholder="Url noticia externa"  minlength="10" maxlength="200">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="formUrl" class="col-lg-2 control-label">Enlace a formulario</label>
                                <div class="col-md-10">
                                    <input type="text" name="formUrl" class="form-control" id="formUrl" placeholder="Enlace a formulario"  minlength="10" maxlength="200">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="category_id" class="col-lg-2 control-label">Categoria </label>
                                <div class="col-md-6">
                                    <select name="category_id" class="form-control" required>
                                    <option value="">-- Seleccione categoria --</option>
                                        <?php foreach(categories_NewsData::getAll() as $g):?>
                                        <option value="<?php echo $g->id;  ?>"><?php echo $g->name; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="dateRegistrer" class="col-lg-2 control-label">Fecha*</label>
                                <div class="col-md-6">
                                    <input type="date" name="dateRegistrer" required class="form-control" id="dateRegistrer">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-offset-2 col-lg-10">
                                    <button type="submit" class="btn btn-primary">Agregar Noticia</button><a href="#" class="btn btn-danger" style="margin-left: 7px;" data-dismiss="modal"><i class="fa fa-times"> </i>&nbsp&nbspCancelar</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <br><br>
        <?php
            $productores = ProductoresData::getAll();
            if(count($productores)>0){
                // si hay noticias
                ?>
                <div class="box box-primary">
                    <div class="box-body">
                        <table class="table table-bordered table-hover datatable">
                            <thead>
                                <th>Id</th>
                                <th>Nombre</th>
                                <th>Dirección</th>
                                <th>Teléfono</th>
                                <th>Municipio</th>
                                <th>Registro</th>
                                <th></th>
                            </thead>
                            <?php
                            foreach($productores as $productor){
                                ?>
                                <tr>
                                    <td><?php echo $productor->id_initiative; ?></td>
                                    <td><?php echo $productor->name_initiative; ?></td>
                                    <td><?php echo $productor->direction; ?></td>
                                    <td><?php echo $productor->phone; ?></td>
                                    <td><?php echo $productor->cod_municipality; ?></td>
                                    <td><?php echo $productor->fechacreacion; ?>
                                        <a href="../../uploads/producers/<?php echo $productor->documento;?>" target="_blank"><button type="button" class="btn btn-warning btn-xs">Ver</a>
                                    </td>
                                    <td style="width:130px;">
                                        <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#editModal<?php echo $productor->id_initiative; ?>">
                                            Editar
                                        </button>
                                        <a href="index.php?action=productores&opt=del&id=<?php echo $productor->id_initiative;?>" class="btn btn-danger btn-xs">
                                            Eliminar
                                        </a>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                        </table>
                        <?php foreach($productores as $productor):?>
                        <!-- Modal -->
                            <div class="modal fade" id="editModal<?php echo $productor->id_initiative; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel">Editar Productor</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form class="form-horizontal" enctype="multipart/form-data" method="post" id="addproduct" action="index.php?action=productores&opt=update" role="form">
                                                <div class="form-group">
                                                    <label for="nombreiniciativa" class="col-lg-2 control-label">Nombres*</label>
                                                    <div class="col-md-10">
                                                        <input type="text" name="nombreiniciativa" value="<?php echo $productor->name_initiative;?>" class="form-control" id="nombreiniciativa" placeholder="Nombre iniciativa" required  minlength="10" maxlength="160" >
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="brief" class="col-lg-2 control-label">Descripcion Breve*</label>
                                                    <div class="col-md-10">
                                                        <textarea name="brief" required class="form-control" rows="4" id="brief" placeholder="Descripcion Breve" required  minlength="10" maxlength="300 "><?php echo $productor->description_initiative;?></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="correodecline" class="col-lg-2 control-label">Correo electrónico</label>
                                                    <div class="col-md-10">
                                                        <input type="email" name="correodecline" value="<?php echo $productor->email;?>" class="form-control" id="correodecline" placeholder="Correo electrónico"  minlength="10" maxlength="200" readonly>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label for="dateRegistrer" class="col-lg-2 control-label">Documento</label>
                                                    <div class="col-md-6">
                                                        <a href="../../uploads/producers/<?php echo $productor->documento;?>" target="_blank"><button type="button" class="btn btn-warning btn-xs">Ver</a>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="dateRegistrer" class="col-lg-2 control-label">Fecha registro*</label>
                                                    <div class="col-md-6">
                                                        <input type="hidden" name="dateaux" value="<?php echo $productor->fechacreacion;?>">
                                                        <input type="date" name="dateRegistrer" value="<?php echo $productor->fechacreacion; ?>" class="form-control" id="dateRegistrer" placeholder="Fecha de registro" minlength="10" maxlength="10">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="status" class="col-lg-2 control-label" >Activar productor</label>
                                                    <div class="col-md-6">
                                                        <div class="checkbox">
                                                            <label>
                                                                <input type="checkbox" name="status" <?php if($productor->estado==1){ echo "checked";}?>> 
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label for="decline" class="col-lg-2 control-label" >Rechazar registro</label>
                                                    <div class="col-md-6">
                                                        <div class="checkbox">
                                                            <label>
                                                                <input type="checkbox" name="decline"> 
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label for="rejection_reason" class="col-lg-2 control-label">Motivo de rechazo *</label>
                                                    <div class="col-md-10">
                                                        <textarea name="rejection_reason" rows="4" class="form-control" id="rejection_reason" placeholder="Motivo de rechazo"  minlength="20" maxlength="300"></textarea>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <div class="col-lg-offset-2 col-lg-10">
                                                    <input type="hidden" name="id_initiative" value="<?php echo $productor->id_initiative;?>">
                                                    <button type="submit" class="btn btn-primary">Actualizar proveedor</button><a href="#" class="btn btn-danger" style="margin-left: 7px;" data-dismiss="modal"><i class="fa fa-times"> </i>&nbsp&nbspCancelar</a>
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
                echo "<p class='alert alert-danger'>No hay noticias</p>";
            }
            ?>
        </div>
    </div>
</section>
<?php endif;?>