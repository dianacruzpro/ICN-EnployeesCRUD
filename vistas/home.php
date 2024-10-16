<?php 
session_start();
// Verificar si el usuario está autenticado
if (!isset($_SESSION['usuario']) || $_SESSION['usuario'] === null) {
    header("Location: ../index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ICN - Project</title>

  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../styles.css">
  <link rel="stylesheet" href="../pluging/sweetAlert2/sweetalert2.min.css">
</head>

<body class="body">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="jumbotron">
          <h1 class="display-4 text-center">Bienvenid@</h1>
          <h2 class="text-center">Usuario <span class="badge badge-success"><?php echo $_SESSION['usuario']; ?></span></h2>
          <h2 class="text-center">Rango <span class="badge badge-success"><?php echo $_SESSION['s_idrango']; ?></span></h2>
          <p class="lead text-center">Esta es la página de inicio, luego de un LOGIN correcto.</p>
          <hr class="my-4">
          <!-- Botón para cerrar sesión -->
          <a href="../bd/logout.php" class="btn btn-danger btn-lg">Cerrar sesión</a>
          <!-- Botón nuevo para redirigir a la vista correspondiente -->
          <button id="redirectButton" class="btn btn-primary btn-lg">Ir a mi vista</button>
        </div>
      </div>
    </div>
  </div>

  <script src="../jquery/jquery-3.7.1.min.js"></script>
  <script src="../bootstrap/js/bootstrap.min.js"></script>
  <script src="../popper/popper.min.js"></script>
  <script src="../pluging/sweetAlert2/sweetalert2.all.min.js"></script>
  <script src="../app.js"></script>

  <script>
    document.getElementById('redirectButton').addEventListener('click', function() {
      // Obtener el id_rango de la sesión
      var idRango = <?php echo (int)$_SESSION['s_idrango']; ?>;
      
      // Redirigir según el id_rango usando un switch
      switch (idRango) {
        case 1:
          window.location.href = './hrViewR1.php';
          break;
        case 2:
          window.location.href = './homeR2.php';
          break;
        case 3:
          window.location.href = './homeR3.php';
          break;
        default:
          window.location.href = './access_denied.php';
          break;
      }
    });
  </script>
</body>

</html>
