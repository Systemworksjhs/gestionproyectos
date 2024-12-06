<section class="content">
    <div class="row">
        <div class="col-md-12">
            <h1>Preguntas frecuentes</h1>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal">
                Nueva pregunta
            </button>
            <!-- Modal -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Nueva pregunta</h4>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal" enctype="multipart/form-data" method="post" id="addquestions" action="./?action=frequentQuestions&opt=add" role="form">
                            <div class="form-group">
                                <label for="ask" class="col-lg-2 control-label">Pregunta*</label>
                                <div class="col-md-6">
                                    <input type="text" name="ask" required class="form-control" id="ask" placeholder="Pregunta" minlength="10" maxlength="50">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="message" class="col-lg-2 control-label">Respuesta*</label>
                                <div class="col-md-6">
                                    <input type="text" name="message" required class="form-control" id="message" placeholder="Respuesta" minlength="10" maxlength="500">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="status" class="col-lg-4 control-label" >Activa?</label>
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
                                    <button type="submit" class="btn btn-primary">Agregar pregunta</button><a href="#" class="btn btn-danger" style="margin-left: 7px;" data-dismiss="modal"><i class="fa fa-times"> </i>&nbsp&nbspCancelar</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <br><br>
        <?php
            $questions = frequentQuestionsData::getAll();
            if(count($questions)>0){
                // si hay preguntas
                ?>
                <div class="box box-primary">
                    <div class="box-body">
                        <table class="table table-bordered table-hover datatable">
                            <thead>
                                <th>Pregunta</th>
                                <th>Respuesta</th>
                                <th>Estado</th>
                                <th></th>
                            </thead>
                            <?php
                            foreach($questions as $question){
                                ?>
                                <tr>
                                <td><?php echo $question->ask; ?></td>
                                <td><?php echo $question->message; ?></td>
								<td>
									<?php if($question->status==1):?>
										<i class="glyphicon glyphicon-ok"></i>
									<?php endif; ?>
									<?php if($question->status==0):?>
										<i class="glyphicon glyphicon-remove"></i>
									<?php endif; ?>
								</td>
                                <td style="width:130px;">
                                    <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#editModal<?php echo $question->id_question; ?>">
                                    Editar
                                </button>
                                <a href="./?action=frequentQuestions&opt=del&idcitorga=<?php echo base64_encode($question->id_question);?>" class="btn btn-danger btn-xs">Eliminar</a>
                            </td>
                            </tr>
                            <?php
                            }
                            ?>
                        </table>
                        <?php foreach($questions as $question):?>
                        <!-- Modal -->
                        <div class="modal fade" id="editModal<?php echo $question->id_question; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel">Editar pregunta</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form class="form-horizontal" enctype="multipart/form-data" method="post" id="addquestion" action="./?action=frequentQuestions&opt=update" role="form">
                                            <div class="form-group">
                                                <label for="ask" class="col-lg-2 control-label">Pregunta*</label>
                                                <div class="col-md-6">
                                                    <input type="text" name="ask" value="<?php echo $question->ask;?>" class="form-control" id="ask" placeholder="Pregunta"  minlength="10" maxlength="50">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="message" class="col-lg-2 control-label">Respuesta*</label>
                                                <div class="col-md-6">
                                                    <input type="text" name="message" value="<?php echo $question->message;?>" required class="form-control" id="message" placeholder="Nombre representante legal" minlength="10" maxlength="500">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="status" class="col-lg-4 control-label" >Está activa?</label>
                                                <div class="col-md-6">
                                                    <div class="checkbox">
                                                        <label>
                                                        <input type="checkbox" name="status" <?php if($question->status==1){ echo "checked";}?>> 
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-lg-offset-2 col-lg-10">
                                                    <input type="hidden" name="id_question" value="<?php echo $question->id_question;?>">
                                                    <button type="submit" class="btn btn-primary">Actualizar pregunta</button><a href="#" class="btn btn-danger" style="margin-left: 7px;" data-dismiss="modal"><i class="fa fa-times"> </i>&nbsp&nbspCancelar</a>
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
                echo "<p class='alert alert-danger'>No hay preguntas</p>";
            }
        ?>
        </div>
    </div>
</section>