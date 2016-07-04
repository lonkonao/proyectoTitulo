<?php
require_once '../modelo/Data.php';

$d= new Data();

$id = $_GET['id'];

$d->comboRegionFiltro($id);
