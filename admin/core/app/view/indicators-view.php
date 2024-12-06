<?php $posts    = PostData::getAll();$countPost=0;?>
<?php $users    = UserStandarData::getAll();$countusers=0;?>
<?php $pqrsfds  = pqrsfdData::getAll();$countPqrsfd=0;?>
<?php $mesagess = contactsMesagesData::getAll();$countMesagess=0;?>
<?php $orderss  = ordersData::getAll();?>
  <section class="content-header">
    <h1>
      Indicadores Plataforma Agrotic de Nariño
      <small>Version 2.0</small>
    </h1>
  </section>
  <section class="content">
    <div class="row">
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
          
        <div class="col-lg-3 col-6">
            <div class="small-box" style="background-color: #28a745 !important;">
              <div class="inner">
              <?php
                foreach($mesagess as $mesages){
                  $countMesagess++;
                }
              ?>
                <h3><?php echo $countMesagess; ?><sup style="font-size: 20px"></sup></h3>
                <p>Mensajes de contactos</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="./?view=contactsMesages&opt=all" class="small-box-footer">Más información <i class="fa fa-sign-out"></i></a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-12">
            <button type="button" class="btn btn-default" data-toggle="modal" data-target="">
              Ventas totales
            </button>
        </div>
    </div><br>
    
    <?php
      $sumaVentasIpiales=0;
      $sumaVentasPasto=0;
      $sumaVentasTumaco=0;
      $countComprasIpiales=0;
      $countComprasPasto=0;
      $countComprasTumaco=0;
      $recogerenCAIpiales=0;
      $recogerenCAPasto=0;
      $recogerenCATumaco=0;
      $recogerenPackingHIpiales=0;
      $recogerenPackingPasto=0;
      $recogerenPackingTumaco=0;
      $recogerenDomicilioIpiales=0;
      $recogerenDomicilioPasto=0;
      $recogerenDomicilioTumaco=0;

      $sumaCAIpiales=0;
      $sumaCAPasto=0;
      $sumaCATumaco=0;
      $sumaPackingHIpiales=0;
      $sumanPackingPasto=0;
      $sumaPackingTumaco=0;
      $sumaDomicilioIpiales=0;
      $sumaDomicilioPasto=0;
      $sumaDomicilioTumaco=0;
      
      foreach($orderss as $orders){
        if(($orders->status)=="Aprobado" or ($orders->status=="Entregado")){
            if($orders->id_municipality==28){
                $countComprasIpiales ++;
                $sumaVentasIpiales = $sumaVentasIpiales + $orders->price;
                if($orders->shipping_method=="Recoger en CA"){
                    $sumaCAIpiales = $sumaCAIpiales + $orders->price;
                    $recogerenCAIpiales ++;
                }
                if($orders->shipping_method=="Recoger en PackingH"){
                    $sumaPackingHIpiales = $sumaPackingHIpiales + $orders->price;
                    $recogerenPackingHIpiales ++;
                }
                if($orders->shipping_method=="Servicio domicilio"){
                    $sumaDomicilioIpiales = $sumaDomicilioIpiales + $orders->price;
                    $recogerenDomicilioIpiales ++;
                }
            }
            if($orders->id_municipality==61){
                $countComprasTumaco ++;
                $sumaVentasTumaco = $sumaVentasTumaco + $orders->price;
                if($orders->shipping_method=="Recoger en CA"){
                    $sumaCATumaco = $sumaCATumaco + $orders->price;
                    $recogerenCATumaco ++;
                }
                if($orders->shipping_method=="Recoger en PackingH"){
                    $sumaPackingHTumaco = $sumaPackingHTumaco + $orders->price;
                    $recogerenPackingHTumaco ++;
                }
                if($orders->shipping_method=="Servicio domicilio"){
                    $sumaDomicilioTumaco = $sumaDomicilioTumaco + $orders->price;
                    $recogerenDomicilioTumaco ++;
                }
            }
            if($orders->id_municipality==64){
                $countComprasPasto ++;
                $sumaVentasPasto = $sumaVentasPasto + $orders->price;
                if($orders->shipping_method=="Recoger en CA"){
                    $sumaCAPasto = $sumaCAPasto + $orders->price;
                    $recogerenCAPasto ++;
                }
                if($orders->shipping_method=="Recoger en PackingH"){
                    $sumaPackingHPasto = $sumaPackingHPasto + $orders->price;
                    $recogerenPackingHPasto ++;
                }
                if($orders->shipping_method=="Servicio domicilio"){
                    $sumaDomicilioPasto = $sumaDomicilioPasto + $orders->price;
                    $recogerenDomicilioPasto ++;
                }
            }
        }
      }
      $sumaVentasIpiales    = number_format($sumaVentasIpiales, 2, '.', ',');
      $sumaVentasTumaco     = number_format($sumaVentasTumaco, 2, '.', ',');
      $sumaVentasPasto      = number_format($sumaVentasPasto, 2, '.', ',');
      
      $sumaCAIpiales        = number_format($sumaCAIpiales, 2, '.', ',');
      $sumaPackingHIpiales  = number_format($sumaPackingHIpiales, 2, '.', ',');
      $sumaDomicilioIpiales = number_format($sumaDomicilioIpiales, 2, '.', ',');
    
      $sumaCATumaco         = number_format($sumaCATumaco, 2, '.', ',');
      $sumaPackingHTumaco   = number_format($sumaPackingHTumaco, 2, '.', ',');
      $sumaDomicilioTumaco  = number_format($sumaDomicilioTumaco, 2, '.', ',');
      
      $sumaCAPasto          = number_format($sumaCAPasto, 2, '.', ',');
      $sumaPackingHPasto    = number_format($sumaPackingHPasto, 2, '.', ',');
      $sumaDomicilioPasto   = number_format($sumaDomicilioPasto, 2, '.', ',');
      
    ?>
    <div class="row">
        <div class="col-lg-4 col-6">
            <div class="small-box" style="background-color: #004E9B !important;">
              <div class="inner">
                <h4><?php echo $countComprasIpiales; ?></h4>
                <h3><?php echo $sumaVentasIpiales; ?></h3>
                <p>Ventas Ipiales</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              
            </div>
          </div>
        <div class="col-lg-4 col-6">
            <div class="small-box" style="background-color: #FF6500!important;">
              <div class="inner">
                <h4><?php echo $countComprasTumaco; ?></h4>
                <h3><?php echo $sumaVentasTumaco; ?></h3
                <p>Ventas Tumaco</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              
            </div>
        </div>
        <div class="col-lg-4 col-6">
            <div class="small-box" style="background-color: #FFd500!important;">
              <div class="inner">
                <h4><?php echo $countComprasPasto; ?></h4>
                <h3><?php echo $sumaVentasPasto; ?></h3
                <p>Ventas Pasto</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-lg-4 col-6">
            <div class="small-box" style="background-color: #ff6961 !important;">
              <div class="inner">
                <h4><?php echo "Recoger en CA: $recogerenCAIpiales"; ?></h4>
                <h3><?php echo $sumaCAIpiales; ?></h3>
                <h4><?php echo "Recoger en Paking House: $recogerenPackingHIpiales"; ?></h4>
                <h3><?php echo $sumaPackingHIpiales; ?></h3>
                <h4><?php echo "Servicio a domicilio: $recogerenDomicilioIpiales"; ?></h4>
                <h3><?php echo $sumaDomicilioIpiales; ?></h3>
                <p>Ventas Ipiales</p>
              </div>
              <div class="icon">
                <i class="ion ion-cash"></i>
              </div>
              
            </div>
          </div>
        <div class="col-lg-4 col-6">
            <div class="small-box" style="background-color: #77dd77!important;">
              <div class="inner">
                <h4><?php echo "Recoger en CA: $recogerenCATumaco"; ?></h4>
                <h3><?php echo $sumaCATumaco; ?></h3>
                <h4><?php echo "Recoger en Paking House: $recogerenPackingHTumaco"; ?></h4>
                <h3><?php echo $sumaPackingHTumaco; ?></h3>
                <h4><?php echo "Servicio a domicilio: $recogerenDomicilioTumaco"; ?></h4>
                <h3><?php echo $sumaDomicilioTumaco; ?></h3>
                <p>Ventas Tumaco</p>
              </div>
              <div class="icon">
                <i class="ion ion-cash"></i>
              </div>
              
            </div>
        </div>
        <div class="col-lg-4 col-6">
            <div class="small-box" style="background-color: #fdcae1!important;">
              <div class="inner">
                <h4><?php echo "Recoger en CA: $recogerenCAPasto"; ?></h4>
                <h3><?php echo $sumaCAPasto; ?></h3>
                <h4><?php echo "Recoger en Paking House: $recogerenPackingHPasto"; ?></h4>
                <h3><?php echo $sumaPackingHPasto; ?></h3>
                <h4><?php echo "Servicio a domicilio: $recogerenDomicilioPasto"; ?></h4>
                <h3><?php echo $sumaDomicilioPasto; ?></h3>
                <p>Ventas Pasto</p>
              </div>
              <div class="icon">
                <i class="ion ion-cash"></i>
              </div>
              
            </div>
        </div>
    </div>
  </section>
  