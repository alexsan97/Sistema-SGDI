<?php
//error_reporting(0); evita loe errores, usado en tiempo de produccion
session_start();
unset($_SESSION["name"]);
session_destroy();
header("Location:../index.php");
?>