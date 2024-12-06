<section class="content">
  <div class="row">
    <div class="col-md-12">
      <h1>Categorías</h1>
      <!-- Button trigger modal -->
      <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal">
        Nueva Categoría
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
              <form class="form-horizontal" method="post" id="addcategoria" action="./?action=categorias_Productos&opt=add" role="form">
                <div class="form-group">
                  <label for="nombre_Categoria" class="col-lg-2 control-label">Nombre*</label>
                  <div class="col-md-6">
                    <input type="text" name="nombre_Categoria" required class="form-control" id="nombre_Categoria" placeholder="Nombre" minlength="3" maxlength="24">
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-lg-offset-2 col-lg-10">
                    <button type="submit" class="btn btn-primary">Agregar Categoria</button><a href="#" class="btn btn-danger" style="margin-left: 7px;" data-dismiss="modal"><i class="fa fa-times"> </i>&nbsp&nbspCancelar</a>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <br><br>
      <?php
          $categorias = categorias_ProductosData::getAll();
          if(count($categorias)>0){
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
                  foreach($categorias as $categoria){
                    ?>
                    <tr>
                      <td><?php echo $categoria->nombre_Categoria; ?></td>
                      <td style="width:130px;">
                        <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#editModal<?php echo $categoria->id_Categoria; ?>">
                          Editar
                      </button>
                      <a href="./?action=categorias_Productos&opt=del&idcitorga=<?php echo base64_encode($categoria->id_Categoria);?>" class="btn btn-danger btn-xs">Eliminar</a>
                    </td>
                  </tr>
                  <?php
                  }
                  ?>
                </table>
                <?php foreach($categorias as $categoria):?>
                <!-- Modal -->
                <div class="modal fade" id="editModal<?php echo $categoria->id_Categoria; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Editar Categoria</h4>
                      </div>
                      <div class="modal-body">
                        <form class="form-horizontal" method="post" id="addproduct" action="./?action=categorias_Productos&opt=update" role="form">
                          <div class="form-group">
                            <label for="nombre_Categoria" class="col-lg-2 control-label">Categoria*</label>
                            <div class="col-md-6">
                              <input type="text" name="nombre_Categoria" value="<?php echo $categoria->nombre_Categoria;?>" class="form-control" id="nombre_Categoria" placeholder="Categoria"  minlength="5" maxlength="24">
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-10">
                            <input type="hidden" name="categoria_Id" value="<?php echo $categoria->id_Categoria;?>">
                              <button type="submit" class="btn btn-primary">Actualizar Categoria</button><a href="#" class="btn btn-danger" style="margin-left: 7px;" data-dismiss="modal"><i class="fa fa-times"> </i>&nbsp&nbspCancelar</a>
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