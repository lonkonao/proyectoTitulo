<?php

require_once('../modelo/Data.php');

$d=new Data();
//?txtCod=711393x&txtDescripcion=&txtDireccion=&region=1&comunas=&txtFecha=&txtObv=&ComboDeli=12.121.212-1

$rut = $_POST['txtRut'];
$nombre=$_POST['txtNombre'];
$apellidoP=$_POST['txtApellidoP'];
$apellidoM = $_POST['txtApellidoM'];
$apodo = $_POST['txtApodo'];
$calle = $_POST['txtCalle'];
$region = $_POST['region'];
$comunas = $_POST['regionF'];
$teleFijo = $_POST['txtTelefonoFijo'];
$telePer = $_POST['txtCelu'];
$fecha = $_POST['txtFecha'];
$estado = $_POST['estadoDeli'];

$d->insertDelincuentes($rut, $nombre, $apellidoP, $apellidoM, $apodo, $calle, $region, $comunas, $teleFijo, $telePer, $fecha, $estado);

