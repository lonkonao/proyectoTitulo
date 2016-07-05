<?php
  session_start();
  unset($_SESSION["nombreUser"]);
  session_destroy();
  header("Location: ../index.html");
  exit;