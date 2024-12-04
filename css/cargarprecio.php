<?php
        require_once "controllers/curl.controller.php";

        //Url principal
        $path= "http://agroticnarino.com.co/";
        $pathaux= "http://agroticnarino.com.co/tienda?";
        $pathaux2 = "http://agroticnarino.com.co/select-city";

        
        



        //--------Traemos el total de productos del municipio seleccionado
        $url = CurlController::api()."productos_dpto_narino";
        $method = "GET";
        $fields = array();
        $header = array();
        $totalProducts = CurlController::request($url, $method, $fields, $header)->results;
  
       foreach ($totalProducts as $key => $value){
           //print_r($value);
       }

