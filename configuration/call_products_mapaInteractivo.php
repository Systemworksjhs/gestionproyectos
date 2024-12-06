<?php
    $sqlshowmunicipality2 = "SELECT * FROM initiatives ORDER  BY name_initiative";
    $resultOne2 = $mysqli->query($sqlshowmunicipality2) or die($mysqli->error); 
    while($showregistre2 = $resultOne2->fetch_assoc()) { ?>
            <option value="<?php echo $showregistre2['id_initiatives'];?>"><?php echo $showregistre2['name_initiative'];?></option>   
        <?php
    }
?>