<?php
    
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title>Gestión proyectos</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="Gestión proyectos" name="">
        <meta content="Gestión proyectos" name="Gestión proyectos">
        <meta name="keywords" content="Proyectos, gestión proyectos, proyectos nariño, inversion proyectos nariño, html">
        <!-- Favicon -->
        <link href="img/logos/favicon-32x32.png" rel="icon">
        <!-- Fuentes web de Google -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&family=Rubik:wght@400;500;600;700&display=swap" rel="stylesheet">
        <!-- Hoja de estilos de fuentes de iconos -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
        <!-- Hoja de estilo de bibliotecas -->
        <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
        <link href="lib/animacion/animacion.min.css" rel="stylesheet">
        <link href="css/xstyles.css" rel="stylesheet" />
        <!-- Hoja de estilo Bootstrap personalizada -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <!-- Template Hoja de estilo -->
        <link href="css/style.css" rel="stylesheet">
        <!-- Template mapa -->
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/snap.svg/0.2.0/snap.svg-min.js"></script>  
    </head>
    <body>
    
    <!-- Inicio giratorio -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner"></div>
    </div>
    <!-- Fin giratorio -->

    <!-- Inicio barra superior -->
    <div class="container-fluid bg-dark px-5 d-none d-lg-block">
        <div class="row gx-0">
            <div class="col-lg-8 text-center text-lg-start mb-2 mb-lg-0">
                <div class="d-inline-flex align-items-center" style="height: 45px;">
                    <small class="me-3 text-light"><i class="fa fa-map-marker-alt me-2"></i>123 San Juan de Pasto, Colombia</small>
                    <small class="me-3 text-light"><i class="fa fa-phone-alt me-2"></i>+012 345 6789</small>
                    <small class="text-light"><i class="fa fa-envelope-open me-2"></i>info@gestionproyectos.narino.gov.co</small>
                </div>
            </div>
            <div class="col-lg-4 text-center text-lg-end">
                <div class="d-inline-flex align-items-center" style="height: 45px;">
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href=""><i class="fab fa-twitter fw-normal"></i></a>
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href=""><i class="fab fa-facebook-f fw-normal"></i></a>
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href=""><i class="fab fa-linkedin-in fw-normal"></i></a>
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href=""><i class="fab fa-instagram fw-normal"></i></a>
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle" href=""><i class="fab fa-youtube fw-normal"></i></a>
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href="./login.html"><i class="fab fa-sign-in fw-normal"></i></a>
                </div>
            </div>
        </div>
    </div>
    <!-- Fin barra superior -->

    <!-- Inicio Navbar & Carousel -->
    <div class="container-fluid position-relative p-0">
        <nav class="navbar navbar-expand-lg navbar-dark px-5 py-3 py-lg-0">
            <a href="./" class="navbar-brand p-0 imagen-svg"> <object data="img/logos/logo_agro_tic.svg" width="200" height="90"> </object></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto py-0">
                    <a href="./" class="nav-item nav-link">&nbsp;&nbsp;Inicio&nbsp;&nbsp;</a>
                    <a href="acerca-de.html" class="nav-item nav-link">Acerca de</a>
                    <a href="servicios.html" class="nav-item nav-link">Servicios</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Noticias</a>
                        <div class="dropdown-menu m-0">
                            <a href="noticias.html" class="dropdown-item">Noticias</a>
                            <a href="noticias-detalles.html" class="dropdown-item">Detalles noticias</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Páginas</a>
                        <div class="dropdown-menu m-0">
                            <a href="precios.html" class="dropdown-item">Precios</a>
                            <a href="porque-nosotros.html" class="dropdown-item">Por que nosotros</a>
                            <a href="equipo.html" class="dropdown-item">Nuestro equipo</a>
                            <a href="testimonios.html" class="dropdown-item">Testimonios</a>
                            <a href="registro.html" class="dropdown-item">Registro</a>
                            <a href="productos.html" class="dropdown-item">Productos</a>
                            <a href="faq.html" class="dropdown-item">Preguntas</a>
                            <a href="pqrsf.html" class="dropdown-item">Pqrsf</a>
                            <a href="galeria.html" class="dropdown-item">Galeria</a>
                            <a href="tienda.html" class="dropdown-item">Tienda</a>
                            <a href="404.html" class="dropdown-item">Página 404</a>
                        </div>
                    </div>
                                        <a href="Contacto.html" class="nav-item nav-link">Contacto</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">&nbsp;&nbsp;Mapas&nbsp;&nbsp;</a>
                        <div class="dropdown-menu m-0">
                            <a href="mapa_productos" class="dropdown-item">Mapa productos</a>
                            <a href="mapa-pasto.html" class="dropdown-item">Mapa Pasto</a>
                            <a href="mapa-ipiales.html" class="dropdown-item">Mapa Ipiales</a>
                            <a href="mapa-tumaco.html" class="dropdown-item">Mapa Tumaco</a>
                            <a href="mapa-georeferenciacion.html" class="dropdown-item">Georeferenciación</a>
                            <a href="mapainteractivo" class="dropdown-item">Mapa interactivo</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">&nbsp;&nbsp;Graficos&nbsp;&nbsp;</a>
                        <div class="dropdown-menu m-0">
                            <a href="chart.html" class="dropdown-item">Chart</a>
                            <a href="flot.html" class="dropdown-item">Flotante</a>
                            <a href="inline.html" class="dropdown-item">En línea</a>
                            <a href="uplot.html" class="dropdown-item">Lote</a>
                        </div>
                    </div>
                </div>
                </div>
                <butaton type="button" class="btn text-primary ms-3" data-bs-toggle="modal" data-bs-target="#searchModal"><i class="fa fa-search"></i></butaton>
                <a href="login.html" class="btn btn-primary py-2 px-4 ms-3">Ingresar</a>
            </div>
        </nav>
        <div class="container-fluid bg-primary py-5 bg-header" style="margin-bottom: 90px;">
            <div class="row py-5">
                <div class="col-12 pt-lg-5 mt-lg-5 text-center">
                    <h1 class="display-4 text-white animated zoomIn">Productos</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- Fin Navbar -->

    <!-- Inicio busqueda pantalla completa -->
    <div class="modal fade" id="searchModal" tabindex="-1">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content" style="background: rgba(9, 30, 62, .7);">
                <div class="modal-header border-0">
                    <button type="button" class="btn bg-white btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex align-items-center justify-content-center">
                    <div class="input-group" style="max-width: 600px;">
                        <input type="text" class="form-control bg-transparent border-primary p-3" placeholder="Qué busca?">
                        <button class="btn btn-primary px-4"><i class="bi bi-search"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Fin busqueda pantalla completa -->
    
    <!--Inicio mapa información -->
    <div class="section-title position-relative pb-3 mb-5 m-5">
        <h5 class="fw-bold text-primary text-uppercase">Mapa de información</h5>
        <h1 class="mb-0">La mejor solución para el sector agrario</h1>
    </div>
    <div class="wow fadeInUp" data-wow-delay="0.1s">
        <div class="">
            <main>
                <div class="row">
                    <div class="col-md-7 text-center">       
                        <div style="position: absolute; right: 20px; top: 100px;">
                            <h4><span class="label" style="color: #06A3DA" id="municipioNameHover"></span></h4>
                        </div>
                        <svg id="mapsvg" width="765" height="640" style="margin-top:25px;margin-left:50px;"></svg> 
                    </div>
                    <div class="col-md-5 text-center">
                        <img src="assets/image/narino.png">
                        <div class="alert alert-info">Producción departamento de Nariño.</div>
                        <div id='title-municipio-name'></div>
                        <div class="text-left" id="content-data">
                        </div>          
                    </div>
                </div>
                <?php
                    $mysqli = new mysqli("localhost", "root", "JhosepH2020", "bd_gestionproyectos");
                    $sql="SELECT `municipality`.`id_municipality` as municipioId, `municipality`.`name_municipality` as municipio, count(*) as totalproductos FROM `municipality` left join `productos_dpto_narino` on `productos_dpto_narino`.`municipioId` = `municipality`.`id_municipality` group by `municipality`.`id_municipality`, `municipality`.`name_municipality`";
                    $resultado = $mysqli->query($sql);
                    for ( $i = 1; $i < 65; $i++ ) {
                        if($i == 1){
                            $fills3 = "primary";
                        }
                        if($i == 2){
                            $fills3 = "primary";
                        }
                        if($i == 3){
                            $fills3 = "primary";
                        }
                        if($i == 4){
                            $fills4 = "primary";
                        }
                        if($i == 5){
                            $fills5 = "primary";
                        }
                        if($i == 6){
                            $fills6 = "primary";
                        }
                        if($i == 7){
                            $fills7 = "primary";
                        }
                        if($i == 8){
                            $fills8 = "primary";
                        }
                        if($i == 9){
                            $fills9 = "primary";
                        }
                        if($i == 10){
                            $fills10 = "primary";
                        }
                        if($i == 11){
                            $fills11 = "primary";
                        }
                        if($i == 12){
                            $fills12 = "primary";
                        }
                        if($i == 13){
                            $fills13 = "primary";
                        }
                        if($i == 14){
                            $fills14 = "primary";
                        }
                        if($i == 15){
                            $fills15 = "primary";
                        }
                        if($i == 16){
                            $fills16 = "primary";
                        }
                        if($i == 17){
                            $fills17 = "primary";
                        }
                        if($i == 18){
                            $fills18 = "primary";
                        }
                        if($i == 19){
                            $fills19 = "primary";
                        }
                        if($i == 20){
                            $fills20 = "primary";
                        }
                        if($i == 21){
                            $fills21 = "primary";
                        }
                        if($i == 22){
                            $fills22 = "primary";
                        }
                        if($i == 23){
                            $fills23 = "primary";
                        }
                        if($i == 24){
                            $fills24 = "primary";
                        }
                        if($i == 25){
                            $fills25 = "primary";
                        }
                        if($i == 26){
                            $fills26 = "primary";
                        }
                        if($i == 27){
                            $fills27 = "primary";
                        }
                        if($i == 28){
                            $fills28 = "primary";
                        }
                        if($i == 29){
                            $fills29 = "primary";
                        }
                        if($i == 30){
                            $fills30 = "primary";
                        }
                        if($i == 31){
                            $fills31 = "primary";
                        }
                        if($i == 32){
                            $fills32 = "primary";
                        }
                        if($i == 33){
                            $fills33 = "primary";
                        }
                        if($i == 34){
                            $fills34 = "primary";
                        }
                        if($i == 35){
                            $fills35 = "primary";
                        }
                        if($i == 36){
                            $fills36 = "primary";
                        }
                        if($i == 37){
                            $fills37 = "primary";
                        }
                        if($i == 38){
                            $fills38 = "primary";
                        }
                        if($i == 39){
                            $fills39 = "primary";
                        }
                        if($i == 40){
                            $fills40 = "primary";
                        }
                        if($i == 41){
                            $fills41 = "primary";
                        }
                        if($i == 42){
                            $fills42 = "primary";
                        }
                        if($i == 43){
                            $fills43 = "primary";
                        }
                        if($i == 44){
                            $fills44 = "primary";
                        }
                        if($i == 45){
                            $fills45 = "primary";
                        }
                        if($i == 46){
                            $fills46 = "primary";
                        }
                        if($i == 47){
                            $fills47 = "primary";
                        }
                        if($i == 48){
                            $fills48 = "primary";
                        }
                        if($i == 49){
                            $fills49 = "primary";
                        }
                        if($i == 50){
                            $fills50 = "primary";
                        }
                        if($i == 51){
                            $fills51 = "primary";
                        }
                        if($i == 52){
                            $fills52 = "primary";
                        }
                        if($i == 53){
                            $fills53 = "primary";
                        }
                        if($i == 54){
                            $fills54 = "primary";
                        }
                        if($i == 55){
                            $fills55 = "primary";
                        }
                        if($i == 56){
                            $fills56 = "primary";
                        }
                        if($i == 57){
                            $fills57 = "primary";
                        }
                        if($i == 58){
                            $fills58 = "primary";
                        }
                        if($i == 59){
                            $fills59 = "primary";
                        }
                        if($i == 60){
                            $fills60 = "primary";
                        }
                        if($i == 61){
                            $fills61 = "primary";
                        }
                        if($i == 62){
                            $fills62 = "primary";
                        }
                        if($i == 63){
                            $fills63 = "primary";
                        }
                        if($i == 64){
                            $fills64 = "primary";
                        }
                    }
                ?>
                <div class="container-fluid">
                    <div class="card mb-4">
                        <marquee behavior="" direction=""><a href="modal_resumen">Departamento de Nariño</a></marquee>
                        <div class="card-header"><i class="fas fa-table mr-1"></i>Productos registrados en la base de datos Agrotic Nariño.</div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <th>Municipio</th>
                                            <th>Total productos</th>
                                        </thead>
                                        <tfoot>
                                            <th>Municipio</th>
                                            <th>Total productos</th>

                                        </tfoot>
                                        <tbody>
                                            <?php while($row = $resultado->fetch_assoc()) { ?>  
                                                <tr>
                                                    <td><?php echo $row['municipio']; ?></td>
                                                    <td><?php echo $row['totalproductos']; ?></td>
                                                    <?php
                                                        if($row['municipioId'] == 1){
                                                            if($row['totalproductos']>=18)
                                                                $fills1 = "green";
                                                            if(($row['totalproductos']>=10)and($row['totalproductos']<18))
                                                                $fills1 = "yellow";
                                                            if($row['totalproductos']<10)
                                                                $fills1 = "red";
                                                        }
                                                        if($row['municipioId'] == 2){
                                                            if($row['totalproductos']>=18)
                                                                $fills2 = "green";
                                                            if(($row['totalproductos']>=10)and($row['totalproductos']<18))
                                                                $fills2 = "yellow";
                                                            if($row['totalproductos']<10)
                                                                $fills2 = "red";
                                                        }
                                                        if($row['municipioId'] == 3){
                                                            if($row['totalproductos']>=18)
                                                                $fills3 = "green";
                                                            if(($row['totalproductos']>=10)and($row['totalproductos']<18))
                                                                $fills3 = "yellow";
                                                            if($row['totalproductos']<10)
                                                                $fills3 = "red";
                                                        }
                                                        if($row['municipioId'] == 4){
                                                            if($row['totalproductos']>=18)
                                                                $fills4 = "green";
                                                            if(($row['totalproductos']>=10)and($row['totalproductos']<18))
                                                                $fills4 = "yellow";
                                                            if($row['totalproductos']<10)
                                                                $fills4 = "red";
                                                        }
                                                        if($row['municipioId'] == 5){
                                                            if($row['totalproductos']>=18)
                                                                $fills5 = "green";
                                                            if(($row['totalproductos']>=10)and($row['totalproductos']<18))
                                                                $fills5 = "yellow";
                                                            if($row['totalproductos']<10)
                                                                $fills5 = "red";
                                                        }
                                                        if($row['municipioId'] == 6){
                                                            if($row['totalproductos']>=18)
                                                                $fills6 = "green";
                                                            if(($row['totalproductos']>=10)and($row['totalproductos']<18))
                                                                $fills6 = "yellow";
                                                            if($row['totalproductos']<10)
                                                                $fills6 = "red";
                                                        }
                                                        if($row['municipioId'] == 7){
                                                            if($row['totalproductos']>=18)
                                                                $fills7 = "green";
                                                            if(($row['totalproductos']>=10)and($row['totalproductos']<18))
                                                                $fills7 = "yellow";
                                                            if($row['totalproductos']<10)
                                                                $fills7 = "red";
                                                        }
                                                        if($row['municipioId'] == 8){
                                                            if($row['totalproductos']>=18)
                                                                $fills8 = "green";
                                                            if(($row['totalproductos']>=10)and($row['totalproductos']<18))
                                                                $fills8 = "yellow";
                                                            if($row['totalproductos']<10)
                                                                $fills8 = "red";
                                                        }
                                                        if($row['municipioId'] == 9){
                                                            if($row['totalproductos']>=18)
                                                                $fills9 = "green";
                                                            if(($row['totalproductos']>=10)and($row['totalproductos']<18))
                                                                $fills9 = "yellow";
                                                            if($row['totalproductos']<10)
                                                                $fills9 = "red";
                                                        }
                                                        if($row['municipioId'] == 10){
                                                            if($row['totalproductos']>=18)
                                                                $fills10 = "green";
                                                            if(($row['totalproductos']>=10)and($row['totalproductos']<18))
                                                                $fills10 = "yellow";
                                                            if($row['totalproductos']<10)
                                                                $fills10 = "red";
                                                        }
                                                        if($row['municipioId'] == 11){
                                                            if($row['totalproductos']>=18)
                                                                $fills11 = "green";
                                                            if(($row['totalproductos']>=10)and($row['totalproductos']<18))
                                                                $fills11 = "yellow";
                                                            if($row['totalproductos']<10)
                                                                $fills11 = "red";
                                                        }
                                                        if($row['municipioId'] == 12){
                                                            if($row['totalproductos']>=18)
                                                                $fills12 = "green";
                                                            if(($row['totalproductos']>=10)and($row['totalproductos']<18))
                                                                $fills12 = "yellow";
                                                            if($row['totalproductos']<10)
                                                                $fills12 = "red";
                                                        }
                                                        if($row['municipioId'] == 13){
                                                            if($row['totalproductos']>=18)
                                                                $fills13 = "green";
                                                            if(($row['totalproductos']>=10)and($row['totalproductos']<18))
                                                                $fills13 = "yellow";
                                                            if($row['totalproductos']<10)
                                                                $fills13 = "red";
                                                        }
                                                        if($row['municipioId'] == 14){
                                                            if($row['totalproductos']>=18)
                                                                $fills14 = "green";
                                                            if(($row['totalproductos']>=10)and($row['totalproductos']<18))
                                                                $fills14 = "yellow";
                                                            if($row['totalproductos']<10)
                                                                $fills14 = "red";
                                                        }
                                                        if($row['municipioId'] == 15){
                                                            if($row['totalproductos']>=18)
                                                                $fills15 = "green";
                                                            if(($row['totalproductos']>=10)and($row['totalproductos']<18))
                                                                $fills15 = "yellow";
                                                            if($row['totalproductos']<10)
                                                                $fills15 = "red";
                                                        }
                                                        if($row['municipioId'] == 16){
                                                            if($row['totalproductos']>=18)
                                                                $fills16 = "green";
                                                            if(($row['totalproductos']>=10)and($row['totalproductos']<18))
                                                                $fills16 = "yellow";
                                                            if($row['totalproductos']<10)
                                                                $fills16 = "red";
                                                        }
                                                        if($row['municipioId'] == 17){
                                                            if($row['totalproductos']>=18)
                                                                $fills17 = "green";
                                                            if(($row['totalproductos']>=10)and($row['totalproductos']<18))
                                                                $fills17 = "yellow";
                                                            if($row['totalproductos']<10)
                                                                $fills17 = "red";
                                                        }
                                                        if($row['municipioId'] == 18){
                                                            if($row['totalproductos']>=18)
                                                                $fills18 = "green";
                                                            if(($row['totalproductos']>=10)and($row['totalproductos']<18))
                                                                $fills18 = "yellow";
                                                            if($row['totalproductos']<10)
                                                                $fills18 = "red";
                                                        }
                                                        if($row['municipioId'] == 19){
                                                            if($row['totalproductos']>=18)
                                                                $fills19 = "green";
                                                            if(($row['totalproductos']>=10)and($row['totalproductos']<18))
                                                                $fills19 = "yellow";
                                                            if($row['totalproductos']<10)
                                                                $fills19 = "red";
                                                        }
                                                        if($row['municipioId'] == 20){
                                                            if($row['totalproductos']>=18)
                                                                $fills20 = "green";
                                                            if(($row['totalproductos']>=10)and($row['totalproductos']<18))
                                                                $fills20 = "yellow";
                                                            if($row['totalproductos']<10)
                                                                $fills20 = "red";
                                                        }
                                                        if($row['municipioId'] == 21){
                                                            if($row['totalproductos']>=18)
                                                                $fills21 = "green";
                                                            if(($row['totalproductos']>=10)and($row['totalproductos']<18))
                                                                $fills21 = "yellow";
                                                            if($row['totalproductos']<10)
                                                                $fills21 = "red";
                                                        }
                                                        if($row['municipioId'] == 22){
                                                            if($row['totalproductos']>=18)
                                                                $fills22 = "green";
                                                            if(($row['totalproductos']>=10)and($row['totalproductos']<18))
                                                                $fills22 = "yellow";
                                                            if($row['totalproductos']<10)
                                                                $fills22 = "red";
                                                        }
                                                        if($row['municipioId'] == 23){
                                                            if($row['totalproductos']>=18)
                                                                $fills23 = "green";
                                                            if(($row['totalproductos']>=10)and($row['totalproductos']<18))
                                                                $fills23 = "yellow";
                                                            if($row['totalproductos']<10)
                                                                $fills23 = "red";
                                                        }
                                                        if($row['municipioId'] == 24){
                                                            if($row['totalproductos']>=18)
                                                                $fills24 = "green";
                                                            if(($row['totalproductos']>=10)and($row['totalproductos']<18))
                                                                $fills24 = "yellow";
                                                            if($row['totalproductos']<10)
                                                                $fills24 = "red";
                                                        }
                                                        if($row['municipioId'] == 25){
                                                            if($row['totalproductos']>=18)
                                                                $fills25 = "green";
                                                            if(($row['totalproductos']>=10)and($row['totalproductos']<18))
                                                                $fills25 = "yellow";
                                                            if($row['totalproductos']<10)
                                                                $fills25 = "red";
                                                        }
                                                        if($row['municipioId'] == 26){
                                                            if($row['totalproductos']>=18)
                                                                $fills26 = "green";
                                                            if(($row['totalproductos']>=10)and($row['totalproductos']<18))
                                                                $fills26 = "yellow";
                                                            if($row['totalproductos']<10)
                                                                $fills26 = "red";
                                                        }
                                                        if($row['municipioId'] == 27){
                                                            if($row['totalproductos']>=18)
                                                                $fills27 = "green";
                                                            if(($row['totalproductos']>=10)and($row['totalproductos']<18))
                                                                $fills27 = "yellow";
                                                            if($row['totalproductos']<10)
                                                                $fills27 = "red";
                                                        }
                                                        if($row['municipioId'] == 28){
                                                            if($row['totalproductos']>=18)
                                                                $fills28 = "green";
                                                            if(($row['totalproductos']>=10)and($row['totalproductos']<18))
                                                                $fills28 = "yellow";
                                                            if($row['totalproductos']<10)
                                                                $fills28 = "red";
                                                        }
                                                        if($row['municipioId'] == 29){
                                                            if($row['totalproductos']>=18)
                                                                $fills29 = "green";
                                                            if(($row['totalproductos']>=10)and($row['totalproductos']<18))
                                                                $fills29 = "yellow";
                                                            if($row['totalproductos']<10)
                                                                $fills29 = "red";
                                                        }
                                                        if($row['municipioId'] == 30){
                                                            if($row['totalproductos']>=18)
                                                                $fills30 = "green";
                                                            if(($row['totalproductos']>=10)and($row['totalproductos']<18))
                                                                $fills30 = "yellow";
                                                            if($row['totalproductos']<10)
                                                                $fills30 = "red";
                                                        }
                                                        if($row['municipioId'] == 31){
                                                            if($row['totalproductos']>=18)
                                                                $fills31 = "green";
                                                            if(($row['totalproductos']>=10)and($row['totalproductos']<18))
                                                                $fills31 = "yellow";
                                                            if($row['totalproductos']<10)
                                                                $fills31 = "red";
                                                        }
                                                        if($row['municipioId'] == 32){
                                                            if($row['totalproductos']>=18)
                                                                $fills32 = "green";
                                                            if(($row['totalproductos']>=10)and($row['totalproductos']<18))
                                                                $fills32 = "yellow";
                                                            if($row['totalproductos']<10)
                                                                $fills32 = "red";
                                                        }
                                                        if($row['municipioId'] == 33){
                                                            if($row['totalproductos']>=18)
                                                                $fills33 = "green";
                                                            if(($row['totalproductos']>=10)and($row['totalproductos']<18))
                                                                $fills33 = "yellow";
                                                            if($row['totalproductos']<10)
                                                                $fills33 = "red";
                                                        }
                                                        if($row['municipioId'] == 34){
                                                            if($row['totalproductos']>=18)
                                                                $fills34 = "green";
                                                            if(($row['totalproductos']>=10)and($row['totalproductos']<18))
                                                                $fills34 = "yellow";
                                                            if($row['totalproductos']<10)
                                                                $fills34 = "red";
                                                        }
                                                        if($row['municipioId'] == 35){
                                                            if($row['totalproductos']>=18)
                                                                $fills35 = "green";
                                                            if(($row['totalproductos']>=10)and($row['totalproductos']<18))
                                                                $fills35 = "yellow";
                                                            if($row['totalproductos']<10)
                                                                $fills35 = "red";
                                                        }
                                                        if($row['municipioId'] == 36){
                                                            if($row['totalproductos']>=18)
                                                                $fills36 = "green";
                                                            if(($row['totalproductos']>=10)and($row['totalproductos']<18))
                                                                $fills36 = "yellow";
                                                            if($row['totalproductos']<10)
                                                                $fills36 = "red";
                                                        }
                                                        if($row['municipioId'] == 37){
                                                            if($row['totalproductos']>=18)
                                                                $fills37 = "green";
                                                            if(($row['totalproductos']>=10)and($row['totalproductos']<18))
                                                                $fills37 = "yellow";
                                                            if($row['totalproductos']<10)
                                                                $fills37 = "red";
                                                        }
                                                        if($row['municipioId'] == 38){
                                                            if($row['totalproductos']>=18)
                                                                $fills38 = "green";
                                                            if(($row['totalproductos']>=10)and($row['totalproductos']<18))
                                                                $fills38 = "yellow";
                                                            if($row['totalproductos']<10)
                                                                $fills38 = "red";
                                                        }
                                                        if($row['municipioId'] == 39){
                                                            if($row['totalproductos']>=18)
                                                                $fills39 = "green";
                                                            if(($row['totalproductos']>=10)and($row['totalproductos']<18))
                                                                $fills39 = "yellow";
                                                            if($row['totalproductos']<10)
                                                                $fills39 = "red";
                                                        }
                                                        if($row['municipioId'] == 40){
                                                            if($row['totalproductos']>=18)
                                                                $fills40 = "green";
                                                            if(($row['totalproductos']>=10)and($row['totalproductos']<18))
                                                                $fills40 = "yellow";
                                                            if($row['totalproductos']<10)
                                                                $fills40 = "red";
                                                        }
                                                        if($row['municipioId'] == 41){
                                                            if($row['totalproductos']>=18)
                                                                $fills41 = "green";
                                                            if(($row['totalproductos']>=10)and($row['totalproductos']<18))
                                                                $fills41 = "yellow";
                                                            if($row['totalproductos']<10)
                                                                $fills41 = "red";
                                                        }
                                                        if($row['municipioId'] == 42){
                                                            if($row['totalproductos']>=18)
                                                                $fills42 = "green";
                                                            if(($row['totalproductos']>=10)and($row['totalproductos']<18))
                                                                $fills42 = "yellow";
                                                            if($row['totalproductos']<10)
                                                                $fills42 = "red";
                                                        }
                                                        if($row['municipioId'] == 43){
                                                            if($row['totalproductos']>=18)
                                                                $fills43 = "green";
                                                            if(($row['totalproductos']>=10)and($row['totalproductos']<18))
                                                                $fills43 = "yellow";
                                                            if($row['totalproductos']<10)
                                                                $fills43 = "red";
                                                        }
                                                        if($row['municipioId'] == 44){
                                                            if($row['totalproductos']>=18)
                                                                $fills44 = "green";
                                                            if(($row['totalproductos']>=10)and($row['totalproductos']<18))
                                                                $fills44 = "yellow";
                                                            if($row['totalproductos']<10)
                                                                $fills44 = "red";
                                                        }
                                                        if($row['municipioId'] == 45){
                                                            if($row['totalproductos']>=18)
                                                                $fills45 = "green";
                                                            if(($row['totalproductos']>=10)and($row['totalproductos']<18))
                                                                $fills45 = "yellow";
                                                            if($row['totalproductos']<10)
                                                                $fills45 = "red";
                                                        }
                                                        if($row['municipioId'] == 46){
                                                            if($row['totalproductos']>=18)
                                                                $fills46 = "green";
                                                            if(($row['totalproductos']>=10)and($row['totalproductos']<18))
                                                                $fills46 = "yellow";
                                                            if($row['totalproductos']<10)
                                                                $fills46 = "red";
                                                        }
                                                        if($row['municipioId'] == 47){
                                                            if($row['totalproductos']>=18)
                                                                $fills47 = "green";
                                                            if(($row['totalproductos']>=10)and($row['totalproductos']<18))
                                                                $fills47 = "yellow";
                                                            if($row['totalproductos']<10)
                                                                $fills47 = "red";
                                                        }
                                                        if($row['municipioId'] == 48){
                                                            if($row['totalproductos']>=18)
                                                                $fills48 = "green";
                                                            if(($row['totalproductos']>=10)and($row['totalproductos']<18))
                                                                $fills48 = "yellow";
                                                            if($row['totalproductos']<10)
                                                                $fills48 = "red";
                                                        }
                                                        if($row['municipioId'] == 49){
                                                            if($row['totalproductos']>=18)
                                                                $fills49 = "green";
                                                            if(($row['totalproductos']>=10)and($row['totalproductos']<18))
                                                                $fills49 = "yellow";
                                                            if($row['totalproductos']<10)
                                                                $fills49 = "red";
                                                        }
                                                        if($row['municipioId'] == 50){
                                                            if($row['totalproductos']>=18)
                                                                $fills50 = "green";
                                                            if(($row['totalproductos']>=10)and($row['totalproductos']<18))
                                                                $fills50 = "yellow";
                                                            if($row['totalproductos']<10)
                                                                $fills50 = "red";
                                                        }
                                                        if($row['municipioId'] == 51){
                                                            if($row['totalproductos']>=18)
                                                                $fills51 = "green";
                                                            if(($row['totalproductos']>=10)and($row['totalproductos']<18))
                                                                $fills51 = "yellow";
                                                            if($row['totalproductos']<10)
                                                                $fills51 = "red";
                                                        }
                                                        if($row['municipioId'] == 52){
                                                            if($row['totalproductos']>=18)
                                                                $fills52 = "green";
                                                            if(($row['totalproductos']>=10)and($row['totalproductos']<18))
                                                                $fills52 = "yellow";
                                                            if($row['totalproductos']<10)
                                                                $fills52 = "red";
                                                        }
                                                        if($row['municipioId'] == 53){
                                                            if($row['totalproductos']>=18)
                                                                $fills53 = "green";
                                                            if(($row['totalproductos']>=10)and($row['totalproductos']<18))
                                                                $fills53 = "yellow";
                                                            if($row['totalproductos']<10)
                                                                $fills53 = "red";
                                                        }
                                                        if($row['municipioId'] == 54){
                                                            if($row['totalproductos']>=18)
                                                                $fills54 = "green";
                                                            if(($row['totalproductos']>=10)and($row['totalproductos']<18))
                                                                $fills54 = "yellow";
                                                            if($row['totalproductos']<10)
                                                                $fills54 = "red";
                                                        }
                                                        if($row['municipioId'] == 55){
                                                            if($row['totalproductos']>=18)
                                                                $fills55 = "green";
                                                            if(($row['totalproductos']>=10)and($row['totalproductos']<18))
                                                                $fills55 = "yellow";
                                                            if($row['totalproductos']<10)
                                                                $fills55 = "red";
                                                        }
                                                        if($row['municipioId'] == 56){
                                                            if($row['totalproductos']>=18)
                                                                $fills56 = "green";
                                                            if(($row['totalproductos']>=10)and($row['totalproductos']<18))
                                                                $fills56 = "yellow";
                                                            if($row['totalproductos']<10)
                                                                $fills56 = "red";
                                                        }
                                                        if($row['municipioId'] == 57){
                                                            if($row['totalproductos']>=18)
                                                                $fills57 = "green";
                                                            if(($row['totalproductos']>=10)and($row['totalproductos']<18))
                                                                $fills57 = "yellow";
                                                            if($row['totalproductos']<10)
                                                                $fills57 = "red";
                                                        }
                                                        if($row['municipioId'] == 58){
                                                            if($row['totalproductos']>=18)
                                                                $fills58 = "green";
                                                            if(($row['totalproductos']>=10)and($row['totalproductos']<18))
                                                                $fills58 = "yellow";
                                                            if($row['totalproductos']<10)
                                                                $fills58 = "red";
                                                        }
                                                        if($row['municipioId'] == 59){
                                                            if($row['totalproductos']>=18)
                                                                $fills59 = "green";
                                                            if(($row['totalproductos']>=10)and($row['totalproductos']<18))
                                                                $fills59 = "yellow";
                                                            if($row['totalproductos']<10)
                                                                $fills59 = "red";
                                                        }
                                                        if($row['municipioId'] == 60){
                                                            if($row['totalproductos']>=18)
                                                                $fills60 = "green";
                                                            if(($row['totalproductos']>=10)and($row['totalproductos']<18))
                                                                $fills60 = "yellow";
                                                            if($row['totalproductos']<10)
                                                                $fills60 = "red";
                                                        }
                                                        if($row['municipioId'] == 61){
                                                            if($row['totalproductos']>=18)
                                                                $fills61 = "green";
                                                            if(($row['totalproductos']>=10)and($row['totalproductos']<18))
                                                                $fills61 = "yellow";
                                                            if($row['totalproductos']<10)
                                                                $fills61 = "red";
                                                        }
                                                        if($row['municipioId'] == 62){
                                                            if($row['totalproductos']>=18)
                                                                $fills62 = "green";
                                                            if(($row['totalproductos']>=10)and($row['totalproductos']<18))
                                                                $fills62 = "yellow";
                                                            if($row['totalproductos']<10)
                                                                $fills62 = "red";
                                                        }
                                                        if($row['municipioId'] == 63){
                                                            if($row['totalproductos']>=18)
                                                                $fills63 = "green";
                                                            if(($row['totalproductos']>=10)and($row['totalproductos']<18))
                                                                $fills63 = "yellow";
                                                            if($row['totalproductos']<10)
                                                                $fills63 = "red";
                                                        }
                                                        if($row['municipioId'] == 64){
                                                            if($row['totalproductos']>=18)
                                                                $fills64 = "green";
                                                            if(($row['totalproductos']>=10)and($row['totalproductos']<18))
                                                                $fills64 = "yellow";
                                                            if($row['totalproductos']<10)
                                                                $fills64 = "red";
                                                        }
                                                    ?>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            <?php include('modal_mapa_productos.php'); ?>
            <?php include('scripts.php');?>
            <div class="modal " id="projectsModal" tabindex="-1" role="dialog" aria-labelledby="projectsModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content" >
                        <div class="modal-header">
                            <div id='title-municipio-name-projects'></div>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body" style="height: 600px; overflow-y: auto; overflow-x: hidden;">
                            <div id="projectsBody">
                                <!-- el resultado se mostrará aquí -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Fin mapa información -->

<script>
    $(document).ready(function() {        
    var s = Snap("#mapsvg");
    var image = Snap.load('assets/image/map/Map_Nar_gris_completo.svg',function (f) {
        var map = f.select("g");
        map.attr({
            fill : "#3490dc",
            strokeWidth: "1",        
            stroke: "#999999",
        });
        s.append(map);

        //municipios
        var tumaco = map.select("#path2991_3_");
        tumaco.attr({
            cursor: "pointer",
            fill : '<?php echo $fills61;?>',
        }).mouseover(function() {            
            $("#municipioNameHover").text( "Tumaco");
        })
        .mouseout(function() {
            $("#municipioNameHover").text( "");
        });
        tumaco.click(function(){
            getInfo(61);
        });
        

        var puerres = map.select("#path4483_4_");
        puerres.attr({
        cursor: "pointer",
        fill : '<?php echo $fills46;?>',
        }).mouseover(function() {            
            $("#municipioNameHover").text( "Puerres");
        })
        .mouseout(function() {
            $("#municipioNameHover").text( "");
        });
        puerres.click(function(){
            getInfo(46);
        });

        var lacruz = map.select("#path2871_3_");
        lacruz.attr({
        cursor: "pointer",
        fill : '<?php echo $fills29;?>',
        }).mouseover(function() {            
            $("#municipioNameHover").text( "La Cruz");
        })
        .mouseout(function() {
            $("#municipioNameHover").text( "");
        });
        lacruz.click(function(){
            getInfo(29);
        });

        var sanbernardo = map.select("#path2873_3_");
        sanbernardo.attr({
        cursor: "pointer",
        fill : '<?php echo $fills51;?>',
        }).mouseover(function() {            
            $("#municipioNameHover").text( "San Bernardo");
        })
        .mouseout(function() {
            $("#municipioNameHover").text( "");
        });
        sanbernardo.click(function(){
            getInfo(51);
        });

        var alban = map.select("#path2875_4_");
        alban.attr({
        cursor: "pointer",
        fill : '<?php echo $fills1;?>',
        }).mouseover(function() {            
            $("#municipioNameHover").text( "Alban/San José");
        })
        .mouseout(function() {
            $("#municipioNameHover").text( "");
        });
        alban.click(function(){
            getInfo(1);
        });

        var sanpablo = map.select("#path2879_4_");
        sanpablo.attr({
        cursor: "pointer",
        fill : '<?php echo $fills53;?>',
        }).mouseover(function() {            
            $("#municipioNameHover").text( "San Pablo");
        })
        .mouseout(function() {
            $("#municipioNameHover").text( "");
        });
        sanpablo.click(function(){
            getInfo(53);
        });

        var arboleda = map.select("#path2883_3_");
        arboleda.attr({
        cursor: "pointer",
        fill : '<?php echo $fills4;?>',
        }).mouseover(function() {            
            $("#municipioNameHover").text( "Arboleda/Berruecos");
        })
        .mouseout(function() {
            $("#municipioNameHover").text( "");
        });
        arboleda.click(function(){
            getInfo(4);
        });

        var sanpedrocartago = map.select("#path2885_4_");
        sanpedrocartago.attr({
        cursor: "pointer",
        fill : '<?php echo $fills54;?>',
        }).mouseover(function() {            
            $("#municipioNameHover").text( "San Pedro de Cartago");
        })
        .mouseout(function() {
            $("#municipioNameHover").text( "");
        });
        sanpedrocartago.click(function(){
            getInfo(54);
        });

        var colon = map.select("#path6894_3_");
        colon.attr({
        cursor: "pointer",
        fill : '<?php echo $fills9;?>',
        }).mouseover(function() {            
            $("#municipioNameHover").text( "Colón/Génova");
        })
        .mouseout(function() {
            $("#municipioNameHover").text( "");
        });
        colon.click(function(){
            getInfo(9);
        });

        var launion = map.select("#path2887_3_");
        launion.attr({
        cursor: "pointer",
        fill : '<?php echo $fills33;?>',
        }).mouseover(function() {            
            $("#municipioNameHover").text( "La Unión");
        })
        .mouseout(function() {
            $("#municipioNameHover").text( "");
        });
        launion.click(function(){
            getInfo(33);
        });

        var buesaco = map.select("#path2889_3_");
        buesaco.attr({
        cursor: "pointer",
        fill : '<?php echo $fills7;?>',
        }).mouseover(function() {            
            $("#municipioNameHover").text( "Buesaco");
        })
        .mouseout(function() {
            $("#municipioNameHover").text( "");
        });
        buesaco.click(function(){
            getInfo(7);
        });

        var pasto = map.select("#path2891_4_");
        pasto.attr({
        cursor: "pointer",
        fill : '<?php echo $fills64;?>',
        }).mouseover(function() {            
            $("#municipioNameHover").text( "San Juan de Pasto");
        })
        .mouseout(function() {
            $("#municipioNameHover").text( "");
        });
        pasto.click(function(){
            getInfo(64);
        });

        var tangua = map.select("#path2893_3_");
        tangua.attr({
        cursor: "pointer",
        fill : '<?php echo $fills60;?>',
        }).mouseover(function() {            
            $("#municipioNameHover").text( "Tangua");
        })
        .mouseout(function() {
            $("#municipioNameHover").text( "");
        });
        tangua.click(function(){
            getInfo(60);
        });

        var funes = map.select("#path2895_3_");
        funes.attr({
        cursor: "pointer",
        fill : '<?php echo $fills22;?>',
        }).mouseover(function() {            
            $("#municipioNameHover").text( "Funes");
        })
        .mouseout(function() {
            $("#municipioNameHover").text( "");
        });
        funes.click(function(){
            getInfo(22);
        });
        
        var cordoba = map.select("#path2897_3_");
        cordoba.attr({
        cursor: "pointer",
        fill : '<?php echo $fills12;?>',
        }).mouseover(function() {            
            $("#municipioNameHover").text( "Córdoba");
        })
        .mouseout(function() {
            $("#municipioNameHover").text( "");
        });
        cordoba.click(function(){
            getInfo(12);
        });

        var potosi = map.select("#path2899_4_");
        potosi.attr({
        cursor: "pointer",
        fill : '<?php echo $fills44;?>',
        }).mouseover(function() {            
            $("#municipioNameHover").text( "Potosí");
        })
        .mouseout(function() {
            $("#municipioNameHover").text( "");
        });
        potosi.click(function(){
            getInfo(44);
        });
        
        var iles = map.select("#path2901_3_");
        iles.attr({
            cursor: "pointer",
            fill : '<?php echo $fills26;?>',
        }).mouseover(function() {            
            $("#municipioNameHover").text( "Iles");
        })
        .mouseout(function() {
            $("#municipioNameHover").text( "");
        });
        iles.click(function(){
            getInfo(26);
        });

        var ospina = map.select("#path2903_3_");
        ospina.attr({
        cursor: "pointer",
        fill : '<?php echo $fills42;?>',
        }).mouseover(function() {            
            $("#municipioNameHover").text( "Ospina");
        })
        .mouseout(function() {
            $("#municipioNameHover").text( "");
        });
        ospina.click(function(){
            getInfo(42);
        });

        var imues = map.select("#path2905_3_");
        imues.attr({
        cursor: "pointer",
        fill : '<?php echo $fills27;?>',
        }).mouseover(function() {            
            $("#municipioNameHover").text( "Imues");
        })
        .mouseout(function() {
            $("#municipioNameHover").text( "");
        });
        imues.click(function(){
            getInfo(27);
        });

        var yacuanquer = map.select("#path2907_3_");
        yacuanquer.attr({
        cursor: "pointer",
        fill : '<?php echo $fills63;?>',
        }).mouseover(function() {            
            $("#municipioNameHover").text( "Yacuanquer");
        })
        .mouseout(function() {
            $("#municipioNameHover").text( "");
        });
        yacuanquer.click(function(){
            getInfo(63);
        });

        var consaca = map.select("#path2909_3_");
        consaca.attr({
        cursor: "pointer",
        fill :'<?php echo $fills10;?>',
        }).mouseover(function() {            
            $("#municipioNameHover").text( "Consacá");
        })
        .mouseout(function() {
            $("#municipioNameHover").text( "");
        });
        consaca.click(function(){
        getInfo(10);
        });

        var florida = map.select("#path2919_4_");
        florida.attr({
        cursor: "pointer",
        fill : '<?php echo $fills30;?>',
        }).mouseover(function() {            
            $("#municipioNameHover").text( "La Florida");
        })
        .mouseout(function() {
            $("#municipioNameHover").text( "");
        });
        florida.click(function(){
            getInfo(30);
        });

        var narino = map.select("#path2911_3_");
        narino.attr({
        cursor: "pointer",
        fill : '<?php echo $fills40;?>',
        }).mouseover(function() {            
            $("#municipioNameHover").text( "Nariño");
        })
        .mouseout(function() {
            $("#municipioNameHover").text( "");
        });
        narino.click(function(){
            getInfo(40);
        });

        var guaitarilla = map.select("#path2913_3_");
        guaitarilla.attr({
        cursor: "pointer",
        fill : '<?php echo $fills24;?>',
        }).mouseover(function() {            
            $("#municipioNameHover").text( "Guaitarilla");
        })
        .mouseout(function() {
            $("#municipioNameHover").text( "");
        });
        guaitarilla.click(function(){
            getInfo(24);
        });

        var ancuya = map.select("#path2915_3_");
        ancuya.attr({
        cursor: "pointer",
        fill : '<?php echo $fills3;?>',
        }).mouseover(function() {            
            $("#municipioNameHover").text( "Ancuya");
        })
        .mouseout(function() {
            $("#municipioNameHover").text( "");
        });
        ancuya.click(function(){
            getInfo(3);
        });

        var sandona = map.select("#path2917_4_");
        sandona.attr({
        cursor: "pointer",
        fill : '<?php echo $fills55;?>',
        }).mouseover(function() {            
            $("#municipioNameHover").text( "Sandona");
        })
        .mouseout(function() {
            $("#municipioNameHover").text( "");
        });
        sandona.click(function(){
            getInfo(55);
        });


        var chachagui = map.select("#path2921_3_");
        chachagui.attr({
        cursor: "pointer",
        fill : '<?php echo $fills8;?>',
        }).mouseover(function() {            
            $("#municipioNameHover").text( "Chachagüi");
        })
        .mouseout(function() {
            $("#municipioNameHover").text( "");
        });
        chachagui.click(function(){
        getInfo(8);
        });

        var eltambo = map.select("#path2923_3_");
        eltambo.attr({
        cursor: "pointer",
        fill : '<?php echo $fills20;?>',
        }).mouseover(function() {            
            $("#municipioNameHover").text( "El Tambo");
        })
        .mouseout(function() {
            $("#municipioNameHover").text( "");
        });
        eltambo.click(function(){
            getInfo(20);
        });

        var sanlorenzo = map.select("#path2925_4_");
        sanlorenzo.attr({
        cursor: "pointer",
        fill : '<?php echo $fills52;?>',
        }).mouseover(function() {            
            $("#municipioNameHover").text( "San Lorenzo");
        })
        .mouseout(function() {
            $("#municipioNameHover").text( "");
        });
        sanlorenzo.click(function(){
            getInfo(52);
        });
        
        var ipiales = map.select("#path2927_3_");
        ipiales.attr({
        cursor: "pointer",
        fill : '<?php echo $fills28;?>',
        }).mouseover(function() {            
            $("#municipioNameHover").text( "Ipiales");
        })
        .mouseout(function() {
            $("#municipioNameHover").text( "");
        });
        ipiales.click(function(){
            getInfo(28);
        });

        var pupiales = map.select("#path2931_3_");
        pupiales.attr({
        cursor: "pointer",
        fill : '<?php echo $fills47;?>',
        }).mouseover(function() {            
            $("#municipioNameHover").text( "Pupiales");
        })
        .mouseout(function() {
            $("#municipioNameHover").text( "");
        });
        pupiales.click(function(){
            getInfo(47);
        });
        
        var linares = map.select("#path2933_3_");
        linares.attr({
        cursor: "pointer",
        fill : '<?php echo $fills35;?>',
        }).mouseover(function() {            
            $("#municipioNameHover").text( "Linares");
        })
        .mouseout(function() {
            $("#municipioNameHover").text( "");
        });
        linares.click(function(){
        getInfo(35);
        });

        var robertopayan = map.select("#path2977_3_");
        robertopayan.attr({
        cursor: "pointer",
        fill : '<?php echo $fills49;?>',
        }).mouseover(function() {            
            $("#municipioNameHover").text( "Roberto Payán");
        })
        .mouseout(function() {
            $("#municipioNameHover").text( "");
        });
        robertopayan.click(function(){
            getInfo(49);
        });

        var barbacoas = map.select("#path7024_3_");
        barbacoas.attr({
        cursor: "pointer",
        fill : '<?php echo $fills5;?>',
        }).mouseover(function() {            
            $("#municipioNameHover").text( "Barbacoas");
        })
        .mouseout(function() {
            $("#municipioNameHover").text( "");
        });
        barbacoas.click(function(){
            getInfo(5);
        });

        var ricaurte = map.select("#path2973_3_");
        ricaurte.attr({
        cursor: "pointer",
        fill : '<?php echo $fills48;?>',
        }).mouseover(function() {            
            $("#municipioNameHover").text( "Ricaurte");
        })
        .mouseout(function() {
            $("#municipioNameHover").text( "");
        });
        ricaurte.click(function(){
            getInfo(48);
        });

        var cumbal = map.select("#path2971_3_");
        cumbal.attr({
        cursor: "pointer",
        fill : '<?php echo $fills14;?>',
        }).mouseover(function() {            
            $("#municipioNameHover").text( "Cumbal");
        })
        .mouseout(function() {
            $("#municipioNameHover").text( "");
        });
        cumbal.click(function(){
            getInfo(14);
        });

        var cuaspud = map.select("#path2939_3_");
        cuaspud.attr({
        cursor: "pointer",
        fill : '<?php echo $fills13;?>',
        }).mouseover(function() {            
            $("#municipioNameHover").text( "Cuaspud/Carlosama");
        })
        .mouseout(function() {
            $("#municipioNameHover").text( "");
        });
        cuaspud.click(function(){
            getInfo(13);
        });

        var guachucal = map.select("#path2943_3_");
        guachucal.attr({
        cursor: "pointer",
        fill : '<?php echo $fills23;?>',
        }).mouseover(function() {            
            $("#municipioNameHover").text( "Guachucal");
        })
        .mouseout(function() {
            $("#municipioNameHover").text( "");
        });
        guachucal.click(function(){
            getInfo(23);
        });

        var aldana = map.select("#path2941_3_");
        aldana.attr({
        cursor: "pointer",
        fill : '<?php echo $fills2;?>',
        }).mouseover(function() {            
            $("#municipioNameHover").text( "Aldana");
        })
        .mouseout(function() {
            $("#municipioNameHover").text( "");
        });
        aldana.click(function(){
            getInfo(2);
        });

        var gualmatan = map.select("#path2929_3_");
        gualmatan.attr({
        cursor: "pointer",
        fill : '<?php echo $fills25;?>',
        }).mouseover(function() {            
            $("#municipioNameHover").text( "Gualmatan");
        })
        .mouseout(function() {
            $("#municipioNameHover").text( "");
        });
        gualmatan.click(function(){
            getInfo(25);
        });

        var mallama = map.select("#path2951_3_");
        mallama.attr({
        cursor: "pointer",
        fill : '<?php echo $fills38;?>',
        }).mouseover(function() {            
            $("#municipioNameHover").text( "Mallama/Piedrancha");
        })
        .mouseout(function() {
            $("#municipioNameHover").text( "");
        });
        mallama.click(function(){
            getInfo(38);
        });
        
        var santacruz = map.select("#path2953_3_");
        santacruz.attr({
        cursor: "pointer",
        fill : '<?php echo $fills57;?>',
        }).mouseover(function() {            
            $("#municipioNameHover").text( "Santa Cruz/Guachavez");
        })
        .mouseout(function() {
            $("#municipioNameHover").text( "");
        });
        santacruz.click(function(){
            getInfo(57);
        });

        var tablongomez = map.select("#path2993_4_");
        tablongomez.attr({
        cursor: "pointer",
        fill : '<?php echo $fills19;?>',
        }).mouseover(function() {            
            $("#municipioNameHover").text( "Tablón de Gómez");
        })
        .mouseout(function() {
            $("#municipioNameHover").text( "");
        });
        tablongomez.click(function(){
        getInfo(19);
        });
        
        var franciscopizarro = map.select("#path2989_3_");
        franciscopizarro.attr({
        cursor: "pointer",
        fill : '<?php echo $fills21;?>',
        }).mouseover(function() {            
            $("#municipioNameHover").text( "Francisco Pizarro/Salahonda");
        })
        .mouseout(function() {
            $("#municipioNameHover").text( "");
        });
        franciscopizarro.click(function(){
        getInfo(21);
        });
        
        var mosquera = map.select("#path2987_3_");
        mosquera.attr({
        cursor: "pointer",
        fill : '<?php echo $fills39;?>',
        }).mouseover(function() {            
            $("#municipioNameHover").text( "Mosquera");
        })
        .mouseout(function() {
            $("#municipioNameHover").text( "");
        });
        mosquera.click(function(){
            getInfo(39);
        });
        
        var olayaherrera = map.select("#path7012_3_");
        olayaherrera.attr({
        cursor: "pointer",
        fill : '<?php echo $fills41;?>',
        }).mouseover(function() {            
            $("#municipioNameHover").text( "Olaya Herrera/Bocas de Satinga");
        })
        .mouseout(function() {
            $("#municipioNameHover").text( "");
        });
        olayaherrera.click(function(){
        getInfo(41);
        });
        
        var latola = map.select("#path7017_3_");
        latola.attr({
        cursor: "pointer",
        fill : '<?php echo $fills32;?>',
        }).mouseover(function() {            
            $("#municipioNameHover").text( "La Tola");
        })
        .mouseout(function() {
            $("#municipioNameHover").text( "");
        });
        latola.click(function(){
            getInfo(32);
        });
        
        var magui = map.select("#path7026_3_");
        magui.attr({
        cursor: "pointer",
        fill : '<?php echo $fills37;?>',
        }).mouseover(function() {            
            $("#municipioNameHover").text( "Magüi/Payán");
        })
        .mouseout(function() {
            $("#municipioNameHover").text( "");
        });
        magui.click(function(){
            getInfo(37);
        });
        
        var elcharco = map.select("#path6937_3_");
        elcharco.attr({
        cursor: "pointer",
        fill : '<?php echo $fills16;?>',
        }).mouseover(function() {            
            $("#municipioNameHover").text( "El Charco");
        })
        .mouseout(function() {
            $("#municipioNameHover").text( "");
        });
        elcharco.click(function(){
        getInfo(16);
        });
        
        var santabarbara = map.select("#path6953_3_");
        santabarbara.attr({
        cursor: "pointer",
        fill : '<?php echo $fills56;?>',
        }).mouseover(function() {            
            $("#municipioNameHover").text( "Santa Barbara/Iscuande");
        })
        .mouseout(function() {
            $("#municipioNameHover").text( "");
        });
        santabarbara.click(function(){
            getInfo(56);
        });
        
        var leiva = map.select("#path2967_3_");
        leiva.attr({
        cursor: "pointer",
        fill : '<?php echo $fills34;?>',
        }).mouseover(function() {            
            $("#municipioNameHover").text( "Leiva");
        })
        .mouseout(function() {
            $("#municipioNameHover").text( "");
        });
        leiva.click(function(){
            getInfo(34);
        });
        
        var policarpa = map.select("#path2963_3_");
        policarpa.attr({
        cursor: "pointer",
        fill : '<?php echo $fills43;?>',
        }).mouseover(function() {            
            $("#municipioNameHover").text( "Policarpa");
        })
        .mouseout(function() {
            $("#municipioNameHover").text( "");
        });
        policarpa.click(function(){
            getInfo(43);
        });

        var belen = map.select("#path6892_4_");
        belen.attr({
        cursor: "pointer",
        fill : '<?php echo $fills6;?>',
        }).mouseover(function() {            
            $("#municipioNameHover").text( "Belén");
        })
        .mouseout(function() {
            $("#municipioNameHover").text( "");
        });
        belen.click(function(){
            getInfo(6);
        });

        var taminango = map.select("#path2937_4_");
        taminango.attr({
        cursor: "pointer",
        fill : '<?php echo $fills59;?>',
        }).mouseover(function() {            
            $("#municipioNameHover").text( "Taminango");
        })
        .mouseout(function() {
            $("#municipioNameHover").text( "");
        });
        taminango.click(function(){
        getInfo(59);
        });

        var penol = map.select("#path2935_4_");
        penol.attr({
        cursor: "pointer",
        fill : '<?php echo $fills17;?>',
        }).mouseover(function() {            
            $("#municipioNameHover").text( "El Peñol");
        })
        .mouseout(function() {
            $("#municipioNameHover").text( "");
        });
        penol.click(function(){
            getInfo(17);
        });

        var cumbitara = map.select("#path2961_3_");
        cumbitara.attr({
        cursor: "pointer",
        fill : '<?php echo $fills15;?>',
        }).mouseover(function() {            
            $("#municipioNameHover").text( "Cumbitara");
        })
        .mouseout(function() {
            $("#municipioNameHover").text( "");
        });
        cumbitara.click(function(){
            getInfo(15);
        });

        var losandes = map.select("#path2959_3_");
        losandes.attr({
        cursor: "pointer",
        fill : '<?php echo $fills36;?>',
        }).mouseover(function() {            
            $("#municipioNameHover").text( "Los Ándes/Sotomayor");
        })
        .mouseout(function() {
            $("#municipioNameHover").text( "");
        });
        losandes.click(function(){
            getInfo(36);
        });

        var lallanada = map.select("#path2957_3_");
        lallanada.attr({
        cursor: "pointer",
        fill : '<?php echo $fills31;?>',
        }).mouseover(function() {            
            $("#municipioNameHover").text( "La Llanada");
        })
        .mouseout(function() {
            $("#municipioNameHover").text( "");
        });
        lallanada.click(function(){
            getInfo(31);
        });

        var samaniego = map.select("#path2955_3_");
        samaniego.attr({
        cursor: "pointer",
        fill : '<?php echo $fills50;?>',
        }).mouseover(function() {            
            $("#municipioNameHover").text( "Samaniego");
        })
        .mouseout(function() {
            $("#municipioNameHover").text( "");
        });
        samaniego.click(function(){
            getInfo(50);
        });

        var tuquerres = map.select("#path2947_3_");
        tuquerres.attr({
        cursor: "pointer",
        fill : '<?php echo $fills62;?>',
        }).mouseover(function() {            
            $("#municipioNameHover").text( "Túquerres");
        })
        .mouseout(function() {
            $("#municipioNameHover").text( "");
        });
        tuquerres.click(function(){
            getInfo(62);
        });

        var providencia = map.select("#path2949_3_");
        providencia.attr({
        cursor: "pointer",
        fill : '<?php echo $fills45;?>',
        }).mouseover(function() {            
            $("#municipioNameHover").text( "Providencia");
        })
        .mouseout(function() {
            $("#municipioNameHover").text( "");
        });
        providencia.click(function(){
            getInfo(45);
        });

        var contadero = map.select("#path2995_3_");
        contadero.attr({
        cursor: "pointer",
        fill : '<?php echo $fills11;?>',
        }).mouseover(function() {            
            $("#municipioNameHover").text( "Contadero");
        })
        .mouseout(function() {
            $("#municipioNameHover").text( "");
        });
        contadero.click(function(){
            getInfo(11);
        });

        var sapuyes = map.select("#path2945_3_");
        sapuyes.attr({
        cursor: "pointer",
        fill : '<?php echo $fills58;?>',
        }).mouseover(function() {            
            $("#municipioNameHover").text( "Sapuyes");
        })
        .mouseout(function() {
            $("#municipioNameHover").text( "");
        });
        sapuyes.click(function(){
            getInfo(58);
        });

        var elrosario = map.select("#path2965_3_");
        elrosario.attr({
        cursor: "pointer",
        fill : '<?php echo $fills18;?>',
        }).mouseover(function() {            
            $("#municipioNameHover").text( "El Rosario");
        })
        .mouseout(function() {
            $("#municipioNameHover").text( "");
        });
        elrosario.click(function(){
            getInfo(18);
        });
    });
    
        function getInfo(id){
            let href = "modal_mapa_productos?var="+id;
            $.ajax({
                url: href,
                beforeSend: function() {
                    //$('#loader').show();
                },
                // return the result
                success: function(result) {                    
                    $('#content-data').html(result);
                },
                complete: function() {
                    //$('#loader').hide();
                },
                error: function(jqXHR, testStatus, error) {
                    console.log(error);
                    alert("Page " + href + " NO se puede abrir. Error:" + error);
                    //$('#loader').hide();
                },
                timeout: 8000
            });
        }

        $(document).on('click', '#projectsButton', function(event) {
            event.preventDefault();
            let href = $(this).attr('data-attr');
            $.ajax({
                url: href,
                beforeSend: function() {
                    //$('#loader').show();
                },
                // return the result
                success: function(result) {
                    $('#projectsModal').modal("show");
                    $('#projectsBody').html(result);//.show();
                },
                complete: function() {
                    //$('#loader').hide();
                },
                error: function(jqXHR, testStatus, error) {
                    console.log(error);
                    alert("Page " + href + " cannot open. Error:" + error);
                    //$('#loader').hide();
                },
                timeout: 8000
            })
        });

        $(document).on('click', '#detailButton', function(event) {
            event.preventDefault();
            let href = $(this).attr('data-attr');
            $.ajax({
                url: href,
                beforeSend: function() {
                    //$('#loader').show();
                },
                // return the result
                success: function(result) {
                    $('#detailModal').modal("show");
                    $('#detailBody').html(result);//.show();
                },
                complete: function() {
                    //$('#loader').hide();
                },
                error: function(jqXHR, testStatus, error) {
                    console.log(error);
                    alert("Page " + href + " cannot open. Error:" + error);
                    //$('#loader').hide();
                },
                timeout: 8000
            })
        });

        $(document).ready(function() {
            $('#projectTable').DataTable();

            $('#projectTable_wrapper').removeClass("form-inline dt-bootstrap")
        });
    });
</script>

<script>
    $(function(){
        var plants = [
            {name: 'VAK', coords: [50.0091294, 9.0371812], status: 'closed', offsets: [0, 2]},
            {name: 'MZFR', coords: [49.0543102, 8.4825862], status: 'closed', offsets: [0, 2]},
            {name: 'AVR', coords: [50.9030599, 6.4213693], status: 'closed'},
            {name: 'KKR', coords: [53.1472465, 12.9903674], status: 'closed'},
            {name: 'KRB', coords: [48.513264, 10.4020357], status: 'activeUntil2018'},
            {name: 'KWO', coords: [49.364503, 9.076252], status: 'closed'},
            {name: 'KWL', coords: [52.5331853, 7.2505223], status: 'closed', offsets: [0, -2]},
            {name: 'HDR', coords: [50.1051446, 8.9348691], status: 'closed', offsets: [0, -2]},
            {name: 'KKS', coords: [53.6200685, 9.5306289], status: 'closed'},
            {name: 'KKN', coords: [48.6558015, 12.2500848], status: 'closed', offsets: [0, -2]},
            {name: 'KGR', coords: [54.1417497, 13.6583877], status: 'closed'},
            {name: 'KWB', coords: [49.709331, 8.415865], status: 'closed'},
            {name: 'KWW', coords: [51.6396481, 9.3915617], status: 'closed'},
            {name: 'GKN', coords: [49.0401151, 9.1721088], status: 'activeUntil2022'},
            {name: 'KKB', coords: [53.8913533, 9.2005777], status: 'closed', offsets: [0, -5]},
            {name: 'KKI', coords: [48.5544748, 12.3472095], status: 'activeUntil2022', offsets: [0, 2]},
            {name: 'KKU', coords: [53.4293465, 8.4774649], status: 'closed'},
            {name: 'KNK', coords: [49.1473279, 8.3827739], status: 'closed'},
            {name: 'KKP', coords: [49.2513078, 8.4356761], status: 'activeUntil2022', offsets: [0, -2]},
            {name: 'KKG', coords: [49.9841308, 10.1846373], status: 'activeUntil2018'},
            {name: 'KKK', coords: [53.4104656, 10.4091597], status: 'closed'},
            {name: 'KWG', coords: [52.0348748, 9.4097793], status: 'activeUntil2022'},
            {name: 'KBR', coords: [53.850666, 9.3457603], status: 'closed', offsets: [0, 5]},
            {name: 'KMK', coords: [50.408791, 7.4861956], status: 'closed'},
            {name: 'THTR', coords: [51.6786228, 7.9700232], status: 'closed'},
            {name: 'KKE', coords: [52.4216974, 7.3706389], status: 'activeUntil2022', offsets: [0, 2]}
        ];

        new jvm.Map({
            container: $('#map'),
            map: 'de_merc',
            markers: plants.map(function(h){ return {name: h.name, latLng: h.coords} }),
            labels: {
                markers: {
                render: function(index){
                    return plants[index].name;
                },
                offsets: function(index){
                    var offset = plants[index]['offsets'] || [0, 0];

                    return [offset[0] - 7, offset[1] + 3];
                }
                }
            },
            series: {
            markers: [{
                attribute: 'image',
                scale: {
                'closed': '/img/icon-np-3.png',
                'activeUntil2018': '/img/icon-np-2.png',
                'activeUntil2022': '/img/icon-np-1.png'
                },
                values: plants.reduce(function(p, c, i){ p[i] = c.status; return p }, {}),
                legend: {
                horizontal: true,
                title: 'Nuclear power station status',
                labelRender: function(v){
                    return {
                    closed: 'Closed',
                    activeUntil2018: 'Scheduled for shut down<br> before 2018',
                    activeUntil2022: 'Scheduled for shut down<br> before 2022'
                    }[v];
                }
                }
            }]
            }
        });
    });
</script>    

</body>
</html>