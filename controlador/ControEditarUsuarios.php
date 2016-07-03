<?php
require_once('../modelo/Data.php');

$d=new Data();

$nombre=$_POST['txtUser'];
$pass =$_POST['txtPass'];
$passCifrada = md5($pass);
$rut=$_POST['txtRut'];
$estado=$_POST['estado'];
$estamento=$_POST['estamento'];
$institucion=$_POST['institucion'];

$habilitacion = date('Y-m-d');


$d->insertUsuario($nombre,$passCifrada,$rut,$habilitacion,$estado,$estamento,$institucion);




?>