<?php
	session_start();
	require 'configuration/conection.php';
	require 'configuration/funcscopy.php';
    $resultTwo = show_objetives();
	if(isset($_SESSION["id"])){
        $nombre = $_SESSION['name'];
        $tipo_usuario = $_SESSION['tipo_usuario'];
        $correo = $_SESSION['correo'];
    }
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
                <!-- Inicio barra redes sociales -->
                <?php include 'redes-sociales.html';?>
                <!-- Fin barra redes sociales -->
                <!-- Search -->
                <!-- <butaton type="button" class="btn text-primary ms-3" data-bs-toggle="modal" data-bs-target="#searchModal"><i class="fa fa-search"></i></butaton> -->
                <a class="mx-2 mt-3 btn" data-bs-toggle="modal" data-bs-target="#searchModal">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="#091E3E" class="bi bi-search text-primary" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                    </svg>
                </a>
                <!-- Cart -->
                <?php 
                    if (isset($_COOKIE["listSC"])){
                        //Total de adiciones al carrito
                        $totalSC = count(json_decode($_COOKIE["listSC"], true));
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

                <?php
                    if(isset($_SESSION["id"])){ ?>
                    <a href="configuration/logout" class="btn btn-primary py-2 px-4 ms-3">Cerrar sesión</a>
                    <?php
                    }
                    else{ ?>
                        <a href="login" class="btn btn-primary py-2 px-4 ms-3">Ingresar</a>
                    <?php
                    }                
                ?>
            </div>
        </nav>
    </div>

    <!--Inicio sección acerca de-->
    <section class="heading-acercade" id="acercade">
        <!-- iconos redes sociales-->
        <div class="icono-aling-right pt-4">
            <div class="blog-item ">
                <div class="blog-img ">
                    <?php
                        if(isset($_SESSION["id"])){ ?>
                            <p class="text-right-home text-right-home-2">Cerrar sesión<a href="configuration/logout"><img src="img/acercade/Icono-salir.png" style="width:60px;" alt=""></a></p>
                        <?php
                        }
                        else{ ?>
                            <p class="text-right-home text-right-home-2">Ingresar<a href="login"><img src="img/acercade/Icono-ingresar.png" style="width:60px;" alt=""></a></p>
                        <?php
                        }                
                    ?>
                </div>
            </div>
            <div class="blog-item ">
                <div class="blog-img ">
                    <p class="text-right-home text-right-home-2">Registro<a href="registrarse"><img src="img/acercade/icono-registro.png" style="width:60px;" alt=""></a></p>
                </div>
            </div>
            <div class="text-rigth-index mt-2">
                <p><marquee>Sitio en actualización</marquee></p>
            </div>
        </div>
        <!-- fin iconos redes sociales-->

        <!-- Contenido intro acerca de-->
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-5 col-md-6">
                    <div class="" style="overflow: hidden;">
                        <img src="img/acercade/0111-removebg-preview.png" alt="" class="img-abosolute-1">
                        <img src="img/acercade/hojas-circular-02.png" class="rotate" width="50" height="50" />
                    </div>
                </div>
                <div class="col-lg-7 col-md-6 position-relative">
                    <div class="div-align-right">
                        <div class="image-right">
                            <img src="img/acercade/logoagrotic.png " alt="">
                        </div>
                        <h1 class="text-right-acercade">Una oportunidad para generar cambios en el sector agrícola del departamento de Nariño</h1>
                        <h3 class="blockquote-acercade">El sector agrícola nariñense representa un potencial económico importante para nuestra región, clave para el desarrollo del departamento de Nariño</h3>
                    </div>
                </div>
                
            </div>
            <h1 class="title-center-acercade sub-title-main-agrotic">Nuestros objetivos</h1>
        </div>
        <!-- Fin intro acerca de-->
    </section>
    <!-- Fin seccióm acerca de-->

    <!-- Inicio objetivo -->
    <div class="container-fluid bg-primary-target position-relative pb-3 mb-5 mx-auto pt-5">
        <div class="row justify-content-center">
            <div id="carouselExampleDark" class="carousel slide " data-bs-ride="carousel" style="max-width: 980px;">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="3" aria-label="Slide 4"></button>
                    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="4" aria-label="Slide 5"></button>
                </div>
                <div class="carousel-inner">
                    <?php 
                        $i=0;
                        while($showTwo = $resultTwo->fetch_assoc()) { 
                            if($i==0){?>
                                <div class="carousel-item active" data-bs-interval="5000">
                                    <!-- <img src="assets/image/logoagrotic.jpg" class="d-block w-100" alt="..."> -->
                                    <img src="img/narino.png" class="d-block w-100" alt="...">
                                    <div class="carousel-caption d-md-block">
                                        <h1 class="titulo-new-slider-acerca-de" style="color: #ffff; text-shadow: none"><?php echo $showTwo['title'];?></h1>
                                        <h4 class="text-white p-5"><?php echo $showTwo['description'];?></h4>
                                    </div>
                                </div>
                                <?php
                            } else{ ?>
                                <div class="carousel-item" data-bs-interval="5000">
                                    <!-- <img src="assets/image/narino.png" class="d-block w-100" alt="..."> -->
                                    <img src="img/narino.png" class="d-block w-100" alt="...">
                                    <div class="carousel-caption ">
                                        <h1 class="titulo-new-slider2-acerca-de"><?php echo $showTwo['title'];?></h1>
                                        <h4 class="text-white p-5"><?php echo $showTwo['description'];?></h4>
                                    </div>
                                </div>
                            <?php }
                            $i=1;
                        }
                    ?>
                    <!-- <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button> -->
                </div>
            </div>
        </div>
        <img src="./img/acercade/02.png" width="700px" class="capa2" style="overflow: hidden;"/>
        <img src="./img/acercade/2x/lateral-derecho.png" width="500px" class="capa3" style="overflow: hidden;"/>
    </div>
    <!-- Fin objetivo -->

    <!-- Inicio quienes se benefician -->
    <div class="row justify-content-center align-items-center bg-white position-relative">
        <div class="col-5 media-text">
            <h1 class="title-main2-agrotic">¿Quienes se <br> <strong>benefician ?</strong></h1>
        </div>
        <div class="col-4 text-center image-acerca-de" style="overflow: hidden;">
            <img src="img/acercade/03.png" alt="" width="410px" >
        </div>
        <img src="img/acercade/06.png" class="capa4" style="overflow: hidden;">
    </div>
    <div class="row align-items-center media-text">
        <div class="col-md-7 card-beneficio col-12 p-5 m-0 ">
            <h2 class="text-center sub-title-main-agrotic">Productores</h2>
            <div class="row">
                <div class="col-6 order-2 order-sm-1 order-md-1">
                </div>
                <div class="col-6 order-1 order-sm-2 order-1 order-md-2">
                    <p class="text-right">Capacitación en bioseguridad, BPM, BPA, manejo poscosecha y uso de herramientas TIC.</p>
                </div><br>
            </div>
            <h2 class="text-center sub-title-main-agrotic">Distribuidores</h2>
            <div class="row">
                <div class="col-6">
                </div>
                <div class="col-6">
                    <p class="text-right">Capacitación, uso de plataformas tecnológicas y herramientas TIC.</p>
                </div><br>
            </div>
            <h2 class="text-center sub-title-main-agrotic">Consumidores</h2>
            <div class="row">
                <div class="col-6 order-2 order-sm-1 order-md-1">
                </div>
                <div class="col-6 order-sm-2 order-1 order-md-2">
                    <p class="text-right">Obtención de productos hortofrutícolas inocuos y clasificados por su calidad.
                </div><br>
            </div>
            <h2 class="text-center sub-title-main-agrotic">Sociedad</h2>
            <div class="row">
                <div class="col-6">
                </div>
                <div class="col-6">
                    <p class="text-right">Centros de acopio para dar continuidad desde la fase inicial de este proyecto.</p>
                </div><br>
            </div>
        </div>
        <div class="col-md-5 col-12 m-0 p-0 " style="overflow: hidden;">
            <img src="img/acercade/07.jpg" height="450px" alt="" class="media-img">
        </div>
    </div>
    <!-- Fin quienes se benefician -->

    <!-- Inicio impactos -->
    <div class="p-5 container-fluid bg-white fondo-hojas1 media-text">
        <div class="row justify-content-center ">
            <div class="col-12 col-md-5 order-1 order-md-0">
                <div class="btn-regresar">
                    <div class="circle" style="--clr:transparent">
                        <img src="./img/acercade/Impactos01.png" width="300px" alt="" class="logo" style="overflow: hidden;">
                    </div>
                    <div class="contenido">
                        <h2></h2>
                        <p class="text-color-primary">Seguimos capacitando a nuestros productores y provedores</p>
                        <a href="">Ver más</a>
                    </div>
                    <img src="./img/acercade/Impactos01.png" width="300px" alt=""  class="mapa-reg" style="overflow: hidden;">
                </div>
            </div>
            <div class="col-12 col-md-5">
                <h1 class="title-main3-agrotic">Sus <br> Impactos</h1>
                <div class="d-grid gap-2">
                    <button class="btn btn-primarys" type="button">Más de 900 personas capacitadas</button>
                </div>
                <p class="text-rigth-impact">Dentro del área de influencia del proyecto.</p>
            </div>
        </div>
        <div class="row  justify-content-center">
            <div class="col-12 col-md-5">
                <div class="d-grid gap-2">
                    <button class="btn btn-primarys" type="button">Implementación centros de acopio</button>
                </div>
                <p class="text-left-impact">Para operaciones de manejo poscosecha.</p>
            </div>
            <div class="col-12 col-md-5">
                <div class="btn-regresar">
                    <div class="circle" style="--clr:transparent">
                        <img src="img/acercade/Impactos03.png" width="300px" alt="" class="logo">
                    </div>
                    <div class="contenido">
                        <h2></h2>
                        <p class="text-color-primary">Tienen como objetivo primordial hacer que los productos del lugar sean vendidos dentro de su zona de influencia</p>
                        <a href="">Ver más</a>
                    </div>
                    <img src="img/acercade/Impactos03.png" width="300px" alt=""  class="mapa-reg">
                </div>    
            </div>
        </div>
        <div class="row  justify-content-center">
            <div class="col-12 col-md-5 order-1 order-md-0">
                <div class="btn-regresar">
                    <div class="circle" style="--clr:transparent">
                        <img src="img/acercade/Impactos02.png" width="300px" alt="" class="logo">
                    </div>
                    <div class="contenido">
                        <h2></h2>
                        <p class="text-color-primary">La plataforma Agrotic será una aplicación web y móvil que dispondrá de información relacionada al agro nariñense, permitiendo prestar un servicio integral a los agricultores</p>
                        <a href="">Ver más</a>
                    </div>
                    <img src="img/acercade/Impactos02.png" width="300px" alt=""  class="mapa-reg">
                </div>
            </div>
            <div class="col-12 col-md-5">
                <div class="d-grid gap-2">
                    <button class="btn btn-primarys" type="button">Creación de plataforma Web</button>
                </div>
                <p class="text-rigth-impact">Para comercialización de productos.</p>
            </div>
        </div>
        <div class="row  justify-content-center">
            <div class="col-12 col-md-5">
                <div class="d-grid gap-2">
                    <button class="btn btn-primarys" type="button">Divulgación del conocimiento</button>
                </div>
                <p class="text-left-impact">Mediante la apropiación social del conocimiento.</p>
            </div>
            <div class="col-12 col-md-5">
                <div class="btn-regresar">
                    <div class="circle" style="--clr:transparent">
                        <img src="img/acercade/Impactos04.png" width="300px" alt="" class="logo">
                    </div>
                    <div class="contenido">
                        <h2></h2>
                        <p class="text-color-primary">De entre los muchos campos donde la ciencia se aplica para dar respuesta a los grandes retos de la humanidad, está la agricultura</p>
                        <a href="">Ver más</a>
                    </div>
                    <img src="img/acercade/Impactos04.png" width="300px" alt=""  class="mapa-reg">
                </div>
            </div>
        </div>
    </div>
    <!-- fin impactos -->

    <!-- Inicio etapas del proceso -->
    <div class="container-fluid bg-primary-target position-relative pb-3 mb-5 mx-auto pt-5 media-text image-acerca-de">
        <div class="row justify-content-center">
            <div class=" row align-items-center">
                <h1 class="text-titulo-etapas">Etapas del proceso:</p>
            </div>
        </div>
        <img src="./img/acercade/tomates.png" width="500px" class="capa7" style="overflow: hidden;" />
        <img src="./img/acercade/2x/lateral-derecho.png" width="500px" class="capa3-1" style="overflow: hidden;"/>
    </div>
    <div class="container-fluid  pb-3 mb-5 mx-auto pt-5 media-text">
        <div class="row justify-content-center ">
            <div class="col-md-3 position-relative">
                <img src="img/acercade/Etapas01.png" width="330px" alt="" class="img-etapas-left">
            </div>
            <div class="col-md-5 col-10 bg-etapas-center">
                <p class="text-titulo-etapas-2 bg-etapas-center-position-text">Productor campesino</p>
                <p class="subtitulo-etapas bg-etapas-center-position-text">Sus productos cosechados.</p>
                <div class="text-center">
                    <img src="img/acercade/separador-proceso.png" alt="" class="separador-proceso">
                </div>
            </div>
            <div class="col-md-3 col-10">
            </div>
        </div>
        <div class="row justify-content-center ">
            <div class="col-3">
            </div>
            <div class="col-md-5 col-10 bg-etapas-center ">
                <p class="text-titulo-etapas-2 bg-etapas-center-position-text">Transporte</p>
                <p class="subtitulo-etapas bg-etapas-center-position-text">Desde el lugar de cosecha</p>
                <div class="text-center">
                    <img src="img/acercade/separador-proceso.png" alt="" class="separador-proceso">
                </div>
            </div>
            <div class="col-3 position-relative ">
                <img src="img/acercade/Etapas05.png" width="350px" alt="" class="img-etapas-right">
            </div>
        </div>
        <div class="row justify-content-center ">
            <div class="col-md-3 position-relative">
                <img src="img/acercade/Etapas02.png" width="380px" alt="" class="img-etapas-left">
            </div>
            <div class="col-md-5 col-10 bg-etapas-center">
                <p class="text-titulo-etapas-2 bg-etapas-center-position-text">Plazas de mercado</p>
                <p class="subtitulo-etapas bg-etapas-center-position-text">Solicitud de remesa</p>
                <div class="text-center">
                    <img src="img/acercade/separador-proceso.png" alt="" class="separador-proceso">
                </div>
            </div>
            <div class="col-md-3">
            </div>
        </div>
        <div class="row justify-content-center ">
            <div class="col-3">
            </div>
            <div class="col-md-5 col-10 bg-etapas-center ">
                <p class="text-titulo-etapas-2 bg-etapas-center-position-text">Aplicativo AgroTIC</p>
                <p class="subtitulo-etapas bg-etapas-center-position-text">Solicitud de remesa</p>
                <div class="text-center">
                    <img src="img/acercade/separador-proceso.png" alt="" class="separador-proceso">
                </div>
            </div>
            <div class="col-3 position-relative">
                <img src="img/acercade/Etapas06.png" width="350px" alt="" class="img-etapas-right">
            </div>
        </div>
        <div class="row justify-content-center ">
            <div class="col-md-3 position-relative">
                <img src="img/acercade/Etapas03.png" width="350px" alt="" class="img-etapas-left">
            </div>
            <div class="col-md-5 col-10 bg-etapas-center">
                <p class="text-titulo-etapas-2 bg-etapas-center-position-text">Alistamiento de pedido</p>
                <p class="subtitulo-etapas bg-etapas-center-position-text">En centros de Acopio</p>
                <div class="text-center">
                    <img src="img/acercade/separador-proceso.png" alt="" class="separador-proceso">
                </div>
            </div>
            <div class="col-3">
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-3">
            </div>
            <div class="col-md-5 col-10 bg-etapas-center">
                <p class="text-titulo-etapas-2 bg-etapas-center-position-text">Empaque y embalaje</p>
                <p class="subtitulo-etapas bg-etapas-center-position-text">De los pedidos solicitados.</p>
                <div class="text-center">
                    <img src="img/acercade/separador-proceso.png" alt="" class="separador-proceso">
                </div>
            </div>
            <div class="col-3 position-relative">
                <img src="img/acercade/Etapas07.png" width="350px" alt="" class="img-etapas-right">
            </div>
        </div>

        <div class="row justify-content-center position-relative my-0">
            <div class="col-md-3 position-relative">
                <img src="img/acercade/Etapas04.png" width="350px" alt="" class="img-etapas-left">
            </div>
            <div class="col-md-5 col-10 bg-etapas-center pb-5">
                <p class="text-titulo-etapas-2 bg-etapas-center-position-text">Transporte y entrega</p>
                <p class="subtitulo-etapas bg-etapas-center-position-text">De los pedidos a nuestros clientes.</p>
                <div class="text-center pb-5" style="overflow: hidden;">
                    <img src="img/acercade/0.5x/separador-proceso-2.png" alt="" class="separador-proceso" style="overflow: hidden;">
                </div>
            </div>
            <div class="col-3">
            </div>
            <img src="./img/acercade/02-1.png" width="700px" class="capa8" style="overflow: hidden;"/>
        </div>
    </div>
    <!-- Fin etapas del proceso -->

    <!-- Inicio testimonios 
    <div class="row align-items-center media-text"> -->
    <div class="row align-items-center">
        <div class="col-md-7 col-12 card-beneficio p-5 m-0">
            <div class="section-title text-center position-relative pb-md-3 mb-md-5 mx-auto wow fadeIn" data-wow-delay="0.6s">
                <h2 class="sub-title2-main-agrotic pb-3 mb-2">Testimonios</h2>
            </div>
            <div class="row">
                <div class="col-md-5">
                </div>
                <div class="col-md-7">
                    <h3 class="blockquote-testominios">El sector agrícola nariñense representa un potencial económico importante para nuestra región, clave para el desarrollo del departamento de Nariño</h3>
                </div><br>
            </div>
            <div class="row">
                <div class="col-md-5">
                </div>
                <div class="col-md-7">
                    <h3 class="blockquote-testominios">Mis padres se criaron y conocieron en el campo, siempre han sido agricultores. Toda mi vida he cultivado el campo, por eso estoy estudiando para ser técnica agropecuaria, porque me gusta estar conectada con la naturaleza. En la agricultura familiar toda la familia está involucrada en las labores que comprenden desde la siembra hasta la cosecha.</h3>
                </div><br>
            </div>
            <div class="row">
                <div class="col-md-5">
                </div>
                <div class="col-md-7">
                    <h3 class="blockquote-testominios">Las experiencias de la agricultura familiar son eficientes cuando acceden a condiciones económicas y entornos favorables, especialmente en el aprovechamiento de la coproducción con la naturaleza, autonomía de insumos, integración de la mano de obra familiar y comunitaria, así como el autoabastecimiento alimentario de las comunidades.</h3>
                </div><br>
            </div>
        </div>
        <div class="col-md-5 col-12 m-0 p-0 style="overflow: hidden;"">
            <img src="img/acercade/08.jpg" width="100%" height="70%" alt="" class="media-img">
        </div>
    </div>
    <!-- Fin testimonios -->

    <!-- Pie de página -->
     <?php include 'footer.html';?>


    <!-- Librerias de JavaScript -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js "></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js "></script>
    <script src="lib/wow/wow.min.js "></script>
    <script src="lib/easing/easing.min.js "></script>
    <script src="lib/waypoints/waypoints.min.js "></script>
    <script src="lib/counterup/counterup.min.js "></script>
    <script src="lib/owlcarousel/owl.carousel.min.js "></script>
    <script src="js/swiper-manager.js"></script>
    <script src="js/submenu.js"></script>
    <script src="js/side-menu-manager.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.0/js/swiper.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <!-- Template Javascript -->
    <script src="js/principal.js "></script>
</body>

</html>