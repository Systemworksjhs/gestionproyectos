<section class="content">
<div class="col-md-12">
            <h1>Histórico de productos</h1>
            <!-- Button trigger modal -->
            <!-- Modal -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
            </div>
        </div>
        <br><br>
        <br><br>
        <?php
            $productshistoric = ProductHistoryData::getAll();
            if(count($productshistoric)>0){
                // si hay productos
                ?>
                <div class="box box-primary">
                    <div class="box-body">
                        <table class="table table-bordered table-hover datatable">
                            <thead>
                                <th>imagen</th>
                                <th>Producto</th>
                                <th>Precio</th>
                                <th>Fecha</th>
                                <th></th>
                            </thead>
                            <?php
                            $id_aux=0;
                            foreach($productshistoric as $producthistoric){
                                ?>
                                <tr>
                                <td><img src="uploads/productos/<?php echo $producthistoric->image;?>" style="width:90px;height:70px" > </td>
                                <td><?php echo $producthistoric->product; ?></td>
                                <td><?php echo $producthistoric->price; ?></td>
                                <td><?php echo $producthistoric->updatedate; ?></td>
                                <td style="width:130px;">
                                    <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#editModal<?php echo $producthistoric->id_history; ?>">
                                    Editar
                                </button>
                                <a href="./?action=productos&opt=del&idcitorga=<?php echo base64_encode($producthistoric->id_history);?>" class="btn btn-danger btn-xs">Eliminar</a>
                            </td>
                            </tr>
                            <?php
                            $id_aux++;
                            }
                            ?>
                        </table>
                        <?php foreach($productshistoric as $producthistoric):?>
                        <!-- Modal -->
                        <div class="modal fade" id="editModal<?php echo $producthistoric->id_history; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel">Editar Producto</h4></br>
                                    </div>
                                    <div class="modal-body">
                                        <form class="form-horizontal" enctype="multipart/form-data" method="post" id="addproduct" action="./?action=productos&opt=update" role="form">
                                            <div class="form-group">
                                                <label for="nombre_Producto" class="col-lg-2 control-label">Producto*</label>
                                                <div class="col-md-6">
                                                    <input type="text" name="nombre_Producto" value="<?php echo $producthistoric->nombre_Producto;?>" class="form-control" id="nombre_Producto" placeholder="Producto"  minlength="5" maxlength="24">
                                                </div>
                                            </div>

                                            <input type="hidden" class="form-control" id="slide_img_aux" value="<?php echo $producthistoric->imagen;?>" name="slide_img_aux">
                                            <div class="form-group">
                                                <label for="imagen" class="col-sm-3 control-label">Tamaño recomendado es de 900 x 500 píxeles.</label>
                                                <div class="col-md-9 fileinput fileinput-new" data-provides="fileinput">
                                                    <div class="fileinput-new thumbnail" style="max-width: 50%;" >
                                                        <img class="img-rounded" src="uploads/productos/<?php echo $producthistoric->imagen;?>" style="width:190px;height:120px" />
                                                    </div>
                                                    <div>
                                                        <span class="btn btn-info btn-file"><span class="fileinput-new">Arrastre o Seleccione una imagen</span>
                                                        <input type="file" name="imagen" id="imagen" accept="image/png,image/jpeg,image/jpg,image/gif" />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="price" class="col-lg-2 control-label">Precio*</label>
                                                <div class="col-md-6">
                                                    <input type="number" name="price" value="<?php echo $producthistoric->price;?>" class="form-control" id="price" placeholder="Precio" >
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="unit_of_measurement" class="col-lg-2 control-label">Unidad de media*</label>
                                                <div class="col-md-6">
                                                    <select class="form-control" id="unit_of_measurement" required name="unit_of_measurement">
                                                        <option value="<?php echo $producthistoric->unit_of_measurement;?>" selected><?php echo $producthistoric->unit_of_measurement;?></option>    
                                                        <option value="">-- Seleccione unidad de medida --</option>
                                                        <option value="Onzas" >Onzas</option>    
                                                        <option value="Gramos" >Gramos</option>
                                                        <option value="Kilogramos" >Kilogramos</option>
                                                        <option value="Arrobas" >Arrobas</option>
                                                        <option value="Quintales" >Quintales</option>
                                                        <option value="Toneladas" >Toneladas</option>

                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="clase" class="col-lg-2 control-label">Categoria *</label>
                                                <div class="col-md-6">
                                                    <select name="clase" id="clase" class="form-control formulario1 mb-5" required rows="3">
                                                        <option value="<?php echo $producthistoric->clase;?>" selected><?php echo $producthistoric->clase;?></option>
                                                        <option value="">-- Seleccione una categoria --</option>
                                                        <?php foreach($category as $clases){
                                                        ?>
                                                            <option value="<?php echo $clases->nombre_Categoria; ?>"><?php echo $clases->nombre_Categoria; ?></option>
                                                        <?php
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                    <label for="estado" class="col-lg-2 control-label">Estado</label>
                                                    <div class="col-md-6">
                                                        <select class="form-control" id="estado" required name="estado">
                                                            <option value="1" <?php if($producthistoric->estado==1){echo "selected";} ?>>Activo</option>    
                                                            <option value="0" <?php if($producthistoric->estado==0){echo "selected";} ?>>Inactivo</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            <div class="form-group">
                                                <div class="col-lg-offset-2 col-lg-10">
                                                    <input type="hidden" name="id_history" value="<?php echo $producthistoric->id_history;?>">
                                                    <button type="submit" class="btn btn-primary">Actualizar Producto</button><a href="#" class="btn btn-danger" style="margin-left: 7px;" data-dismiss="modal"><i class="fa fa-times"> </i>&nbsp&nbspCancelar</a>
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
                echo "<p class='alert alert-danger'>No hay hostórico de productos</p>";
            }
        ?>
        </div>
    </div>
</section>