<?php

    $nombre = $apellido1 = $apellido2 = $email = $codiPostal = $username = $password = "";
    $error_nombre = $error_apellido1 = $error_apellido2 = $error_email = $error_codiPostal = $error_username = $error_password = "";

    if(empty($_POST["nombre"]) || !(filter_var($_POST["nombre"], FILTER_DEFAULT))){
        $error_nombre = "Introduzca su nombre por favor";
    }
    else{ $nombre = $_POST["nombre"]; }

    if(empty($_POST["apellido1"]) or !(filter_var($_POST["apellido1"], FILTER_DEFAULT))){
        $error_apellido1 = "Introduzca su primer apellido por favor";
    }
    else{ $apellido1 = $_POST["apellido1"]; }

    if(empty($_POST["apellido2"]) || !(filter_var($_POST["apellido2"], FILTER_DEFAULT))){
        $error_apellido2 = "Introduzca su segundo apellido por favor";
    }
    else{ $apellido2 = $_POST["apellido2"]; }

    if(empty($_POST["email"]) || (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL))){
        $error_email = "Introduzca su correo electrónico por favor";
    }
    else{ $email = $_POST["email"];}

    if(empty($_POST["codiPostal"]) || !(filter_var($_POST["codiPostal"], FILTER_VALIDATE_INT))){
        $error_codiPostal = "Introduzca su código postal por favor";
    }
    else{ $codiPostal = $_POST["codiPostal"];}

    if(empty($_POST["username"]) || !(filter_var($_POST["username"], FILTER_DEFAULT))){
        $error_username = "Introduzca un nombre de usuario por favor";
    }
    else{ $username = $_POST["username"]; }

    if(empty($_POST["password"]) || !(filter_var($_POST["password"], FILTER_DEFAULT))){
        $error_password = "Introduzca un password para su cuenta por favor";
    }
    else{ $password = $_POST["password"]; }


?>