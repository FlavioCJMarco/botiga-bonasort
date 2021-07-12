<?php
    $total = 0;
    if(!empty($_SESSION['productes_carro'])){
        $SESSIO_COMPLETA = $_SESSION['productes_carro'];
        $SESSIO_COMPLETA = explode('/', $SESSIO_COMPLETA);
        $i=0;
        $max = 0;
        while($i < sizeof($SESSIO_COMPLETA)-1){
            if($max < $SESSIO_COMPLETA[$i]){
                $max = $SESSIO_COMPLETA[$i];
            }
            if(empty($productes[$SESSIO_COMPLETA[$i]])){
                $productes[$SESSIO_COMPLETA[$i]] = 1;
            }else{
                $productes[$SESSIO_COMPLETA[$i]]++;
            }
            $i++;
        }
    }
include __DIR__.'/controlador/controlador_detallProductes.php';
    ?>

