<?php
session_start();

// Verificar si el usuario está autenticado
if (!isset($_SESSION['usuario']) || $_SESSION['usuario'] === null) {
  header("Location: ../index.php");
  exit();
}

// Verificar si el usuario tiene el rango adecuado
if ($_SESSION['s_idrango'] != 1) { // Cambia el número según el rango permitido para esta página
  header("Location: ./access_denied.php");
  exit();
}

// Conexión a la base de datos
require_once '../bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

// Verificar si se ha enviado el id del empleado por método GET
if (isset($_GET['id_empleado'])) {
  $id_empleado = $_GET['id_empleado'];

  // Consulta para obtener la información del empleado
  $query = "SELECT nombre, apellidos, fecha_nacimiento, genero, documento_identidad, estado_civil, nacionalidad, direccion, telefono, correo_electronico, cargo, departamento, fecha_contratacion, tipo_contrato, salario, ubicacion 
            FROM empleados 
            WHERE id_empleado = :id_empleado";

  $stmt = $conexion->prepare($query);
  $stmt->bindParam(':id_empleado', $id_empleado);
  $stmt->execute();
  
  // Verificar si se encontró el empleado
  if ($stmt->rowCount() > 0) {
    $empleado = $stmt->fetch(PDO::FETCH_ASSOC);
  } else {
    echo "<script src='../pluging/sweetAlert2/sweetalert2.all.min.js'></script>";
    echo "<script>
            Swal.fire({
              icon: 'error',
              title: 'Error',
              text: 'Empleado no encontrado',
              confirmButtonText: 'Aceptar'
            }).then(function() {
              window.location = './listado_empleados.php'; // Redirigir a la lista de empleados
            });
          </script>";
    exit();
  }
} else {
  echo "<script>
          Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'No se proporcionó un ID de empleado válido',
            confirmButtonText: 'Aceptar'
          }).then(function() {
            window.location = './listado_empleados.php'; // Redirigir a la lista de empleados
          });
        </script>";
  exit();
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Información del Empleado</title>
  <link rel='stylesheet' href='../bootstrap/css/bootstrap.min.css'>
  <link rel='stylesheet' href='../styles.css'>
  <link rel='stylesheet' href='../pluging/sweetAlert2/sweetalert2.min.css'>
  <style>
    body {
      font-family: sans-serif;
    }

    .container {
      width: 80%;
      margin: 0 auto;
    }

    h1 {
      text-align: center;
      margin-bottom: 20px;
    }

    .employee-info {
      margin-bottom: 20px;
    }

    .employee-info label {
      font-weight: bold;
    }

    .employee-info div {
      margin-bottom: 10px;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Información del Empleado</h1>

    <h2>Datos personales</h2>
    <div class="employee-info">
      <div><label>Nombres:</label> <?php echo $empleado['nombre']; ?></div>
      <div><label>Apellidos:</label> <?php echo $empleado['apellidos']; ?></div>
      <div><label>Fecha de nacimiento:</label> <?php echo $empleado['fecha_nacimiento']; ?></div>
      <div><label>Género:</label> <?php echo $empleado['genero']; ?></div>
      <div><label>Documento de identidad:</label> <?php echo $empleado['documento_identidad']; ?></div>
      <div><label>Estado civil:</label> <?php echo $empleado['estado_civil']; ?></div>
      <div><label>Nacionalidad:</label> <?php echo $empleado['nacionalidad']; ?></div>
      <div><label>Dirección:</label> <?php echo $empleado['direccion']; ?></div>
      <div><label>Teléfono:</label> <?php echo $empleado['telefono']; ?></div>
      <div><label>Correo electrónico:</label> <?php echo $empleado['correo_electronico']; ?></div>
    </div>

    <h2>Datos laborales</h2>
    <div class="employee-info">
      <div><label>Cargo:</label> <?php echo $empleado['cargo']; ?></div>
      <div><label>Departamento:</label> <?php echo $empleado['departamento']; ?></div>
      <div><label>Fecha de contratación:</label> <?php echo $empleado['fecha_contratacion']; ?></div>
      <div><label>Tipo de contrato:</label> <?php echo $empleado['tipo_contrato']; ?></div>
      <div><label>Salario:</label> <?php echo $empleado['salario']; ?></div>
      <div><label>Ubicación:</label> <?php echo $empleado['ubicacion']; ?></div>
    </div>

    <a href="hrViewR1.php" class="btn btn-primary">Volver a la lista de empleados</a>
    <a href="../bd/logout.php" class="btn btn-danger btn-lg">Cerrar sesión</a>
  </div>

  <script src="../jquery/jquery-3.7.1.min.js"></script>
  <script src="../bootstrap/js/bootstrap.min.js"></script>
  <script src="../popper/popper.min.js"></script>
  <script src="../pluging/sweetAlert2/sweetalert2.all.min.js"></script>
  <script src="../app.js"></script>
</body>
</html>
