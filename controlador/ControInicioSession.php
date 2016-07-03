<?php
require_once './Data.php';
require_once './Usuario.php';

$usuario = $_POST["txtUser"];
$pass = $_POST['txtPass'];

$d = new Data();
$us = $d->existeUsuario($usuario, $pass);
if ($us == null) {
    header("location: ../index.html?e=1");
} else {
    $usNom = $us->user;
    $usEmpresa = $us->empresa;
    $usPer = $us->permiso;
    $usEs = $us->estado;
    $usEdi = $us->editar;
    $usEli = $us->eliminar;
    
    session_start();
    $_SESSION["autenticado"] = "SI";
    $_SESSION["nombreUser"]=$usNom;
    $_SESSION["empresaUser"]=$usEmpresa;
    $_SESSION["permisoUser"]=$usPer;
    $_SESSION["estadoUser"]=$usEs;
    $_SESSION["editUser"]=$usEdi;
    $_SESSION["eliUser"]=$usEli;
    $_SESSION["cenUser"]=$usCen;
    
    header("location: ../intra/portal.php");
}
?>