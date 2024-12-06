<?php 
    $users = UserStandarData::getAll();
    $municipality = MunicipalityData::getAll();
    
?>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <h1>Pedidos Agrotic Nariño</h1>
            <!-- Button trigger modal -->
            <!--<button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal">
                Nuevo pedido
            </button>-->
            <!-- Modal -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                       
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal" enctype="multipart/form-data" method="post" id="addproducto" action="./?action=orders&opt=add" role="form">
                            <?php 
                                $countProductsRegistrer=0;
                                $ordersnew = productosDptoData::getAlls();
                                foreach($ordersnew as $ordersnews){$countProductsRegistrer++;}
                                $countProductsRegistrer++;
                            ?>
                            <input type="hidden" name="id_orderNew" id="id_orderNew"  value="<?php echo $countProductsRegistrer;?>">
                            <div class="form-group">
                                <label for="referenceCode" class="col-lg-2 control-label">Código de referencia*</label>
                                <div class="col-md-6">
                                    <input type="text" name="referenceCode" required class="form-control" id="referenceCode" placeholder="Código de referencia" minlength="3" maxlength="10">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="reference_pol" class="col-lg-2 control-label">Código compra*</label>
                                <div class="col-md-6">
                                    <input type="text" name="reference_pol" required class="form-control" id="reference_pol" placeholder="Código compra">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="id_user_order" class="col-lg-2 control-label">Usuario *</label>
                                <div class="col-md-6">
                                    <select name="id_user_order" id="id_user_order" class="form-control formulario1 mb-5" required rows="3">
                                        <option value="">-- Seleccione un  usuario --</option>
                                        <?php foreach($users as $user){
                                                ?>
                                                <option value="<?php echo $user->id_user; ?>"><?php echo $user->names." ".$user->lastnames; ?></option>
                                                <?php
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="price" class="col-lg-2 control-label">Precio*</label>
                                <div class="col-md-6">
                                    <input type="number" name="price" required class="form-control" id="price" placeholder="Precio">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="details" class="col-lg-2 control-label">Detalles*</label>
                                <div class="col-md-6">
                                    <input type="text" name="details" required class="form-control" id="details" placeholder="Detalles" minlength="3" maxlength="24">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="email" class="col-lg-2 control-label">Correo electrónico*</label>
                                <div class="col-md-6">
                                    <input type="email" name="email" required class="form-control" id="email" placeholder="Correo electrónico" minlength="6" maxlength="30">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="phone" class="col-lg-2 control-label">Teléfono de contacto*</label>
                                <div class="col-md-6">
                                    <input type="text" name="phone" required class="form-control" id="phone" placeholder="Teléfono de contacto" minlength="3" maxlength="24">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="id_municipality" class="col-lg-2 control-label">Municipio *</label>
                                <div class="col-md-6">
                                    <select name="id_municipality" id="id_municipality" class="form-control formulario1 mb-5" required rows="3">
                                        <option value="">-- Seleccione un municipio --</option>
                                        <?php foreach($municipality as $municipalitiess){
                                        ?>
                                            <option value="<?php echo $municipalitiess->id_municipality; ?>"><?php echo $municipalitiess->name_municipality; ?></option>
                                        <?php
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="address" class="col-lg-2 control-label">Dirección de envio*</label>
                                <div class="col-md-6">
                                    <input type="text" name="address" required class="form-control" id="address" placeholder="Dirección" minlength="3" maxlength="24">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="status" class="col-lg-4 control-label" >Estado del pedido</label>
                                <div class="col-md-6">
                                    <select name="status" id="status" class="form-control formulario1 mb-5" required rows="3">
                                        <option value="">-- Seleccione un  estado --</option>
                                        <option value="Aprobado">Aprobado</option>
                                        <option value="Empacado">Empacado</option>
                                        <option value="En ruta">En ruta</option>
                                        <option value="Entregado">Entregado</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-lg-offset-2 col-lg-10">
                                    <button type="submit" class="btn btn-primary">Agregar Pedido</button><a href="#" class="btn btn-danger" style="margin-left: 7px;" data-dismiss="modal"><i class="fa fa-times"> </i>&nbsp&nbspCancelar</a>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
        <br><br>
        <?php
            $orderss = ordersData::getAll();
            if(count($orderss)>0){
                // si hay productos
                ?>
                <div class="box box-primary">
                    <div class="box-body">
                        <table class="table table-bordered table-hover datatable">
                            <thead>
                                <th>Item</th>
                                <th>Fecha de compra</th>
                                <th>Cód. Referencia</th>
                                <th>Código compra</th>
                                <th>Cliente</th>
                                <th>Telefono</th>
                                <th>Municipio</th>
                                <th>Dirección</th>
                                <th>Estado</th>
                                <th></th>
                            </thead>
                            <?php
                            $id_aux=1;
                            
                            foreach($orderss as $orders){
                                if( ( ($orders->status=="Aprobado") or ($orders->status=="Pendiente") or ($orders->status=="Alistamiento") or ($orders->status=="En proceso") or ($orders->status=="Listo para recoger")   or ($orders->status=="Empacado") or ($orders->status=="En ruta") or ($orders->status=="Entregado") ) and ( ($orders->id_municipality==$_SESSION['id_userMunicipality'])or($_SESSION['kind']==1) or ($_SESSION['user_id']==19)) ){
                                    ?>
                                    <tr>
                                        <td><?php echo $id_aux?></td>
                                        <td><?php echo $orders->date_created_order; ?></td>
                                        <td><?php echo $orders->referenceCode; ?></td>
                                        <td><?php echo $orders->reference_pol; ?></td>
                                        <td><?php echo $orders->id_user_order; ?></td>
                                        <td><?php echo $orders->phone; ?></td>
                                        <td>
                                            <?php foreach(MunicipalityData::getAll() as $g):?>
                                                <?php if($orders->id_municipality==$g->id_municipality){ echo "$g->name_municipality";}
                                            endforeach; ?>
                                        </td>
                                        <td><?php echo $orders->address; ?></td>
                                        <td><?php echo $orders->status; ?></td>
                                        <td style="width:130px;">
                                            <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#editModal<?php echo $orders->id_order; ?>">
                                                Editar
                                            </button>
                                            <!--<a href="./?action=orders&opt=del&idcitorga=<?php echo base64_encode($orders->id_order);?>" class="btn btn-danger btn-xs">Eliminar</a>-->
                                        </td>
                                    </tr>
                                    <?php
                                    $id_aux++;
                                }
                            }
                            ?>
                        </table>
                        
                        
                        <?php foreach($orderss as $orders):?>
                        <!-- Modal principal para modificar-->
                        <div class="modal fade" id="editModal<?php echo $orders->id_order; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel">Editar pedido</h4></br>
                                    </div>
                                    <div class="modal-body">
                                        <form class="form-horizontal" enctype="multipart/form-data" method="post" id="addproduct" action="./?action=orders&opt=update" role="form">
                                            <input type="hidden" name="id_orderNew" id="id_orderNew"  value="<?php echo $countProductsRegistrer;?>">
                                            
                                            <!-- Código de referencia-->
                                            <div class="form-group">
                                                <label for="referenceCode" class="col-lg-2 control-label">Código de referencia*</label>
                                                <div class="col-md-6">
                                                    <input type="text" name="referenceCode" value="<?php echo $orders->referenceCode;?>" required class="form-control" id="referenceCode" placeholder="Código de referencia" minlength="3" maxlength="10" readonly>
                                                </div>
                                            </div>
                                            
                                            <!-- Código de referencia-->
                                            <div class="form-group">
                                                <label for="reference_pol" class="col-lg-2 control-label">Código compra*</label>
                                                <div class="col-md-6">
                                                    <input type="text" name="reference_pol" value="<?php echo $orders->reference_pol;?>" required class="form-control" id="reference_pol" placeholder="Código compra" readonly>
                                                </div>
                                            </div>
                                            
                                            <!-- Nombre usuario-->
                                            <div class="form-group">
                                                <label for="id_user_order" class="col-lg-2 control-label">Usuario *</label>
                                                <div class="col-md-6">
                                                    <select name="id_user_order" id="id_user_order" class="form-control formulario1 mb-5" required rows >
                                                        <option value="">-- Seleccione un Usuario --</option>
                                                        <?php foreach(UserStandarData::getAll() as $g):?>
                                                            <option value="<?php echo $g->id_user;  ?>" <?php if($orders->id_user_order==$g->id_user){ $iden = $g->identificacion; echo "selected"; }?>><?php  echo $g->names." ".$g->lastnames; ?></option> 
                                                        <?php endforeach; ?>    
                                                        <?php foreach($users as $clases){
                                                        ?>
                                                            <option value="<?php echo $clases->id_user; ?>"><?php echo $clases->names." ".$clases->lastnames; ?></option>
                                                        <?php
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <?php foreach(UserStandarData::getAll() as $g):?>
                                                <?php if($orders->id_user_order==$g->id_user):?>
                                                    <input type="hidden" name="name_lastname_user" id="name_lastname_user"  value="<?php echo $g->names." ".$g->lastnames;?>">
                                                <?php endif; ?>
                                            <?php endforeach; ?> 
                                            
                                            <!-- Número de identificación -->
                                            <div class="form-group">
                                                <label for="id_user_order" class="col-lg-2 control-label">No. de identificación</label>
                                                <div class="col-md-6">
                                                    <input type="number" name="price" value="<?php echo $iden?>" required class="form-control" id="price" placeholder="Precio" readonly>
                                                </div>
                                            </div>

                                            <!-- Precio-->
                                            <div class="form-group">
                                                <label for="price" class="col-lg-2 control-label">Precio*</label>
                                                <div class="col-md-6">
                                                    <input type="number" name="price" value="<?php echo $orders->price; ?>" required class="form-control" id="price" placeholder="Precio" readonly>
                                                </div>
                                            </div>
                                            
                                            <!-- Resumen del pedido-->
                                            <div class="text-center">
                                                <h4>Resumen del pedido</h4>
                                            </div>
                                            <hr>
                                            <table class="table table-bordered table-hover datatable">
                                                <thead>
                                                    <th>Item</th>
                                                    <th>Producto</th>
                                                    <th>Presentación</th>
                                                    <th>Cantidad</th>
                                                    <th>Valor</th>
                                                </thead>
                                                <?php
                                                    $totalOrders=0;
                                                    $datos = json_decode($orders->details);
                                                    $i=1;
                                                    foreach($datos as $fila) {
                                                        ?>
                                                        <tr>
                                                            <td><?php echo $i;?></td>
                                                            <td><?php echo $fila->nameProduct;?></td>
                                                            <td><?php echo $fila->nombrePres;?></td>
                                                            <td><?php echo $fila->cantidad;?></td>
                                                            <td><?php echo $fila->subtotal1;?></td>
                                                        </tr>
                                                        <?php $totalOrders= $totalOrders+$fila->subtotal2;
                                                        $i++;
                                                    }
                                                ?>
                                            </table>
                                            <hr>
                                            
                                            <!-- Correo electrónico -->
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="email" class="col-lg-4 control-label">Correo electrónico*</label>
                                                        <div class="col-md-6">
                                                            <input type="email" name="email" value="<?php echo $orders->email; ?>" readonly required class="form-control" id="email" placeholder="Correo electrónico" minlength="6" maxlength="30">
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <!-- Teléfono de contacto -->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="phone" class="col-lg-4 control-label">Teléfono de contacto*</label>
                                                        <div class="col-md-6">
                                                            <input type="text" name="phone" value="<?php echo $orders->phone; ?>" readonly required class="form-control" id="phone" placeholder="Teléfono de contacto" minlength="3" maxlength="24">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <!-- Dirección -->
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="address" class="col-lg-4 control-label">Direccción*</label>
                                                        <div class="col-md-6">
                                                            <input type="text" name="address" value="<?php echo $orders->address; ?>" readonly required class="form-control" id="address" placeholder="Teléfono de contacto" minlength="3" maxlength="24">
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="clase" class="col-lg-4 control-label">Municipio *</label>
                                                        <div class="col-md-6">
                                                            <select name="id_municipality" id="id_municipality" class="form-control formulario1 mb-5" required rows="5">
                                                                <option value="<?php echo $orders->municipioId;?>" selected><?php echo $orders->municipioId;?></option>
                                                                <option value="">-- Seleccione un municipio --</option>
                                                                <?php foreach(MunicipalityData::getAll() as $g):?>
                                                                    <option value="<?php echo $g->id_municipality;  ?>" <?php if($orders->id_municipality==$g->id_municipality){ echo "selected"; }?>><?php echo $g->name_municipality; ?></option>
                                                                <?php endforeach; ?>
                                                                <?php foreach($municipality as $municipalitiess){
                                                                ?>
                                                                    <option  value="<?php echo $municipalitiess->id_municipality; ?>"><?php echo $municipalitiess->name_municipality; ?></option>
                                                                <?php
                                                                    }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <?php foreach(MunicipalityData::getAll() as $g):?>
                                                        <?php if($orders->id_municipality==$g->id_municipality):?>
                                                        <input type="hidden" name="name_municipio_user" id="name_municipio_user"  value="<?php echo $g->name_municipality;?>">
                                                    <?php endif; ?>
                                            <?php endforeach; ?> 
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="shipping_method" class="col-lg-4 control-label">Médodo de envío*</label>
                                                        <div class="col-md-6">
                                                            <input type="text" name="shipping_method" value="<?php echo $orders->shipping_method; ?>" readonly class="form-control" id="address" placeholder="Teléfono de contacto" minlength="3" maxlength="24">
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="shipping_cost" class="col-lg-4 control-label">Costo de envío*</label>
                                                        <div class="col-md-6">
                                                            <input type="text" name="shipping_cost" value="<?php echo $orders->shipping_cost; ?>" readonly class="form-control" id="address" placeholder="Teléfono de contacto" minlength="3" maxlength="24">
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            <hr>
                                            <!--Capturar estado actual para comparar con el nuevo estado -->
                                            <input type="hidden" name="lastStatus" value="<?php echo $orders->status;?>" id="lastStatus">

                                            <!-- Si el usuario seleccionó método de envío domicilio -->
                                            <?php if($orders->shipping_method == "Servicio domicilio"): ?>
                                                <div class="form-group">
                                                    <label for="enabled" class="col-lg-2 control-label" >Estado</label>
                                                    <div class="col-md-6">
                                                        <?php if( $orders->status=="Aprobado"){?><img src="./../images/SDAprobado.PNG" style="width:500px;"><?php }?>
                                                        <?php if( $orders->status=="Alistamiento"){?><img src="./../images/SDAlistamiento.PNG" style="width:500px;"><?php }?>
                                                        <?php if( $orders->status=="En proceso"){?><img src="./../images/SDEnProceso.PNG" style="width:500px;"><?php }?>
                                                        <?php if( $orders->status=="En ruta"){?><img src="./../images/SDEnRuta.PNG" style="width:500px;"><?php }?>
                                                        <?php if( $orders->status=="Entregado"){?><img src="./../images/SDEntregado.PNG" style="width:500px;"><?php }?>
                                                        
                                                        <select name="status" id="status" class="form-control formulario1 mb-5" required rows="5">
                                                            <option value="<?php echo $orders->status;?>" selected><?php echo $orders->status;?></option>
                                                            <option value="">-- Seleccione un  estado --</option>
                                                            <option value="Aprobado">Aprobado</option>
                                                            <option value="Alistamiento">Alistamiento</option>
                                                            <option value="En proceso">En proceso</option>
                                                            <option value="En ruta">En ruta</option>
                                                            <option value="Entregado">Entregado</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            <?php endif ?>
                                            
                                            
                                            <!-- Si el usuario seleccionó método Recoger en centro de acopio -->
                                            <?php if($orders->shipping_method == "Recoger en PackingH"): ?>
                                                <div class="form-group">
                                                    <label for="enabled" class="col-lg-2 control-label" >Estado</label>
                                                    <div class="col-md-6">
                                                        <?php if( $orders->status=="Aprobado"){?><img src="./../images/RECAAprobado.PNG" style="width:500px;"><?php }?>
                                                        <?php if( $orders->status=="Alistamiento"){?><img src="./../images/RECAAlistamiento.PNG" style="width:500px;"><?php }?>
                                                        <?php if( $orders->status=="En proceso"){?><img src="./../images/RECAEnProceso.PNG" style="width:500px;"><?php }?>
                                                        <?php if( $orders->status=="En ruta"){?><img src="./../images/RECAListoParaRecoger.PNG" style="width:500px;"><?php }?>
                                                        <?php if( $orders->status=="Entregado"){?><img src="./../images/RECAEntregado.PNG" style="width:500px;"><?php }?>
                                                        
                                                        <select name="status" id="status2" class="form-control formulario1 mb-5" required rows="5">
                                                            <option value="<?php echo $orders->status;?>" selected><?php echo $orders->status;?></option>
                                                            <option value="">-- Seleccione un  estado --</option>
                                                            <option value="Aprobado">Aprobado</option>
                                                            <option value="Alistamiento">Alistamiento</option>
                                                            <option value="En proceso">En proceso</option>
                                                            <option value="Listo para recoger">Listo para recoger</option>
                                                            <option value="Entregado">Entregado</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            <?php endif ?>
                                                
                                                
                                                
                                            <hr>

                                            <div class="form-group">
                                                <div class="col-lg-offset-2 col-lg-10">
                                                    <input type="hidden" name="id_order" value="<?php echo $orders->id_order;?>">
                                                    <button type="submit" class="btn btn-primary">Actualizar pedido</button><a href="#" class="btn btn-danger" style="margin-left: 7px;" data-dismiss="modal"><i class="fa fa-times"> </i>&nbsp&nbspCancelar</a>
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
                echo "<p class='alert alert-danger'>No hay productos</p>";
            }
        ?>
        </div>
    </div>
</section>