<?php
  //Consulta mensajes
  $messagesNotRead=contactsMesagesData::getMessagesNotReady();
  $not_ready = 0;
  foreach($messagesNotRead as $messagesNotReady){
    $not_ready++;
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv=”Content-Type” content=”text/html; charset=UTF-8″ />
    <title>Panel de Administración</title>
    <link rel="icon" href="dist/img/favicon.ico">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.4 -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <link href="dist/css/skins/skin-blue-light.min.css" rel="stylesheet" type="text/css" />
    <script src="plugins/jquery/jquery-2.1.4.min.js"></script>
    <script src="plugins/morris/raphael-min.js"></script>
    <script src="plugins/morris/morris.js"></script>
    <link rel="stylesheet" href="plugins/morris/morris.css">
    <link rel="stylesheet" href="plugins/morris/example.css">
    <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
    <link href='plugins/fullcalendar/fullcalendar.min.css' rel='stylesheet' />
    <link href='plugins/fullcalendar/fullcalendar.print.css' rel='stylesheet' media='print' />
    <script src='plugins/fullcalendar/moment.min.js'></script>
    <script src='plugins/fullcalendar/fullcalendar.min.js'></script>
    <!--  pickadate -->
    <link rel="stylesheet" type="text/css" href="plugins/pickadate/themes/classic.css">
    <link rel="stylesheet" type="text/css" href="plugins/pickadate/themes/classic.date.css">
    <link rel="stylesheet" type="text/css" href="plugins/pickadate/themes/classic.time.css">
    <script src='plugins/pickadate/picker.js'></script>
    <script src='plugins/pickadate/picker.date.js'></script>
    <script src='plugins/pickadate/picker.time.js'></script>
    <link rel="stylesheet" type="text/css" href="plugins/select2/select2.min.css"/>
    <script src='plugins/select2/select2.min.js'></script>
    <script src="plugins/js/sweetalert2.all.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag/dist/css/multi-select-tag.css">

    <!-- js para graficos 
    <script src="plugins/charts/jquery.min.js"></script>
    <script src="plugins/charts/Chart.min.js"></script>
    <script src="plugins/charts/chart.js"></script>
    -->
    <script src="plugins/charts/ChartS.js"></script>

    

    <script type="text/javascript">
      $(document).ready(function(){
        //$("select").select2();
      });
    </script>
    
    <!-- multiselect-->
    <link rel="stylesheet" href="/path/to/cdn/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/1.1.2/css/bootstrap-multiselect.min.css" integrity="sha512-fZNmykQ6RlCyzGl9he+ScLrlU0LWeaR6MO/Kq9lelfXOw54O63gizFMSD5fVgZvU1YfDIc6mxom5n60qJ1nCrQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  </head>
  <body class="<?php if(isset($_SESSION["user_id"])  ):?>  skin-blue-light sidebar-mini <?php else:?>login-page<?php endif; ?>" >
    
    
    
    <div class="wrapper">
      <!-- Main Header -->
      <?php if(isset($_SESSION["user_id"])):?>
      <header class="main-header">
        <!-- Logo -->
        <a href="./" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>A</b>T</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>AGROTIC</b></span>
        </a>
        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- User Account Menu -->
              <li class="dropdown user user-menu">
                <!-- Menu Toggle Button -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <!-- The user image in the navbar-->
                  <!-- hidden-xs hides the username on small devices so only the image appears. -->
                  <span class=""><?php 
                  if(isset($_SESSION["user_id"])){ echo UserData::getById($_SESSION["user_id"])->name; }
                  ?></span>
                  <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- The user image in the menu -->
                  <?php 
                    if(isset($_SESSION["user_id"])){ 
                      $image_perfil=UserData::getById($_SESSION["user_id"])->image;
                      $verperfil=base64_encode($_SESSION["user_id"]);
                      echo "<li class='user-footer'>";
                        echo "<div class='pull-right'>";  
                          echo "<a href='./?view=edituser&gdbdgbfgfkdhbdghfhjshnxhjgdjdhgnjghjidfddgdgd=$verperfil'><img src='uploads/profiles/$image_perfil' class='img-circle' alt='User Image' style='width:40px;height:40px;'></a>";
                        echo "<div>";
                      echo "</li>";
                      echo"<div class='dropdown-divider'></div>";
                    }
                  ?></span>
                  <!-- <img src="/img/favicon.ico" class="img-circle" alt="User Image" /> -->
                  <!-- Menu Footer-->
                  <ul class="treeview-menu">
                    <div><a href="./?view=contactsMesages"><i class="fa fa-spinner"></i> Mensajes pendientes ( <?php echo $not_ready;?> )</a></div>
                  </ul>
                  <li class="user-footer">
                    <div class="pull-right">
                      <?php if(isset($_SESSION["user_id"])):?>
                      <?php endif; ?>
                      <a href="./logout" class="btn btn-default btn-flat">Salir</a>
                    </div>
                  </li>
                </ul>
              </li>
              <!-- Control Sidebar Toggle Button -->
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <div class="user-panel">
            <div class="pull-left image">
              <?php echo "<a href='./?view=edituser&gdbdgbfgfkdhbdghfhjshnxhjgdjdhgnjghjidfddgdgd=$verperfil'><img src='uploads/profiles/$image_perfil' class='img-circle' alt='User Image' style='width:40px;height:40px;'></a>";?>
            </div>
            <div class="pull-left info">
              <?php  
                if($_SESSION['kind']==1){echo"<p>Super Admin</p>";}
                if($_SESSION['kind']==2){echo"<p>Administrador</p>";}
                if($_SESSION['kind']==3){echo"<p>Editor BMP</p>";}
                if($_SESSION['kind']==4){echo"<p>Editor Noticias</p>";}
                if($_SESSION['kind']==5){echo"<p>Editor Apoyo</p>";}
                if($_SESSION['kind']==6){echo"<p>Editor Contable</p>";}
                if($_SESSION['kind']==7){echo"<p>Tercero</p>";}
                if($_SESSION['kind']==8){echo"<p>Proveedor</p>";}
                if($_SESSION['kind']==9){echo"<p>Repartidor</p>";}
                if($_SESSION['kind']==10){echo"<p>Juridico</p>";}
                if($_SESSION['kind']==11){echo"<p>Apoyo TIC</p>";}
              ?>
            </div>
          </div>
          <!-- Sidebar Menu -->
          <ul class="sidebar-menu">
            <li class="header">ADMINISTRACION</li>
            <?php if(isset($_SESSION["user_id"])):?>
            <?php $u = UserData::getById($_SESSION["user_id"]); ?>
            <li><a href="./index.php?view=home"><i class='fa fa-home fa-fw'></i> <span>Inicio</span></a></li>
            <?php
            if($_SESSION['kind']==1){
            ?>
                <li class="treeview">
                  <a href="#">
                    <i class="fa fa-th-list"></i>
                    <span>General</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="./?view=productosDpto"><i class='fa fa-dashboard'></i> <span>Productos dpto</span></a></li>
                    <li><a href="./?view=posts&opt=all"><i class="fa fa-archive"></i> Noticias</a></li>
                    <li><a href="./?view=sliderslist&opt=all"><i class="fa fa-bitbucket"></i> Sliders</a></li>
                    <li><a href="./?view=federation&opt=all"><i class='fa fa-user'></i> <span>Federación</span></a></li>
                    <li><a href="./?view=asocciatios&opt=all"><i class="fa fa-venus-mars"></i> Asociaciones</a></li>
                    <li><a href="./?view=frequentQuestions&opt=all"><i class="fa fa-paypal"></i> Preguntas frecuentes</a></li>
                    <li><a href="./?view=testimonials&opt=all"><i class="fa fa-refresh"></i> Testimonios</a></li>
                    <li><a href="./?view=services&opt=all"><i class="fa fa-chain"></i> Servicios</a></li>
                    <li><a href="./?view=team&opt=all"><i class="fa fa-spinner"></i> Equipo</a></li>
                    <li><a href="./?view=sponsors&opt=all"><i class="fa fa-bank"></i> Patrocinadores</a></li>
                    <li><a href="./?view=tipsAgrotic&opt=all"><i class="fa fa-clipboard"></i> Tips</a></li>
                    <li><a href="./?view=registrationPeasantMarket"><i class="fa fa-files-o"></i> Registro secretarías</a></li>
                  </ul>
                </li>
            <?php
            }
            ?>
            
            <?php
            	if(($_SESSION['kind']==1) or ($_SESSION['kind']==3)) {
            ?>
                <li class="treeview">
                  <a href="#">
                    <i class="fa fa-th-list"></i>
                    <span>Formatos BPM</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="./?view=inventoryFinished&opt=all"><i class="fa fa-file-text"></i> Inventario producto terminado</a></li>
                    <li><a href="./?view=productReturnRegistration&opt=all"><i class="fa fa-files-o"></i> Registro devoluciones</a></li>
                    <li><a href="./?view=receptionRawMaterials&opt=all"><i class="fa fa-list-alt"></i> Recepción de materia prima</a></li>
                    <li><a href="./?view=dispatchinventory&opt=all"><i class="fa fa-clipboard"></i> Inventario de despacho</a></li>
                    
                  </ul>
                </li>
                 
                <li class="treeview">
                  <a href="#">
                    <i class="fa fa-th-list"></i>
                    <span>Noticias y proyectos</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="./?view=posts&opt=all"><i class="fa fa-archive"></i> Noticias</a></li>
                    <li><a href="./?view=proyectos"><i class="fa fa-area-chart"></i> Proyectos</a></li>

                  </ul>
                </li>
            <?php
            }
            ?>
            
            
            
            <?php
            if($_SESSION['kind']==1){
            ?>
                <li class="treeview">
                  <a href="#">
                    <i class="fa fa-th-list"></i>
                    <span>Estadísticas</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="./?view=indicators"><i class="fa fa-dashboard"></i> Indicadores</a></li>
                    <li><a href="./?view=productHistory&opt=all"><i class="fa fa-pie-chart"></i> Histórico de productos</a></li>
                    <li><a href="./?view=providers&opt=all"><i class="fa fa-pencil fa-fw"></i> Proveedores</a></li>
                    <li><a href="./?view=configuration"><i class="fa fa-cog fa-fw"></i> Setup</a></li>
                    <li><a href="./?view=Customers"><i class="fa fa-line-chart"></i> Clientes</a></li>
                    <li><a href="./?view=producers"><i class="fa fa-hand-o-right"></i> Productores</a></li>
                    <li><a href="./?view=proyectos"><i class="fa fa-area-chart"></i> Proyectos</a></li>
                  </ul>
                </li>
            <?php
            }
            ?>
            
            <?php
            if(($_SESSION['kind']==1)or($_SESSION['kind']==10)){
            ?>
                <li class="treeview">
                  <a href="#">
                    <i class="fa fa-th-list"></i>
                    <span>Mensajería</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="./?view=pqrsfd&opt=all"><i class="fa fa-book fa-fw"></i>Estados Pqrs</a></li>
                    <li><a href="./?view=contactsMesages"><i class="fa fa-leanpub"></i> Mensajes contactos</a></li>
                  </ul>
                </li>
            <?php
            }
            ?>
            
            <?php
            if($_SESSION['kind']==6 or $_SESSION['user_id']== 29 or $_SESSION['kind']==1 ){
            ?>
                <li class="treeview">
                  <a href="#">
                    <i class="fa fa-th-list"></i>
                    <span>Proveedores y productos</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="./?view=providers&opt=all"><i class="fa fa-spinner"></i> Proveedores</a></li>
                    <li><a href="./?view=productosDpto"><i class='fa fa-dashboard'></i> <span>Productos dpto</span></a></li>
                    <li><a href="./?view=presentations"><i class='fa fa-dashboard'></i> <span>Presentaciones</span></a></li>
                    <li><a href="./?view=mercados_campesinos"><i class='fa fa-dashboard'></i> <span>Mercados campesinos</span></a></li>

                    
                  </ul>
                </li>
            <?php
            }
            ?>
            
            <?php
            if($_SESSION['kind']==6){
            ?>
                <li class="treeview">
                  <a href="#">
                    <i class="fa fa-th-list"></i>
                    <span>Pedidos</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    
                    <li><a href="./?view=pruebapedido"><i class='fa fa-codepen'></i> <span>Pedidos</span></a></li>
                    
                  </ul>
                </li>
            <?php
            }
            ?>
            
            <?php
            if($_SESSION['kind']==1){
            ?>   
                <li class="treeview">
                  <a href="#">
                    <i class="fa fa-th-list"></i>
                    <span>Categorias</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="./?view=categorias_Productos&opt=all"><i class="fa fa-dropbox"></i> Categorías productos</a></li>
                    <li><a href="./?view=categories_News&opt=all"><i class="fa fa-empire"></i> Categorías noticias</a></li>
                    <li><a href="./?view=Municipality"><i class='fa fa-joomla'></i> <span>Actualizar municipios</span></a></li>
                    <li><a href="./?view=objective"><i class='fa fa-sellsy'></i> <span>Objetivos</span></a></li>
                    <li><a href="./?view=productosDpto"><i class='fa fa-yelp'></i> <span>Productos dpto</span></a></li>
                    
                    <li><a href="./?view=pruebapedido"><i class='fa fa-codepen'></i> <span>Pedidos</span></a></li>
                  </ul>
                </li>
            <?php
            }
            ?>
            
            <?php
            if($_SESSION['kind']==11){
            ?>   
                <li class="treeview">
                  <a href="#">
                    <i class="fa fa-th-list"></i>
                    <span>Categorias</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    
                    <li><a href="./?view=Municipality"><i class='fa fa-joomla'></i> <span>Actualizar municipios</span></a></li>
                    
                  </ul>
                </li>
            <?php
            }
            ?>
            
            
            
            
            <?php
            if(($_SESSION['kind']==1)or($_SESSION['kind']==6) or $_SESSION['user_id']== 29 or $_SESSION['user_id']== 19){
            ?>  
            <li class="treeview">
              <a href="#">
                <i class="fa fa-th-list"></i>
                <span>Modulo contable</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="./?view=ventas"><i class='fa fa-codepen'></i> <span>Consultar Ventas</span></a></li>
                <li><a href="./?view=changePrices"><i class="fa fa-connectdevelop"></i> Ajustar precios</a></li>
                <li><a href="./?view=informemensualventas"><i class='fa fa-dashboard'></i> <span>Informe mensual</span></a></li>
                <li><a href="./?view=registrationPeasantMarket"><i class="fa fa-files-o"></i> Mercado Campesino</a></li>
                 
              </ul>
            </li>
            <?php
            }
            ?>
            
            <?php
                if($_SESSION['kind']==4){
            ?>  
            <li class="treeview">
              <a href="#">
                <i class="fa fa-th-list"></i>
                <span>Modulo Noticias</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="./?view=posts&opt=all"><i class="fa fa-spinner"></i>Crear noticias</a></li>
              </ul>
            </li>
            <?php
            }
            ?>
            
            
            <?php
                // Equipo logístico
                if(($_SESSION['kind']==5)or($_SESSION['kind']==1)){
            ?>  
            <li class="treeview">
              <a href="#">
                <i class="fa fa-th-list"></i>
                <span>Modulo Pedidos</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                
                <li><a href="./?view=pruebapedido"><i class='fa fa-codepen'></i> <span>Pedidos</span></a></li>
                <li><a href="./?view=ventas"><i class='fa fa-codepen'></i> <span>Consultar Ventas</span></a></li>
                <li><a href="./?view=productores"><i class='fa fa-android'></i> <span>Activar productores</span></a></li>
                
                

              </ul>
              
              <!--- <a href="#">
                <i class="fa fa-th-list"></i>
                <span>General</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                
                <li><a href="./?view=productosDpto"><i class='fa fa-yelp'></i> <span>Productos dpto</span></a></li>


              </ul>-->
            </li>
            <?php
            }
            ?>
            
            <?php
            if($_SESSION['kind']==1){
            ?>  
            <li class="treeview">
              <a href="#">
                <i class="fa fa-th-list"></i>
                <span>Usuarios</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="./?view=users"><i class='fa fa-user'></i> <span>Usuarios sistema</span></a></li>
                <li><a href="./?view=usersStandar"><i class='fa fa-android'></i> <span>Usuarios standar</span></a></li>
                <li><a href="./?view=insignias"><i class='fa fa-yelp'></i> <span>Insignias</span></a></li>
              </ul>
            </li>
            <?php
            }
            ?>
              <div class="text-center">
                <img src="uploads/images/logoagrotic.png" style="width=200;height=100;" alt="">
              </div>

            <?php endif; ?>
          </ul><!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
      </aside>
    <?php endif;?>
      <!-- Content Wrapper. Contains page content -->
      <?php if(isset($_SESSION["user_id"])   ):?>
      <div class="content-wrapper">
        <?php View::load("index");?>
      </div><!-- /.content-wrapper -->
        <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 2.0
        </div>
        <strong>Copyright Gobernación de Nariño - Agrotic &copy; 2024 <a href="https://gestionproyectos.narino.gov.co" target="_blank">Agrotic</a></strong>
      </footer>
      <?php else:?>
        <?php if(isset($_GET["view"]) && $_GET["view"]=="opc1"):?>
        <?php elseif(isset($_GET["view"]) && $_GET["view"]=="opc2"):?>
        <?php else:?>
        <div class="login-box">
          <div class="login-logo">
            <img src="uploads/setup/logo_gober_nar.png" alt="img-responsive"><!-- login-institucional -->
          </div>
          <div class="login-box-body">
            <div class="card-header text-center">
                <a href="./" class="h3"><strong><span style="color: #091E3E;">Gobernación de Nariño</span></strong></a>
            </div>
            <p class="login-box-msg h4"><strong><span style="color: #85A633;">Plataforma Agrotic</span></strong></p>
            <form action="./?action=processlogin" method="post">
              <div class="form-group has-feedback">
                <input type="text" name="username" required class="form-control" placeholder="Usuario"/>
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
              </div>
              <div class="form-group has-feedback">
                <input type="password" name="password" required class="form-control" placeholder="Contraseña"/>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
              </div>
              <div class="row">
                <div class="col-xs-8">
                  <div class="icheck-primary">
                      <input type="checkbox" id="remember">
                      <label for="remember">
                          Recuérdame
                      </label>
                  </div>
                  </div>
                <div class="col-xs-4">
                  <button type="submit" class="btn btn-primary btn-block btn-flat">Acceder</button>
                </div><!-- /.col -->
              </div>
            </form></br></br>
            <p class="mb-1">
              <a href="./../../../../../agrotic-narino/admin/core/app/layouts/recupera.php">Olvidó su contraseña ? </a>
            </p>
            <div align="center"><img src="" alt=""></div>
          </div><!-- /.login-box-body -->
        </div><!-- /.login-box -->  
      <?php endif;?>
      <?php endif;?>
    </div><!-- ./wrapper -->
    <!-- REQUIRED JS SCRIPTS -->
    <!-- jQuery 2.1.4 -->
    <!-- Bootstrap 3.3.2 JS -->
    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js" type="text/javascript"></script>
    <script type="text/javascript">
      $(document).ready(function(){
        $(".pickadate").pickadate({format: 'yyyy-mm-dd',min: '<?php echo date('Y-m-d',time()-(24*60*60)); ?>'});
        $(".pickatime").pickatime({format: 'HH:i',interval: 10 });
      })
    </script>
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
    <script src="plugins/js/usuarios.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){
        $(".datatable").DataTable({
            "language": {
                processing:     "Traitement en cours...",
                search:         "Buscar:",
                lengthMenu:    "Mostrar _MENU_ compras",
                info:           "Mostrando _END_ de _TOTAL_ compras",
                
                
                paginate: {
                    first:      "Primero",
                    previous:   "Anterior",
                    next:       "Siguiente",
                    last:       "Último"
                },
            
            }
        });
      });
    </script>
    
    <!--scritp para multiselect -->
    <script src="/path/to/cdn/jquery.min.js"></script>
    <script src="/path/to/cdn/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/1.1.2/js/bootstrap-multiselect.min.js" integrity="sha512-lxQ4VnKKW7foGFV6L9zlSe+6QppP9B2t+tMMaV4s4iqAv4iHIyXED7O+fke1VeLNaRdoVkVt8Hw/jmZ+XocsXQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).ready(()=>{
            $('#sPresentations').multiselect();
        });
    </script>
  
  </body>
</html>