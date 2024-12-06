<section class="content">
    <div class="row">
        <div class="col-md-12">
            <h1>Mensajes enviados por contactos</h1>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal">
                Nuevo Mensaje
            </button>
            <!-- Modal -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Nuevo mensaje</h4>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal" enctype="multipart/form-data" method="post" id="addteam" action="" role="form">
                            <div class="form-group">
                                <div class="col-lg-offset-2 col-lg-10">
                                    <button type="submit" class="btn btn-primary">Agregar mensaje</button><a href="#" class="btn btn-danger" style="margin-left: 7px;" data-dismiss="modal"><i class="fa fa-times"> </i>&nbsp&nbspCancelar</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <br><br>
        <?php
            $messages = contactsMesagesData::getAll();
            if(count($messages)>0){
                // si hay equipos
                ?>
                <div class="box box-primary">
                    <div class="box-body">
                        <table class="table table-bordered table-hover datatable">
                            <thead>
                                <th>Fecha</th>
                                <th>Nombres y apellidos</th>
                                <th>Mensaje</th>
                                <th>Estado</th>
                                <th>Respuesta</th>
                                <th></th>
                            </thead>
                            <?php
                            foreach($messages as $messageContact){
                                ?>
                                <tr>
                                    <td><?php echo $messageContact->at_created; ?></td>
                                    <td><?php echo $messageContact->names." ".$messageContact->lastnames; ?></td>
                                    <td><?php echo $messageContact->message; ?> </td>
                                    <td>
                                        <?php if($messageContact->status==1):?>
                                            <i class="glyphicon glyphicon-ok"></i>
                                        <?php endif; ?>
                                        <?php if($messageContact->status==0):?>
                                            <i class="glyphicon glyphicon-remove"></i>
                                        <?php endif; ?>
                                    </td>
                                    <td><?php echo $messageContact->observation; ?> </td>
                                    <td style="width:170px;">
                                        <button type="button" class="btn btn-warning btn-xs pb-2" data-toggle="modal" data-target="#editModal<?php echo $messageContact->id_contacts; ?>">
                                            Editar
                                        </button>
                                        <a href="./?action=contactsMesages&opt=del&idcitorga=<?php echo base64_encode($messageContact->id_contacts);?>" class="btn btn-danger btn-xs pb-2">Eliminar</a>
                                        <?php
                                            if($messageContact->send==1){ ?>
                                                <a href="#" class="btn btn-success btn-xs pb-2">Enviado</a>
                                                <?php
                                            }
                                            if(($messageContact->send==0)and($messageContact->status==1)){ ?>
                                                <a href="#" class="btn btn-info btn-xs pb-2">Pendiente</a>
                                                <?php
                                            }

                                        ?>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </table>
                        <?php foreach($messages as $messageContact):?>
                        <!-- Modal -->
                        <div class="modal fade" id="editModal<?php echo $messageContact->id_contacts; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel">Responder mensaje</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form class="form-horizontal" enctype="multipart/form-data" method="post" id="addteams" action="./?action=contactsMesages&opt=update" role="form">
                                            <div class="form-group">
                                                <label for="at_created" class="col-lg-2 control-label">Fecha de envio</label>
                                                <div class="col-md-6">
                                                    <input type="text" name="at_created" value="<?php echo $messageContact->at_created;?>" class="form-control" id="at_created" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="names" class="col-lg-2 control-label">Nombres y apellidos</label>
                                                <div class="col-md-6">
                                                    <input type="text" name="names" value="<?php echo $messageContact->names." ".$messageContact->lastnames;?>" class="form-control" id="names" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="phone" class="col-lg-2 control-label">Teléfono</label>
                                                <div class="col-md-6">
                                                    <input type="text" name="phone" value="<?php echo $messageContact->phone;?>" class="form-control" id="phone" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="email" class="col-lg-2 control-label">Email</label>
                                                <div class="col-md-6">
                                                    <input type="text" name="email" value="<?php echo $messageContact->email;?>" class="form-control" id="email" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="message" class="col-lg-2 control-label">Mensaje del contacto</label>
                                                <div class="col-md-6">
                                                    <textarea rows="5" name="message" required class="form-control" id="message" readonly><?php echo $messageContact->message;?></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="observation" class="col-lg-2 control-label">Mensaje de respuesta</label>
                                                <div class="col-md-6">
                                                    <textarea rows="5" name="observation" required class="form-control" id="observation" minlenght="20" maxlenght="499"><?php echo $messageContact->observation;?></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="status" class="col-lg-4 control-label" >Contestado?</label>
                                                <div class="col-md-6">
                                                    <div class="checkbox">
                                                        <label>
                                                        <input type="checkbox" name="status" <?php if($messageContact->status==1){ echo "checked";}?>> 
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="send" class="col-lg-4 control-label" >Enviar?</label>
                                                <div class="col-md-6">
                                                    <div class="checkbox">
                                                        <label>
                                                        <input type="checkbox" name="send" <?php if($messageContact->send==1){ echo "checked";}?>> 
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-lg-offset-2 col-lg-10">
                                                    <input type="hidden" name="id_contacts" value="<?php echo $messageContact->id_contacts;?>">
                                                    <input type="hidden" name="mensaje_send" value="<?php echo $messageContact->message;?>">
                                                    <button type="submit" class="btn btn-primary">Enviar mensaje</button><a href="#" class="btn btn-danger" style="margin-left: 7px;" data-dismiss="modal"><i class="fa fa-times"> </i>&nbsp&nbspCancelar</a>
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
                echo "<p class='alert alert-danger'>No hay mensajes de contactos</p>";
            }
        ?>
        </div>
    </div>
</section>