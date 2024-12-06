<?php $posts = PostData::getAll();$countPost=0;?>
<?php $products = productosDptoData::getAll();$countProducts=0;?>
<?php $lastProducts = productosDptoData::getAllRecents();?>
<?php $users = UserData::getAll();$countUsers=0;?>
<?php $providers = providersData::getAll();$countProviders=0;?>
<?php $lastProviders = providersData::getAllRecents();?>
<?php $asocciations = AsocciatiosData::getAll();$countAsocciations=0;?>
<?php $customers = CustomersData::getAll();$countCustomers=0;?>
<?php $pqrsfds = pqrsfdData::getAll();$countPqrsfd=0;?>
<?php require 'uploads/data/data1.php';?>
  <section class="content-header">
    <h1>
      Plataforma Agrotic de Nariño
      <small>Version 2.0</small>
    </h1>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-lg-3 col-6">
        <div class="small-box" style="background-color: #17a2b8 !important;">
          <div class="inner">
          <?php
            foreach($posts as $post){
              $countPost++;
            }
          ?>
            <h3><?php echo $countPost; ?></h3>
            <p>Noticias</p>
          </div>
          <div class="icon">
            <i class="ion ion-bag"></i>
          </div>
          <a href="./?view=posts" class="small-box-footer">Más información <i class="fa fa-sign-out"></i></a>
        </div>
      </div>
      <div class="col-lg-3 col-6">
        <div class="small-box" style="background-color: #28a745 !important;">
          <div class="inner">
          <?php
            foreach($products as $product){
              $countProducts++;
            }
          ?>
            <h3><?php echo $countProducts; ?><sup style="font-size: 20px"></sup></h3>
            <p>Productos registrados</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
          <a href="./?view=productosDpto&opt=all" class="small-box-footer">Más información <i class="fa fa-sign-out"></i></a>
        </div>
      </div>
      <div class="col-lg-3 col-6">
        <div class="small-box" style="background-color: #ffc107 !important;">
          <div class="inner">
            <?php
              foreach($users as $user){
                $countUsers++;
              }
            ?>
            <h3><?php echo $countUsers; ?></h3>
            <p>Usuarios registrados</p>
          </div>
          <div class="icon">
            <i class="ion ion-person-add"></i>
          </div>
          <a href="./?view=users" class="small-box-footer">Más información <i class="fa fa-sign-out"></i></a>
        </div>
      </div>
      <div class="col-lg-3 col-6">
        <div class="small-box" style="background-color: #dc3545 !important;">
          <div class="inner">
          <?php
              foreach($providers as $provider){
                $countProviders++;
              }
            ?>
            <h3><?php echo $countProviders; ?></h3>
            <p>Proveedores</p>
          </div>
          <div class="icon">
            <i class="ion ion-pie-graph"></i>
          </div>
          <a href="./?view=providers" class="small-box-footer">Más información <i class="fa fa-sign-out"></i></a>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-6 col-12">
        <div class="small-box" style="background-color: #81c9fa !important;">
          <?php
            foreach($asocciations as $asocciation){
              $countAsocciations++;
            }
          ?>
          <div class="inner">
            <h3><?php echo $countAsocciations; ?></h3>
            <p>Asociaciones</p>
          </div>
          <div class="icon">
            <i class="ion ion-ios-bookmarks-outline"></i>
          </div>
          <a href="./?view=asocciatios" class="small-box-footer">Más información <i class="fa fa-sign-out"></i></a>
        </div>
      </div>
      <div class="col-lg-6 col-12">
        <div class="small-box" style="background-color: #3df883 !important;">
          <div class="inner">
          <?php
            foreach($customers as $customer){
              $countCustomers++;
            }
          ?>
            <h3><?php echo $countCustomers; ?></h3>
            <p>Clientes</p>
          </div>
          <div class="icon">
            <i class="ion ion-android-person"></i>
          </div>
          <a href="./?view=Customers" class="small-box-footer">Más información <i class="fa fa-sign-out"></i></a>
        </div>
      </div>
    </div>
    <div class="row">
        <div class="col-lg-6 col-12">
            <div class="small-box" style="background-color: #B5B !important;">
              <div class="inner">
                  <?php
                    foreach($pqrsfds as $pqrsfd){
                      $countPqrsfd++;
                    }
                  ?>
                    <h3><?php echo $countPqrsfd; ?></h3>
                    <p>Pqrsf</p>
              </div>
              <div class="icon">
                <i class="ion ion-android-notifications-none"></i>
              </div>
              <a href="./?view=pqrsfd" class="small-box-footer">Más información <i class="fa fa-sign-out"></i></a>
            </div>
        </div>
    </div>
    
    <div class="row">
      <div class="col-lg-6 col-12">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Productos agregados recientemente</h3>
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse">
                <i class="fa fa-minus"></i>
              </button>
              <button type="button" class="btn btn-box-tool" data-widget="remove">
                <i class="fa fa-times"></i>
              </button>
            </div>
          </div>
          <div class="box-body">
            <ul class="products-list product-list-in-box">
              <?php
                foreach($lastProducts as $lastProduct){
                  echo '<li class="item">
                  <div class="product-img">
                    <img src="../../../../images/products/'.$lastProduct->image.'" alt="Product Image">
                  </div>
                  <div class="product-info">
                    <a href="" class="product-title">
                      '.$lastProduct->name_product.'
                      <span class="label label-warning pull-right">$'.$lastProduct->price.'</span>
                    </a>
                  </div>
                </li>';
                }
              ?>
            </ul>
          </div>
          <div class="box-footer text-center">
            <a href="./?view=productos&opt=all" class="small-box-footer"> Ver todos <i class="fa fa-sign-out"></i></a>
          </div>
        </div>
      </div>
      <div class="col-lg-6 col-12">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Proveedores agregados recientemente</h3>
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse">
                <i class="fa fa-minus"></i>
              </button>
              <button type="button" class="btn btn-box-tool" data-widget="remove">
                <i class="fa fa-times"></i>
              </button>
            </div>
          </div>
          <div class="box-body">
            <ul class="products-list product-list-in-box">
              <?php
                foreach($lastProviders as $lastProvider){
                  echo '<li class="item">
                  <div class="product-img">
                    <img src="uploads/providers/'.$lastProvider->image.'" alt="Product Image">
                  </div>
                  <div class="product-info">
                    <a href="" class="product-title">
                      '.$lastProvider->name.'
                      <span class="label label-warning pull-right">$'.$lastProvider->nit.'</span>
                    </a>
                  </div>
                </li>';
                }
              ?>
            </ul>
          </div>
          <div class="box-footer text-center">
            <a href="./?view=providers&opt=all" class="small-box-footer"> Ver todos <i class="fa fa-sign-out"></i></a>
          </div>
        </div>
      </div>
    </div>
    
    <div class="row">
      <div class="col-lg-12 col-12">
        <button type="button" class="btn btn-default" data-toggle="modal" data-target="">
          Gráfico de líneas comparación de años
        </button>
        <div class="row">
          <form class="navbar-form navbar-left" method="POST" action="uploads/data/agregar_ventas">
            <div class="form-group">
              <input name="monto" type="text" class="form-control" placeholder="Monto">
            </div>
            <div class="form-group">
              <input name="venta_fecha" type="date" class="form-control" placeholder="Fecha">
            </div>
              <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Agregar Venta </button>
          </form>
        </div><!-- /.row -->
          <div class="row">
            <div class="col-md-12">
              <div class="box box-warning">
                <div class="box-header with-border">
                  <?php
                    $year = date('Y');
                  ?>
                  <h3 class="box-title">Reporte de ventas (<?php echo $year-1; ?> vs <?php echo $year; ?>)</h3>
                </div>
                <div class="box-body">
                  <div class="chart">
                    <canvas id="lineChart" style="height:250px"></canvas>
                  </div>
                </div>
                <!-- /.box-body -->
              </div>
            </div>
          </div>
        </div>
        <?php include('uploads/data/data2.php'); ?>
        <script>
          $(function () {
            var lineChartData = {
              labels  : ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
              datasets: [
                {
                  label               : 'Año Previo',
                  fillColor           : 'rgba(210, 214, 222, 1)',
                  strokeColor         : 'rgba(210, 214, 222, 1)',
                  pointColor          : 'rgba(210, 214, 222, 1)',
                  pointStrokeColor    : '#c1c7d1',
                  pointHighlightFill  : '#fff',
                  pointHighlightStroke: 'rgba(220,220,220,1)',
                  data                : [ "<?php echo $pjan; ?>",
                                          "<?php echo $pfeb; ?>",
                                          "<?php echo $pmar; ?>",
                                          "<?php echo $papr; ?>",
                                          "<?php echo $pmay; ?>",
                                          "<?php echo $pjun; ?>",
                                          "<?php echo $pjul; ?>",
                                          "<?php echo $paug; ?>",
                                          "<?php echo $psep; ?>",
                                          "<?php echo $poct; ?>",
                                          "<?php echo $pnov; ?>",
                                          "<?php echo $pdec; ?>" 
                                        ]
                },
                {
                  label               : 'Este año',
                  fillColor           : 'rgba(60,141,188,0.9)',
                  strokeColor         : 'rgba(60,141,188,0.8)',
                  pointColor          : '#3b8bba',
                  pointStrokeColor    : 'rgba(60,141,188,1)',
                  pointHighlightFill  : '#fff',
                  pointHighlightStroke: 'rgba(60,141,188,1)',
                  data                : [ "<?php echo $tjan; ?>",
                                          "<?php echo $tfeb; ?>",
                                          "<?php echo $tmar; ?>",
                                          "<?php echo $tapr; ?>",
                                          "<?php echo $tmay; ?>",
                                          "<?php echo $tjun; ?>",
                                          "<?php echo $tjul; ?>",
                                          "<?php echo $taug; ?>",
                                          "<?php echo $tsep; ?>",
                                          "<?php echo $toct; ?>",
                                          "<?php echo $tnov; ?>",
                                          "<?php echo $tdec; ?>" 
                                        ]
                }
              ]
            }
          
            var lineChartCanvas          = $('#lineChart').get(0).getContext('2d')
            var lineChart                = new Chart(lineChartCanvas)
            var lineChartOptions = {
              //Boolean - If we should show the scale at all
              showScale               : true,
              //Boolean - Whether grid lines are shown across the chart
              scaleShowGridLines      : false,
              //String - Colour of the grid lines
              scaleGridLineColor      : 'rgba(0,0,0,.05)',
              //Number - Width of the grid lines
              scaleGridLineWidth      : 1,
              //Boolean - Whether to show horizontal lines (except X axis)
              scaleShowHorizontalLines: true,
              //Boolean - Whether to show vertical lines (except Y axis)
              scaleShowVerticalLines  : true,
              //Boolean - Whether the line is curved between points
              bezierCurve             : true,
              //Number - Tension of the bezier curve between points
              bezierCurveTension      : 0.3,
              //Boolean - Whether to show a dot for each point
              pointDot                : false,
              //Number - Radius of each point dot in pixels
              pointDotRadius          : 4,
              //Number - Pixel width of point dot stroke
              pointDotStrokeWidth     : 1,
              //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
              pointHitDetectionRadius : 20,
              //Boolean - Whether to show a stroke for datasets
              datasetStroke           : true,
              //Number - Pixel width of dataset stroke
              datasetStrokeWidth      : 2,
              //Boolean - Whether to fill the dataset with a color
              datasetFill             : true,
              //String - A legend template
              legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].lineColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
              //Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
              maintainAspectRatio     : true,
              //Boolean - whether to make the chart responsive to window resizing
              responsive              : true
            }
            
            lineChartOptions.datasetFill = false
            lineChart.Line(lineChartData, lineChartOptions)

          })
        </script>
      </div>
    </div>
        
      
    </div>

  </section>
  