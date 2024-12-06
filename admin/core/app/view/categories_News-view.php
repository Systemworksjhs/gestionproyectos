<section class="content">
  <div class="row">
    <div class="col-md-12">
      <h1>Categorías</h1>
      <!-- Button trigger modal -->
      <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal">
        Nueva Categoría de noticia
      </button>
      <!-- Modal -->
      <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">Nueva Categoría</h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="post" id="addcategory" action="./?action=categories_News&opt=add" role="form">
                <div class="form-group">
                  <label for="nombre" class="col-lg-2 control-label">Nombre*</label>
                  <div class="col-md-6">
                    <input type="text" name="name" required class="form-control" id="name" placeholder="Nombre" minlength="4" maxlength="24">
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-lg-offset-2 col-lg-10">
                    <button type="submit" class="btn btn-primary">Agregar Categoria de noticia</button><a href="#" class="btn btn-danger" style="margin-left: 7px;" data-dismiss="modal"><i class="fa fa-times"> </i>&nbsp&nbspCancelar</a>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <br><br>
      <?php
          $categories = categories_NewsData::getAll();
          if(count($categories)>0){
            // si hay categorias
            ?>
            <div class="box box-primary">
              <div class="box-body">
                <table class="table table-bordered table-hover datatable">
                  <thead>
                    <th>Categoria</th>
                    <th></th>
                  </thead>
                  <?php
                  foreach($categories as $category){
                    ?>
                    <tr>
                      <td><?php echo $category->name; ?></td>
                      <td style="width:130px;">
                        <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#editModal<?php echo $category->id; ?>">
                          Editar
                      </button>
                      <a href="./?action=categories_News&opt=del&id=<?php echo $category->id;?>" class="btn btn-danger btn-xs">Eliminar</a>
                    </td>
                  </tr>
                  <?php
                  }
                  ?>
                </table>
                <?php foreach($categories as $category):?>
                <!-- Modal -->
                <div class="modal fade" id="editModal<?php echo $category->id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Editar Categria</h4>
                      </div>
                      <div class="modal-body">
                        <form class="form-horizontal" method="post" id="addproduct" action="./?action=categories_News&opt=update" role="form">
                          <div class="form-group">
                            <label for="categoria" class="col-lg-2 control-label">Categoria*</label>
                            <div class="col-md-6">
                              <input type="text" name="name" value="<?php echo $category->name;?>" class="form-control" id="name" placeholder="Categoria"  minlength="5" maxlength="24">
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-10">
                            <input type="hidden" name="user_id" value="<?php echo $category->id;?>">
                              <button type="submit" class="btn btn-primary">Actualizar Categoria de notcia</button><a href="#" class="btn btn-danger" style="margin-left: 7px;" data-dismiss="modal"><i class="fa fa-times"> </i>&nbsp&nbspCancelar</a>
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
            echo "<p class='alert alert-danger'>No hay Categorias</p>";
          }
      ?>
    </div>
  </div>
</section>