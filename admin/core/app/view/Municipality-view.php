<section class="content">
    <div class="row">
        <div class="col-md-12">
            <h1>Control municipios</h1>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal">
                Nuevo municipio
            </button>
            <!-- Modal -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Nuevo municipio</h4>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal" enctype="multipart/form-data" method="post" id="addacerca" action="./?action=Municipality&opt=add" role="form">
                            <div class="form-group">
                                <label for="name_municipality" class="col-sm-3 control-label">Nombre municipio</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="name_municipality" placeholder="Nombre municipio" required name="name_municipality" minlength="4" maxlength="40">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="description" class="col-sm-3 control-label">Descripción</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control " rows="5" id="description" required name="description" minlength="10" maxlength="500"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="image" class="col-sm-3 control-label">Tamaño recomendado es de 900 x 500 píxeles.</label>
                                <div class="col-md-9 fileinput fileinput-new" data-provides="fileinput">
                                    <div>
                                        <span class="btn btn-info btn-file"><span class="fileinput-new">Selecciona imagen principal</span>
                                        <input type="file" name="image" id="image" required accept="image/png,image/jpeg,image/jpg,image/gif" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="twiter" class="col-sm-3 control-label">Twitter</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="twiter"placeholder="Twitter" required name="twiter" minlength="10" maxlength="50">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="instagram" class="col-sm-3 control-label">Instagram</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="instagram" placeholder="Instagram" required name="instagram" minlength="10" maxlength="50">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="facebook" class="col-sm-3 control-label">Facebook</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="facebook" placeholder="Facebook" required name="facebook" minlength="10" maxlength="50">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="url_web" class="col-sm-3 control-label">Página web</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="url_web" placeholder="Página web" required name="url_web" minlength="10" maxlength="50">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email" class="col-sm-3 control-label">Correo electrónico</label>
                                <div class="col-sm-9">
                                    <input type="email" class="form-control" id="email" placeholder="Correo electrónico" required name="email" minlength="10" maxlength="60">
                                </div>
                            </div>
                            <div class="form-group">
                                <div id='loader'></div>
                                <div class='outer_div'></div>
                                <div class="col-sm-offset-3 col-sm-9">
                                    <button type="submit" class="btn btn-success">Agregar nuevo municipios</button><a href="#" class="btn btn-danger" style="margin-left: 7px;" data-dismiss="modal"><i class="fa fa-times"> </i>&nbsp&nbspCancelar</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <br><br>
        <?php
            $municipalities = MunicipalityData::getAll();
            if(count($municipalities)>0){
                // si hay articulos
                ?>
                <div class="box box-primary">
                    <div class="box-body">
                        <table class="table table-bordered table-hover datatable">
                            <thead>
                                <th>Id</th>
                                <th>Municipio</th>
                                <th>Imagen</th>
                                <th>Correo electrónico</th>
                                <th></th>
                            </thead>
                            <?php
                            foreach($municipalities as $itemmunicipalitie){
                                ?>
                                <tr>
                                    <td><?php echo $itemmunicipalitie->id_municipality; ?></td>
                                    <td><?php echo $itemmunicipalitie->name_municipality; ?></td>
                                    <td><img src="uploads/municipalities/<?php echo $itemmunicipalitie->image;?>" style="width:90px;height:90px" > </td>
                                    <td><?php echo $itemmunicipalitie->url_web; ?></td>
                                    <td style="width:130px;">
                                        <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#editModal<?php echo $itemmunicipalitie->id_municipality; ?>">
                                            Editar
                                        </button>
                                        <a href="./?action=Municipality&opt=del&id=<?php echo $itemmunicipalitie->id_municipality;?>" class="btn btn-danger btn-xs">
                                            Eliminar
                                        </a>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                        </table>
                        <?php foreach($municipalities as $itemmunicipalitie):?>
                        <!-- Modal -->
                            <div class="modal fade" id="editModal<?php echo $itemmunicipalitie->id_municipality; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header"><img src="" alt="">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel">Editar información municipio</h4>
                                        </div>
                                        <div class="modal-body">
                                        <form class="form-horizontal" enctype="multipart/form-data" method="post" id="addcontenido" action="./?action=Municipality&opt=update" role="form">
                                            
                                            <div class="form-group">
                                                <label for="name_municipality" class="col-sm-3 control-label">Nombre municipio</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="name_municipality" value="<?php echo $itemmunicipalitie->name_municipality;?>" required name="name_municipality" minlength="10" maxlength="60">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="description" class="col-sm-3 control-label">Descripción</label>
                                                <div class="col-sm-9">
                                                    <textarea class="form-control " rows="5" id="description" required name="description" minlength="10" maxlength="700"><?php echo $itemmunicipalitie->description;?></textarea>
                                                </div>
                                            </div>
                                            <input type="hidden" class="form-control" id="slide_img_aux1" value="<?php echo $itemmunicipalitie->image;?>" name="slide_img_aux1">
                                            <div class="form-group">
                                                <label for="image1" class="col-sm-3 control-label">Tamaño recomendado es de 900 x 500 píxeles.</label>
                                                <div class="col-md-9 fileinput fileinput-new" data-provides="fileinput">
                                                    <div class="fileinput-new thumbnail" style="max-width: 50%;" >
                                                        <img class="img-rounded" src="uploads/municipalities/<?php echo $itemmunicipalitie->image;?>" style="width:170px;height:170px" />
                                                    </div>
                                                    <div>
                                                        <span class="btn btn-info btn-file"><span class="fileinput-new">Selecciona una imagen</span>
                                                        <input type="file" name="image" id="image" accept="image/png,image/jpeg,image/jpg,image/gif" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="twiter" class="col-sm-3 control-label">Twitter</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="twiter"placeholder="Twitter" value="<?php echo $itemmunicipalitie->twiter;?>" name="twiter" minlength="10" maxlength="50">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="instagram" class="col-sm-3 control-label">Instagram</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="instagram" placeholder="Instagram" value="<?php echo $itemmunicipalitie->instagram;?>" name="instagram" minlength="10" maxlength="50">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="facebook" class="col-sm-3 control-label">Facebook</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="facebook" placeholder="Facebook" value="<?php echo $itemmunicipalitie->facebook;?>" name="facebook" minlength="10" maxlength="50">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="url_web" class="col-sm-3 control-label">Página web</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="url_web" placeholder="Página web" value="<?php echo $itemmunicipalitie->url_web;?>" required name="url_web" minlength="10" maxlength="50">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="email" class="col-sm-3 control-label">Correo electrónico</label>
                                                <div class="col-sm-9">
                                                    <input type="email" class="form-control" id="email" placeholder="Correo electrónico" value="<?php echo $itemmunicipalitie->email;?>" required name="email" minlength="10" maxlength="60">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div id='loader'></div>
                                                <div class='outer_div'></div>
                                                <div class="col-sm-offset-3 col-sm-9">
                                                    <input type="hidden" name="id_municipality" value="<?php echo $itemmunicipalitie->id_municipality;?>">
                                                    <button type="submit" class="btn btn-success">Actualizar municipio</button><a href="#" class="btn btn-danger" style="margin-left: 7px;" data-dismiss="modal"><i class="fa fa-times"> </i>&nbsp&nbspCancelar</a>
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