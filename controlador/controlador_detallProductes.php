<?php
require_once __DIR__.'/../model/connectaBD.php';
$connexio = connectaBD();
include __DIR__.'/../model/consulta_detallProductes.php';
include __DIR__.'/../vista/detallProductes.php';