<?php

unset($_SESSION["autenticado"]);

unset($_SESSION["nombreUser"]);
unset($_SESSION["rutUser"]);
unset($_SESSION["nomUser"]);
unset($_SESSION["apelliUser"]);
unset($_SESSION["instiUser"]);
unset($_SESSION["estadoUser"]);
unset($_SESSION["estamUser"] );
session_destroy();
header("Location: http://gcrinformatica.cl/prevcrim/");
exit;
