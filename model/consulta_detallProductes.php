<?php
$consulta = $connexio->prepare("SELECT ID_Producte, Nom_Producte, ID_Categoria, Descripcio, Preu, Imagen FROM `Productes` WHERE ID_Producte=:producte");
$consulta->bindValue(':producte', $id_producte);
$consulta->execute();
$producte = $consulta->fetchAll(PDO::FETCH_ASSOC);

foreach($producte as $fila){
    $ID_categoria = $fila['ID_Categoria'];
}

$consulta1 = $connexio->prepare("SELECT Nom_Categoria FROM `Categoria` WHERE ID_Categoria=:cat");
$consulta1->bindValue(':cat', $ID_categoria);
$consulta1->execute();
$categ= $consulta1->fetchAll(PDO::FETCH_ASSOC);

foreach($categ as $fila){
    $categoria = $fila['Nom_Categoria'];
}

?>