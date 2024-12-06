<section class="content">
  <div class="row">
    <div class="col-md-12">
      <h1>Agregar Usuario
        <small>
          <?php 
            if(isset($_GET["kind"])){ 
              if($_GET["kind"]==4){echo "Administrador";}
              else if($_GET["kind"]==5){echo "Superusuario";}
              else if($_GET["kind"]==6){echo "Standar";}
              else if($_GET["kind"]==7){echo "Editor";}
            }
          ?>
        </small>
      </h1>
      <br>
      <form class="form-horizontal" enctype="multipart/form-data" method="post" id="adduser" action="./?view=adduser" role="form">
        <input type="hidden" name="kind" value="<?php echo $_GET["kind"];?>">
        <div class="form-group">
          <label for="name" class="col-lg-2 control-label">Nombre*</label>
          <div class="col-md-6">
            <input type="text" name="name" class="form-control" id="name" placeholder="Nombre"  minlength="3" maxlength="100" required>
          </div>
        </div>
        <div class="form-group">
          <label for="lastname" class="col-lg-2 control-label">Apellido*</label>
          <div class="col-md-6">
            <input type="text" name="lastname" required class="form-control" id="lastname" placeholder="Apellido"  minlength="3" maxlength="100">
          </div>
        </div>
        <div class="form-group">
          <label for="identification" class="col-lg-2 control-label">Identificación*</label>
          <div class="col-md-6">
            <input type="number" name="identification" required class="form-control" id="identification" placeholder="Identificación"  minlength="8" maxlength="10">
          </div>
        </div>
        <div class="form-group">
          <label for="phone" class="col-lg-2 control-label">Nro teléfono*</label>
          <div class="col-md-6">
            <input type="number" name="phone" required class="form-control" id="phone" placeholder="Nro teléfono"  minlength="10" maxlength="10">
          </div>
        </div>
        <div class="form-group">
            <label for="image" class="col-lg-2 control-label">Tamaño recomendado es de 900 x 500 píxeles.</label>
            <div class="col-md-9 fileinput fileinput-new" data-provides="fileinput">
                <div class="fileinput-new thumbnail" style="max-width: 50%;" >
                    <img class="img-rounded" src="uploads/profiles/default.png" style="width:190px;height:120px" />
                </div>
                <div>
                    <span class="btn btn-info btn-file"><span class="fileinput-new">Arrastre o Seleccione una imagen</span>
                    <input type="file" name="image" id="image" value="default.png" accept="image/png,image/jpeg,image/jpg,image/gif" required/>
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
          <label for="username" class="col-lg-2 control-label">Nombre de usuario*</label>
          <div class="col-md-6">
            <input type="text" name="username" class="form-control" required id="username" placeholder="Nombre de usuario"  minlength="8" maxlength="20">
          </div>
        </div>
        <div class="form-group">
          <label for="email" class="col-lg-2 control-label">Email*</label>
          <div class="col-md-6">
            <input type="text" name="email" class="form-control" id="email" placeholder="Email"  minlength="5" maxlength="50" required>
          </div>
        </div>
        <div class="form-group">
          <label for="password" class="col-lg-2 control-label">Contrase&ntilde;a</label>
          <div class="col-md-6">
            <input type="password" name="password" class="form-control" id="inputEmail1" placeholder="Contrase&ntilde;a"  minlength="8" maxlength="100" required>
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