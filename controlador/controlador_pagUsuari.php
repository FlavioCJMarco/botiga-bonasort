<?php
require_once __DIR__.'/../model/connectaBD.php';
$connexio = connectaBD();
include_once __DIR__.'/../model/consulta_detallUsuari.php';
include_once __DIR__.'/../vista/detallUsuari.php';