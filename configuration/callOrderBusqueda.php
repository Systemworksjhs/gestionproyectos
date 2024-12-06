<?php
    if(isset($_GET["ids"])){
        $id_orders = strtoupper($_GET["ids"]);
        require 'conection.php';
        $sql="SELECT * FROM orders WHERE referenceCode='$id_orders' LIMIT 1";
        $resultOrders = $mysqli->query($sql) or die($mysqli->error); ?>
        <div class="row rounded wow zoomIn pt-2">
            <h4 class="sub-title3-main-agrotic text-center">Resultado de la búsqueda</h4>
        </div>
        <?php
            //Resultado búsqueda de orden
            $contorders=0;
            while($showOrders = $resultOrders->fetch_assoc()) { 
                $status             = $showOrders['status'];
                $id_municipality    = $showOrders['id_municipality'];
                $date_created_order = $showOrders['date_created_order'];
                $contorders=1;
            }
        if($contorders==1){
            if($id_municipality==28){$id_municipality="Ipiales";}
            if($id_municipality==64){$id_municipality="Pasto";}
            if($id_municipality==61){$id_municipality="Tumaco";}
        ?>
        <div class="p-3">
            <p class="text-color-primary"><strong>Estado orden: </strong> <?php echo $status;?></p>
            <p class="text-color-primary"><strong>Fecha de pedido: </strong> <?php echo $date_created_order;?></p>
            <p class="text-color-primary"><strong>Municipio: </strong> <?php echo $id_municipality;?></p>
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
