<?php
require_once __DIR__.'/../model/connectaBD.php';
$connexio = connectaBD();
include __DIR__.'/../model/consulta_randProduct_gridPrincipal.php';
include_once __DIR__.'/../vista/info_pagPrincipal.html';
include_once __DIR__.'/../vista/gridPagPrincipal.php';
