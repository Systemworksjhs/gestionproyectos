
<?php
	require 'configuration/conection.php';
    if (!empty($_GET["idproductS"])) {
        $idproductS = $_GET["idproductS"];
    }else{
        $idproductS=0;
    }
    $municipio = $_GET["municipio"];
    $identificador = base64_decode($_REQUEST['identificador']);

?>
<html lang="es">

    <head>
        <meta charset="utf-8">
        <title>Agroticnarino</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="Agrotic Nariño" name="">
        <meta content="Agrotic Nariño" name="agroticnarino">
        <meta name="keywords" content="tienda virtual, compra tienda virtual, comprar en linea pasto, agrotic tienda virtual pasto, compra linea agrotic, html">
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

<!-- Inicio de la Implementación del Menú -->
    <!-- Inicio de la Implementación del Banner -->
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
                    <small class="me-3 text-light"><i class="fa fa-map-marker-alt me-2"></i>San Juan de Pasto, Colombia</small>
                    <small class="me-3 text-light"><i class="fa fa-phone-alt me-2"></i>+57 311 3895946</small>
                    <small class="text-light"><i class="fa fa-envelope-open me-2"></i>contactenos@agroticnarino.com.co</small>
                </div>
            </div>
            <div class="col-lg-4 text-center text-lg-end">
                <div class="d-inline-flex align-items-center" style="height: 45px;">
                    <!--
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href=""><i class="fab fa-twitter fw-normal"></i></a>
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href=""><i class="fab fa-facebook-f fw-normal"></i></a>
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href=""><i class="fab fa-linkedin-in fw-normal"></i></a>
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href=""><i class="fab fa-instagram fw-normal"></i></a>
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle" href=""> <i class="fab fa-youtube fw-normal"></i></a>
                    -->
                </div>
            </div>
        </div>
    </div>
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
        <div class="container-fluid bg-primary py-5 bg-header-shop" style="margin-bottom: 90px;">
            <div class="row py-5">
                <div class="col-12 pt-lg-2 mt-lg-2 text-center">
                    <h1 class="title-main-agrotic text-white animated zoomIn">Mapa</h1>
                    <a href="" class="h5 text-white">Inicio</a>
                    <i class="far fa-circle text-white px-2"></i>
                    <a href="" class="h5 text-white">interactivo</a>
                </div>
            </div>
        </div>
    </div></br>
    <!-- Fin Navbar & Carousel -->
    <div class="mt-5 text-center">
        <p class="titulo-information-map-result">Por favor seleccione una opción y conozca más detalles</p>
    </div>
    <!-- Inicio botón izquierdo-->
    <ul class="options-list mnu-left">
        <li class="options-item">
            <a href="./" class="options-link">
                <svg x="0px" y="0px" viewBox="0 0 298.8 322.2" class="boton-gobernar img-fluid">
        <switch>
            <foreignObject requiredExtensions="&ns_ai;" x="0" y="0" width="1" height="1">
            <i:pgfRef  xlink:href="#adobe_illustrator_pgf">
            </i:pgfRef>
            </foreignObject>
            <g i:extraneous="self">
            <path class="st0" d="M259.2,110.1c-0.1-0.1-73.4-73.4-73.5-73.5c-7.5-7.1-18.3-11.1-31.2-11.1c-13.8,0-25.1,4.6-32.6,12.5
                c0,0-20.5-20.5-20.6-20.6l0,0C90.8,8,74.8,2.2,59.6,2.2C27.4,2.2,3.3,24.5,3.3,54.1C3.3,69,9.2,82,19,91.4
                c0.1,0.1,72.9,72.9,72.9,72.9c9.8,9.4,23.5,15.1,39.1,15.1c14.3,0,31.5-5.5,42.4-13.3v-21.3c0,0,1.8,1.8,1.8,1.8
                c0.1,0.1,21.5,21.5,21.6,21.6c7.5,7.1,18.3,11.2,31.3,11.2c25.7,0,42.9-16,42.9-40.3C271.1,127.1,266.8,117.1,259.2,110.1z"/>
            <g id="go">
                <path class="st1" d="M98.8,52v40.6c-11.1,7.9-28.7,13.5-43.2,13.5C23.9,106.1,0,83.2,0,52.9C0,22.7,24.5,0,57.3,0
                c15.4,0,31.8,5.9,42.5,15.4L85,33.4c-7.6-7-18.1-11.3-27.8-11.3C40.1,22.1,27,35.5,27,52.9c0,17.7,13.2,31,30.5,31
                c5.3,0,12.2-1.9,18.4-5.1V52H98.8z"/>
                <path class="st1" d="M197.9,64.8c0,24.7-17.5,41-43.7,41c-26.3,0-43.8-16.3-43.8-41s17.5-40.8,43.8-40.8
                C180.3,23.9,197.9,40.1,197.9,64.8z M136.2,65.1c0,12.5,7.3,20.8,18,20.8c10.5,0,17.8-8.3,17.8-20.8c0-12.3-7.3-20.8-17.8-20.8
                C143.5,44.3,136.2,52.7,136.2,65.1z"/>
            </g>
            <path class="st2" d="M252.9,113.2c-7.8,0.1-14.5,2.6-19.7,7.2l-5.9-6h-25.2v34.1c0,0-25-25-25-25c-6.6-6.4-16.1-10-28.3-10
                c-20.5,0-35.5,11.4-39.7,29.5c0,0,0,0,0,0c-0.1-0.1-18.3-18.3-18.4-18.4c-5.4-5.9-12.6-9.6-21.3-10.8l-29-29.1l-23.7,2.1
                l-1.6,106.1l32.6,32.6h19.2l11.2,14.9l54.5-3.5l76.9,4.1l58.8,5.4l-10.2-20.9h1.9v-40.4c1.3-11.1,10.9-17.9,25.5-16.6v-22.8
                C285.4,145.7,252.9,113.2,252.9,113.2z"/>
            <g id="ber">
                <path class="st1" d="M100.7,154c0,23.9-14.3,39.8-36.3,39.8c-10.2,0-18.5-4.1-24.1-11.4v10.5H15.1V84.7h25.2v40
                c5.5-7.1,13.6-11.2,23.5-11.2C86,113.4,100.7,129.6,100.7,154z M75.3,153.3c0-12-7.1-20.4-17.6-20.4c-10.2,0-17.4,8.5-17.4,20.4
                c0,12.3,7.1,20.6,17.4,20.6C68.2,173.8,75.3,165.4,75.3,153.3z"/>
                <path class="st1" d="M188.4,160.4h-55.3c2.5,9.3,9.2,14.6,18.5,14.6c6.9,0,13.6-2.8,18.8-8l13.3,13c-8,8.8-19.8,13.9-34.3,13.9
                c-25.7,0-41.7-16-41.7-40c0-24.4,16.6-40.4,41-40.4C176.4,113.4,190.1,131.7,188.4,160.4z M164.2,146.8c0-9.6-6.1-15.9-15.2-15.9
                c-8.8,0-14.7,6.4-16.3,15.9H164.2z"/>
                <path class="st1" d="M227.3,127.6c5.4-9.2,14.3-14.3,25.5-14.4v22.8c-14.6-1.3-24.2,5.5-25.5,16.6v40.4h-25.2v-78.6h25.2V127.6z"
                />
            </g>
            <path class="st3" d="M260.2,199.6c-7.8,0.1-14.5,2.6-19.7,7.2l-5.9-6h-25.2v33.3c0,0-24.9-24.8-24.9-24.9
                c-5.8-6.2-15.1-9.5-27.3-9.5c-10.1,0-18.9,1.9-28,5.3h-0.1l-27.5-27.7l-0.1,1.4l-20.5,66.3l-51.3-67l-21.7-0.2l0.5,101.6h-1
                l38.4,38.6h24.4v-49.8l8.3,11.1l38.6,38.6h22.9V291c0.1,0.1,21.1,21.1,21.2,21.2c4.7,4.4,11.4,7.1,19.9,7.1
                c7.9,0,14.6-1.9,19.5-5.7h0.2l4.4,4.5h24.6v-18h0.1l17.8,18h25.2v-40.4c1.3-11.1,10.9-17.9,25.5-16.6v-22.8
                C298.8,238.3,260.2,199.6,260.2,199.6z"/>
            <g id="nar">
                <path class="st1" d="M78.8,279.4l-47-62.9v62.9H7.4V177.3h22.9l47.1,63v-63h24.2v102.1H78.8z"/>
                <path class="st1" d="M191.5,228.1v51.3h-24.6v-9c-5.1,6.7-13.4,10.2-24.1,10.2c-16.8,0-27-10.2-27-24.6
                c0-14.9,10.6-23.6,30.2-23.8h20.7V231c0-7.7-5.1-12.4-15.3-12.4c-6.6,0-15.2,2.3-23.5,6.6l-7.1-16.6c12.3-5.7,23.3-8.9,36.5-8.9
                C178.8,199.6,191.4,210.3,191.5,228.1z M166.7,252.7v-7h-15.9c-7.6,0-11.4,2.6-11.4,8.5c0,5.7,4.1,9.3,11.1,9.3
                C158.4,263.5,165.1,259.1,166.7,252.7z"/>
                <path class="st1" d="M234.7,214.1c5.4-9.2,14.3-14.3,25.5-14.4v22.8c-14.6-1.3-24.2,5.5-25.5,16.6v40.4h-25.2v-78.6h25.2V214.1z"
                />
            </g>
            <rect x="57.6" y="52" class="st1" width="29.3" height="16.5"/>
            </g>
        </switch>
        </svg>
                <p>Proyectos<br> de <span>Nariño</span></p>
            </a>
        </li>
    </ul>
    <!-- Fin botón izquierdo-->


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
    <div class="container-fluids facts py-5 pt-lg-0">
        <form name="f1">
            <div class="row mb-5 justify-content-center">
                <h6 class="subtittles-resgitrer" style="text-align: center;font-size: 1.1rem">Proyectos registrados para: <?php echo $municipio?></h6>
                <select class="form-control-registrer bg-light border-1 px-4" name="conjuntos" id="conjuntos" onchange="cambia_productos()" style="height: 35px; width:300px;font-size: 1.2rem;text-align: center" required>
                <option value="" selected>Seleccione un proyecto...</option>
                    <?php
                        require 'configuration/call-products-municipalities.php';
                    ?>
                </select>
            </div>
        </form>
        <div class="row fondo-titulo-municipio text-center">
            <h1>Municipio de: <?php echo $municipio?> </h1>
        </div>
            <div class="row justify-content-center">
                <!--Contenedor despliegue de iniciativa seleccionada -->
                <div class="col-lg-5 col-md-10 col-sm-10 col-xs-12 pb-md-5 m-5 col-12" id="resultados-1">
                    <div class="row show-details-municipalities-2">
                        <ul class="list-group-opc list-group" style="z-index: 50; position: relative;">
                            <div id="blog-test-cont-2">
                                <?php
                                    require 'configuration/configuration-last-update-initiatives.php';
                                ?>
                            </div>
                        </ul>
                    </div>
                </div>
                <!--Contenedor despliegue de los datos de iniciativa seleccionada para ese municipio-->
                <div class="col-lg-5 col-md-10 col-sm-10 col-xs-12 contenedores-reg pb-md-5 m-md-5" id="resultados-2">
                    <?php
                        require 'configuration/show-data-municipality.php';
                    ?>
                </div>
            </div>
        
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
    <script src="js/selector.js"></script> -->
    
    <!--Iniciativa seleccionada-->
    <script type="text/javascript">
        function cambia_productos() {
            //tomo el valor del select del conjunto elegido 
            var conjunto
            conjunto = document.f1.conjuntos[document.f1.conjuntos.selectedIndex].value;
            //alert("Actualizando información. Pronto más detalles.");
            $(function() {
                getInfo(conjunto);
            });
            function getInfo(idiniciativa) {
                const miMunicipio = "<?php echo $identificador ?>";
                let href = "traer_Iniciativas.php?idiniciativa=" + idiniciativa + "&identificador=" + miMunicipio;
                $.ajax({
                    url: href,
                    // retorna el resultado
                    success: function(result) {
                        $('#blog-test-cont-2').html(result);
                    },
                    // Error en url
                    error: function(jqXHR, testStatus, error) {
                        console.log(error);
                        alert("Página " + href + " No se puede abrir. Error:" + error);
                    },
                    timeout: 8000
                });
            }
        }
    </script>

    <!--Opcion seleccionada-->
    <script type="text/javascript">
        $(function() {
            $("#blog-test-cont-2").on("click",".blog-test",function(e){
                var mostrarId=this.id;
                $(function() {
                    getInfo(mostrarId);
                });
                function getInfo(mostrarId) {
                    $('#resultados-2').html('<div class="loading"><img src="img/gifs/cargando1.gif"/><br/><p><span>Un momento, por favor...</span></p></div>');
                    let href = "traer_Datos.php?mostrarId="+mostrarId;
                    $.ajax({
                        url: href,
                        // retorna resutado resultado
                        success: function(result) {
                            $('#resultados-2').html(result);
                        },
                        // error en url
                        error: function(jqXHR, testStatus, error) {
                            console.log(error);
                            alert("Página " + href + " NO se puede abrir. Error:" + error);
                        },
                        timeout: 8000
                    });
                }
            });
        });
    </script>
    
    <!--Nuevos elementos dinámicos-->
    <script type="text/javascript">
        $("#blog-test-cont-2").on("click",".blog-test",function(){
        });
    </script>

</body>

</html>