<?php
$consulta = $connexio->prepare("SELECT Nom_Usuari, Cognom1, Cognom2, Email, Adreça, Poblacio, Codi_Postal, usuari, fotoPerfil, id FROM `Usuari` WHERE usuari=:username");
$consulta->bindValue(':username', $_SESSION['user_id']);
$consulta->execute();
$dades = $consulta->fetchAll(PDO::FETCH_ASSOC);