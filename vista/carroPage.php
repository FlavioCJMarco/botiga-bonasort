
<div id="flexContainer_MiCarro">
    <?php foreach ($producte as $fila) { ?>
    <div class="grid_MiCarro" id="#gridMiCarro<?php echo $fila['ID_Producte']?>">
        <div id="eliminarProducto" > <button onclick="eliminarProducte(<?php echo $id_producte; ?>, <?php echo $fila['Preu'];?>)"> X </button> </div>
        <div class="grid_imatge_producteMiCarro">
            <img onclick="selectProd('<?php echo $fila["ID_Producte"];?>','<?php echo $categoria;?>')" src="<?php echo $fila['Imagen']; ?>" class="img_grid">
        </div>
        <div class="grid_caracteristiques_producteMiCarro">
            <ul>
                <li> <h4> <b> Producto </b> </h4> <h5> <?php echo $fila['Nom_Producte']; ?> </h5> </li>
                <li> <h4> <b> Precio </b> </h4> <h5> <?php echo $fila['Preu']; ?> € </h5> </li>
                <li> <h4> <b> Unidades </b> </h4> <h5 id="#UNITATS<?php echo $id_producte;?>"> <?php echo $productes[$id_producte]; ?> </h5> </li>
                <li> <h4> <b> Precio Total </b> </h4> <h5 id="#PREUTOTAL<?php echo $id_producte;?>"> <?php echo$productes[$id_producte]*$fila['Preu']; ?></h5><h5> €</h5> </li>
                <li id="bloc_augmentarUnitats" style="margin-top: 40px">
                    <button onclick="eliminarUnitat(<?php echo $id_producte; ?>,<?php echo $fila['Preu'];?>)"> - </button>
                    <button onclick="afegirUnitat(<?php echo $id_producte; ?>,<?php echo $fila['Preu'];?>)"> + </button>
                </li>
            </ul>
         </div>
    </div>
    <?php }
    $total += $productes[$id_producte]*$fila['Preu'];
    ?>


