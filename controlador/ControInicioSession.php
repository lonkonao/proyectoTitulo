<?php
require_once '../modelo/Data.php';
require_once '../modelo/Usuario.php';

$usuario = $_POST["txtUser"];
$pass = $_POST['txtPass'];

$pass1=  md5($pass);

$d = new Data();
$us = $d->existeUsuario($usuario, $pass1);
if ($us == null) {
    header("location: ../index.php?e=1");
} else {
    $usUser = $us->user;
    $usRut = $us->rut;
    $usNom=$us->nombre;
    $usApell=$us->apellidos;
    $usIns = $us->institucion;
    $usEs = $us->estado;
    $usEsta = $us->estamento;
 
    
    session_start();
    $_SESSION["autenticado"] = "SI";
    $_SESSION["nombreUser"]=$usUser;
    $_SESSION["rutUser"]=$usRut;
    $_SESSION["nomUser"]=$usNom;
    $_SESSION["apelliUser"]=$usApell;
    $_SESSION["instiUser"]=$usIns;
    $_SESSION["estadoUser"]=$usEs;
    $_SESSION["estamUser"]=$usEsta;
   
    
    header("location: ../portal.php");
}
?>