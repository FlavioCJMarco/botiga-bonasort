<?php

require_once __DIR__.'/../model/connectaBD.php';

$id = "";
$connexio = connectaBD();
$nom_usuari = $_SESSION['user_id'];

/* ============================== OBTENIM ID ASSOCIAT AL NOM D'USUARI QUE HA INICIAT LA SESSIÓ ============================= */

$consulta = $connexio->prepare("SELECT id FROM `Usuari` WHERE usuari=:nomusuari");
$consulta->bindValue(':nomusuari', $nom_usuari);
$consulta->execute();
$dades = $consulta->fetchAll(PDO::FETCH_ASSOC);

/* ========================================================================================================================= */

$id = $dades[0]['id'];

/* ==================================== OBTENIM TOTES LES FACTURES DE L'USUARI EN QÜESTIÓ ================================== */

$query2 = $connexio->prepare("SELECT * FROM `Factura` WHERE ID_Usuari=:id_usuari");
$query2->bindValue(':id_usuari', $id);
$query2->execute();
$factures = $query2->fetchAll(PDO::FETCH_ASSOC);

/* ========================================================================================================================= */
