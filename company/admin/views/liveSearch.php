<?php

$name = $_POST['name'];
require_once("../models/mdlPublic.php");
$b = new mdlPublic();
$data = $b->mdlLiveSearch($name);

echo json_encode($data);