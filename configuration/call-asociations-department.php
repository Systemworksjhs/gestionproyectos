<?php
    $sqlAsociationsDepartment = "SELECT * FROM associations";
    $resultOne3 = $mysqli->query($sqlAsociationsDepartment) or die($mysqli->error); 
    while($showregistr3 = $resultOne3->fetch_assoc()) { ?>
         <option value="<?php echo $showregistr3['id_asocciatios'];?>"><?php echo $showregistr3['name'];?></option>   
        <?php
    }
?>