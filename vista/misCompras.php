<div id="flexContainer_MiCarro">
    <?php
    $nProducto = 0;
    foreach ($factures as $fact) {?>
    <div id="grid_MiCarro">
        <div class="grid_caracteristiques_producteMiCarro">
            <ul>
                <li> <h4> <b> Fecha y hora: </b> </h4> <h5> <?php echo $fact['Fecha']; ?> </h5> </li>
                <li> <h4> <b> ID Factura: </b> </h4> <h5> <?php echo $fact['ID_Factura']; ?> </h5> </li>
                <li> <h4> <b> Productos: </b> </h4>
                    <h5> <ul>
                        <?php $productos = $fact['Nom_Productes'];
                        $prod = strtok($productos, ";");

                        while ($prod !== false) { ?>
                            <li> <?php echo $prod; ?> </li>
                            <?php $prod = strtok(";");
                        } ?>
                    </ul> </h5>
                </li>
                <li> <h4> <b> Nº Productos Total: </b> </h4> <h5> <?php echo $fact['Quantitat_Productes'].' unidades'; ?> </h5> </li>
                <li> <h4> <b> Precio Total: </b> </h4> <h5> <?php echo $fact['Preu_Total'].'€'; ?> </h5> </li>
            </ul>
         </div>
        <hr />
    </div>
    <?php } ?>
