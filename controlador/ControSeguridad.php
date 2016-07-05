<?php
//Inicio la sesión
session_start();
if ($_SESSION["autenticado"] != "SI") {
//si no existe, va a la página de autenticacion
header("Location: gcrinformatica.cl/previcrim");
//salimos de este script
exit();

}elseif ($_SESSION["estadoUser"]!=2) {
    header("Location: gcrinformatica.cl/previcrim");
    exit();
}
?>