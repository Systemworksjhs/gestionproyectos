<?php $users = ProductosData::getAll();?>
<?php $providers = providersData::getAll();?>
<?php //$tuberculos = ProductosData::getAllTuberculos();?>
<?php //$frutas = ProductosData::getAllFrutas();?>
<?php //$vainas = ProductosData::getAllVainas();?>
<?php //$ramas = ProductosData::getAllRamas();?>
<section class="content">
    <div class="row">
        <div class="col-md-12">
        <h1>INVENTARIO DE DESPACHO</h1>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal">
            Nuevo Registro
        </button>
        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Nuevo Registro</h4>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal" method="post" id="addnewregistro" action="./?action=dispatchinventory&opt=add" role="form">
                            <div class="form-group">
                                <label for="Date_Registration" class="col-lg-2 control-label">Fecha*</label>
                                <div class="col-md-6">
                                    <input type="date" name="Date_Registration" required class="form-control" id="Date_Registration">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="Batch" class="col-lg-2 control-label">Lote*</label>
                                <div class="col-md-6">
                                    <input type="text" name="Batch" required class="form-control" id="Batch" placeholder="Lote" minlength="5" maxlength="30">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="Supplier" class="col-lg-2 control-label">Proveedor*</label>
                                <div class="col-md-6">
                                    <select name="Supplier" id="Supplier" class="form-control formulario1 mb-5" required>
                                        <option value="">-- Seleccione un proveedor --</option>
                                        <?php foreach($providers as $provider){
                                        ?>
                                            <option value="<?php echo $provider->name; ?>"><?php echo $provider->name; ?></option>
                                        <?php
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>                            
                            <div class="form-group">
                                <label for="Product_Tubers" class="col-lg-2 control-label">Producto tuberculo*</label>
                                <div class="col-md-6">
                                    <select name="Product_Tubers" id="Product_Tubers" class="form-control formulario1 mb-5" required>
                                        <option value="">-- Seleccione un producto --</option>
                                        <?php foreach($tuberculos as $tuberculo){
                                        ?>
                                            <option value="<?php echo $tuberculo->nombre_Producto; ?>"><?php echo $tuberculo->nombre_Producto; ?></option>
                                        <?php
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="Quantity_Tubers" class="col-lg-2 control-label">Cantidad*</label>
                                <div class="col-md-6">
                                    <input type="number" name="Quantity_Tubers" required class="form-control" id="Quantity_Tubers" placeholder="Cantidad" min="1" max="1000" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="Product_Fruits" class="col-lg-2 control-label">Producto frutas*</label>
                                <div class="col-md-6">
                                    <select name="Product_Fruits" id="Product_Fruits" class="form-control formulario1 mb-5" required>
                                        <option value="">-- Seleccione un producto --</option>
                                        <?php foreach($frutas as $fruta){
                                        ?>
                                            <option value="<?php echo $fruta->nombre_Producto; ?>"><?php echo $fruta->nombre_Producto; ?></option>
                                        <?php
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="Quantity_Fruits" class="col-lg-2 control-label">Cantidad*</label>
                                <div class="col-md-6">
                                    <input type="number" name="Quantity_Fruits" required class="form-control" id="Quantity_Fruits" placeholder="Cantidad" min="1" max="1000" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="Product_Pods" class="col-lg-2 control-label">Producto vainas*</label>
                                <div class="col-md-6">
                                    <select name="Product_Pods" id="Product_Pods" class="form-control formulario1 mb-5" required>
                                        <option value="">-- Seleccione un producto --</option>
                                        <?php foreach($vainas as $vaina){
                                        ?>
                                            <option value="<?php echo $vaina->nombre_Producto; ?>"><?php echo $vaina->nombre_Producto; ?></option>
                                        <?php
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="Quantity_Pods" class="col-lg-2 control-label">Cantidad*</label>
                                <div class="col-md-6">
                                    <input type="number" name="Quantity_Pods" required class="form-control" id="Quantity_Pods" placeholder="Cantidad" min="1" max="1000" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="Product_Branches" class="col-lg-2 control-label">Producto ramas*</label>
                                <div class="col-md-6">
                                    <select name="Product_Branches" id="Product_Branches" class="form-control formulario1 mb-5" required>
                                        <option value="">-- Seleccione un producto --</option>
                                        <?php foreach($ramas as $rama){
                                        ?>
                                            <option value="<?php echo $rama->nombre_Producto; ?>"><?php echo $rama->nombre_Producto; ?></option>
                                        <?php
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="Quantity_Branches" class="col-lg-2 control-label">Cantidad*</label>
                                <div class="col-md-6">
                                    <input type="number" name="Quantity_Branches" required class="form-control" id="Quantity_Branches" placeholder="Cantidad" min="1" max="1000" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-offset-2 col-lg-10">
                                    <button type="submit" class="btn btn-primary">Agregar registro</button><a href="#" class="btn btn-danger" style="margin-left: 7px;" data-dismiss="modal"><i class="fa fa-times"> </i>&nbsp&nbspCancelar</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <br><br>
        <?php
            $receptionRawMaterials = dispatchinventoryData::getAll();
            if(count($receptionRawMaterials)>0){
                // si hay Registo de productos de despacho
                ?>
                <div class="box box-primary">
                    <div class="box-body">
                        <table class="table table-bordered table-hover datatable">
                            <thead>
                                <th>Fecha</th>
                                <th>Lote</th>
                                <th>Proveedor</th>
                                <th>Tuberculos</th>
                                <th>Cantidad</th>
                                <th>Frutas</th>
                                <th>Cantidad</th>
                                <th>Vainas</th>
                                <th>Cantidad</th>
                                <th>Ramas</th>
                                <th>Cantidad</th>

                                <th></th>
                            </thead>
                            <?php
                            foreach($receptionRawMaterials as $receptionRawMaterial){
                                ?>
                                <tr>
                                <td><?php echo $receptionRawMaterial->Date_Registration;?></td>
                                <td><?php echo $receptionRawMaterial->Batch;?></td>
                                <td><?php echo $receptionRawMaterial->Supplier;?></td>
                                <td><?php echo $receptionRawMaterial->Product_Tubers; ?></td>
                                <td><?php echo $receptionRawMaterial->Quantity_Tubers; ?></td>
                                <td><?php echo $receptionRawMaterial->Product_Fruits; ?></td>
                                <td><?php echo $receptionRawMaterial->Quantity_Fruits; ?></td>
                                <td><?php echo $receptionRawMaterial->Product_Pods; ?></td>
                                <td><?php echo $receptionRawMaterial->Quantity_Pods; ?></td>
                                <td><?php echo $receptionRawMaterial->Product_Branches; ?></td>
                                <td><?php echo $receptionRawMaterial->Quantity_Branches ?></td>

                                <td style="width:130px;">
                                    <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#editModal<?php echo $receptionRawMaterial->id_product_return; ?>">
                                    Editar
                                </button>
                                <a href="./?action=dispatchinventory&opt=del&idcitorga=<?php echo base64_encode($receptionRawMaterial->id_product_return);?>" class="btn btn-danger btn-xs">Eliminar</a>
                            </td>
                            </tr>
                            <?php
                            }
                            ?>
                        </table>
                        <?php foreach($receptionRawMaterials as $receptionRawMaterial):?>
                        <!-- Modal -->
                        <div class="modal fade" id="editModal<?php echo $receptionRawMaterial->id_product_return; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel">Editar inventario de despacho</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form class="form-horizontal" enctype="multipart/form-data" method="post" id="editreturnregistration" action="./?action=dispatchinventory&opt=update" role="form">
                                            <div class="form-group">
                                                <label for="Date_Registration" class="col-lg-2 control-label">Fecha*</label>
                                                <div class="col-md-6">
                                                    <input type="date" name="Date_Registration" value="<?php echo $receptionRawMaterial->Date_Registration;?>" required class="form-control" id="Date_Registration">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="Batch" class="col-lg-2 control-label">Lote*</label>
                                                <div class="col-md-6">
                                                    <input type="text" name="Batch" value="<?php echo $receptionRawMaterial->Batch;?>" required class="form-control" id="Batch" placeholder="Lote" minlength="5" maxlength="30">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="Supplier" class="col-lg-2 control-label">Proveedor*</label>
                                                <div class="col-md-6">
                                                    <select name="Supplier" id="Supplier" class="form-control formulario1 mb-5" required>
                                                        <option selected value="<?php echo $receptionRawMaterial->Supplier;?>"><?php echo $receptionRawMaterial->Supplier;?></option>
                                                        <?php foreach($providers as $provider){
                                                        ?>
                                                            <option value="<?php echo $provider->name; ?>"><?php echo $provider->name; ?></option>
                                                        <?php
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>                            
                                            <div class="form-group">
                                                <label for="Product_Tubers" class="col-lg-2 control-label">Producto tuberculo*</label>
                                                <div class="col-md-6">
                                                    <select name="Product_Tubers" id="Product_Tubers" class="form-control formulario1 mb-5" required>
                                                        <option selected value="<?php echo $receptionRawMaterial->Product_Tubers;?>"><?php echo $receptionRawMaterial->Product_Tubers;?></option>
                                                        <?php foreach($tuberculos as $tuberculo){
                                                        ?>
                                                            <option value="<?php echo $tuberculo->nombre_Producto; ?>"><?php echo $tuberculo->nombre_Producto; ?></option>
                                                        <?php
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="Quantity_Tubers" class="col-lg-2 control-label">Cantidad*</label>
                                                <div class="col-md-6">
                                                    <input type="number" name="Quantity_Tubers" value="<?php echo $receptionRawMaterial->Quantity_Tubers;?>" required class="form-control" id="Quantity_Tubers" placeholder="Cantidad" min="1" max="1000" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="Product_Fruits" class="col-lg-2 control-label">Producto frutas*</label>
                                                <div class="col-md-6">
                                                    <select name="Product_Fruits" id="Product_Fruits" class="form-control formulario1 mb-5" required>
                                                        <option selected value="<?php echo $receptionRawMaterial->Product_Fruits; ?>"><?php echo $receptionRawMaterial->Product_Fruits; ?></option>
                                                        <?php foreach($frutas as $fruta){
                                                        ?>
                                                            <option value="<?php echo $fruta->nombre_Producto; ?>"><?php echo $fruta->nombre_Producto; ?></option>
                                                        <?php
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="Quantity_Fruits" class="col-lg-2 control-label">Cantidad*</label>
                                                <div class="col-md-6">
                                                    <input type="number" name="Quantity_Fruits" value="<?php echo $receptionRawMaterial->Quantity_Fruits; ?>" required class="form-control" id="Quantity_Fruits" placeholder="Cantidad" min="1" max="1000" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="Product_Pods" class="col-lg-2 control-label">Producto vainas*</label>
                                                <div class="col-md-6">
                                                    <select name="Product_Pods" id="Product_Pods" class="form-control formulario1 mb-5" required>
                                                        <option selected value="<?php echo $receptionRawMaterial->Product_Pods; ?>"><?php echo $receptionRawMaterial->Product_Pods; ?></option>
                                                        <?php foreach($vainas as $vaina){
                                                        ?>
                                                            <option value="<?php echo $vaina->nombre_Producto; ?>"><?php echo $vaina->nombre_Producto; ?></option>
                                                        <?php
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="Quantity_Pods" class="col-lg-2 control-label">Cantidad*</label>
                                                <div class="col-md-6">
                                                    <input type="number" name="Quantity_Pods" value="<?php echo $receptionRawMaterial->Quantity_Pods; ?>" required class="form-control" id="Quantity_Pods" placeholder="Cantidad" min="1" max="1000" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="Product_Branches" class="col-lg-2 control-label">Producto ramas*</label>
                                                <div class="col-md-6">
                                                    <select name="Product_Branches" id="Product_Branches" class="form-control formulario1 mb-5" required>
                                                        <option selected value="<?php echo $receptionRawMaterial->Product_Branches; ?>"><?php echo $receptionRawMaterial->Product_Branches; ?></option>
                                                        <?php foreach($ramas as $rama){
                                                        ?>
                                                            <option value="<?php echo $rama->nombre_Producto; ?>"><?php echo $rama->nombre_Producto; ?></option>
                                                        <?php
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="Quantity_Branches" class="col-lg-2 control-label">Cantidad*</label>
                                                <div class="col-md-6">
                                                    <input type="number" name="Quantity_Branches" value="<?php echo $receptionRawMaterial->Quantity_Branches; ?>" required class="form-control" id="Quantity_Branches" placeholder="Cantidad" min="1" max="1000" required>
                                                </div>
                                            </div>

                                        
                                            <div class="form-group">
                                                <div class="col-lg-offset-2 col-lg-10">
                                                    <input type="hidden" name="id_product_return" value="<?php echo $receptionRawMaterial->id_product_return;?>">
                                                    <button type="submit" class="btn btn-primary">Actualizar registro</button><a href="#" class="btn btn-danger" style="margin-left: 7px;" data-dismiss="modal"><i class="fa fa-times"> </i>&nbsp&nbspCancelar</a>
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
                echo "<p class='alert alert-danger'>No hay registro de devolución de productos</p>";
            }
        ?>
        </div>
    </div>
</section>