<?php foreach($producte as $fila){ ?>

    <header>
        <i>
            <b>
                <h1 class="titolsPagines"> <?php echo $fila['Nom_Producte']; ?> </h1>
            </b>
        </i>
    </header>

    <section>
        <div class="barra_url"> <p>INICIO / TIENDA / <?php echo $categoria ?></p></div>
        <div class="detall_producte">
            <img width="200px" height="200px" src="<?php echo $fila['Imagen'] ?>" />

            <p> <?php echo $fila["Descripcio"]; ?> </p>

            <h3> Precio: <?php echo $fila["Preu"]; ?> € </h3>
            <h3> Unidades: </h3> <h4 id="#UNITATS<?php echo $id_producte;?>"><?php if(!empty($productes[$id_producte])){ echo $productes[$id_producte]; }else{echo 0;}?> </h4>
            <li id="bloc_augmentarUnitats">
                <button onclick="eliminarUnitatP(<?php echo $id_producte; ?>,<?php echo $fila['Preu'];?>)"> - </button>
                <button onclick="afegirUnitatP(<?php echo $id_producte; ?>,<?php echo $fila['Preu'];?>)"> + </button>

            </li>
            <button class="boton1" onclick="afegirProducte(<?php echo $id_producte; ?>)"> Afegir Producte </button>

            <div id="#AFEGIT"></div>
        </div>

    </section>

<?php } ?>