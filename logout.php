<?php
session_start();
date_default_timezone_set('America/El_Salvador');

$usuario = $_SESSION['usuario'] ?? 'desconocido';
$fecha = date("Y-m-d H:i:s");

// Registrar cierre de sesión
$mensaje = "[$fecha] Usuario '$usuario' cerró sesión.\n";
file_put_contents("logs/events.log", $mensaje, FILE_APPEND);

// Cerrar sesión
session_destroy();
header("Location: index.php");
exit;
