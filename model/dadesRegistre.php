<?php

    require __DIR__ . "/connectaBD.php";                     //connectem la pàgina a la BD abans de mostrar el formulari al navegador

    $nombre = "";
    $apellido1 = "";
    $apellido2 = "";
    $email = "";
    $username = "";
    $password = "";
    $adreca = "";
    $poblacio = "";
    $codiPostal = "";
    $fotoPerfil = "";

    if(!(empty($_POST["nombre"]))){ $nombre = $_POST["nombre"]; /*echo $nombre;*/ }
    if(!(empty($_POST["apellido1"]))){  $apellido1 = $_POST["apellido1"]; }
    if(!(empty($_POST["apellido2"]))) {$apellido2 = $_POST["apellido2"]; }
    if(!(empty($_POST["email"]))) {$email = $_POST["email"]; }
    if(!(empty($_POST["adreca"]))) {$adreca = $_POST["adreca"]; }
    if(!(empty($_POST["poblacio"]))) {$poblacio = $_POST["poblacio"]; }
    if(!empty($_POST["codiPostal"])) {$codiPostal = $_POST["codiPostal"]; }
    if(!(empty($_POST["username"]))) {$username = $_POST["username"]; }
    if(!(empty($_POST["password"]))) {$password = $_POST["password"]; }


/* ====================================================== INSERTAR FOTO ===================================================== */
    $filesAbsolutePath ='/home/TDIW/tdiw-d1/public_html/fotosPerfil/';
    if(isset($_FILES['foto']) && !empty($_FILES['foto'])) {
        $fotoPerfil = $_FILES['foto']['name'];
        $temp = $_FILES['foto']['tmp_name'];
        $photo_saved = $filesAbsolutePath.$fotoPerfil;
        move_uploaded_file($temp, $photo_saved);
    }

/* ======================================================================================================================= */

    $passwordHashed = password_hash($password, PASSWORD_DEFAULT);

    $connexio = connectaBD();
    $query = "INSERT INTO Usuari (Nom_Usuari, Cognom1, Cognom2, Email, Adreça, Poblacio, Codi_Postal, usuari, password, fotoPerfil) VALUES (:nombre, :apellido1, :apellido2, :email, :adreca, :poblacio, :codiPostal, :username, :password, :fP)";
    $stmt = $connexio->prepare($query);

    $stmt->bindValue(':nombre', $nombre);
    $stmt->bindValue(':apellido1', $apellido1);
    $stmt->bindValue(':apellido2', $apellido2);
    $stmt->bindValue(':email', $email);
    $stmt->bindValue(':adreca', $adreca);
    $stmt->bindValue(':poblacio', $poblacio);
    $stmt->bindValue(':codiPostal', $codiPostal);
    $stmt->bindValue(':username', $username);
    $stmt->bindValue(':password', $passwordHashed);
    $stmt->bindValue(':fP', $fotoPerfil);


    if($stmt->execute()){
        header('Location: /index.php?accio=login');
    }

?>