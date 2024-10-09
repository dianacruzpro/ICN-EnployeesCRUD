<?php 
session_start();
//Verificar si el user esta auenticado
if(!isset($_SESSION['usuario']) || $_SESSION['usuario'] === null){
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
        <div class="junbotron">
          <h1 class="display-4 text-center">Bienvenid@ Rango 3</h1>
          <h2 class="text-center">Usuario <span class="badge badge-success"><?php echo $_SESSION['usuario']; ?></span></h2>
          <h2 class="text-center">Rango <span class="badge badge-success"><?php echo $_SESSION['s_idrango']; ?></span></h2>

          <p class="lead text-center">Esta es la pagina de inicio, luego de un LOGIN correcto.</p>
          <hr class="my-4">
          <a href="../bd/logout.php" class="btn btn-danger btn-lg">Cerrar sesión</a>
        </div>
      </div>
    </div>
  </div>

  <script src="../jquery/jquery-3.7.1.min.js"></script>
  <script src="../bootstrap/js/bootstrap.min.js"></script>
  <script src="../popper/popper.min.js"></script>

  <script src="../pluging/sweetAlert2/sweetalert2.all.min.js"></script>
  <script src="../app.js"></script>
</body>

</html>