<?php

require_once('../modelo/Data.php');

$d = new Data();





$rut1 = $_POST['ComboDeli'];
$parentesco = $_POST['ComboParen'];
$rut2 = $_POST['ComboDeli2'];

if ($rut1 == $rut2) {
    echo '<script language="javascript">';
    echo 'alert("Error no puede Ser pariente de uno Mismo");location.href="../vista/parentesco.php?e=1"';
    echo '</script>';
}  else {
   $d->insertParentesco($rut1, $parentesco, $rut2); 
}


