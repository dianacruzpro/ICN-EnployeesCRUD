<?php
session_start();
unset($_SESSION['usuario']);
unset($_SESSION['s_idrango'] );  // Guardamos el rango en la sesión
unset($_SESSION['s_rol'] );  // Guardamos el nombre del rango en la sesión

session_destroy();
header("Location: ../index.php");
?>