<?php

require_once __DIR__. '/../model/connectaBD.php';
$connexio = connectaBD();
require_once __DIR__. '/../model/guardarFactura.php';
require_once __DIR__. '/../vista/finalitzarComanda.html';