<?php
//Inicio la sesión
session_start();
if ($_SESSION["autenticado"] != "SI") {
//si no existe, va a la página de autenticacion
header("Location: ./index.php");
//salimos de este script
exit();
}
?>