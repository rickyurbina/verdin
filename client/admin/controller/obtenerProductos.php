<?php
require('../models/conexion.php');
require('../controller/ctlrProductos.php');
require('../models/mdlProductos.php');


$noBoleto = $_GET["noBoleto"];

$Controller = new productos();

$productos = $Controller -> ctlObtenerProductos();

print_r(json_encode($productos));