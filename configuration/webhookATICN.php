<?php
    require 'conection.php';
    require 'funcscopy.php';
    /* Leemos los datos proporcionados con los parametros post que envia wompi */
    $datos = [
        'referenceCode' => $_POST['referenceCode'],
        'status' => $_POST['status'],
    ];

    /* Guardamos la informacion en un archivo de registro registro_orders_agrotic.log*/
    file_put_contents(
    'registro_orders_agrotic.log',
    json_encode($datos) . PHP_EOL,
    FILE_APPEND
    );
    $referenceCode   = $_POST['referenceCode'];
    $referenceCode1  = $_POST['referenceCode'];
    $status     = $_POST['status'];
    /* Imprimimos las variables */
    echo "ide de compra: $referenceCode <br>";
    echo "status compra: $status <br>";
    /* actualizamos la base de datos  ------------------------------------> ver  archivo funcscopy linea 532*/
    if(webhook($referenceCode, $status, $referenceCode1)){
        echo" Registro actualizado con exito";
    } else {
        echo" Error al actualizar el registro de compra";
    }

?>