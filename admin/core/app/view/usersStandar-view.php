<?php $x = UserData::getById($_SESSION["user_id"]); ?>
<?php if($x->kind==1):?>
	<section class="content">
		
		<div class="row">
			<div class="col-md-12">
				<h1>Lista de Usuarios standar</h1>
				<!-- Single button -->
				<div class="btn-group">
					<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Nuevo  <span class="caret"></span>
					</button>
					<ul class="dropdown-menu">
						<li><a href="./?view=newuserStandard">Standar</a></li>
					</ul>
				</div>
				<br><br>
				<?php
				?>
				<?php
				$users = UserStandarData::getAll();
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
								<th>Nivel</th>
								<th></th>
							</thead>
							<?php
							foreach($users as $user){
								?>
								<tr>
									<td>
										<img src="uploads/profiles/<?php echo $user->imagen;?>" style="width:70px;height:70px" >

									</td>
									<td><?php echo $user->names." ".$user->lastnames; ?></td>
									<td><?php echo $user->identificacion; ?></td>
									<td><?php echo $user->usuario; ?></td>
									<td><?php echo $user->email; ?></td>
									<td>
										<?php if($user->activacion==1):?>
											<i class="glyphicon glyphicon-ok"></i>
										<?php endif; ?>
										<?php if($user->activacion==0):?>
											<i class="glyphicon glyphicon-remove"></i>
										<?php endif; ?>
									</td>
									<td>
										<?php 
											if (($user->likes>5) and ($user->likes<=10)){echo'<img src="uploads/insignias/basico.png" style="width:60px;height:60px" >';}
											if (($user->likes>10) and ($user->likes<=15)){echo'<img class="" src="uploads/insignias/intermedio.png" style="width:60px;height:60px" >';}
											if ($user->likes>15){echo'<img src="uploads/insignias/avanzado.png" style="width:60px;height:60px" >';}
										?>
									</td>
									<td style="width:125px;">
										<a href="./?view=edituserStandar&id=<?php echo $user->id_user;?>" class="btn btn-warning btn-xs">Editar</a>
										<a href="./?action=deluserStandar&id=<?php echo $user->id_user;?>" class="btn btn-danger btn-xs">Eliminar</a>
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