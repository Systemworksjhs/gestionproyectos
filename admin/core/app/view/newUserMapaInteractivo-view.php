<?php
    $municipalities = MunicipalityData::getAll();
?>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <h1>Agregar Usuario
            <small>
                <?php 
                    echo "Editor";
                ?>
            </small>
            </h1>
            <br>
            <form class="form-horizontal" enctype="multipart/form-data" method="post" id="adduser" action="./?view=adduserStandard" role="form">
                <input type="hidden" name="id_tipo" value="2">
                
                <div class="form-group">
                    <label for="names" class="col-lg-2 control-label">Nombre*</label>
                    <div class="col-md-6">
                        <input type="text" name="names" class="form-control" id="names" placeholder="Nombres"  minlength="3" maxlength="50" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="lastname" class="col-lg-2 control-label">Apellidos*</label>
                    <div class="col-md-6">
                        <input type="text" name="lastnames" required class="form-control" id="lastnames" placeholder="Apellidos"  minlength="3" maxlength="50" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="identificacion" class="col-lg-2 control-label">Identificación*</label>
                    <div class="col-md-6">
                        <input type="number" name="identificacion" required class="form-control" id="identificacion" placeholder="Identificación"  minlength="7" maxlength="10" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="phone" class="col-lg-2 control-label">Nro teléfono*</label>
                    <div class="col-md-6">
                        <input type="number" name="phone" required class="form-control" id="phone" placeholder="Nro teléfono"  minlength="10" maxlength="10" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="clase" class="col-lg-2 control-label">Municipio *</label>
                    <div class="col-md-6">
                        <select name="id_municipality_user" id="id_municipality_user" class="form-control formulario1 mb-5" required rows="5" required>
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
                        <input type="text" name="address" required class="form-control" id="address" placeholder="Direción"  minlength="10" maxlength="50" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="image" class="col-lg-2 control-label">Tamaño recomendado es de 900 x 500 píxeles.</label>
                    <div class="col-md-9 fileinput fileinput-new" data-provides="fileinput">
                        <div class="fileinput-new thumbnail" style="max-width: 50%;" >
                            <img class="img-rounded" src="uploads/profiles/default.png" style="width:190px;height:150px" />
                        </div>
                        <div>
                            <span class="btn btn-info btn-file"><span class="fileinput-new">Arrastre o Seleccione una imagen</span>
                            <input type="file" name="imagen" id="imagen" value="default.png" accept="image/png,image/jpeg,image/jpg,image/gif" required/>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="panel">SUBIR FOTO</div>
                    <input type="file" class="nuevaFoto" name="nuevaFoto">
                    <p class="help-block">Peso máximo de la foto 2MB</p>
                    <img src="uploads/profiles/default.png" class="img-thumbnail previsualizar" width="100px">
                </div>

                <div class="form-group">
                    <label for="email" class="col-lg-2 control-label">Correo electrónico*</label>
                    <div class="col-md-6">
                        <input type="text" name="email" class="form-control" id="email" placeholder="Correo electrónico"  minlength="5" maxlength="50" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-lg-2 control-label">Contrase&ntilde;a</label>
                    <div class="col-md-6">
                        <input type="password" name="password" class="form-control" id="password" placeholder="Contrase&ntilde;a" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="activacion" class="col-lg-2 control-label" >Esta activo ? </label>
                    <div class="col-md-6">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="activacion"> 
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="rol" class="col-lg-2 control-label" >Es proveedor ? </label>
                    <div class="col-md-6">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="rol"> 
                            </label>
                        </div>
                    </div>
                </div>
                <p class="alert alert-info">* Campos obligatorios</p>
                
                <div class="form-group">
                    <div class="col-lg-offset-2 col-lg-10">
                        <button type="submit" class="btn btn-primary">Agregar Usuario</button><a href="javascript: history.go(-1)" class="btn btn-danger" style="margin-left: 7px;" data-dismiss="modal"><i class="fa fa-times"> </i>&nbsp&nbspCancelar</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>