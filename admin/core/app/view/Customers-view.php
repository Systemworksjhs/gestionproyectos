<?php $u = UserData::getById($_SESSION["user_id"]); 
    if($u->kind==1):
    $municipality = MunicipalityData::getAll();
    $departamentsc = DepartamentsData::getAll();
?>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <h1>Clientes</h1>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal">
                    Nuevo cliente
                </button>
                <!-- Modal -->
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Nuevo cliente</h4>
                        </div>
                        <div class="modal-body">
                            <form class="form-horizontal" enctype="multipart/form-data" method="post" id="addacustomers" action="./?action=Customers&opt=add" role="form">
                                <div class="form-group">
                                    <label for="names" class="col-lg-2 control-label">Nombre Cliente*</label>
                                    <div class="col-md-6">
                                        <input type="text" name="names" required class="form-control" id="names" placeholder="Nombre cliente" minlength="3" maxlength="50">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="position" class="col-lg-2 control-label">Cargo*</label>
                                    <div class="col-md-6">
                                        <input type="text" name="position" required class="form-control" id="position" placeholder="Cargo en la empresa" minlength="3" maxlength="50">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="phone" class="col-lg-2 control-label">Número contacto*</label>
                                    <div class="col-md-6">
                                        <input type="text" name="phone" required class="form-control" id="phone" placeholder="Número de contacto" minlength="10" maxlength="10">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="establishment" class="col-lg-2 control-label">Nombre de establecimiento*</label>
                                    <div class="col-md-6">
                                        <input type="text" name="establishment" class="form-control" id="establishment" required placeholder="Nombre de establecimiento" minlength="3" maxlength="50">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="address" class="col-lg-2 control-label">Dirección*</label>
                                    <div class="col-md-6">
                                        <input type="text" name="address" class="form-control" id="address" required placeholder="Dirección" minlength="3" maxlength="50">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="clase" class="col-lg-2 control-label">Departamento *</label>
                                    <div class="col-md-6">
                                        <select name="department" id="department" class="form-control formulario1 mb-5" required rows="3">
                                            <option value="">-- Seleccione un departamento --</option>
                                            <?php foreach($departamentsc as $departamentc){
                                            ?>
                                                <option value="<?php echo $departamentc->departament; ?>"><?php echo $departamentc->departament; ?></option>
                                            <?php
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="clase" class="col-lg-2 control-label">Municipio *</label>
                                    <div class="col-md-6">
                                        <select name="municipality" id="municipality" class="form-control formulario1 mb-5" required rows="3">
                                            <option value="">-- Seleccione un municipio --</option>
                                            <?php foreach($municipality as $municipalitiess){
                                            ?>
                                                <option value="<?php echo $municipalitiess->name_municipality; ?>"><?php echo $municipalitiess->name_municipality; ?></option>
                                            <?php
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="clase" class="col-lg-2 control-label">Zona *</label>
                                    <div class="col-md-6">
                                        <select name="location_area" id="location_area" class="form-control formulario1 mb-5" required rows="3">
                                            <option value="">-- Seleccione una zona --</option>
                                            <option value="Rural">Rural</option>
                                            <option value="Urbana">Urbana</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="geographic_location" class="col-lg-2 control-label">Ubicación geográfica*</label>
                                    <div class="col-md-6">
                                        <input type="text" name="geographic_location" class="form-control" id="geographic_location" required placeholder="Ubicación geográfica" minlength="10" maxlength="30">
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
                                        <button type="submit" class="btn btn-primary">Agregar cliente</button><a href="#" class="btn btn-danger" style="margin-left: 7px;" data-dismiss="modal"><i class="fa fa-times"> </i>&nbsp&nbspCancelar</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <br><br>
            <?php
                $customers = CustomersData::getAll();
                if(count($customers)>0){
                    // si hay clientees
                    ?>
                    <div class="box box-primary">
                        <div class="box-body">
                            <table class="table table-bordered table-hover datatable">
                                <thead>
                                    <th>Nombre</th>
                                    <th>Establecimiento</th>
                                    <th>Dirección</th>
                                    <th>Ubicación geográfica</th>
                                    <th>Número teléfono</th>
                                    <th>Municipio</th>
                                    <th>Estado</th>
                                    <th></th>
                                </thead>
                                <?php
                                foreach($customers as $customer){
                                    ?>
                                    <tr>
                                        <td><?php echo $customer->names; ?></td>
                                        <td><?php echo $customer->establishment; ?></td>
                                        <td><?php echo $customer->address; ?></td>
                                        <td><?php echo $customer->geographic_location; ?></td>
                                        <td><?php echo $customer->phone; ?></td>
                                        <td><?php echo $customer->municipality; ?></td>
                                        <td>
                                            <?php if($customer->status==1):?>
                                                <i class="glyphicon glyphicon-ok"></i>
                                            <?php endif; ?>
                                            <?php if($customer->status==0):?>
                                                <i class="glyphicon glyphicon-remove"></i>
                                            <?php endif; ?>
                                        </td>
                                        <td style="width:130px;">
                                            <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#editModal<?php echo $customer->id_customers; ?>">
                                                Editar
                                            </button>
                                            <a href="./?action=Customers&opt=del&idcitorga=<?php echo base64_encode($customer->id_customers);?>" class="btn btn-danger btn-xs">Eliminar</a>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </table>
                            <?php foreach($customers as $customer):?>
                            <!-- Modal -->
                            <div class="modal fade" id="editModal<?php echo $customer->id_customers; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel">Editar cliente</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form class="form-horizontal" enctype="multipart/form-data" method="post" id="addcustomer" action="./?action=Customers&opt=update" role="form">
                                                <div class="form-group">
                                                    <label for="names" class="col-lg-2 control-label">Nombre Cliente*</label>
                                                    <div class="col-md-6">
                                                        <input type="text" name="names" value="<?php echo $customer->names;?>" required class="form-control" id="names" placeholder="Nombre cliente" minlength="3" maxlength="50">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="position" class="col-lg-2 control-label">Cargo*</label>
                                                    <div class="col-md-6">
                                                        <input type="text" name="position" value="<?php echo $customer->position;?>" required class="form-control" id="position" placeholder="Cargo en la empresa" minlength="3" maxlength="50">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="phone" class="col-lg-2 control-label">Número contacto*</label>
                                                    <div class="col-md-6">
                                                        <input type="text" name="phone" value="<?php echo $customer->phone;?>" required class="form-control" id="phone" placeholder="Número de contacto" minlength="10" maxlength="10">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="establishment" class="col-lg-2 control-label">Nombre de establecimiento*</label>
                                                    <div class="col-md-6">
                                                        <input type="text" name="establishment" value="<?php echo $customer->establishment;?>" required class="form-control" id="establishment" placeholder="Nombre de establecimiento" minlength="3" maxlength="50">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="address" class="col-lg-2 control-label">Dirección*</label>
                                                    <div class="col-md-6">
                                                        <input type="text" name="address" class="form-control" id="address" value="<?php echo $customer->address;?>" required placeholder="Dirección" minlength="3" maxlength="50">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="clase" class="col-lg-2 control-label">Departamento *</label>
                                                    <div class="col-md-6">
                                                        <select name="department" id="department" class="form-control formulario1 mb-5" required rows="3">
                                                            <option value="<?php echo $customer->department;?>" selected><?php echo $customer->department;?></option>
                                                            <option value="">-- Seleccione un departamento --</option>
                                                            <?php foreach($departamentsc as $departamentc){
                                                            ?>
                                                                <option value="<?php echo $departamentc->departament; ?>"><?php echo $departamentc->departament; ?></option>
                                                            <?php
                                                                }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="clase" class="col-lg-2 control-label">Municipio *</label>
                                                    <div class="col-md-6">
                                                        <select name="municipality" id="municipality" class="form-control formulario1 mb-5" required rows="3">
                                                            <option value="<?php echo $customer->municipality;?>" selected><?php echo $customer->municipality;?></option>
                                                            <option value="">-- Seleccione un municipio --</option>
                                                            <?php foreach($municipality as $municipalitiess){
                                                            ?>
                                                                <option value="<?php echo $municipalitiess->name_municipality; ?>"><?php echo $municipalitiess->name_municipality; ?></option>
                                                            <?php
                                                                }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="clase" class="col-lg-2 control-label">Zona *</label>
                                                    <div class="col-md-6">
                                                        <select name="location_area" id="location_area" class="form-control formulario1 mb-5" required rows="3">
                                                            <option value="<?php echo $customer->location_area;?>" selected><?php echo $customer->location_area;?></option>
                                                            <option value="">-- Seleccione una zona --</option>
                                                            <option value="Rural">Rural</option>
                                                            <option value="Urbana">Urbana</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="geographic_location" class="col-lg-2 control-label">Ubicación geográfica*</label>
                                                    <div class="col-md-6">
                                                        <input type="text" name="geographic_location" class="form-control" id="geographic_location" value="<?php echo $customer->geographic_location;?>" required placeholder="Ubicación geográfica" minlength="10" maxlength="30">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="status" class="col-lg-4 control-label" >Está activo?</label>
                                                    <div class="col-md-6">
                                                        <div class="checkbox">
                                                            <label>
                                                            <input type="checkbox" name="status" <?php if($customer->status==1){ echo "checked";}?>> 
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-lg-offset-2 col-lg-10">
                                                        <input type="hidden" name="id_customers" value="<?php echo $customer->id_customers;?>">
                                                        <button type="submit" class="btn btn-primary">Actualizar cliente</button><a href="#" class="btn btn-danger" style="margin-left: 7px;" data-dismiss="modal"><i class="fa fa-times"> </i>&nbsp&nbspCancelar</a>
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
                    echo "<p class='alert alert-danger'>No hay clientes</p>";
                }
            ?>
            </div>
        </div>
    </section>
<?php endif;?>