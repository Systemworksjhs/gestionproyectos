<?php
	session_start();
	require 'configuration/conection.php';
	//require 'configuration/funcscopy.php';
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
                    <a href="de-interes" class="nav-item nav-link">Noticias</a>
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
    <section class="bg-contactanos">
        <!-- Inicio encabezado contáctanos -->
        <div class=" mt-3 pb-1">
            <h1 class=" title-main-agrotic text-center mb-md-4 animated zoomIn">Contáctanos</h1>
        </div>

        <!-- Inicio contáctanos -->
        <form id="formcontact" class="form-default pt-5 mt-5" role="form" action="configuration/registrerMessage" method="POST" autocomplete="off">
            <div class="container-fluid py-0 wow fadeInUp" data-wow-delay="0.1s">
                <div class="container py-2">
                    <div class="row g-0 ">
                        <div class="col-lg-5 bg-gray p-3">
                            <div class="icon-form-contactano">
                                <div class="logo-login wow fadeIn pt-5" data-wow-delay="1.5s">
                                    <img src="img/login/Icono-agrotic-06.svg" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7 bg-gray2">
                            <div class=" rounded h-100 d-flex align-items-center p-5 wow zoomIn" data-wow-delay="0.9s">
                                <div class="row g-3">
                                    
                                        
                                            <div class="col-md-6">
                                                <h6 class="subtittles-resgitrer">Nombres</h6>
                                                <input type="text" class="form-control-registrer border-0 bg-light px-4" placeholder="Su nombres" style="height: 30px;" required minlenght="3" maxlenght="48" id="names" name="names">
                                            </div>
                                            <div class="col-md-6">
                                                <h6 class="subtittles-resgitrer">Apellidos</h6>
                                                <input type="text" class="form-control-registrer border-0 bg-light px-4" placeholder="Apellidos" style="height: 30px;" required minlenght="3" maxlenght="48" id="lastnames" name="lastnames">
                                            </div>
                                            <div class="col-md-6">
                                                <h6 class="subtittles-resgitrer">Municipio</h6>
                                                <select class="form-control-registrer bg-light border-1 px-4" name="municipality" id="municipality" style="height: 30px;" required>
                                                <option value="" selected>Seleccione un municipio...
                                                    <?php
                                                    $result = $mysqli->query('SELECT * FROM municipality');
                                                    while ($row = $result->fetch_assoc()) { ?>
                                                            <option value="<?php echo $row['name_municipality']; ?>"><?php echo $row['name_municipality']; ?>
                                                            <?php
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <h6 class="subtittles-resgitrer">Correo electrónico</h6>
                                                <input type="email" class="form-control-registrer border-0 bg-light px-4" placeholder="Correo electrónico" style="height: 30px;" required minlenght="3" maxlenght="100" id="email" name="email">
                                            </div>
                                            <div class="col-md-6">
                                                <h6 class="subtittles-resgitrer">Teléfono</h6>
                                                <input type="number" class="form-control-registrer border-0 bg-light px-4" placeholder="Teléfono" style="height: 30px;" required id="phone" name="phone" minlength="7" maxlength="10" min="7000000" max="3999999999">
                                            </div>
                                            <div class="col-md-6">
                                                <h6 class="subtittles-resgitrer">Dirección</h6>
                                                <input type="text" class="form-control-registrer border-0 bg-light px-4" placeholder="Dirección" style="height: 30px;" minlenght="3" maxlenght="100" id="adress" name="adress">
                                            </div>
                                            <div class="col-md-12">
                                                <h6 class="subtittles-resgitrer">Mensaje</h6>
                                                <textarea rows="6" class="form-control-registrer border-0 bg-light px-4" required minlenght="20" maxlenght="499" id="message" name="message"></textarea>
                                            </div><div class="col-md-6"></div>

                                    <div class="col-sm-12 text-center">
                                        <fieldset>
                                            <label class="subtittles-resgitrer"><input type="checkbox" required> He leido y acepto el aviso legal y la política de privacidad</label>
                                        </fieldset>
                                    </div>
                                    <div class="centrar-text-botton">
                                        <button class="botton-register w-10 py-3" type="submit" name="enviar"><span>Enviar mensaje</span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div></br></br>
        </form></br></br></br> </br> </br> </br>
        <!-- Fin contactanos -->
    </section>

    <!-- Inicio pie página -->
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

    <script>
        function classToggle() {
            var el = document.querySelector('.icon-cards__content');
            el.classList.toggle('step-animation');
        }
        document.querySelector('#toggle-animation').addEventListener('click', classToggle);
    </script>
</body>

</html>