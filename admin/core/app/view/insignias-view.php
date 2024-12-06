<?php $x = UserData::getById($_SESSION["user_id"]); ?>
<?php $municipalities = MunicipalityData::getAll(); ?>
<?php if($x->kind==1):?>
	<section class="content">
		
		<div class="row">
			<div class="col-md-12">
				<h1>Lista de Usuarios mapa interactivo</h1>
				<!-- Single button -->
				<div class="btn-group">
					<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Nuevo  <span class="caret"></span>
					</button>
					<ul class="dropdown-menu">
						<li><a href="./?view=newUserMapaInteractivo">Mapa interactivo</a></li>
					</ul>
				</div>
				<br><br>
				<?php
				?>
				<?php
				$users = userMapaData::getAll();
				if(count($users)>0){
					// si hay usuarios
					?>
					<div class="box box-primary">
						<div class="box-body">
						<table class="table table-bordered table-hover datatable">
							<thead>
								<th>Item</th>
								<th>Nombres</th>
								<th>Genero</th>
								<th>Teléfono</th>
								<th>Estado</th>
								<th>Compras públicas</th>
								<th>Municipio</th>
								<th></th>
							</thead>
							<?php
							$cont=1;
							foreach($users as $user){
								?>
								<tr>
									<td>
										<?php echo $cont?>
									</td>
									<td><?php echo $user->name_initiative;?></td>
									<td><?php echo $user->genero; ?></td>
									<td><?php echo $user->phone; ?></td>
									<td>
										<?php if($user->estado==1):?>
											<i class="glyphicon glyphicon-ok"></i>
										<?php endif; ?>
										<?php if($user->estado==0):?>
											<i class="glyphicon glyphicon-remove"></i>
										<?php endif; ?>
									</td>
									<td>
										<?php if($user->comprasPublicas==1):?>
											<i class="glyphicon glyphicon-ok"></i>
										<?php endif; ?>
										<?php if($user->comprasPublicas==0):?>
											<i class="glyphicon glyphicon-remove"></i>
										<?php endif; ?>
									</td>
									<td>
                                        <?php foreach(MunicipalityData::getAll() as $g):?>
                                            <?php if($user->cod_municipality==$g->id_municipality){ echo "$g->name_municipality";}
                                        endforeach; ?>
								    </td>
									<td style="width:125px;">
										<a href="./?view=editUserMapa&idinitiative=<?php echo $user->id_initiative;?>" class="btn btn-warning btn-xs">Editar</a>
										<a href="./?action=deluserMapa&idinitiative=<?php echo $user->id_initiative;?>" class="btn btn-danger btn-xs">Eliminar</a>
									</td>
								</tr>
							<?php
							$cont ++;
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