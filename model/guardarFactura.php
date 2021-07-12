<?php

//===== CALCUL ID FACTURA MAX ====== --> Función para el cálculo de un índice autoincrementable (puesto que phpMyAdmin no nos permitía introducir este campo). Nos sirve como identificador de la factura ($id_factura)

$consulta = $connexio->prepare("SELECT ID_Factura FROM `Factura`");
$consulta->execute();
$dades = $consulta->fetchAll(PDO::FETCH_ASSOC);
$max=0;
foreach ($dades as $fila) {
    if($max<$fila['ID_Factura']){
        $max = $fila['ID_Factura'];
    }
}
$id_factura = $max+1;
$nom_usuari = $_SESSION['user_id'];

$consulta = $connexio->prepare("SELECT id FROM `Usuari` WHERE usuari=:nomusuari");
$consulta->bindValue(':nomusuari', $nom_usuari);
$consulta->execute();
$dades = $consulta->fetchAll(PDO::FETCH_ASSOC);

foreach ($dades as $fila){
    $id_usuari = $fila['id'];
}
$nom_productes = "";
$preu_total = 0;
$q_productes = 0;
$datahora="";
$date = getdate();
$datahora = $date['mday'].'/'.$date['mon'].'/'.$date['year']."  ".$date['hours'].':'.$date['minutes'].':'.$date['seconds'];


if(!empty($_SESSION['productes_carro'])){
    //======  CODI PER AFEGIR LA FACTURA  ======
    $consulta = $connexio->prepare("INSERT INTO `Factura` (ID_Factura, ID_Usuari, Nom_Productes, Preu_Total, Quantitat_Productes, Fecha) VALUES (:idFactura, :idUsuari, :nom_productes, :preu_total, :q_productes, :f_data)");
    $consulta->bindValue(':idFactura', $id_factura);
    $consulta->bindValue(':idUsuari', $id_usuari);
    $consulta->bindValue(':nom_productes', $nom_productes);
    $consulta->bindValue(':preu_total', $preu_total);
    $consulta->bindValue(':q_productes', $q_productes);
    $consulta->bindValue(':f_data', $datahora);
    $consulta->execute();

    $SESSIO_COMPLETA = $_SESSION['productes_carro'];                //formato: id1/id2/id3...
    $SESSIO_COMPLETA = explode('/', $SESSIO_COMPLETA);
    $i=0;
    $max = 0;
    while($i < sizeof($SESSIO_COMPLETA)-1){
        if($max < $SESSIO_COMPLETA[$i]){
            $max = $SESSIO_COMPLETA[$i];
        }
        if(empty($productes[$SESSIO_COMPLETA[$i]])){
            $productes[$SESSIO_COMPLETA[$i]] = 1;
        }else{
            $productes[$SESSIO_COMPLETA[$i]]++;
        }
        $i++;
    }

    $i=0;

    while($i < $max + 1){
        if(!empty($productes[$i])){
            $id_producte = $i;
            /* =========================== CODI PER A FER LA CONSULTA DEL PRODUCTE ============================= */

            $consulta = $connexio->prepare("SELECT Nom_Producte, Preu FROM `Productes` WHERE ID_Producte=:idProducte");
            $consulta->bindValue(':idProducte', $id_producte);
            $consulta->execute();
            $producte = $consulta->fetchAll(PDO::FETCH_ASSOC);

            foreach ($producte as $product) {
                //=====CREEM NOM_PRODUCTES EN FORMAT: nomproducte1(unitatsP1);nomproducte2();nomproducte3(unitatsP3);...=========
                $nom_productes = str_pad($nom_productes, strlen($nom_productes) + strlen($product['Nom_Producte']), $product['Nom_Producte'], STR_PAD_RIGHT);
                $nom_productes = str_pad($nom_productes, strlen($nom_productes) + 1, '(');
                $nom_productes = str_pad($nom_productes, strlen($nom_productes) + strlen($productes[$id_producte]), $productes[$id_producte]);
                $nom_productes = str_pad($nom_productes, strlen($nom_productes) + 1, ')');
                $nom_productes = str_pad($nom_productes, strlen($nom_productes) + 1, ';');

                /*============================= CODI PER AFEGIR LINEA DE COMANDA A LA BD ==============================*/
                $consulta = $connexio->prepare("INSERT INTO `Linea_Compra` (ID_Producte, ID_Factura, Preu_Total) VALUES (:idProducte, :idFactura, :preutotal)");
                $consulta->bindValue(':idProducte', $id_producte);
                $consulta->bindValue(':idFactura', $id_factura);
                $preu = $product['Preu'] * $productes[$id_producte];
                $consulta->bindValue(':preutotal', $preu);
                $consulta->execute();

                $q_productes = $q_productes + $productes[$i];
                $preu_total = $preu_total + ($productes[$i] * $product['Preu']);
            }
        }
        $i++;
    }
    /* ========================== CODI PER A INSERIR PRODUCTE A LA FACTURA ============================= */

    $consulta = $connexio->prepare("UPDATE `Factura` SET `Nom_Productes` = :nom_productes, `Preu_Total` = :preu_total, `Quantitat_Productes` = :q_productes WHERE `Factura`.`ID_Factura` = :id_factura; ");

    $consulta->bindValue(':id_factura', $id_factura);
    $consulta->bindValue(':nom_productes', $nom_productes);
    $consulta->bindValue(':preu_total', $preu_total);
    $consulta->bindValue(':q_productes', $q_productes);

    if($consulta->execute()){
        $_SESSION['productes_carro'] = '';
    }

    $_SESSION['q_productes'] = 0;


}else{ ?>

    <script> alert('¡Cuidado!¡Su carro no contiene ningun producto! \nComo consecuencia, no se ha relaizaod ninguna factura')</script>

<?php }

?>