<?php
    if(isset($_GET["id"])){
        $id_search = $_GET["id"];
        $Categoria = $_GET["Categoria"];

        //$sql = "select * from ".self::$tablename." where name like '%$q%'";
        require 'conection.php';
        //$sql="SELECT * FROM proyectos WHERE title='$id_search' AND (category LIKE '%$Categoria%')";
        $sql="SELECT * FROM proyectos WHERE (title LIKE '%$id_search%') AND (category = '$Categoria')";
        $resultProjects = $mysqli->query($sql) or die($mysqli->error); ?>
        <div class="row rounded wow zoomIn pt-2">
            <h4 class="text-color-primary text-center">Resultado de la búsqueda</h4>
        </div>
        <?php
            //Resultado búsqueda de projectos
            $contProjects=0;
            while($showProjects = $resultProjects->fetch_assoc()) { 
                $contProjects=1;
                ?>
                <div class="d-flex rounded overflow-hidden bg-gray mb-0 p-1">
                    <img class="img-fluid img-blog-details" src="admin/uploads/proyectos/<?php echo $showProjects['imagen'];?>" style="width: 100px; height: 100px; object-fit: cover;" alt="">
                    <a href="proyectos-detalles?id=<?php echo $showProjects['id_proyecto'];?>&categoria=<?php echo $Categoria;?>" 
                        class="h5 fw-semi-bold d-flex align-items-center bg-gray px-3 mb-0"><?php echo $showProjects['title'];?>
                    </a>
                </div>
                <?php
            }
        if($contProjects==0){
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
