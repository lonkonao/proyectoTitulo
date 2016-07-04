<?php
require_once('../modelo/Data.php');

$d=new Data();

$user=$_POST['txtUser'];
$pass =$_POST['txtPass'];
$passCifrada = md5($pass);
$rut=$_POST['txtRut'];
$nombre=$_POST['txtNombre'];
$apellido=$_POST['txtApellidos'];
$estado=$_POST['estado'];
$estamento=$_POST['estamento'];
$institucion=$_POST['institucion'];

$habilitacion = date('Y-m-d');


$d->insertUsuario($user,$passCifrada,$rut,$nombre,$apellido,$habilitacion,$estado,$estamento,$institucion);




?>