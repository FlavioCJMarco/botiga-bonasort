<div>
    <?php foreach($categoria as $fila1){
        $categoria = htmlentities($fila1['Nom_Categoria'], ENT_QUOTES | ENT_HTML5, 'UTF-8');?>
        <h1 class="titolsPagines"><?php echo $categoria?></h1>

</div>
<div class="container_flex">

    <?php foreach($producte as $fila){ ?>
        <div onclick="selectProd('<?php echo $fila["ID_Producte"];?>','<?php echo $fila1["Nom_Categoria"];?>')" class="item_flex">
            <img class="image_overlay" src="<?php echo $fila['Imagen']?>">
            <div class="overlay">
                <div class="text_descripcio"> <?php echo $fila["Nom_Producte"];?> </div>
                <br />
                <div> <?php echo $fila["Preu"];?>€ </div>
            </div>
        </div>
    <?php } ?>
<?php } ?>
</div>