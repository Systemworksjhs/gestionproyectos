<?php $u = UserData::getById($_SESSION["user_id"]); ?>
<?php if(($u->kind==1)or($u->kind==10)):?>
    <section class="content">
        <div class="row">
        <div class="col-md-12">
        <h1>Módulo de Pqrsfd</h1>
        <!-- Button trigger modal 
        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal">
            Nueva PQRSFD
        </button> -->
        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Nueva Pqrsfd</h4>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal" method="post" id="addnewregistro" action="./?action=pqrsfd&opt=add" role="form">
                            <div class="form-group">
                                <label for="dateReception" class="col-lg-2 control-label">Fecha*</label>
                                <div class="col-md-6">
                                    <input type="date" name="dateReception" required class="form-control" id="dateReception">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="affair" class="col-lg-2 control-label">Asunto*</label>
                                <div class="col-md-6">
                                    <input type="text" name="affair" required class="form-control" id="affair" placeholder="Asunto" minlength="5" maxlength="30">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="sender" class="col-lg-2 control-label">Remitente*</label>
                                <div class="col-md-6">
                                    <input type="text" name="sender" required class="form-control" id="sender" placeholder="Remitente" minlength="5" maxlength="100">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="message" class="col-lg-2 control-label">Mensaje*</label>
                                <div class="col-md-6">
                                    <textarea row="3"name="message" required class="form-control" id="message" placeholder="Asunto"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email" class="col-lg-2 control-label">Correo electrónico*</label>
                                <div class="col-md-6">
                                    <input type="email" name="email" required class="form-control" id="email" placeholder="Correo electrónico" minlength="5" maxlength="100">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="phone" class="col-lg-2 control-label">Número de teléfono*</label>
                                <div class="col-md-6">
                                    <input type="text" name="phone" required class="form-control" id="phone" placeholder="Número de telefono" minlength="10" maxlength="10">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="type" class="col-lg-2 control-label">Tipo de Pqrsfd*</label>
                                <div class="col-md-6">
                                    <select name="type" id="type" class="form-control formulario1 mb-5" required>
                                        <option selected value="">-- Selecciones un tipo --</option>
                                        <option value="Petición">Petición</option>
                                        <option value="Queja">Queja</option>
                                        <option value="Reclamo">Reclamo</option>
                                        <option value="Solicitud">Solicitud</option>
                                        <option value="Felicitación">Felicitación</option>
                                        <option value="Denuncia">Denuncia</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="status" class="col-lg-2 control-label">Estado Pqrsfd*</label>
                                <div class="col-md-6">
                                    <select name="status" id="status" class="form-control formulario1 mb-5" required>
                                        <option selected value="">-- Seleccione un estado --</option>
                                        <option value="Recibida">Recibida</option>
                                        <option value="En trámite">En trámite</option>
                                        <option value="Rechazada">Rechazada</option>
                                        <option value="Cerrada">Cerrada</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="responsible" class="col-lg-2 control-label">Nombre responsable*</label>
                                <div class="col-md-6">
                                    <select name="responsible" id="responsible" class="form-control formulario1 mb-5" required>
                                        <option value="">-- Seleccione un responsable --</option>
                                        <?php foreach($users as $user){
                                        ?>
                                            <option value="<?php echo $user->id; ?>"><?php echo $user->name." ".$user->lastname; ?></option>
                                        <?php
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="response" class="col-lg-2 control-label">Respuesta*</label>
                                <div class="col-md-6">
                                    <textarea rows="5" name="response" required class="form-control" id="response" placeholder="Respuesta a Pqrsfd" minlength="5" maxlength="3000"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="response_date" class="col-lg-2 control-label">Fecha respuesta*</label>
                                <div class="col-md-6">
                                    <input type="date" name="response_date" required class="form-control" id="response_date" placeholder="Fecha respuesta">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-offset-2 col-lg-10">
                                    <button type="submit" class="btn btn-primary">Agregar Pqrsfd</button><a href="#" class="btn btn-danger" style="margin-left: 7px;" data-dismiss="modal"><i class="fa fa-times"> </i>&nbsp&nbspCancelar</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <br><br>
        <?php
            $pqrsfddates = pqrsfdData::getAll();
            if(count($pqrsfddates)>0){
                // si hay inventario final
                ?>
                <div class="box box-primary">
                    <div class="box-body">
                        <table class="table table-bordered table-hover datatable">
                            <thead>
                                <th>Fecha</th>
                                <th>Asunto</th>
                                <th>Mensaje</th>
                                <th>Remitente</th>
                                <th>Tipo</th>
                                <th>Estado</th>
                                <th>Responsable</th>
                                <th></th>
                            </thead>
                            <?php
                            foreach($pqrsfddates as $pqrsfddate){
                                ?>
                                <tr>
                                <td><?php echo $pqrsfddate->dateReception;?></td>
                                <td><?php echo $pqrsfddate->affair;?></td>
                                <td>
                                    <?php echo "$pqrsfddate->message<br><br>";
                                                echo "<p style='color:#091E3E;'> <strong>$pqrsfddate->codepqrsf</strong></p><br>";
                                    ?>
                                </td>
                                <td><?php echo $pqrsfddate->sender; ?></td>
                                <td><?php echo $pqrsfddate->type; ?></td>
                                <td><?php 
                                        if($pqrsfddate->status=="En trámite"){echo "<p style='color:#f39c12;'><strong>$pqrsfddate->status</strong></p>";}
                                        if($pqrsfddate->status=="Recibida"){echo "<p style='color:red;'><strong>$pqrsfddate->status</strong></p>";}
                                        if($pqrsfddate->status=="Rechazada"){echo "</p><a href='#' class='btn btn-warning'><span class='fa fa-plus-square'> </span> Rechazada</a>";}
                                        if($pqrsfddate->status=="Cerrada"){echo "<p style='color:green;'><strong>$pqrsfddate->status</strong></p>";}
                                        if($pqrsfddate->status_send==1){echo "</p><a href='#' class='btn btn-success'><span class='fa fa-plus-square'> </span> Enviada</a>";}
                                    ?>
                                </td>
                                <td><?php echo $pqrsfddate->responsible; ?></td>

                                <td style="width:130px;">
                                    <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#editModal<?php echo $pqrsfddate->id_pqrsfd; ?>">
                                    Editar
                                </button>
                                <a href="./?action=pqrsfd&opt=del&idcitorga=<?php echo base64_encode($pqrsfddate->id_pqrsfd);?>" class="btn btn-danger btn-xs">Eliminar</a>
                            </td>
                            </tr>
                            <?php
                            }
                            ?>
                        </table>
                        <?php foreach($pqrsfddates as $pqrsfddate):?>
                        <!-- Modal -->
                        <div class="modal fade" id="editModal<?php echo $pqrsfddate->id_pqrsfd; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel">Editar Pqrsfd: <?php echo $pqrsfddate->codepqrsf;?> </h4>
                                    </div>
                                    <div class="modal-body">
                                        <form class="form-horizontal" enctype="multipart/form-data" method="post" id="editpqrsfd" action="./?action=pqrsfd&opt=update" role="form">
                                            <div class="col-md-5">    
                                                <div class="form-group">
                                                    <label for="dateReception" class="col-sm-3 control-label">Fecha*</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" value="<?php echo substr($pqrsfddate->dateReception, 0, 10);?>" name="dateReception" readonly class="form-control" id="dateReception">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-7">  
                                                <div class="form-group">
                                                    <label for="affair" class="col-sm-3 control-label">Asunto*</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" value="<?php echo $pqrsfddate->affair;?>" name="affair" required readonly class="form-control" id="affair" placeholder="Asunto" minlength="5" maxlength="30">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-5"> 
                                                <div class="form-group">
                                                    <label for="sender" class="col-sm-3 control-label">Identificación*</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" value="<?php echo $pqrsfddate->identification;?>" name="sender" required readonly class="form-control" id="sender" placeholder="Identificación" minlength="5" maxlength="100">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-7"> 
                                                <div class="form-group">
                                                    <label for="email" class="col-sm-3 control-label">Ciudad*</label>
                                                    <div class="col-sm-9">
                                                        <input type="email" value="<?php echo $pqrsfddate->city;?>" name="email" required readonly class="form-control" id="email" placeholder="Ciudad" minlength="5" maxlength="100">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-5"> 
                                                <div class="form-group">
                                                    <label for="sender" class="col-sm-3 control-label">Remitente*</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" value="<?php echo $pqrsfddate->sender;?>" name="sender" required readonly class="form-control" id="sender" placeholder="Remitente" minlength="5" maxlength="100">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-7"> 
                                                <div class="form-group">
                                                    <label for="email" class="col-sm-3 control-label">Correo electrónico*</label>
                                                    <div class="col-sm-9">
                                                        <input type="email" value="<?php echo $pqrsfddate->email;?>" name="email" required readonly class="form-control" id="email" placeholder="Correo electrónico" minlength="5" maxlength="100">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label for="phone" class="col-sm-3 control-label">Teléfono*</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" value="<?php echo $pqrsfddate->phone;?>" name="phone" required readonly class="form-control" id="phone" placeholder="Número de telefono" minlength="10" maxlength="10">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-7">
                                                <div class="form-group">
                                                    <label for="type" class="col-sm-3 control-label">Tipo de Pqrsfd*</label>
                                                    <div class="col-sm-9">
                                                        <select name="type" id="type" class="form-control formulario1 mb-5" required readonly>
                                                            <option selected value="<?php echo $pqrsfddate->type;?>"><?php echo $pqrsfddate->type;?></option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="message" class="col-sm-1 control-label">Mensaje*</label>
                                                    <div class="col-sm-11">
                                                        <textarea rows="5" name="message" required class="form-control" id="message" placeholder="Asunto" readonly><?php echo $pqrsfddate->message;?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label for="status" class="col-sm-3 control-label">Estado Pqrsfd*</label>
                                                    <div class="col-sm-9">
                                                        <select name="status" id="status" class="form-control formulario1 mb-5" required>
                                                        <option selected value="<?php echo $pqrsfddate->status;?>"><?php echo $pqrsfddate->status;?></option>
                                                            <option value="Recibida">Recibida</option>
                                                            <option value="En trámite">En trámite</option>
                                                            <option value="Rechazada">Rechazada</option>
                                                            <option value="Cerrada">Cerrada</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-7">
                                                <div class="form-group">
                                                    <label for="responsible" class="col-sm-3 control-label">Nombre responsable*</label>
                                                    <div class="col-sm-9">
                                                        <select name="responsible" id="responsible" class="form-control formulario1 mb-5" required>
                                                            <option selected value="<?php echo $pqrsfddate->responsible;?>"><?php echo $pqrsfddate->responsible;?></option>
                                                            <?php foreach($users as $user){
                                                            ?>
                                                                <option value="<?php echo $user->name." ".$user->lastname; ?>"><?php echo $user->name." ".$user->lastname; ?></option>
                                                            <?php
                                                                }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="response" class="col-sm-1 control-label">Respuesta*</label>
                                                    <div class="col-sm-11">
                                                        <textarea rows="5" name="response" required class="form-control" id="response" placeholder="Respuesta a Pqrsfd" minlength="5" maxlength="3000"><?php echo $pqrsfddate->response;?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="response_date" class="col-lg-2 control-label">Fecha respuesta*</label>
                                                <div class="col-md-6">
                                                    <?php
                                                        //$fecha = date("Y-m-d", strtotime($pqrsfddate->response_date));
                                                        //echo $fecha;
                                                    ?>
                                                    <input type="date" value="<?php echo $pqrsfddate->response_date;?>" name="response_date" required class="form-control" id="response_date" placeholder="Fecha respuesta">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="send" class="col-lg-2 control-label" >Enviar?</label>
                                                <div class="col-md-6">
                                                    <div class="checkbox">
                                                        <label>
                                                        <input type="checkbox" name="status_send" <?php if($pqrsfddate->status_send==1){ echo "checked";}?>> 
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>

                                        
                                            <div class="form-group">
                                                <div class="col-lg-offset-2 col-lg-10">
                                                    <input type="hidden" name="id_pqrsfd" value="<?php echo $pqrsfddate->id_pqrsfd;?>">
                                                    <input type="hidden" name="pqrsfcode" value="<?php echo $pqrsfddate->codepqrsf;?>">
                                                    <button type="submit" class="btn btn-primary">Actualizar pqrsfd</button><a href="#" class="btn btn-danger" style="margin-left: 7px;" data-dismiss="modal"><i class="fa fa-times"> </i>&nbsp&nbspCancelar</a>
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
                echo "<p class='alert alert-danger'>No hay invetanario catalogado</p>";
            }
        ?>
        </div>
    </div>
    </section>
<?php endif;?>