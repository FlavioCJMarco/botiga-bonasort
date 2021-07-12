<?php

    function randProduct()
    {
        $connexio = connectaBD();
        $consulta = $connexio->prepare("SELECT ID_Producte, Imagen, Nom_Producte, Preu FROM `Productes` ORDER BY RAND() LIMIT 1");
        $consulta->execute();
        $imatge = $consulta->fetch(PDO::FETCH_ASSOC);
        return $imatge;
    }

?>
