<?php
require_once __DIR__.'/../model/connectaBD.php';
$connexio = connectaBD();
include __DIR__.'/../model/consulta_carroPage.php';
include __DIR__.'/../vista/carroPage.php';