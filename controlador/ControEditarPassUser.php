<?php
require_once '../modelo/Data.php';

$rut=$_POST['id'];
$usuario =$_POST['usuario'];
$pass=$_POST['pass'];
$pass1 = md5($pass);
$d = new Data();


    $d->upPassUsuarios($pass1, $rut);
