<?php
//Inicio la sesión
session_start();
if ($_SESSION["autenticado"] != "SI") {
//si no existe, va a la página de autenticacion
header("Location: http://gcrinformatica.cl/prevcrim");
//salimos de este script
exit();

}elseif ($_SESSION["estadoUser"]!=2) {
    header("Location: http://gcrinformatica.cl/prevcrim");
    exit();
}
?>