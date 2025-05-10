<?php
// Mostrar errores en el navegador (útil para depurar)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Iniciar sesión y configurar zona horaria
session_start();
date_default_timezone_set('America/El_Salvador');

// Lista de usuarios válidos [usuario => contraseña]
$usuarios_validos = [
    "admin" => "1234",
    "Josue Vladimir Menjivar Cardoza" => "toor"
];

// Obtener datos del formulario
$usuario = $_POST['user'] ?? '';
$contrasena = $_POST['pass'] ?? '';

// Ruta al archivo de log
$log_file = __DIR__ . "/logs/events.log";

// Fecha y hora del intento
$fecha = date("Y-m-d H:i:s");

// Verificar credenciales
if (array_key_exists($usuario, $usuarios_validos) && $contrasena === $usuarios_validos[$usuario]) {
    // Inicio de sesión exitoso
    $_SESSION['usuario'] = $usuario;

    // Escribir en el log
    $mensaje = "[$fecha] Usuario '$usuario' ingresó exitosamente." . PHP_EOL;
    file_put_contents($log_file, $mensaje, FILE_APPEND);

    // Redirigir a welcome.php
    header("Location: welcome.php");
    exit;
} else {
    // Inicio de sesión fallido
    $mensaje = "[$fecha] Intento fallido de inicio de sesión con usuario: '$usuario'." . PHP_EOL;
    file_put_contents($log_file, $mensaje, FILE_APPEND);

    // Redirigir a index.php con mensaje de error
    header("Location: index.php?error=1");
    exit;
}
