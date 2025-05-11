<?php
ini_set("display_errors", "1");
ini_set("display_startup_errors", "1");
error_reporting(E_ALL);
?>
<!DOCTYPE html>
<html lang="es-SV">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inicio de sesión - Josue Vladimir Menjivar Cardoza</title>
  <link rel="stylesheet" href="css/bootstrap.css">
  <link href="fonts/fontawesome/css/all.css" rel="stylesheet">
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <script type="text/javascript" src="js/sweetalert.all.js"></script>
  <script type="text/javascript" src="fonts/fontawesome/js/all.js"></script>
</head>
<body class="container mt-5">
  <div class="row">
    <div class="col-md-6 text-center">
      <img src="media/logo/logo_corporativo.png" class="img-fluid mb-4" alt="Logo" width="65%">
    </div>
    <div class="col-md-6">
      <h3 class="mb-4">Diseñando Estrategias para la recuperación y migración de base de datos (RBK0)</h3>
      <form action="login.php" method="post">
        <div class="form-group">
          <label for="user">Usuario:</label>
          <input type="text" class="form-control" id="user" name="user" maxlength="50" required>
          <small class="form-text text-muted">Ingrese su nombre de usuario.</small>
        </div>
        <div class="form-group">
          <label for="pass">Contraseña:</label>
          <input type="password" class="form-control" id="pass" name="pass" maxlength="50" required>
          <small class="form-text text-muted">Ingrese su contraseña.</small>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Iniciar Sesión</button>
      </form>
    </div>
  </div>
</body>
</html>