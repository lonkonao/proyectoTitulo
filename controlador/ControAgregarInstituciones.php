<?php
require_once('../modelo/Data.php');

$d=new Data();

$nombre=$_POST['txtNombre'];


$d->insertInstitucion($nombre);




?>