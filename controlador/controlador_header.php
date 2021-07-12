<?php
require_once __DIR__.'/../model/connectaBD.php';
$connexio = connectaBD();
include __DIR__.'/../model/consulta_Categories.php';
include_once __DIR__.'/../vista/capçalera.php';