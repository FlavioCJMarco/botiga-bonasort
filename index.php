<?php
    session_start();

    if(empty($_SESSION['q_productes'])) {
        $_SESSION['q_productes'] = 0;
    }

    if(empty($_SESSION['user_id'])){
        $us = 'Registro/Login';
    }else{
        $us = $_SESSION['user_id'];
    }
    if(empty($_GET['accio'])){
        $accio = 'none';
    }else{
        $accio_completa = $_GET['accio'];
        $accio = explode('/', $accio_completa);
    }

    switch ($accio[0]){
        case 'venta':
            $categoria = $accio[1];
            include __DIR__.'/recurs_ventaProductes.php';
            break;
        case 'detall':
            $id_producte = $accio[1];
            $categoria = $accio[2];
            include __DIR__.'/recurs_detallProductes.php';
            break;
        case 'login':
            if(empty($_SESSION['user_id'])) {
                include __DIR__ . '/recurs_login.php';
            }else{
                include __DIR__ . '/recurs_pagUsuari.php';
            }
            break;
        case 'carro':
            include __DIR__.'/recurs_carro.php';
            break;
        case 'registre':
            include __DIR__.'/recurs_register.php';
            break;
        case 'logout':
            include __DIR__. '/recurs_logout.php';
            break;
        case 'actCarro':
            switch ($accio[1]){
                case 'afegir':
                    if(empty($_SESSION['productes_carro'])) {
                        $_SESSION['productes_carro'] = "";
                    }
                    $_SESSION['productes_carro'] = str_pad($_SESSION['productes_carro'] , strlen($_SESSION['productes_carro']) + strlen($accio[2]), $accio[2], STR_PAD_RIGHT);
                    $_SESSION['productes_carro'] = str_pad($_SESSION['productes_carro'], strlen($_SESSION['productes_carro']) + 1, '/');
                    $_SESSION['q_productes']++;
                    break;
                case 'eliminar':
                    $SESSIO_COMPLETA = $_SESSION['productes_carro'];
                    $SESSIO_COMPLETA = explode('/', $SESSIO_COMPLETA);
                    $i=0;
                    $indexBorrar = -1;
                    while(($i < sizeof($SESSIO_COMPLETA)-1) && $indexBorrar == -1){
                        if($accio[2] == $SESSIO_COMPLETA[$i]){
                            $indexBorrar = $i;
                        }
                        $i++;
                    }
                    $i=0;
                    $_SESSION['productes_carro'] = ''; 
                    while($i < sizeof($SESSIO_COMPLETA)-1){
                        if($i != $indexBorrar){
                            $_SESSION['productes_carro'] = str_pad($_SESSION['productes_carro'] , strlen($_SESSION['productes_carro']) + strlen($SESSIO_COMPLETA[$i]), $SESSIO_COMPLETA[$i], STR_PAD_RIGHT);
                            $_SESSION['productes_carro'] = str_pad($_SESSION['productes_carro'], strlen($_SESSION['productes_carro']) + 1, '/');
                        }
                        $i++;
                    }
                    $_SESSION['q_productes']--;
                    break;
                case 'eliminarProducte':
                    $_SESSION['q_productes'] = $_SESSION['q_productes'] - $accio[3];
                    $contador = 0;
                    while($contador < $accio[3]) {
                        $SESSIO_COMPLETA = $_SESSION['productes_carro'];
                        $SESSIO_COMPLETA = explode('/', $SESSIO_COMPLETA);
                        $i = 0;
                        $indexBorrar = -1;
                        while (($i < sizeof($SESSIO_COMPLETA) - 1) && $indexBorrar == -1) {             //trobem l'índex on es troba el producte que volem eliminar
                            if ($accio[2] == $SESSIO_COMPLETA[$i]) {
                                $indexBorrar = $i;
                            }
                            $i++;
                        }
                        $i = 0;
                        $_SESSION['productes_carro'] = '';
                        while ($i < sizeof($SESSIO_COMPLETA) - 1) {
                            if ($i != $indexBorrar) {
                                $_SESSION['productes_carro'] = str_pad($_SESSION['productes_carro'], strlen($_SESSION['productes_carro']) + strlen($SESSIO_COMPLETA[$i]), $SESSIO_COMPLETA[$i], STR_PAD_RIGHT);
                                $_SESSION['productes_carro'] = str_pad($_SESSION['productes_carro'], strlen($_SESSION['productes_carro']) + 1, '/');
                            }
                            $i++;
                        }
                        $contador++;
                    }
            }
            break;
        case 'finalitzarComanda':
            include __DIR__. '/recurs_finalitzarComanda.php';
            break;
        case 'buidarCarro':
            $_SESSION['productes_carro'] = '';
            $_SESSION['q_productes'] = 0;
            include __DIR__ . '/recurs_carro.php';
            break;
        case 'misCompras':
            include __DIR__ .'/recurs_misCompras.php';
            break;
        default:
            include __DIR__ . '/recurs_paginaPrincipal.php';
            break;
    }
?>
