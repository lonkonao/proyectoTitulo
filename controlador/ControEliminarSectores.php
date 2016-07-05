<?php
require_once('../modelo/Data.php');

$d=new Data();

$id=$_POST['id'];


$d->borrarSector($id);




?>