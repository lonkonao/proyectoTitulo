<?php
require_once('../modelo/Data.php');

$d=new Data();

$rut=$_POST['id'];

$d->borrarUsuario($rut);




?>