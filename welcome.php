<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Bienvenido</title>
  <link rel="stylesheet" href="css/bootstrap.css" />
</head>
<body class="container mt-5 text-center">
  <h1>Bienvenido, <?= htmlspecialchars($_SESSION['usuario']) ?></h1>
  <p>Has iniciado sesión correctamente.</p>
  <a href="logout.php" class="btn btn-danger mt-3">Cerrar sesión</a>
</body>
</html>