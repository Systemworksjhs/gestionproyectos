<section class="content">
    <div class="row">
        <div class="col-md-12">
            <h1>Noticias</h1>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal">
                Nueva noticia
            </button>
            <!-- Modal -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Nueva Noticia</h4>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal" enctype="multipart/form-data" method="post" id="addcategory" action="index.php?action=posts&opt=add" role="form">
                            <div class="form-group">
                                <label for="title" class="col-lg-2 control-label">Titulo*</label>
                                <div class="col-md-10">
                                    <input type="text" name="title" required class="form-control" id="title" placeholder="Titulo"  minlength="10" maxlength="100">
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
            $news = setupPost::getAll();
            if(count($news)>0){
                // si hay noticias
                ?>
                <div class="box box-primary">
                    <div class="box-body">
                        <table class="table table-bordered table-hover datatable">
                            <thead>
                                <th>Id</th>
                                <th>Imagen</th>
                                <th>Título</th>
                                <th>Categoria</th>
                                <th>Activo</th>
                                <th>Creación</th>
                                <th></th>
                            </thead>
                            <?php
                            foreach($news as $post){
                                ?>
                                <tr>
                                    <td><?php echo $post->id; ?></td>
                                    <td><img src="uploads/news/<?php echo $post->image;?>" style="width:90px;height:70px" > </td>
                                    <td><?php echo $post->title; ?></td>
                                    <td><?php echo categories_NewsData::getById($post->category_id)->name; ?></td>
                                    <td>
                                        <?php if($post->status==1):?>
											<i class="glyphicon glyphicon-ok"></i>
										<?php endif; 
                                        if($post->status==0):?>
											<i class="glyphicon glyphicon-remove"></i>
										<?php endif; ?>
                                    </td>
                                    <td><?php echo $post->created_at; ?></td>
                                    <td style="width:130px;">
                                        <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#editModal<?php echo $post->id; ?>">
                                            Editar
                                        </button>
                                        <a href="index.php?action=posts&opt=del&id=<?php echo $post->id;?>" class="btn btn-danger btn-xs">
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
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel">Editar Noticia</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form class="form-horizontal" enctype="multipart/form-data" method="post" id="addproduct" action="index.php?action=posts&opt=update" role="form">
                                                <div class="form-group">
                                                    <label for="title" class="col-lg-2 control-label">Titulo*</label>
                                                    <div class="col-md-10">
                                                    <input type="text" name="title" value="<?php echo $post->title;?>" class="form-control" id="title" placeholder="Titulo" required  minlength="10" maxlength="150" >
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="brief" class="col-lg-2 control-label">Descripcion Breve*</label>
                                                    <div class="col-md-10">
                                                    <textarea name="brief" required class="form-control" rows="4" id="brief" placeholder="Descripcion Breve" required  minlength="20" maxlength="300 "><?php echo $post->brief;?></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="content" class="col-lg-2 control-label">Contenido *</label>
                                                    <div class="col-md-10">
                                                    <textarea name="content" required class="form-control" rows="6" id="content" placeholder="Contenido " required  minlength="20" minlength="2500"><?php echo $post->content;?></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="image" class="col-lg-2 control-label">Imagen destacada (1920x1080)*</label>
                                                    <div class="fileinput-new thumbnail" style="max-width: 50%;" >
                                                        <img class="img-rounded" src="uploads/news/<?php echo $post->image;?>" style="width:190px;height:150px" />
                                                        <div class="col-md-6">
                                                            <input type="hidden" class="form-control" id="slide_img_aux" value="<?php echo $post->image;?>" name="slide_img_aux">
                                                            <input type="file" id="image" name="image" accept="image/png,image/jpeg,image/jpg,image/gif" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="dateRegistrer" class="col-lg-2 control-label">Fecha registro*</label>
                                                    <div class="col-md-6">
                                                        <input type="hidden" name="dateaux" value="<?php echo $post->dateRegistrer;?>">
                                                        <input type="date" name="dateRegistrer" value="<?php echo $post->dateRegistrer; ?>" class="form-control" id="dateRegistrer" placeholder="Fecha de registro" minlength="10" maxlength="10">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="category_id" class="col-lg-2 control-label">Categoria </label>
                                                    <div class="col-md-6">
                                                    <select name="category_id" class="form-control" required>
                                                    <option value="">-- Seleccione categoría --</option>
                                                        <?php foreach(categories_NewsData::getAll() as $g):?>
                                                        <option value="<?php echo $g->id;  ?>" <?php if($post->category_id==$g->id){ echo "selected"; }?>><?php echo $g->name; ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="status" class="col-lg-2 control-label" >Esta activo</label>
                                                    <div class="col-md-6">
                                                        <div class="checkbox">
                                                            <label>
                                                            <input type="checkbox" name="status" <?php if($post->status==1){ echo "checked";}?>> 
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-lg-offset-2 col-lg-10">
                                                    <input type="hidden" name="user_id" value="<?php echo $post->id;?>">
                                                    <button type="submit" class="btn btn-primary">Actualizar Artículo</button><a href="#" class="btn btn-danger" style="margin-left: 7px;" data-dismiss="modal"><i class="fa fa-times"> </i>&nbsp&nbspCancelar</a>
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