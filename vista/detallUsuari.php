
<!-- En clickar sobre el nombre del usuario en la página principal, nos redirige a una página generada por el código de este documento -->

<header class="titolsPagines" >
    <b> Perfil del usuario </b>
</header>

<section id="detallUsuariPage">
    <div>
        <?php $filesPublicPath ='../fotosPerfil/';?>
        <?php foreach ($dades as $fila) { ?>
            <form action="../controlador/controlador_cambiosPerfil.php" method="POST" enctype="multipart/form-data" onSubmit="return validarConfirmacion(this)">
                <div>
                    <div id="userProfilePic">
                        <img src="<?php echo $filesPublicPath.$fila['fotoPerfil']?>"/>
                        <h6> Si lo desea, cambie su foto de perfil... </h6>
                        <input type="file" name="foto" />
                    </div>

                    <input name="nomfoto" type="hidden" value="<?php echo $fila['fotoPerfil']; ?>" >

                    <hr />
                    <br />
                    <ul style="display: flex;flex-flow: column">
                        <li style="order: 0; flex-grow: 1"><label> <b> Nombre:</b> </label> <input name="nombre" type="text" class="dataBoxCP" value="<?php echo $fila['Nom_Usuari']; ?>" ></li>

                        <li style="order: 1; flex-grow: 1"><label>  <b> Apellido 1: </b> </label> <input name="apellido1" type="text" class="dataBoxCP" value="<?php echo $fila['Cognom1']; ?>" ></li>

                        <li style="order: 2; flex-grow: 1"><label> <b> Apellido 2: </b>  </label><input name="apellido2" type="text" class="dataBoxCP" value="<?php echo $fila['Cognom2']; ?>" ></li>

                        <li style="order: 3; flex-grow: 1"><label> <b> Correo Electrónico: </b> </label> <input name="email" type="email" class="dataBoxCP"  value="<?php echo $fila['Email']; ?>" ></li>

                        <li style="order: 4; flex-grow: 1"><label> <b> Dirección: </b> </label> <input name="adreca" type="text" class="dataBoxCP" value="<?php echo $fila['Adreça']; ?>" ></li>

                        <li style="order: 5; flex-grow: 1"><label> <b> Población: </b> </label> <input name="poblacio" type="text" class="dataBoxCP" value="<?php echo $fila['Poblacio']; ?>" ></li>

                        <li style="order: 6; flex-grow: 1"><label> <b> Código Postal: </b> </label> <input name="codiPostal" type="text" class="dataBoxCP" value="<?php echo $fila['Codi_Postal']; ?>" ></li>

                        <li style="order: 7; flex-grow: 1"><label> <b> Usuario: </b> </label> <input name="usuari" type="text" class="dataBoxCP"  value="<?php echo $fila['usuari'];?>" ></li>

                        <span style="order: 8; flex-grow: 1; margin-top: 10px; width: 200px; align-self: center" class="boton1" onclick="showCanvi()"> Cambiar Contraseña </span>
                    </ul>

                    <br>
                    <br>
                    <div id="#canviContrasenya" style="display: none">
                        <br />

                        <label style="font-family: 'Microsoft JhengHei Light'"> <b> Contraseña: </b> </label> <input name="password" class="dataBoxCP" type="password">
                        <br />

                        <br />
                        <label style="font-family: 'Microsoft JhengHei Light'"> <b> Confirmación Contraseña: </b> </label> <input name="password2" class="dataBoxCP" type="password">
                        <br />

                        <br />
                    </div>
                    <input type="hidden" id="#boolContrasenya" name="boolContrasenya" value="NO">
                    <div>
                        <input type="submit" id="guardarCambios" name="GuardarCambios" class="boton1" value="Guardar Cambios">
                        <span></span>
                        <input type="reset" class="boton1" value="Cancelar">
                    </div>
                    <br />

                </div>
            </form>
        <?php } ?>
    </div>
</section>