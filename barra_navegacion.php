<!-- Inicio de la barra de navegación -->
        <div class="container-fluid position-relative p-0">
            <nav class="navbar navbar-expand-lg navbar-dark px-5 py-3 py-lg-0">
                <a href="./" class="navbar-brand p-0 imagen-svg"> <object data="img/login/Logo-agrotic-07.svg" width="200" height="90"> </object></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav py-0">
                        <a href="./" class="nav-item nav-link">&nbsp;Inicio&nbsp;</a>
                        <a href="de-interes" class="nav-item nav-link">Noticias e investigaciones</a>
                        <a href="mapainteractivo" class="nav-item nav-link">Mapa interactivo</a>
                        <a href="datos-estadisticos" class="nav-item nav-link">Datos estadísticos</a>
                        <a href="tienda" class="nav-item nav-link">Tienda</a>
                    </div>
                    <div class="h-100 d-lg-inline-flex align-items-center d-none me-3 ml-5" style="text-align: right; margin-left: 35px;float: right;">
                        <a class="text-icon-social me-2 ml-5" href="https://www.youtube.com/channel/UCB7XQoJS8sK7AxPfdLZbzEw" target="_blank"><i><img src="img/acercade/youtube.png"></i></a>
                        <a class="text-icon-social me-0" href="https://www.facebook.com/prometeus0001" target="_blank"><i><img src="img/acercade/facebook.png"></i></a>
                        <a class="text-icon-social me-0" href="https://www.instagram.com/prometeus_sas/" target="_blank"><i><img src="img/acercade/instagram.png"></i></a>
                    </div>
                    <!-- Search -->
                    <!-- <butaton type="button" class="btn text-primary ms-3" data-bs-toggle="modal" data-bs-target="#searchModal"><i class="fa fa-search"></i></butaton> -->
                    <a class="mx-2 mt-3 btn" data-bs-toggle="modal" data-bs-target="#searchModal">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="#091E3E" class="bi bi-search text-primary" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                        </svg>
                    </a>
                    <!-- Cart -->
                    <?php 
                        if (isset($_SESSION["listSC"])){
                            //Total de adiciones al carrito
                            $totalSC = count(json_decode($_SESSION["listSC"], true));
                        }else{
                            $totalSC = 0;
                        }
                    ?>
                    <a class="p-0 mt-4 mx-2 btn position-relative " href="<?php echo $path."cart"?>">
                        <svg type="button" xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#091E3E" class="bi bi-cart3 text-primary position-relative" viewBox="0 0 16 16">
                            <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5
                            0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4
                            2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                        </svg>
                        <!-- <i class=" btn text-primary  ms-3 bi bi-cart3" data-bs-toggle="modal"></i> -->
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-dark">
                            <?php echo $totalSC ?><span class="visually-hidden"></span>
                        </span>
                    </a>
    
                    <a href="myCount?editProfile" class="btn btn-primary py-0 ms-4">&nbsp;<i class="bi bi-person fs-5"></i>Mi cuenta&nbsp;</a>
    
                    
                </div>
            </nav>
        </div>
        <!-- Fin de la barra de navegación -->