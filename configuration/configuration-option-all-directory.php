<?php
    $sqlall = "SELECT `municipality`.`id_municipality` as municipioId, `municipality`.`name_municipality` as Municipio, COUNT(`initiatives_municipalities`.`id_initiative`) AS Iniciatives 
    FROM `municipality` left join `initiatives_municipalities` on `initiatives_municipalities`.`cod_municipality` =  `municipality`.`id_municipality` 
    GROUP BY `municipality`.`id_municipality`, `municipality`.`name_municipality`";
    $resultall = $mysqli->query($sqlall) or die($mysqli->error); 
?>