<?php
ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);
error_reporting(E_ALL);
session_start();
date_default_timezone_set("America/El_Salvador");

// Incluir ips.php desde la raíz
include("ips.php");

// Detectar IP real
$ip_cliente = $_SERVER["REMOTE_ADDR"];

// Normalizar IP si viene en formato IPv6 mapeado
if (strpos($ip_cliente, "::ffff:") === 0) {
    $ip_cliente = substr($ip_cliente, 7);
}

// Validar si la IP está permitida
if (!ip_in_ranges($ip_cliente, $rango)) {
    $mensaje = "[" . date("Y-m-d H:i:s") . "] Acceso bloqueado desde IP no autorizada: $ip_cliente\n";
    file_put_contents("logs/events.log", $mensaje, FILE_APPEND);
    die("Acceso no permitido desde esta IP.");
}

// Lista de usuarios válidos
$usuarios_validos = [
    "admin" => "1234",
    "Josue Vladimir Menjivar Cardoza" => "toor"
];

// Capturar datos del formulario
$usuario = $_POST['user'] ?? '';
$contrasena = $_POST['pass'] ?? '';

// Registrar logs
$fecha = date("Y-m-d H:i:s");
$log_file = "logs/events.log";

if (array_key_exists($usuario, $usuarios_validos) && $contrasena === $usuarios_validos[$usuario]) {
    $_SESSION['usuario'] = $usuario;
    $mensaje = "[$fecha] Usuario '$usuario' ingresó exitosamente desde $ip_cliente.\n";
    file_put_contents($log_file, $mensaje, FILE_APPEND);
    header("Location: welcome.php");
    exit;
} else {
    $mensaje = "[$fecha] Intento fallido de inicio de sesión con usuario: '$usuario' desde $ip_cliente.\n";
    file_put_contents($log_file, $mensaje, FILE_APPEND);
    header("Location: index.php?error=1");
    exit;
}
