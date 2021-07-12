<header id="topBar">
    <div style="order: 0; flex-grow: 1"> <img src="imatges/phone.gif" width="14" height="14" /> (+34) 659 833 452 </div>
    <div style="order: 1; flex-grow: 1"> <a href="mailto: labotigabonasort@info.org?Subject=Botiga Info" class="link"> <img src="imatges/correo.gif" width="14" height="10.69" /> labotigabonasort@info.org</a> </div>
    <div style="order: 2; flex-grow: 1" onclick="casillaNoDisponible()"> <img src="imatges/pin.gif" width="11.21" height="14" /> España </div>
    <div style="order: 3; flex-grow: 1" onclick="casillaNoDisponible()"> <img src="imatges/garantia.gif" width="12.23" height="14" /> Garantia </div>
    <div style="order: 4; flex-grow: 1" onclick="casillaNoDisponible()"> <img src="imatges/pago.gif" width="18" height="12" /> Pago </div>
    <div style="order: 5; flex-grow: 1" onclick="casillaNoDisponible()"> <img src="imatges/entrega.gif" width="18" height="11.75"> Entrega  </div>
    <div style="order: 6; flex-grow: 1">
        <nav id="menuUsuari">
            <a href="../index.php?accio=login" class="link" >
                <img src="imatges/login.gif" height="14" width="14" />
                <?php
                echo $us;
                if(empty($_SESSION['user_id'])){ ?>
                    <ul>
                        <li class="liMenu"> <a href="../index.php?accio=login"> Iniciar Sesión </a> </li>
                    </ul>
                <?php }
                else { ?>
                    <ul>
                        <li class="liMenu"> <a href="../index.php?accio=login"> Mi cuenta </a> </li>
                        <li class="liMenu"> <a href="../index.php?accio=misCompras"> Mis compras </a> </li>
                        <li class="liMenu"> <a href = "../index.php?accio=logout"> Cerrar Sesión </a> </li>
                    </ul>
                <?php }
                ?>
            </a>
        </nav>
    </div>

</header>

<section id="subHeader">
    <nav role="navigation">
        <div id="botoMenu">
            <input type="checkbox" />
            <!-- Actuen com a logo per a la hamburguesa-->
            <span></span>
            <span></span>
            <span></span>
            <ul id="menuBurguerMainPage" style="z-index: 100">

                <?php foreach($categoria as $nomCat){ ?>
                    <li onclick="selectCat('<?php echo $nomCat["ID_Categoria"]?>')" style="text-indent: 20px; cursor: pointer;" id="botoDesplegable">
                        <?php
                        $categoria = htmlentities($nomCat['Nom_Categoria'], ENT_QUOTES | ENT_HTML5, 'UTF-8');
                        echo $categoria;?>
                    </li>
                <?php } ?>
                </a>
            </ul>
        </div>
    </nav>
    <div style="order: 0; flex-grow: 1"> <a href="index.php"><img src="imatges/logo_botiga.png" id="logo"/> </a> </div>
    <form method="GET" style="order: 1; flex-grow: 1"> <div class = "box"> <div class="buscador"><span class="icon"><i class="fa fa-search"></i></span>
                <input type="search" name="cerca" id="search" placeholder="Búsqueda"/></div>
        </div>
    </form>
    <div style="margin-left: 20%" style="order: 2; flex-grow: 1">
        <a href="../index.php?accio=carro" >

            <img src="imatges/logo_carro.png" heigth="35" width="35"/>
            <div data-count="<?php echo $_SESSION['q_productes'] ?>" id="carrito"></div>
        </a>
    </div>
</section>
