<!DOCTYPE html>
<html lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html" charset="UTF-8" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"></script>
    <style>
        #mapitatumaco {
            width: 750px;
            height: 500px;
            float:left;
        }
    </style>
    <style>
        #mapitaipiales {
            width: 750px;
            height: 500px;
            float:left;
        }
    </style>
    <style>
        #mapitapasto {
            width: 750px;
            height: 500px;
            float:left;
        }
    </style>
</head>
</body>
    <?php
        if(isset($_GET["id"])){
            $id=$_GET["id"];
            if($id=="mpiopasto"){?>
                <div id="mapitapasto" class="mapa-centrado rounded wow zoomIn">
                    <!-- Aqui se muestra mapa -->
                </div>
            <?php
        }
            if($id=="mpioipiales"){?>
                <div id="mapitaipiales" class="mapa-centrado rounded wow zoomIn">
                    <!-- Aqui se muestra mapa -->
                </div>
                <?php
            }
            if($id=="mpiotumaco"){?>
                <div id="mapitatumaco" class="mapa-centrado rounded wow zoomIn">
                    <!-- Aqui se muestra mapa -->
                </div>
                <?php
            }
        }else{
            echo 
            '<script>
                window.location = "./";
            </script>';
        }
        
    ?>
    
    <!-- mapa Pasto -->
    <script>
        var mapitapasto = L.map('mapitapasto').setView([1.2055, -77.2704], 14);
        L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: 'Datos &copy; <a href="#" target="">' + ' Prometeus</a> (<a href="" target="blank"></a>) | Gobernaci&oacute;n de Nari&ntilde;o <a href="https://sitio.narino.gov.co" target="blank">Systemworks</a> &copy; Sebasti&aacute;n  & Duv&aacute;n (<a href="#" target="blank">2023</a>)'
        }).addTo(mapitapasto);
        var photoIcon = L.icon({
            iconUrl: 'img/marcador/photo.svg',
            iconSize: [38, 95],
            popupAnchor: [0, -15]
        });
        var customPopup1 = "<img src='img/marcador-detalles/pasto/plazapotrerillopasto.jpg' alt='Plaza Potrerillo Pasto'' width='200px'/><br/>Plaza Potrerillo Pasto. Fuente: Prometeus S.A.S, imagen donada.";
        var customPopup2 = "<img src='img/marcador-detalles/pasto/plazalosdospuentespasto.jpg' alt='Mercado Los Dos Puentes'' width='200px'/><br/>Mercado Los Dos Puentes. Fuente: Prometeus S.A.S, imagen donada.";
        var customPopup3 = "<img src='img/marcador-detalles/pasto/plazaeltejarpasto.jpg' alt='Plaza mercado El Tejar'' width='200px'/><br/>Plaza mercado El Tejar Pasto. Fuente: Prometeus S.A.S, imagen donada.";
        var customPopup4 = "<img src='img/marcador-detalles/pasto/plazamercadoanganoy.jpg' alt='Plaza mercado Anganoy'' width='200px'/><br/>Plaza mercado Anganoy. Fuente: Prometeus S.A.S, imagen donada.";
        var customOptions = {
            maxWidth: '200',
            className: 'custom'
        };
        var marker = L.marker([1.1973, -77.2703], {
            icon: photoIcon
        }).bindPopup(customPopup1, customOptions).addTo(mapitapasto);

        var marker = L.marker([1.2156, -77.2752], {
            icon: photoIcon
        }).bindPopup(customPopup2, customOptions).addTo(mapitapasto);

        var marker = L.marker([1.1983, -77.2634], {
            icon: photoIcon
        }).bindPopup(customPopup3, customOptions).addTo(mapitapasto);
        
        var marker = L.marker([1.2099, -77.2994], {
            icon: photoIcon
        }).bindPopup(customPopup3, customOptions).addTo(mapitapasto);
    </script>

    <!-- mapa Tumaco -->
    <script>
        var mapitatumaco = L.map('mapitatumaco').setView([1.7870, -78.7889], 14);
        L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: 'Datos &copy; <a href="#" target="">' + ' Prometeus</a> (<a href="" target="blank"></a>) | Gobernaci&oacute;n de Nari&ntilde;o <a href="https://sitio.narino.gov.co" target="blank">Systemworks</a> &copy; Sebasti&aacute;n  & Duv&aacute;n (<a href="#" target="blank">2023</a>)'
        }).addTo(mapitatumaco);
        var photoIcon = L.icon({
            iconUrl: 'img/marcador/photo.svg',
            iconSize: [38, 95],
            popupAnchor: [0, -15]
        });
        var customPopup1 = "<img src='img/marcador-detalles/tumaco/Tumaco.jpg' alt='Tumaco'' width='200px'/><br/>San Andr¨¦s de Tumaco. Fuente: Prometeus S.A.S, imagen donada.";
        var customPopup2 = "<img src='img/marcador-detalles/tumaco/Comida-de-mar.jpg' alt='Comida de Mar'' width='200px'/><br/>Comida Tipica de Tumaco. Fuente: Prometeus S.A.S, imagen donada.";
        var customPopup3 = "<img src='img/marcador-detalles/tumaco/Mini-super.jpg' alt='Mini Super'' width='200px'/><br/>Mini Super Tumaco. Fuente: Prometeus S.A.S, imagen donada.";

        var customOptions = {
            maxWidth: '200',
            className: 'custom'
        };
        var marker = L.marker([1.7853, -78.7883], {
            icon: photoIcon
        }).bindPopup(customPopup1, customOptions).addTo(mapitatumaco);

        var marker = L.marker([1.8039, -78.7801], {
            icon: photoIcon
        }).bindPopup(customPopup2, customOptions).addTo(mapitatumaco);

        var marker = L.marker([1.7991, -78.7898], {
            icon: photoIcon
        }).bindPopup(customPopup3, customOptions).addTo(mapitatumaco);
    </script>

    <!-- mapa Ipiales -->
    <script>
        var mapitaipiales = L.map('mapitaipiales').setView([0.8237, -77.6337], 14);
        L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: 'Datos &copy; <a href="#" target="">' + ' Prometeus</a> (<a href="" target="blank"></a>) | Gobernaci&oacute;n de Nari&ntilde;o <a href="https://sitio.narino.gov.co" target="blank">Systemworks</a> &copy; Sebasti&aacute;n  & Duv&aacute;n (<a href="#" target="blank">2023</a>)'
        }).addTo(mapitaipiales);
        var photoIcon = L.icon({
            iconUrl: 'img/marcador/photo.svg',
            iconSize: [38, 95],
            popupAnchor: [0, -15]
        });
        var customPopup1 = "<img src='img/marcador-detalles/ipiales/terminal-ipiales.jpg' alt='Terminal Ipiales'' width='200px'/><br/>Terminal Ipiales. Fuente: Prometeus S.A.S, imagen donada.";
        var customPopup2 = "<img src='img/marcador-detalles/ipiales/Plaza-mercado.jpg' alt='Plaza de Mercado'' width='200px'/><br/>Plaza de Mercado. Fuente: Prometeus S.A.S, imagen donada.";
        var customPopup3 = "<img src='img/marcador-detalles/ipiales/Gran-plaza.jpg' alt='Gran Plaza'' width='200px'/><br/>Catalina Estarda R. Fuente: Prometeus S.A.S, imagen donada.";

        var customOptions = {
            maxWidth: '200',
            className: 'custom'
        };
        var marker = L.marker([0.8276, -77.6310], {
            icon: photoIcon
        }).bindPopup(customPopup1, customOptions).addTo(mapitaipiales);

        var marker = L.marker([0.8248, -77.6261], {
            icon: photoIcon
        }).bindPopup(customPopup2, customOptions).addTo(mapitaipiales);

        var marker = L.marker([0.8300, -77.6382], {
            icon: photoIcon
        }).bindPopup(customPopup3, customOptions).addTo(mapitaipiales);
    </script>
</body>
</html>