<?php

require_once('../modelo/Data.php');

$d=new Data();
//?=&txtNombre=&txtNorte=&txtOeste=&txtSur=&txtEste=&txtDescripcion=
$cod = $_POST['txtCod'];
$nombre=$_POST['txtNombre'];
$calle_n=$_POST['txtNorte'];
$calle_o = $_POST['txtOeste'];
$calle_s = $_POST['txtSur'];
$calle_e = $_POST['txtEste'];
$color = $_POST['txtColor'];
$descripcion = $_POST['txtDescripcion'];


$d->upSectores($cod, $nombre, $calle_n, $calle_o, $calle_s, $calle_e, $color, $descripcion);
