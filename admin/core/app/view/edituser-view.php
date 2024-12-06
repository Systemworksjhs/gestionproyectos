<section class="content">
  <?php 
    $user = UserData::getById(base64_decode($_GET["gdbdgbfgfkdhbdghfhjshnxhjgdjdhgnjghjidfddgdgd"]));
  ?>
  <div class="row">
    <div class="col-md-12">
      <h1>Editar Usuario</h1>
      <br>
      <form class="form-horizontal" enctype="multipart/form-data" method="post" id="adduser" action="./?view=updateuser" role="form">
        <div class="form-group">
          <label for="name" class="col-lg-2 control-label">Nombre*</label>
          <div class="col-md-6">
            <input type="text" name="name" value="<?php echo $user->name;?>" class="form-control" id="name" placeholder="Nombre"  minlength="4" maxlength="50">
          </div>
        </div>
        <div class="form-group">
          <label for="lastname" class="col-lg-2 control-label">Apellido*</label>
          <div class="col-md-6">
            <input type="text" name="lastname" value="<?php echo $user->lastname;?>" required class="form-control" id="lastname" placeholder="Apellido"  minlength="5" maxlength="50">
          </div>
        </div>
        <div class="form-group">
          <label for="identification" class="col-lg-2 control-label">Identificación*</label>
          <div class="col-md-6">
            <input type="number" name="identification" value="<?php echo $user->identification;?>" required class="form-control" id="identification" placeholder="Identificación"  minlength="8" maxlength="10">
          </div>
        </div>
        <div class="form-group">
          <label for="phone" class="col-lg-2 control-label">Nro teléfono*</label>
          <div class="col-md-6">
            <input type="number" name="phone" value="<?php echo $user->phone;?>" required class="form-control" id="phone" placeholder="Nro teléfono"  minlength="10" maxlength="10">
          </div>
        </div>
        <input type="hidden" class="form-control" id="slide_img_aux" value="<?php echo $user->image;?>" name="slide_img_aux">
        <div class="form-group">
            <label for="image" class="col-lg-2 control-label">Tamaño recomendado es de 900 x 500 píxeles.</label>
            <div class="col-md-9 fileinput fileinput-new" data-provides="fileinput">
                <div class="fileinput-new thumbnail" style="max-width: 50%;" >
                    <img class="img-rounded" src="uploads/profiles/<?php echo $user->image;?>" style="width:190px;height:210px" />
                </div>
                <div>
                    <span class="btn btn-info btn-file"><span class="fileinput-new">Arrastre o Seleccione una imagen</span>
                    <input type="file" name="image" id="image" accept="image/png,image/jpeg,image/jpg,image/gif" />
                </div>
            </div>
        </div>
        <div class="form-group">
          <label for="username" class="col-lg-2 control-label">Nombre de usuario*</label>
          <div class="col-md-6">
            <input type="text" name="username" value="<?php echo $user->username;?>" class="form-control" required id="username" placeholder="Nombre de usuario"  minlength="5" maxlength="50">
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
            <p class="help-block">La contrase&ntilde;a solo se modificara si escribes algo, en caso contrario no se modifica...</p>
          </div>
        </div>
        <div class="form-group">
          <label for="status" class="col-lg-2 control-label" >Esta activo</label>
          <div class="col-md-6">
            <div class="checkbox">
              <label>
                <input type="checkbox" name="status" <?php if($user->status==1){ echo "checked";}?>> 
              </label>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label for="kind" class="col-lg-2 control-label" >Es administrador</label>
          <div class="col-md-6">
            <div class="checkbox">
              <label>
                <input type="checkbox" name="kind" <?php if($user->kind==1){ echo "checked";}?>> 
              </label>
            </div>
          </div>
        </div>
        <p class="alert alert-info">* Campos obligatorios</p>
        <div class="form-group">
          <div class="col-lg-offset-2 col-lg-10">
          <input type="hidden" name="user_id" value="<?php echo $user->id;?>">
            <button type="submit" class="btn btn-primary">Actualizar Usuario</button>
            <a href="javascript: history.go(-1)" class="btn btn-danger" style="margin-left: 7px;" data-dismiss="modal"><i class="fa fa-times"> </i>&nbsp&nbspCancelar</a>
          </div>
        </div>
      </form>
    </div>
  </div>
</section>