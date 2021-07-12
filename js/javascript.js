

/* ================================   /vista/capçalera.php   ============================================== */

function selectCat(category){
    $(document).ready(function(){
        $.ajax({
            url: "index.php?accio=venta/"+category,
            success: function(result){ $("#PAGINA_MODIFICADA").html(result);}
        });
    });
}
function selectProd(producte,categoria){
    $(document).ready(function(){
        $.ajax({
            url: "index.php?accio=detall/"+producte+"/"+categoria,
            success: function(result){ $("#PAGINA_MODIFICADA").html(result);}
        });
    });
}

$(document).ready(function(e){
    $("#search").keyup(function(e) {
        var nom = $("#search").val();
        $.ajax({
            type: "post",
            url:"model/cerca.php",
            dataType:"html",
            data:"cerca="+nom,
            success: function(result)
            {
                $("#PAGINA_MODIFICADA").empty();
                $("#PAGINA_MODIFICADA").append(result);
            }
        });
    });
});

$(document).ready(function() {
    $menuDesplegable = $('#menuUsuari');
    $menuDesplegable.find('ul').find('li').stop();
    $menuDesplegable.find('ul').find('li').slideUp(1);


    $menuDesplegable.hover(function(){
        $(this).find('ul').find('li').stop();
        $(this).find('ul').find('li').slideDown();
    })

    $menuDesplegable.mouseleave(function(){
        $(this).find('ul').find('li').stop();
        $(this).find('ul').find('li').slideUp();
    })
});


/* ================================   /vista/carroPage.php   ============================================== */
function afegirUnitat(producte, preu) {
    document.getElementById('#UNITATS'+producte).innerHTML = parseInt(document.getElementById('#UNITATS'+producte).innerHTML, 10)+1;
    document.getElementById('#PREUTOTAL'+producte).innerHTML = parseInt(document.getElementById('#PREUTOTAL'+producte).innerHTML, 10)+preu;
    document.getElementById('#TOTAL').innerHTML = parseInt(document.getElementById('#TOTAL').innerHTML, 10)+preu;
    var unitats = document.getElementById('carrito').getAttribute('data-count');
    unitats++;
    document.getElementById('carrito').setAttribute('data-count', unitats);

    $(document).ready(function(){
        $.ajax({
            url: "index.php?accio=actCarro/afegir/"+producte,
            success: function(result){}
        });
    });
}

function eliminarUnitat(producte, preu) {
    if(document.getElementById('#UNITATS'+producte).innerHTML > 0){
        document.getElementById('#UNITATS'+producte).innerHTML = parseInt(document.getElementById('#UNITATS'+producte).innerHTML, 10)-1;
        document.getElementById('#PREUTOTAL'+producte).innerHTML = parseInt(document.getElementById('#PREUTOTAL'+producte).innerHTML, 10)-preu;
        document.getElementById('#TOTAL').innerHTML = parseInt(document.getElementById('#TOTAL').innerHTML, 10)-preu;
        var unitats = document.getElementById('carrito').getAttribute('data-count');
        unitats--;
        document.getElementById('carrito').setAttribute('data-count', unitats);

        $(document).ready(function(){
            $.ajax({
                url: "index.php?accio=actCarro/eliminar/"+producte,
                success: function(result){}
            });
        });
    }else{
        alert('No es posible encargar un número de unidades menor a 0.');
    }

}

function eliminarProducte(producte, preu) {
    document.getElementById('#TOTAL').innerHTML = parseInt(document.getElementById('#TOTAL').innerHTML, 10)-parseInt(document.getElementById('#PREUTOTAL'+producte).innerHTML);
    var unitats_prod = document.getElementById('#UNITATS'+producte).innerHTML;
    document.getElementById('#gridMiCarro'+producte).innerHTML = '';
    var unitats = document.getElementById('carrito').getAttribute('data-count');
    unitats = unitats - parseInt(unitats_prod, 10);
    document.getElementById('carrito').setAttribute('data-count', unitats);
    $(document).ready(function(){
        $.ajax({
            url: "index.php?accio=actCarro/eliminarProducte/"+producte+"/"+unitats_prod+"/"+preu,
            success: function(result){}
        });
    });
}

/* ================================   /vista/detallProductes.php   ============================================== */
function espera() {
    document.getElementById('#AFEGIT').innerHTML = '';
}

function afegirUnitatP(producte, preu) {
    document.getElementById('#UNITATS'+producte).innerHTML = parseInt(document.getElementById('#UNITATS'+producte).innerHTML, 10)+1;
}

function afegirProducte(producte){
    var unitats = document.getElementById('carrito').getAttribute('data-count');
    for(var i = 0; i < parseInt(document.getElementById('#UNITATS'+producte).innerHTML, 10); i++)
    {
        $(document).ready(function(){
            $.ajax({
                url: "index.php?accio=actCarro/afegir/"+producte,
                success: function(result){}
            });
        });
        unitats++;
        document.getElementById('carrito').setAttribute('data-count', unitats);
    }
    document.getElementById('#AFEGIT').innerHTML = 'Añadiendo producto...';
    setTimeout(espera, 1000);
    document.getElementById('#UNITATS'+producte).innerHTML = 0;
}

function eliminarUnitatP(producte, preu) {
    if(document.getElementById('#UNITATS'+producte).innerHTML > 0){
        document.getElementById('#UNITATS'+producte).innerHTML = parseInt(document.getElementById('#UNITATS'+producte).innerHTML, 10)-1;
    }else{
        alert('No es posible encargar un número de unidades menor a 0.');
    }
}

/* ================================   /vista/detallUsuari.php   ============================================== */

function validarConfirmacion(form) {
    password = form.password.value;
    confirmacio = form.password2.value;

    if(document.getElementById('#boolContrasenya').getAttribute('value')=='SI' && (password=="" || confirmacio=="")){
        alert ("\nDebes introducir una contraseña.")
        return false;
    }

    if (password != confirmacio) {
        alert ("\nLas contraseñas no coinciden. Por favor, introduzca la contraseña de nuevo")
        return false;
    }
}

function showCanvi() {
    document.getElementById('#boolContrasenya').setAttribute('value', 'SI');
    document.getElementById('#canviContrasenya').style.display = "block";
    return false;
}


/* ================================   /vista/venta_productes.php   =============================================== */

// S'utilitza funció selectProd();

/* ================================   /vista/slide.html   =============================================== */

function casillaNoDisponible(){
    alert("Ups, esta casilla está siendo desarrollada. Disculpe las molestias :)");
}

function plusDivs(n) {
    showDivs(slideIndex += n);
}

function currentDiv(n) {
    showDivs(slideIndex = n);
}

function showDivs(n) {
    var i;
    var x = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("cercle");
    if (n > x.length) {slideIndex = 1}
    if (n < 1) {slideIndex = x.length}
    for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";
    }
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" w3-white", "");
    }
    x[slideIndex-1].style.display = "block";
    dots[slideIndex-1].className += " w3-white";
}
