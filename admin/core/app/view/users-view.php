<?php $u = UserData::getById($_SESSION["user_id"]); ?>
<?php if($u->kind==1):?>
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<h1>Lista de Usuarios</h1>
			<!-- Single button -->
			<div class="btn-group">
				<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					Nuevo  <span class="caret"></span>
				</button>
				<ul class="dropdown-menu">
					<li><a href="./?view=newuser&kind=1">Super Admin </a></li>
					<li><a href="./?view=newuser&kind=2">Administrador </a></li>
					<li><a href="./?view=newuser&kind=3">Editor Noticias </a></li>
					<li><a href="./?view=newuser&kind=4">Editor Bmp </a></li>
					<li><a href="./?view=newuser&kind=5">Editor Apoyo </a></li>
					<li><a href="./?view=newuser&kind=6">Editor Contable </a></li>
					<li><a href="./?view=newuser&kind=7">Editor Tercero </a></li>
					<li><a href="./?view=newuser&kind=8">Editor Proveedor </a></li>
					<li><a href="./?view=newuser&kind=9">Editor Repartidor </a></li>
				</ul>
			</div>
			<br><br>
			<?php
			?>
			<?php
			$users = UserData::getAll();
			if(count($users)>0){
				// si hay usuarios
				?>
				<div class="box box-primary">
					<div class="box-body">
					<table class="table table-bordered table-hover datatable">
						<thead>
							<th>Perfil</th>
							<th>Nombre completo</th>
							<th>Identificación</th>
							<th>Usuario</th>
							<th>Email</th>
							<th>Activo</th>
							<th></th>
						</thead>
						<?php
						foreach($users as $user){
							?>
							<tr>
								<td><img src="uploads/profiles/<?php echo $user->image;?>" style="width:70px;height:70px" ></td>
								<td><?php echo $user->name." ".$user->lastname; ?></td>
								<td><?php echo $user->identification; ?></td>
								<td><?php echo $user->username; ?></td>
								<td><?php echo $user->email; ?></td>
								<td>
									<?php if($user->status==1):?>
										<i class="glyphicon glyphicon-ok"></i>
									<?php endif; ?>
									<?php if($user->status==0):?>
										<i class="glyphicon glyphicon-remove"></i>
									<?php endif; ?>
								</td>
								<td style="width:125px;">
									<a href="./?view=edituser&gdbdgbfgfkdhbdghfhjshnxhjgdjdhgnjghjidfddgdgd=<?php echo base64_encode($user->id);?>" class="btn btn-warning btn-xs">Editar</a>
									<a href="./?action=deluser&id=<?php echo $user->id;?>" class="btn btn-danger btn-xs">Eliminar</a>
								</td>
							</tr>
						<?php
					}
					echo "</table></div></div>";
			}else{
				// no hay usuarios
			}
		?>
		</div>
	</div>
</section>
<?php endif;?>