<?php
require_once '../modelo/Data.php';

$rut=$_POST['id'];
$usuario =$_POST['usuario'];
$pass=$_POST['pass'];
$pass1 = md5($pass);
$d = new Data();
if ($id == 1) {
    echo '<script language="javascript">';
    echo 'alert("No Puedes Editar Al Super"); location.href="../vista/portal.php"';
    echo '</script>';
} else {
$d->upPassUser($id, $pass1);
}