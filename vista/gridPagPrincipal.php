<div>

    <header class="titolsPagines" >
        <b> Productos Destacados </b>
    </header>

    <div id="gridPagPrincipal">
        <div style="grid-area: img1">
            <?php
             $randProducte1 = randProduct();
            ?>
            <img onclick="selectProd('<?php echo $randProducte1["ID_Producte"];?>')" src="<?php echo $randProducte1['Imagen']?>" class="img_grid" />
            <div class="flex-gridPagPrincipal">
                <div> <h5> <?php echo $randProducte1['Nom_Producte'] ?> </h5> </div>
                <br />
                <div> <h6> <?php echo $randProducte1['Preu'] ?>€ </h6> </div>
            </div>
        </div>

        <div style="grid-area: img2">
            <?php
            $randProducte2 = randProduct();
            ?>
            <img onclick="selectProd('<?php echo $randProducte2["ID_Producte"];?>')" src="<?php echo $randProducte2['Imagen']?>" class="img_grid" />
            <div class="flex-gridPagPrincipal">
                <div> <h5> <?php echo $randProducte2['Nom_Producte'] ?> </h5> </div>
                <br />
                <div> <h6> <?php echo $randProducte2['Preu'] ?>€ </h6> </div>
            </div>
        </div>

        <div style="grid-area: img3">
            <?php
            $randProducte3 = randProduct();
            ?>
            <img onclick="selectProd('<?php echo $randProducte3["ID_Producte"];?>')" src="<?php echo $randProducte3['Imagen']?>" class="img_grid" />
            <div class="flex-gridPagPrincipal">
                <div> <h5> <?php echo $randProducte3['Nom_Producte'] ?> </h5> </div>
                <br />
                <div> <h6> <?php echo $randProducte3['Preu'] ?>€ </h6> </div>
            </div>
        </div>

        <div style="grid-area: img4">
            <?php
            $randProducte4 = randProduct();
            ?>
            <img onclick="selectProd('<?php echo $randProducte4["ID_Producte"];?>')" src="<?php echo $randProducte4['Imagen']?>" class="img_grid" />
            <div class="flex-gridPagPrincipal">
                <div> <h5> <?php echo $randProducte4['Nom_Producte'] ?> </h5> </div>
                <br />
                <div> <h6> <?php echo $randProducte4['Preu'] ?>€ </h6> </div>
            </div>
        </div>

        <div style="grid-area: img5">
            <?php
            $randProducte5 = randProduct();
            ?>
            <img onclick="selectProd('<?php echo $randProducte5["ID_Producte"];?>')" src="<?php echo $randProducte5['Imagen']?>" class="img_grid" />
            <div class="flex-gridPagPrincipal">
                <div> <h5> <?php echo $randProducte5['Nom_Producte'] ?> </h5> </div>
                <br />
                <div> <h6> <?php echo $randProducte5['Preu'] ?>€ </h6> </div>
            </div>
        </div>

        <div style="grid-area: img6">
            <?php
            $randProducte6 = randProduct();
            ?>
            <img onclick="selectProd('<?php echo $randProducte6["ID_Producte"];?>')" src="<?php echo $randProducte6['Imagen']?>" class="img_grid" />
            <div class="flex-gridPagPrincipal">
                <div> <h5> <?php echo $randProducte6['Nom_Producte'] ?> </h5> </div>
                <br />
                <div> <h6> <?php echo $randProducte6['Preu'] ?>€ </h6> </div>
            </div>
        </div>
    </div>
</div>