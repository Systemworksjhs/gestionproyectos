<?php
    if(isset($_GET["id"])){
        $id_user=0;
        session_start();
        if(isset($_SESSION["id"])){
            $id_user = $_SESSION['id'];
        }
        require 'conection.php';
        //Actualizar conteo de likes de la federación
        $idFederation = $_GET["id"];
        $sql="SELECT * FROM `federation` WHERE (id_federation=$idFederation) LIMIT 1";
        $resultselected = $mysqli->query($sql) or die($mysqli->error);
        while($showNews = $resultselected->fetch_assoc()) { 
            $contnew = $showNews['count'];
            $contviews = $showNews['views'];
        }
        $contnew ++;
        $sqlTwo = "UPDATE `federation` SET `count` = $contnew WHERE `federation`.`id_federation` = $idFederation;";
        mysqli_query($mysqli, $sqlTwo);
        
        //Actualizar conteo de likes del usuario siempre que se encuentre registrado
        if($id_user>0){
            $sqllikes="SELECT id_user, likes FROM `usuarios` WHERE (id_user=$id_user) LIMIT 1";
            $resultselected = $mysqli->query($sqllikes) or die($mysqli->error);
            while($showLikes = $resultselected->fetch_assoc()) { 
                $likes = $showLikes['likes'];
            }
            $likes ++;
            $sqlThree = "UPDATE `usuarios` SET `likes` = $likes WHERE `usuarios`.`id_user` = $id_user;";
            mysqli_query($mysqli, $sqlThree);
        }
        ?>
        <i class="fa fa-eye fa-1x text-color-primary">Total visitas: <?php echo $contviews;?></i>
        <li style="list-style: none;margin-left:15px">
            <i class="fa fa-heart text-danger"> 
                <span class="text-color-primary fa-1x ">Me gusta: <?php echo "$contnew ";?>
                </span>
            </i>
        </li>
        <?php
    }else{
        echo 
        '<script>
            window.location = "./";
        </script>';
    }
?>
