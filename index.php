<!DOCTYPE html>
<html lang="es-SV">
<head>
  <title>INICIO DE SESIÓN: JOSUE VLADIMIR MENJIVAR CARDOZA</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="css/bootstrap.css" />
  <link href="fonts/fontawesome/css/all.css" rel="stylesheet" />
  <script type="text/javascript" src="js/jquery-3.7.1.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <script type="text/javascript" src="js/sweetalert.all.js"></script>
  <script type="text/javascript" src="fonts/fontawesome/js/all.js"></script>
</head>
<body class="container mt-5">

  <div class="alert alert-warning text-center" role="alert">
    <b>Ingrese sus credenciales para continuar</b>
  </div>

  <div class="row justify-content-center">
    <!-- LOGO -->
    <div class="col-md-5 text-center">
      <img src="media/logo/logo_corporativo.png" class="img-fluid" id="img" width="65%" height="auto" alt="Logo Corporativo" />
    </div>

    <!-- FORMULARIO -->
    <div class="col-md-5">
      <h3 class="text-center mb-4">Diseñando Estrategias para la recuperación y migración de base de datos (RBK0)</h3>
      <form action="login.php" method="post">
        <div class="form-group">
          <label for="user">Usuario</label>
          <input type="text" class="form-control" id="user" name="user" required placeholder="Ingrese su usuario">
        </div>
        <div class="form-group">
          <label for="pass">Contraseña</label>
          <input type="password" class="form-control" id="pass" name="pass" required placeholder="Ingrese su contraseña">
        </div>
        <div class="text-center">
          <button type="submit" class="btn btn-primary">Iniciar sesión</button>
        </div>
      </form>
    </div>
  </div>

</body>
</html>
