<section class="content">
    <div class="row">
        <div class="col-md-12">
            <h1>Proyectos.</h1>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal">
                Nuevo Proyecto
            </button>
            <!-- Modal -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Nuevo Proyecto</h4>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal" enctype="multipart/form-data" method="post" id="addproyecto" action="./?action=proyectos&opt=add" role="form">
                            <div class="form-group">
                                <label for="title" class="col-lg-2 control-label">Titulo proyecto*</label>
                                <div class="col-md-6">
                                    <input type="text" name="title" required class="form-control" id="title" placeholder="Titulo" minlength="3" maxlength="120">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="imagen" class="col-sm-3 control-label">Tamaño recomendado es de 900 x 500 píxeles.</label>
                                <div class="col-md-9 fileinput fileinput-new" data-provides="fileinput">
                                    <div class="fileinput-new thumbnail" style="max-width: 50%;" >
                                        <img class="img-rounded" src="uploads/productos/demo.png" />
                                    </div>
                                    <div>
                                        <span class="btn btn-info btn-file"><span class="fileinput-new">Arrastre o Seleccione una imagen</span>
                                        <input type="file" name="imagen" id="imagen" required accept="image/png,image/jpeg,image/jpg,image/gif" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="description" class="col-lg-2 control-label">Descripción Breve*</label>
                                <div class="col-md-10">
                                    <textarea name="description" required rows="4" class="form-control" id="description" placeholder="Descripción Breve"  minlength="20" maxlength="2000"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="category" class="col-lg-2 control-label">Categoria *</label>
                                <div class="col-md-6">
                                    <select name="category" id="category" class="form-control formulario1 mb-5" required rows="4s">
                                        <option value="">-- Seleccione una categoria --</option>
                                        <option value="Capacidades_de_CTeI">Capacidades de CTeI</option>
                                        <option value="Gestion_de_las_Mesas_de_CTI_agropecuaria">Gestión de las Mesas de CTI agropecuaria</option>
                                        <option value="Biblioteca_Agropecuaria_de_Colombia">Biblioteca Agropecuaria de Colombia(BAC)</option>
                                        <option value="Oferta_Tecnologica">Oferta Tecnológica</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="url" class="col-lg-2 control-label">Dirección web*</label>
                                <div class="col-md-6">
                                    <input type="text" name="url" required class="form-control" id="url" placeholder="Dirección web" minlength="3" maxlength="120">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="documents" class="col-sm-3 control-label">Documento</label>
                                <div class="col-md-9 fileinput fileinput-new" data-provides="fileinput">
                                    <div>
                                        <span class="btn btn-info btn-file"><span class="fileinput-new">Arrastre o Seleccione un archivo</span>
                                        <input type="file" name="documents" id="documents" class="input-file" value="" accept=".pdf" required>
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
                                    <button type="submit" class="btn btn-primary">Agregar proyecto</button><a href="#" class="btn btn-danger" style="margin-left: 7px;" data-dismiss="modal"><i class="fa fa-times"> </i>&nbsp&nbspCancelar</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <br><br>
        <?php
            $proyectos = ProyectosData::getAll();
            if(count($proyectos)>0){
                // si hay proyectos
                ?>
                <div class="box box-primary">
                    <div class="box-body">
                        <table class="table table-bordered table-hover datatable">
                            <thead>
                                <th>imagen</th>
                                <th>Titulo</th>
                                <th>Categoria</th>
                                <th>Fecha</th>
                                <th>Estado</th>
                                <th></th>
                            </thead>
                            <?php
                            foreach($proyectos as $proyecto){
                                ?>
                                <tr>
                                    <td><img src="uploads/proyectos/<?php echo $proyecto->imagen;?>" style="width:90px;height:70px" > </td>
                                    <td><?php echo $proyecto->title; ?></td>
                                    
                                    <td><?php echo $proyecto->category; ?></td>
                                    <td><?php echo $proyecto->date_Creation; ?></td>
                                    <td>
                                        <?php if($proyecto->status==1):?>
                                            <i class="glyphicon glyphicon-ok"></i>
                                        <?php endif; ?>
                                        <?php if($proyecto->status==0):?>
                                            <i class="glyphicon glyphicon-remove"></i>
                                        <?php endif; ?>
                                    </td>
                                    <td style="width:130px;">
                                        <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#editModal<?php echo $proyecto->id_proyecto; ?>">
                                            Editar
                                        </button>
                                        <a href="./?action=proyectos&opt=del&idcitorga=<?php echo base64_encode($proyecto->id_proyecto);?>" class="btn btn-danger btn-xs">Eliminar</a>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </table>
                        <?php foreach($proyectos as $proyecto):?>
                        <!-- Modal -->
                        <div class="modal fade" id="editModal<?php echo $proyecto->id_proyecto; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel">Editar Proyecto</h4></br>
                                    </div>
                                    <div class="modal-body">
                                        <form class="form-horizontal" enctype="multipart/form-data" method="post" id="addproduct" action="./?action=proyectos&opt=update" role="form">
                                            <div class="form-group">
                                                <label for="title" class="col-lg-2 control-label">Titulo*</label>
                                                <div class="col-md-6">
                                                    <input type="text" name="title" value="<?php echo $proyecto->title;?>" class="form-control" id="title" placeholder="Proyecto"  minlength="5" maxlength="120">
                                                </div>
                                            </div>

                                            <input type="hidden" class="form-control" id="slide_img_aux" value="<?php echo $proyecto->imagen;?>" name="slide_img_aux">
                                            <div class="form-group">
                                                <label for="imagen" class="col-sm-3 control-label">Tamaño recomendado es de 900 x 500 píxeles.</label>
                                                <div class="col-md-9 fileinput fileinput-new" data-provides="fileinput">
                                                    <div class="fileinput-new thumbnail" style="max-width: 50%;" >
                                                        <img class="img-rounded" src="uploads/proyectos/<?php echo $proyecto->imagen;?>" style="width:190px;height:120px" />
                                                    </div>
                                                    <div>
                                                        <span class="btn btn-info btn-file"><span class="fileinput-new">Arrastre o Seleccione una imagen</span>
                                                        <input type="file" name="imagen" id="imagen" accept="image/png,image/jpeg,image/jpg,image/gif" />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="description" class="col-lg-2 control-label">Descripción Breve*</label>
                                                <div class="col-md-10">
                                                    <textarea name="description" required class="form-control" rows="4" id="description" placeholder="Descripción Breve" required  minlength="20" maxlength="2000"><?php echo $proyecto->description;?></textarea>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="category" class="col-lg-2 control-label">Categoria *</label>
                                                <div class="col-md-6">
                                                    <select name="category" id="category" class="form-control formulario1 mb-5" required rows="3">
                                                        <option value="<?php echo $proyecto->category;?>" selected><?php echo $proyecto->category;?></option>
                                                        <option value="">-- Seleccione una categoria --</option>
                                                        <option value="Capacidades_de_CTeI">Capacidades de CTeI</option>
                                                        <option value="Gestion_de_las_Mesas_de_CTI_agropecuaria">Gestión de las Mesas de CTI agropecuaria</option>
                                                        <option value="Biblioteca_Agropecuaria_de_Colombia">Biblioteca Agropecuaria de Colombia(BAC)</option>
                                                        <option value="Oferta_Tecnologica">Oferta Tecnológica</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="url" class="col-lg-2 control-label">Dirección web*</label>
                                                <div class="col-md-6">
                                                    <input type="text" name="url" value="<?php echo $proyecto->url;?>" required class="form-control" id="url" placeholder="Dirección web" minlength="3" maxlength="80">
                                                </div>
                                            </div>

                                            <input type="hidden" class="form-control" id="document_aux" value="<?php echo $proyecto->documents;?>" name="document_aux">
                                            <div class="form-group">
                                                <label for="documents" class="col-sm-3 control-label">Documento</label>
                                                <div class="col-md-9 fileinput fileinput-new" data-provides="fileinput">
                                                    <div>
                                                        <span class="btn btn-info btn-file"><span class="fileinput-new">Arrastre o Seleccione un archivo</span>
                                                        <input type="file" name="documents" id="documents" class="input-file" value="<?php echo $proyecto->documents;?>" accept=".pdf" >
                                                    </div><a href="uploads/proyectos/<?php echo $proyecto->documents;?>" target="_blank"><button type="button" class="btn btn-warning btn-xs">Ver</a>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="status" class="col-lg-4 control-label" >Está activo?</label>
                                                <div class="col-md-6">
                                                    <div class="checkbox">
                                                        <label>
                                                        <input type="checkbox" name="status" <?php if($proyecto->status==1){ echo "checked";}?>> 
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-lg-offset-2 col-lg-10">
                                                    <input type="hidden" name="id_proyecto" value="<?php echo $proyecto->id_proyecto;?>">
                                                    <button type="submit" class="btn btn-primary">Actualizar Proyecto</button><a href="#" class="btn btn-danger" style="margin-left: 7px;" data-dismiss="modal"><i class="fa fa-times"> </i>&nbsp&nbspCancelar</a>
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
                echo "<p class='alert alert-danger'>No hay proyectos</p>";
            }
        ?>
        </div>
    </div>
</section>