<?php
//Inicio la sesión
session_start();
if ($_SESSION["autenticado"] != "SI") {
//si no existe, va a la página de autenticacion
header("Location: ../portal.php");
//salimos de este script
exit();
}elseif ($_SESSION["estadoUser"]!=1) {
    header("Location: ../index.php?e=0");
    exit();
}
?>