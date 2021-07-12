<?php

require_once __DIR__ ."/../model/connectaBD.php";

$valor = $_POST['cerca'];

if(!empty($valor))
{
  buscar($valor);
}

function buscar($nom_producte)
{
    $connexio = connectaBD();
    $consulta = $connexio->prepare("SELECT * FROM `Productes` WHERE Nom_Producte like '%' :producte '%'");
    $consulta->bindValue(':producte', $nom_producte);
    $consulta->execute();
    $producte = $consulta->fetchAll(PDO::FETCH_ASSOC);
    ?>
    <div class="container_flex">

    <?php foreach($producte as $fila){ ?>
        <div onclick="selectProd('<?php echo $fila["ID_Producte"];?>')" class="item_flex">
            <img class="image_overlay" src="<?php echo $fila['Imagen']?>">
            <div class="overlay">
                <div class="text_descripcio"> <?php echo $fila["Nom_Producte"];?> </div>
            </div>
        </div>
    <?php } ?>

    </div><?php
}
?>