    <section class="content">
        <?php
            $user = UserStandarData::getById($_GET["id"]);
            $municipalities = MunicipalityData::getAll();
        ?>
        <div class="row">
            <div class="col-md-12">
                <h1>Editar Usuario standar</h1>
                <br>
                <form class="form-horizontal" enctype="multipart/form-data" method="post" id="adduser" action="./?view=updateuserStandar" role="form">
                    <div class="form-group">
                        <label for="usuario" class="col-lg-2 control-label">Nombre usuario*</label>
                        <div class="col-md-6">
                            <input type="text" name="" value="<?php echo $user->usuario;?>" class="form-control" id="" placeholder=""  minlength="7" maxlength="10" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="names" class="col-lg-2 control-label">Nombre*</label>
                        <div class="col-md-6">
                            <input type="text" name="names" value="<?php echo $user->names;?>" class="form-control" id="names" placeholder="Nombres"  minlength="4" maxlength="50" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="lastname" class="col-lg-2 control-label">Apellidos*</label>
                        <div class="col-md-6">
                            <input type="text" name="lastnames" value="<?php echo $user->lastnames;?>" required class="form-control" id="lastnames" placeholder="Apellidos"  minlength="5" maxlength="50" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="identificacion" class="col-lg-2 control-label">Identificación*</label>
                        <div class="col-md-6">
                            <input type="number" name="identificacion" value="<?php echo $user->identificacion;?>" required class="form-control" id="identificacion" placeholder="Identificación"  minlength="7" maxlength="10" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="phone" class="col-lg-2 control-label">Nro teléfono*</label>
                        <div class="col-md-6">
                            <input type="number" name="phone" value="<?php echo $user->phone;?>" required class="form-control" id="phone" placeholder="Nro teléfono"  minlength="10" maxlength="10" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="clase" class="col-lg-2 control-label">Municipio *</label>
                        <div class="col-md-6">
                            <select name="id_municipality_user" id="id_municipality_user" class="form-control formulario1 mb-5" required rows="5" required>
                                <?php foreach(MunicipalityData::getAll() as $g):?>
                                    <option value="<?php echo $g->id_municipality;  ?>" <?php if($user->id_municipality_user==$g->id_municipality){ echo "selected"; }?>><?php echo $g->name_municipality; ?></option>
                                <?php endforeach; ?>
                                <option value="">-- Seleccione un municipio --</option>
                                <?php foreach($municipalities as $municipalyti){
                                ?>
                                    <option value="<?php echo $municipalyti->id_municipality; ?>"><?php echo $municipalyti->name_municipality; ?></option>
                                <?php
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="address" class="col-lg-2 control-label">Dirección*</label>
                        <div class="col-md-6">
                            <input type="text" name="address" value="<?php echo $user->address;?>" required class="form-control" id="address" placeholder="Direción"  minlength="10" maxlength="50" required>
                        </div>
                    </div>
                    <input type="hidden" class="form-control" id="slide_img_aux" value="<?php echo $user->imagen;?>" name="slide_img_aux">
                    <div class="form-group">
                        <label for="imagen" class="col-lg-2 control-label">Tamaño recomendado es de 900 x 500 píxeles.</label>
                        <div class="col-md-9 fileinput fileinput-new" data-provides="fileinput">
                            <div class="fileinput-new thumbnail" style="max-width: 50%;" >
                                <img class="img-rounded" src="uploads/profiles/<?php echo $user->imagen;?>" style="width:190px;height:190px" />
                            </div>
                            <div>
                                <span class="btn btn-info btn-file"><span class="fileinput-new">Arrastre o Seleccione una imagen</span>
                                <input type="file" name="image" id="image" accept="image/png,image/jpeg,image/jpg,image/gif" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-lg-2 control-label">Correo electrónico*</label>
                        <div class="col-md-6">
                            <input type="text" name="email" value="<?php echo $user->email;?>" class="form-control" id="email" placeholder="Correo electrónico"  minlength="5" maxlength="50" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password" class="col-lg-2 control-label">Contrase&ntilde;a</label>
                        <div class="col-md-6">
                            <input type="password" name="password" class="form-control" id="password" placeholder="Contrase&ntilde;a">
                            <p class="help-block">La contrase&ntilde;a solo se modificara si escribes algo, en caso contrario no se modifica.</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="activacion" class="col-lg-2 control-label" >Esta activo</label>
                        <div class="col-md-6">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="activacion" <?php if($user->activacion==1){ echo "checked";}?>> 
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="rol" class="col-lg-2 control-label" >Es proveedor ?</label>
                        <div class="col-md-6">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="rol" <?php if($user->rol=="Proveedor"){ echo "checked";}?>> 
                                </label>
                            </div>
                        </div>
                    </div>
                    <p class="alert alert-info">* Campos obligatorios</p>
                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                            <input type="hidden" name="user_id" value="<?php echo $user->id_user;?>">
                            <button type="submit" class="btn btn-primary">Actualizar Usuario</button>
                            <a href="javascript: history.go(-1)" class="btn btn-danger" style="margin-left: 7px;" data-dismiss="modal"><i class="fa fa-times"> </i>&nbsp&nbspCancelar</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>