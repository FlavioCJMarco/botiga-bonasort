<?php
try{
    $consulta = $connexio->prepare("SELECT ID_Categoria, Nom_Categoria FROM `Categoria`");
    $consulta->execute();
    $categoria = $consulta->fetchAll(PDO::FETCH_ASSOC);
}catch(PDOException $e){
    echo "Error: " . $e->getMessage();
}