<?php
	session_start();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title>Gestión proyectos</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Gestión proyectos" name="">
    <meta content="Gestión proyectos" name="Gestión proyectos">
    <meta name="keywords" content="tienda virtual, compra tienda virtual, comprar en linea pasto, agrotic tienda virtual pasto, html">
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
    <!-- Hoja de estilo Bootstrap personalizada -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Template Hoja de estilo -->
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"></script>
</head>

<body>
    <!-- Inicio giratorio -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner"></div>
    </div>
    <!-- Fin giratorio -->

    <!-- Inicio barra superior -->
        <?php include 'barra_superior.php';?>
    <!-- Fin barra superior -->

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
            </div>
        </nav>
    </div>
    <!-- Fin de la barra de navegación -->

<div class="container-fluid py-5 bg-page-notfound " style="margin-bottom: 0px;">
        <div class="row py-1 text-center">
            <div class="col-md-3 col-sm-1"></div>
            <div class="col-md-6 col-sm-10 text-center">
                <div class="pt-5 mt-5">             
                    <div class="bg-gray-notfound p-3">
                        <div class="icon-notfound">
                            <div class="logo-login wow fadeIn pt-5 text-center" data-wow-delay="1.5s">
                                <img src="img/login/Icono-agrotic-06.svg" alt="">
                                <br><br>                    
                            </div>
                        </div>
                        <h1 class="display-title-nofound">404</h1>
                        <h6 class="subtitle-primary-nofound">Página no encontrada</h6>
                        <p class="text-primary-nofound">¡Lo sentimos, la página que has buscado no existe en nuestro sitio web! ¿Quizás ir a nuestra página de inicio o intentar usar una búsqueda?</p>
                        <div class="centrar-text-botton mt-4 mb-4">
                            <a href="./">
                                <button class="botton-register w-10 py-3" type="submit" name="enviar"><span> Regresar al inicio </span></button>
                            </a>
                        </div>
                    </div>
                </div>
                <br><br><br>
            </div>
            <div class="col-md-3 col-sm-1"></div>
            <!-- Fin contactanos -->
        </div><br><br><br><br>
        <p class="text-white text-center">Cebadal - Nariño (Colombia)</p>
    </div>
    
    <!-- Inicio pie página -->
     <?php include 'footer.html';?>

    <!-- Librerias de JavaScript -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/principal.js"></script>
    <!-- Script para selectores 
    <script src="js/selector.js"></script>-->
</body>

</html>  