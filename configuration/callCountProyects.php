<?php
    if(isset($_GET["id"])){
        $id_user=0;
        session_start();
        if(isset($_SESSION["id"])){
            $id_user = $_SESSION['id'];
        }
        require 'conection.php';
        //Actualizar conteo de likes de la noticia
        $id_news = $_GET["id"];
        $sql="SELECT * FROM `proyectos` WHERE (id_proyecto=$id_news) LIMIT 1";
        $resultselected = $mysqli->query($sql) or die($mysqli->error);
        while($showNews = $resultselected->fetch_assoc()) { 
            $contnew    = $showNews['count'];
            $contviews  = $showNews['views'];
            $titleNew   = $showNews['title'];
        }
        $contnew ++;
        $sqlTwo = "UPDATE `proyectos` SET `count` = $contnew WHERE `proyectos`.`id_proyecto` = $id_news;";
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
            
            $sql_likesHistory="SELECT id_user, id_news, count_visited_link FROM `visited_news` WHERE (id_user=$id_user AND id_news=$id_news) LIMIT 1";
            $resultselectedHistory = $mysqli->query($sql_likesHistory) or die($mysqli->error);
            $postok=0;
            while($showLikesHistory = $resultselectedHistory->fetch_assoc()) { 
                $likesHistory = $showLikesHistory['count_visited_link'];
                $postok=1;
            }
            if($postok==0){
                $likesHistory=1;
                $sqlUpdateHistory ="INSERT INTO `visited_news`(`id_user`, `id_news`, `link`, `count_visited_link`) VALUES ($id_user,$id_news,'$titleNew',$likesHistory)";
                mysqli_query($mysqli, $sqlUpdateHistory);
            }else{
                $likesHistory ++;
                $sqlUpdateHistory = "UPDATE `visited_news` SET `count_visited_link` = $likesHistory, `link`='$titleNew' WHERE `visited_news`.`id_user` = $id_user AND `visited_news`.`id_news` = $id_news";
                mysqli_query($mysqli, $sqlUpdateHistory);
            }
            
        }
        ?>
        <i class="fa fa-eye fa-1x text-color-primary">Total visitas: <?php echo $contviews;?></i>
        <li style="list-style: none;margin-left:15px">
            <i class="fa fa-heart text-danger"> 
                <span class="text-color-primary fa-1x ">Me gusta: <?php echo "$contnew.";?>
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
