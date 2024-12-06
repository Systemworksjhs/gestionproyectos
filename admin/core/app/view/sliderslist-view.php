<section class="content">
    <div class="row">
        <div class="col-md-12">
            <h1>Sliders</h1>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal">
                Nuevo slider
            </button>
            <!-- Modal -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Nuevo slider</h4>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal" enctype="multipart/form-data" method="post" id="addcategory" action="index.php?action=slider&opt=add" role="form">
                            <div class="form-group">
                                <label for="title" class="col-sm-3 control-label">Titulo</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="title" value="" required name="title" minlength="10" maxlength="50">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="description" class="col-sm-3 control-label">Descripción</label>
                                <div class="col-sm-9">
                                <textarea class="form-control " rows="5" id="description" required name="description" minlength="10" maxlength="100"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="image" class="col-sm-3 control-label">Tamaño recomendado es de 900 x 500 píxeles.</label>
                                <div class="col-md-9 fileinput fileinput-new" data-provides="fileinput">
                                    <div class="fileinput-new thumbnail" style="max-width: 50%;" >
                                        <img class="img-rounded" src="uploads/sliders/demo.png" />
                                    </div>
                                    <div>
                                        <span class="btn btn-info btn-file"><span class="fileinput-new">Selecciona una imagen</span>
                                        <input type="file" name="image" id="image" required accept="image/png,image/jpeg,image/jpg,image/gif" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="text_botton" class="col-sm-3 control-label">Texto del boton</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="text_botton" name="text_botton" value="Ver ahora!" minlength="5" maxlength="20">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="url_botton" class="col-sm-3 control-label">URL del boton</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="url_botton" name="url_botton" value="" minlength="10" maxlength="250">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="texto_boton" class="col-sm-3 control-label">Color del boton</label>
                                <div class="col-sm-9">
                                    <button type="button" class="btn btn-info btn-sm" name="style_botton"><input type="radio" name="style_botton" value="info" checked> </button> 
                                    <button type="button" class="btn btn-warning btn-sm" name="style_botton"><input type="radio" name="style_botton" value="warning"> </button> 
                                    <button type="button" class="btn btn-primary btn-sm" name="style_botton"><input type="radio" name="style_botton" value="primary">  </button>
                                    <button type="button" class="btn btn-success btn-sm" name="style_botton"><input type="radio" name="style_botton" value="success">  </button> 
                                    <button type="button" class="btn btn-danger btn-sm" name="style_botton"><input type="radio" name="style_botton" value="danger">  </button> 
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="order_slider" class="col-sm-3 control-label">Orden</label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" id="order_slider" name="order_slider" value="1">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="status" class="col-sm-3 control-label">Estado</label>
                                <div class="col-sm-9">
                                    <select class="form-control" id="status" required name="status">
                                        <option value="0" >Inactivo</option>
                                        <option value="1" >Activo</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div id='loader'></div>
                                <div class='outer_div'></div>
                                <div class="col-sm-offset-3 col-sm-9">
                                    <button type="submit" class="btn btn-success">Agregar nuevo slider</button><a href="#" class="btn btn-danger" style="margin-left: 7px;" data-dismiss="modal"><i class="fa fa-times"> </i>&nbsp&nbspCancelar</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <br><br>
        <?php
            $news = SliderData::getAll();
            if(count($news)>0){
                // si hay articulos
                ?>
                <div class="box box-primary">
                    <div class="box-body">
                        <table class="table table-bordered table-hover datatable">
                            <thead>
                                <th>Id</th>
                                <th>Título</th>
                                <th>Descripción</th>
                                <th>Imagen</th>
                                <th>Texto boton</th>
                                <th>Url botón</th>
                                <th>Estado</th>
                                <th></th>
                            </thead>
                            <?php
                            foreach($news as $post){
                                ?>
                                <tr>
                                    <td><?php echo $post->id; ?></td>
                                    <td><?php echo $post->title; ?></td>
                                    <td><?php echo $post->description;  ?></td>
                                    <td><img src="uploads/sliders/<?php echo $post->url_image;?>" style="width:100px;height:70px" > </td>
                                    <td><?php echo $post->text_botton; ?></td>
                                    <td><?php echo $post->url_botton; ?></td>
                                    <td><?php if($post->status==1){ echo "<i class='fa fa-check'></i>"; }?></td>
                                    <td style="width:130px;">
                                        <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#editModal<?php echo $post->id; ?>">
                                            Editar
                                        </button>
                                        <a href="index.php?action=slider&opt=del&id=<?php echo $post->id;?>" class="btn btn-danger btn-xs">
                                            Eliminar
                                        </a>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                        </table>
                        <?php foreach($news as $post):?>
                        <!-- Modal -->
                            <div class="modal fade" id="editModal<?php echo $post->id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header"><img src="" alt="">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel">Editar información del slider</h4>
                                        </div>
                                        <div class="modal-body">
                                        <form class="form-horizontal" enctype="multipart/form-data" method="post" id="addproduct" action="index.php?action=slider&opt=update" role="form">
                                            <div class="form-group">
                                                <label for="title" class="col-sm-3 control-label">Titulo</label>
                                                <div class="col-sm-9">
                                                <input type="text" class="form-control" id="title" value="<?php echo $post->title;?>" required name="title" minlength="10" maxlength="50">
                                                
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="description" class="col-sm-3 control-label">Descripción</label>
                                                <div class="col-sm-9">
                                                    <textarea class="form-control " rows="5" id="description" required name="description" minlength="10" maxlength="100"><?php echo $post->description;?></textarea>
                                                </div>
                                            </div>
                                            <input type="hidden" class="form-control" id="slide_img_aux" value="<?php echo $post->url_image;?>" name="slide_img_aux">
                                            <div class="form-group">
                                                <label for="image" class="col-sm-3 control-label">Tamaño recomendado es de 900 x 500 píxeles.</label>
                                                <div class="col-md-9 fileinput fileinput-new" data-provides="fileinput">
                                                    <div class="fileinput-new thumbnail" style="max-width: 50%;" >
                                                        <img class="img-rounded" src="uploads/sliders/<?php echo $post->url_image;?>" style="width:190px;height:120px" />
                                                    </div>
                                                    <div>
                                                        <span class="btn btn-info btn-file"><span class="fileinput-new">Selecciona una imagen</span>
                                                        <input type="file" name="image" id="image" accept="image/png,image/jpeg,image/jpg,image/gif" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="text_botton" class="col-sm-3 control-label">Texto del boton</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="text_botton" name="text_botton" value="<?php echo $post->text_botton?>" minlength="5" maxlength="20">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="url_botton" class="col-sm-3 control-label">URL del boton</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="url_botton" name="url_botton" value="<?php echo $post->url_botton;?>" minlength="10" maxlength="250">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="style_botton" class="col-sm-3 control-label">Color del boton</label>
                                                <div class="col-sm-9">
                                                    <button type="button" class="btn btn-info btn-sm"><input type="radio" name="style_botton" value="info" <?php if ($post->style_botton=="info"){echo "checked";}?>> </button> 
                                                    <button  type="button" class="btn btn-warning btn-sm"><input type="radio" name="style_botton" value="warning" <?php if ($post->style_botton=="warning"){echo "checked";}?>> </button> 
                                                    <button type="button" class="btn btn-primary btn-sm"><input type="radio" name="style_botton" value="primary" <?php if ($post->style_botton=="primary"){echo "checked";}?>>  </button>
                                                    <button type="button" class="btn btn-success btn-sm"><input type="radio" name="style_botton" value="success" <?php if ($post->style_botton=="success"){echo "checked";}?>>  </button> 
                                                    <button type="button" class="btn btn-danger btn-sm"><input type="radio" name="style_botton" value="danger" <?php if ($post->style_botton=="danger"){echo "checked";}?>>  </button> 
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="order_slider" class="col-sm-3 control-label">Orden</label>
                                                <div class="col-sm-9">
                                                    <input type="number" class="form-control" id="order_slider" name="order_slider" value="<?php echo $post->order_slider;?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="status" class="col-sm-3 control-label">Estado</label>
                                                <div class="col-sm-9">
                                                    <select class="form-control" id="status" required name="status">
                                                        <option value="0" <?php if($post->status==0){echo "selected";} ?>>Inactivo</option>
                                                        <option value="1" <?php if($post->status==1){echo "selected";} ?>>Activo</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div id='loader'></div>
                                                <div class='outer_div'></div>
                                                <div class="col-sm-offset-3 col-sm-9">
                                                    <input type="hidden" name="user_id" value="<?php echo $post->id;?>">
                                                    <button type="submit" class="btn btn-success">Actualizar slider</button><a href="#" class="btn btn-danger" style="margin-left: 7px;" data-dismiss="modal"><i class="fa fa-times"> </i>&nbsp&nbspCancelar</a>
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
                echo "<p class='alert alert-danger'>No se encontraron sliders publicados</p>";
            }
            ?>
        </div>
    </div>
</section>