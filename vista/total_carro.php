<div id="totalMiCarro">
    <h2> <b> Total: </b> </h2> <h3 id="#TOTAL" style="display: inline"> <?php echo $total; ?> </h3><h3 style="display: inline"> € </h3>
</div>

<div  class="boton1" style="width: 310px; margin-left: auto; margin-right: auto; margin-bottom: 5px; text-align: center" >
    <a <?php
    if(!empty($_SESSION['user_id'])){
        echo 'href="index.php?accio=finalitzarComanda/"';
    }
    else{
        echo 'href="index.php?accio=login/"';
    }
    ?>><?php
        if(!empty($_SESSION['user_id'])){
            echo 'Finalizar Pedido';
        }
        else{
            echo 'Inicia sesión para finalizar el pedido';
        }
        ?>
    </a>
</div>
