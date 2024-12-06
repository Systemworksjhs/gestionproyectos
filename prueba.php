<?php
    session_start();

// Verificar si $_SESSION['listSC'] está definido antes de acceder a él

if (isset($_SESSION['listSC'])) {
    $listSC = $_SESSION['listSC'];
    $miObjeto = json_decode($_SESSION['listSC'], true);
    // Imprimir el contenido de $_SESSION['listSC']
    //echo $miObjeto;
    $primerObjeto = $miObjeto[0];
    echo $listSC;
    //echo '<pre>'; printf($miObjeto);echo '</pre>';
    echo '<pre>'; printf($listSC);echo '</pre>';
    if (isset($primerObjeto["product"])) {
        $productValue = $primerObjeto["product"];
        echo $productValue;
    } else {
        echo "El campo 'product' no está presente en la cadena JSON.";
    }

} else {
    echo "No existe variable SESSION listSC <br>";
}

if( isset($_SESSION['selectCity']) ){
    echo "selectCity: ".$_SESSION['selectCity']."<br>";
}else
{
    echo "No existe varialbe SESSION SelectCity <br>";
}




//$_SESSION['listSC']='[{"product":"5","nombrePres":"12 kg","gramaje":"12000","incrementPrice":"2.99","cantidad":"2"},{"product":"7","nombrePres":"500 g","gramaje":"500","incrementPrice":"2.06","cantidad":"3"}]';
//unset($_SESSION['listSC']);
?>