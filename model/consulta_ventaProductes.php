<?php
try{
    $connexio = connectaBD();
    $consulta_producte = $connexio->prepare("SELECT ID_Producte, Nom_Producte, Preu, Descripcio, Imagen FROM `Productes` WHERE ID_Categoria = :categoria");
    $consulta_producte->bindValue(':categoria', $categoria);
    $consulta_producte->execute();
    $producte = $consulta_producte->fetchAll(PDO::FETCH_ASSOC);

    $consulta_categoria = $connexio->prepare('SELECT Nom_Categoria FROM `Categoria` WHERE ID_Categoria = :categoria');
    $consulta_categoria->bindValue(':categoria', $categoria);
    $consulta_categoria->execute();
    $categoria = $consulta_categoria->fetchAll(PDO::FETCH_ASSOC);

}catch(PDOException $e){
    echo "Error: " . $e->getMessage();
}