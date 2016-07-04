<?php
require_once('../modelo/Data.php');

$d=new Data();

$nombre=$_POST['txtUser'];
$rut=$_POST['txtRut'];
$estado=$_POST['estado'];
$estamento=$_POST['estamento'];


$habilitacion = date('Y-m-d');



$d->upUsuarios($nombre, $estado, $estamento, $rut);



?>