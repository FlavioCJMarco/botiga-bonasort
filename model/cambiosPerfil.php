<?php
session_start();
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
$boolcontrasenya = "";

$nombre = $_POST["nombre"];
$apellido1 = $_POST["apellido1"];
$apellido2 = $_POST["apellido2"];
$email = $_POST["email"];
$adreca = $_POST["adreca"];
$poblacio = $_POST["poblacio"];
$codiPostal = $_POST["codiPostal"];
$username = $_POST["usuari"];
$password = $_POST["password"];
$boolcontrasenya = $_POST["boolContrasenya"];

$usuariOriginal = $_SESSION['user_id'];



$connexio = connectaBD();

$fotoPerfil = $_POST['nomfoto'];

$filesAbsolutePath ='/home/TDIW/tdiw-d1/public_html/fotosPerfil/';
if(isset($_FILES['foto']) && !empty($_FILES['foto']['name'])) {
    $fotoPerfil = $_FILES['foto']['name'];
    $temp = $_FILES['foto']['tmp_name'];
    $photo_saved = $filesAbsolutePath.$fotoPerfil;
    move_uploaded_file($temp, $photo_saved);
}


if($boolcontrasenya == "SI"){
    $passwordHashed = password_hash($password, PASSWORD_DEFAULT);
    $query2 = "UPDATE `Usuari`
            SET Nom_Usuari = :nombre, Cognom1 = :apellido1, Cognom2 = :apellido2, Email = :email, Adreça = :adreca, Poblacio = :poblacio, Codi_Postal = :codiPostal, usuari = :username, password = :password, fotoPerfil = :fp
            WHERE usuari = :usuariOriginal";

    $stmt2 = $connexio->prepare($query2);

    $stmt2->bindValue(':nombre', $nombre);
    $stmt2->bindValue(':apellido1', $apellido1);
    $stmt2->bindValue(':apellido2', $apellido2);
    $stmt2->bindValue(':email', $email);
    $stmt2->bindValue(':adreca', $adreca);
    $stmt2->bindValue(':poblacio', $poblacio);
    $stmt2->bindValue(':codiPostal', $codiPostal);
    $stmt2->bindValue(':username', $username);
    $stmt2->bindValue(':password', $passwordHashed); //OJO
    $stmt2->bindValue(':usuariOriginal', $usuariOriginal);
    $stmt2->bindValue(':fp', $fotoPerfil);
}else{
    $query2 = "UPDATE `Usuari`
            SET Nom_Usuari = :nombre, Cognom1 = :apellido1, Cognom2 = :apellido2, Email = :email, Adreça = :adreca, Poblacio = :poblacio, Codi_Postal = :codiPostal, usuari = :username, fotoPerfil = :fp
            WHERE usuari = :usuariOriginal";

    $stmt2 = $connexio->prepare($query2);

    $stmt2->bindValue(':nombre', $nombre);
    $stmt2->bindValue(':apellido1', $apellido1);
    $stmt2->bindValue(':apellido2', $apellido2);
    $stmt2->bindValue(':email', $email);
    $stmt2->bindValue(':adreca', $adreca);
    $stmt2->bindValue(':poblacio', $poblacio);
    $stmt2->bindValue(':codiPostal', $codiPostal);
    $stmt2->bindValue(':username', $username);
    $stmt2->bindValue(':usuariOriginal', $usuariOriginal);
    $stmt2->bindValue(':fp', $fotoPerfil);
}


if($stmt2->execute()){
    $_SESSION['user_id'] = $username;
    header('Location: /index.php?accio=login');
}

?>



