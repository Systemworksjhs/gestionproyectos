<?php
    if(isset($_GET["id"])){
        $id_pqrsf = strtoupper($_GET["id"]);
        require 'conection.php';
        $sql="SELECT * FROM pqrsfd WHERE codepqrsf='$id_pqrsf' LIMIT 1";
        $resultpqrsfd = $mysqli->query($sql) or die($mysqli->error); ?>
        <div class="row rounded wow zoomIn pt-2">
            <h4 class="text-color-primary text-center">Resultado de la búsqueda</h4>
        </div>
        <?php
            //Resultado búsqueda de pqrsf
            $contPqrs=0;
            while($showPqrsfd = $resultpqrsfd->fetch_assoc()) { 
                $tema           = $showPqrsfd['affair'];
                $fechaEnvio     = $showPqrsfd['dateReception'];
                $estadoPqrsd    = $showPqrsfd['status'];
                $mensajePqrsd   = $showPqrsfd['message'];
                $respuestaPqrsd    = $showPqrsfd['response'];
                $fechaRespuesta = $showPqrsfd['response_date'];
                $contPqrs=1;
            }
        if($contPqrs==1){
        ?>
        <div class="p-3">
            <p><strong>Tema: </strong> <?php echo $tema;?></p>
            <p><strong>Fecha de envio: </strong> <?php echo $fechaEnvio;?></p>
            <p><strong>Estado: </strong> <?php echo $estadoPqrsd;?></p><hr>
            <p><strong>Mensaje: </strong> <?php echo $mensajePqrsd;?></p>
            <p><strong>Respuesta: </strong> <?php echo $respuestaPqrsd;?></p><hr>
            <p><strong>Fecha respuesta: </strong> <?php echo $fechaRespuesta;?></p>
        </div>
        <?php
        }
        else{
            echo"
                <div class='text-color-primary text-center'>
                    <br>No se encontraron coincidencias...<br>
                </div>
                ";
        }
    }
    else{
        echo 
        '<script>
            window.location = "./";
        </script>';
    }
?>
