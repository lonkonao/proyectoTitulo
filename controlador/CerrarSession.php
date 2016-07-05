<?php
  session_start();
  unset($_SESSION["nombreUser"]);
  session_destroy();
  header("Location: gcrinformatica.cl/previcrim");
  exit;