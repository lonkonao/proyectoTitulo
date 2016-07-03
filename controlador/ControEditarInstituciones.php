<?php
require_once('../modelo/Data.php');

$d=new Data();

$id = $_POST['txtId'];
$nombre=$_POST['txtNombre'];


$d->upInstitucion($nombre,$id);




?>