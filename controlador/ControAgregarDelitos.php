<?php

require_once('../modelo/Data.php');

$d=new Data();
//=&=&region=1&comunas=&txtFecha=&txtObv=&ComboDeli=12.121.212-1

$cod = $_POST['txtCod'];
$descripcion=$_POST['txtDescripcion'];
$direccion=$_POST['txtDireccion'];
$comuna = $_POST['comunas'];
$region = $_POST['region'];
$sector = $_POST['sector'];
$fecha = $_POST['txtFecha'];
$obv = $_POST['txtObv'];
$rut=$_POST['ComboDeli'];


$d->insertDelitos($cod, $descripcion, $direccion, $comuna, $region, $sector, $fecha, $obv);
$d->insertDelitoDelincuente($rut, $cod);
