<!-- Inicio barra superior -->
        <div class="container-fluid bg-dark px-5 d-none d-lg-block">
            <div class="row gx-0 pt-1">
                <div class="col-lg-12 text-center text-lg-start mb-2 mb-lg-0">
                    <a href="https://www.gov.co/" target="_blank" class="navbar-brand p-0 imagen-svg"> <img src="img/logo_govco.png" width="90" height="20">
                    </a>
                </div>
            </div>
            
            <!--
            <div class="row gx-0">
                <div class="col-lg-8 text-center text-lg-start mb-2 mb-lg-0">
                    <div class="d-inline-flex align-items-center" style="height: 45px;">
                        <small class="me-3 text-light"><i class="fa fa-map-marker-alt me-2"></i>Agrotic San Juan de Pasto,
                            Colombia</small>
                        <small class="me-3 text-light"><i class="fa fa-phone-alt me-2"></i>+57 311 3895946</small>
                        <small class="text-light"><i
                                class="fa fa-envelope-open me-2"></i>contactenos@agroticnarino.com.co</small>
                    </div>
                </div>
                <div class="col-lg-4 text-center text-lg-end">
                    <div class="d-inline-flex align-items-center" style="height: 45px;">
                        <?php
                            if(isset($_SESSION["id"])){ ?>
                                <div class="me-3 text-light"><?php echo $nombre;?></div>
                                <?php
                                echo '<a href="configuration/logout"><button type="button" class="close" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button></a>';
                            }                
                        ?>
                    </div>
                </div>
            </div>
            -->
        </div>
<!-- Fin barra superior -->
