    <section class="content">
        <?php
            $user = userMapaData::getById($_GET["idinitiative"]);
            $municipalities = MunicipalityData::getAll();
        ?>
        <div class="row">
            <div class="col-md-12">
                <h1>Editar Usuario mapa interactivo</h1>
                <br>
                <form class="form-horizontal" enctype="multipart/form-data" method="post" id="addusermap" action="./?view=updateuserMapa" role="form">
                    <div class="row">
                        <div class="col-md-7">    
                            <div class="form-group">
                                <label for="usuario" class="col-sm-3 control-label">Nombre usuario*</label>
                                <div class="col-sm-9">
                                    <input type="text" value="<?php echo $user->name_initiative;?>" name="names" id="names" class="form-control" minlength="7" maxlength="10" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">  
                            <div class="form-group">
                                <label for="phone" class="col-sm-3 control-label">Teléfono*</label>
                                <div class="col-sm-9">
                                    <input type="number" name="phone" value="<?php echo $user->phone;?>" required class="form-control" id="phone" placeholder="Nro teléfono"  minlength="10" maxlength="10" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-7"> 
                            <div class="form-group">
                                <label for="identificacion" class="col-sm-3 control-label">Identificación*</label>
                                <div class="col-sm-9">
                                    <input type="number" name="identificacion" value="<?php echo $user->nroDocumentoIdentidad;?>" required class="form-control" id="identificacion" placeholder="Identificación"  minlength="7" maxlength="10" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="clase" class="col-sm-3 control-label">Municipio *</label>
                                <div class="col-sm-9">
                                    <select name="id_municipality" id="id_municipality" class="form-control formulario1 mb-5" required rows="5" required>
                                        <?php foreach(MunicipalityData::getAll() as $g):?>
                                            <option value="<?php echo $g->id_municipality;  ?>" <?php if($user->cod_municipality==$g->id_municipality){ echo "selected"; }?>><?php echo $g->name_municipality; ?></option>
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
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-7">
                            <div class="form-group">
                                <label for="address" class="col-md-3 control-label">Dirección*</label>
                                <div class="col-md-9">
                                    <input type="text" name="address" value="<?php echo $user->direction;?>" required class="form-control" id="address" placeholder="Direción"  minlength="10" maxlength="50" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="corregimiento" class="col-md-3 control-label">Corregimiento*</label>
                                <div class="col-md-9">
                                    <input type="text" name="corregimiento" value="<?php echo $user->corregimiento;?>" required class="form-control" id="corregimiento" placeholder="Corregimiento"  minlength="10" maxlength="50" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-12">
                        <input type="hidden" class="form-control" id="slide_img_aux" value="<?php echo $user->image;?>" name="slide_img_aux">
                        <div class="form-group">
                            <label for="imagen" class="col-lg-2 control-label">TamañoS recomendado es de 900 x 500 píxeles.</label>
                            <div class="col-md-9 fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-new thumbnail" style="max-width: 50%;" >
                                    <img class="img-rounded" src="../uploads/imagenes/<?php echo $user->image;?>" style="width:390px;height:250px" />
                                </div>
                                <div>
                                    <span class="btn btn-info btn-file"><span class="fileinput-new">Arrastre o Seleccione una imagen</span>
                                    <input type="file" name="image" id="image" accept="image/png,image/jpeg,image/jpg,image/gif" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email" class="col-md-3 control-label">Correo electrónico*</label>
                                <div class="col-md-9">
                                    <input type="text" name="email" value="<?php echo $user->email;?>" class="form-control" id="email" placeholder="Correo electrónico"  minlength="5" maxlength="50" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="facebook" class="col-md-3 control-label">Facebook*</label>
                                <div class="col-md-9">
                                    <input type="text" name="facebook" value="<?php echo $user->facebook;?>" class="form-control" id="facebook" placeholder="Facebook"  minlength="5" maxlength="50" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="twitter" class="col-md-3 control-label">Twitter*</label>
                                <div class="col-md-9">
                                    <input type="text" name="twitter" value="<?php echo $user->twitter;?>" class="form-control" id="twitter" placeholder="Twitter"  minlength="5" maxlength="50" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="instagram" class="col-md-3 control-label">Instagram*</label>
                                <div class="col-md-9">
                                    <input type="text" name="instagram" value="<?php echo $user->instagram;?>" class="form-control" id="Instagram" placeholder="Instagram"  minlength="5" maxlength="50" required>
                                </div>
                            </div>
                        </div>
                    </row>
                    
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="activacion" class="col-md-3 control-label" >Activo ?</label>
                                <div class="col-md-9">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" id="activacion" name="activacion" <?php if($user->estado==1){ echo "checked";}?>> 
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="rol" class="col-md-4 control-label" >Pertenece a compras públicas ?</label>
                                <div class="col-md-8">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" id= "rol" name="rol" <?php if($user->comprasPublicas==1){ echo "checked";}?>> 
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="producto" class="col-md-4 control-label" >Producto</label>
                                <div class="col-md-8">
                                    <label>
                                        <input type="text" name="producto" value="<?php echo $user->productHome;?>" class="form-control" id="producto" placeholder="Producto"  minlength="3" maxlength="50" required>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="frecuencia" class="col-md-4 control-label" >Frecuencia</label>
                                <div class="col-md-8">
                                    <label>
                                        <input type="text" name="frecuencia" value="<?php echo $user->frequency;?>" class="form-control" id="frecuencia" placeholder="Frecuecia"  minlength="3" maxlength="50" required>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="mes" class="col-md-4 control-label" >Mes producción</label>
                                <div class="col-md-8">
                                    <label>
                                        <input type="text" name="mes" value="<?php echo $user->monthofProduction;?>" class="form-control" id="mes" placeholder="Mes producción"  minlength="3" maxlength="50" required>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="total" class="col-md-4 control-label" >Total producción</label>
                                <div class="col-md-8">
                                    <label>
                                        <input type="text" name="total" value="<?php echo $user->totalProduction;?>" class="form-control" id="total" placeholder="Total produción"  minlength="3" maxlength="50" required>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr style="color: red;">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="poscosecha" class="col-md-4 control-label" >Postcosecha ?</label>
                                <div class="col-md-8">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="poscosecha" <?php if($user->insignia_postcosecha==1){ echo "checked";}?>>
                                            <img class="img-rounded" src="../img/insignias/Capacitacion-postcosecha.jpeg" style="width:90px;height:90px" />
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="nutricion" class="col-md-4 control-label" >Nutrición ?</label>
                                <div class="col-md-8">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="nutricion" <?php if($user->insignia_nutricion==1){ echo "checked";}?>>
                                            <img class="img-rounded" src="../img/insignias/Capacitacion-nutricion.jpeg" style="width:90px;height:90px" />
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="tics" class="col-md-4 control-label" >Tics ?</label>
                                <div class="col-md-8">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="tics" <?php if($user->insignia_tics==1){ echo "checked";}?>>
                                            <img class="img-rounded" src="../img/insignias/Capacitacion-tics.jpeg" style="width:90px;height:90px" />
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="bioseguridad" class="col-md-4 control-label" >Bioseguridad ?</label>
                                <div class="col-md-8">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="bioseguridad" <?php if($user->insignia_bioseguridad==1){ echo "checked";}?>>
                                            <img class="img-rounded" src="../img/insignias/Capacitacion-bioseguridad.jpeg" style="width:90px;height:90px" />
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>             
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="bpm" class="col-md-4 control-label" >BPM ?</label>
                                <div class="col-md-8">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="bpm" <?php if($user->insignia_bmp==1){ echo "checked";}?>>
                                            <img class="img-rounded" src="../img/insignias/Capacitacion-bmp.jpeg" style="width:90px;height:90px" />
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="bpa" class="col-md-4 control-label" >BPA ?</label>
                                <div class="col-md-8">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="bpa" <?php if($user->insignia_bpa==1){ echo "checked";}?>>
                                            <img class="img-rounded" src="../img/insignias/Capacitacion-bpa.jpeg" style="width:90px;height:90px" />
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="pequeno" class="col-md-4 control-label" >Pequeño productor ?</label>
                                <div class="col-md-8">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="pequeno" <?php if($user->insignia_pequeno_productor==1){ echo "checked";}?>>
                                            <img class="img-rounded" src="../img/insignias/Certificado-pequeno-productor.jpg" style="width:90px;height:90px" />
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>       
                    <p class="alert alert-info">* Campos obligatorios</p>
                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                            <input type="hidden" name="id_user" value="<?php echo $user->id_initiative ;?>">
                            <button type="submit" class="btn btn-primary">Actualizar Usuario</button>
                            <a href="javascript: history.go(-1)" class="btn btn-danger" style="margin-left: 7px;" data-dismiss="modal"><i class="fa fa-times"> </i>&nbsp&nbspCancelar</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>