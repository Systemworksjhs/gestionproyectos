    <section class="content">
        <?php
            $orders = ordersData::getById($_GET["idOrders"]);
            $municipalities = MunicipalityData::getAll();

        ?>
        <div class="row">
            <div class="col-md-12">
                <h1>Editar Pedido</h1>
                <br>
                <div class="modal-body">
                    <form class="form-horizontal" enctype="multipart/form-data" method="post" id="addproduct" action="./?view=updateOrders" role="form">
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
                                <button type="submit" class="btn btn-primary">Actualizar pedidos</button>
                                <a href="javascript: history.go(-1)" class="btn btn-danger" style="margin-left: 7px;" data-dismiss="modal"><i class="fa fa-times"> </i>&nbsp&nbspCancelar</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>