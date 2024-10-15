<?php
session_start();
//Verificar si el user esta auenticado
if (!isset($_SESSION['usuario']) || $_SESSION['usuario'] === null) {
  header("Location: ../index.php");
  exit();
}
require_once '../bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

// Verificar si se ha enviado el formulario por método POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Recibir datos del formulario
  $nombre = $_POST['nombre'];
  $apellidos = $_POST['apellidos'];
  $fecha_nacimiento = $_POST['fecha_nacimiento'];
  $genero = $_POST['genero'];
  $documento_identidad = $_POST['documento_identidad'];
  $estado_civil = $_POST['estado_civil'];
  $nacionalidad = $_POST['nacionalidad'];
  $direccion = $_POST['direccion'];
  $telefono = $_POST['telefono'];
  $correo_electronico = $_POST['correo_electronico'];
  $cargo = $_POST['cargo'];
  $departamento = $_POST['departamento'];
  $fecha_contratacion = $_POST['fecha_contratacion'];
  $rango = $_POST['rango'];
  $tipo_contrato = $_POST['tipo_contrato'];
  $salario = $_POST['salario'];
  $ubicacion = $_POST['ubicacion'];

  try {
    // Insertar los datos en la tabla empleados
    $query = "INSERT INTO empleados 
        (nombre, apellidos, fecha_nacimiento, genero, documento_identidad, estado_civil, nacionalidad, direccion, telefono, correo_electronico, cargo, departamento, fecha_contratacion, tipo_contrato, salario, ubicacion, id_rol) 
        VALUES 
        (:nombre, :apellidos, :fecha_nacimiento, :genero, :documento_identidad, :estado_civil, :nacionalidad, :direccion, :telefono, :correo_electronico, :cargo, :departamento, :fecha_contratacion, :tipo_contrato, :salario, :ubicacion, 6)";

    $stmt = $conexion->prepare($query);

    // Bindear los valores
    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':apellidos', $apellidos);
    $stmt->bindParam(':fecha_nacimiento', $fecha_nacimiento);
    $stmt->bindParam(':genero', $genero);
    $stmt->bindParam(':documento_identidad', $documento_identidad);
    $stmt->bindParam(':estado_civil', $estado_civil);
    $stmt->bindParam(':nacionalidad', $nacionalidad);
    $stmt->bindParam(':direccion', $direccion);
    $stmt->bindParam(':telefono', $telefono);
    $stmt->bindParam(':correo_electronico', $correo_electronico);
    $stmt->bindParam(':cargo', $cargo);
    $stmt->bindParam(':departamento', $departamento);
    $stmt->bindParam(':fecha_contratacion', $fecha_contratacion);
    $stmt->bindParam(':tipo_contrato', $tipo_contrato);
    $stmt->bindParam(':salario', $salario);
    $stmt->bindParam(':ubicacion', $ubicacion);

    // Ejecutar la consulta
    $stmt->execute();

    // Si la inserción fue exitosa, mostrar la alerta con SweetAlert2
    echo "<script src='../pluging/sweetAlert2/sweetalert2.all.min.js'></script>";
    echo "<script>
            Swal.fire({
                icon: 'success',
                title: 'Registro exitoso',
                text: 'El empleado ha sido registrado correctamente',
                confirmButtonText: 'Aceptar'
            }).then(function() {
                window.location = './hrViewR1.php';
            });
        </script>";
  } catch (PDOException $e) {
    echo "Error al registrar el empleado: " . $e->getMessage();
  }
}
?>
<!DOCTYPE html>
<html>

<head>
  <title>Registro de nuevo empleado</title>
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

    .form-group {
      margin-bottom: 20px;
    }

    label {
      display: block;
      margin-bottom: 5px;
    }

    input[type="text"],
    input[type="email"],
    input[type="number"],
    input[type="date"],
    textarea {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
    }

    select {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
      appearance: none;
    }

    button {
      background-color: #4CAF50;
      color: white;
      padding: 12px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    button:hover {
      background-color: #45a049;
    }
  </style>
</head>

<body>
  <div class="container">
    <h1>Registro de nuevo empleado</h1>

    <h2>Datos personales</h2>
    <h2>Usuario : <span class=""><?php echo $_SESSION['usuario']; ?></span></h2>

    <form id="empleadoForm" action="registro.php" method="POST">
      <div class="form-group">
        <label for="nombre">Nombres de empleado:</label>
        <input type="text" id="nombre" name="nombre">
      </div>

      <div class="form-group">
        <label for="apellidos">Apellidos de empleado:</label>
        <input type="text" id="apellidos" name="apellidos">
      </div>

      <div class="form-group">
        <label for="fecha _nacimiento">Fecha de nacimiento:</label>
        <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" class="form-control">
      </div>

      <div class="form-group">
        <label for="genero">Género:</label>
        <select id="genero" name="genero" class="form-select">
          <option value="Masculino">Masculino</option>
          <option value="Femenino">Femenino</option>
        </select>
      </div>

      <div class="form-group">
        <label for="documento_identidad">Documento de identidad:</label>
        <select id="documento_identidad" name="documento_identidad" class="form-select">
          <option value="Cédula de ciudadanía">Cédula de ciudadanía</option>
          <option value="Tarjeta de identidad">Tarjeta de identidad</option>
          <option value="Pasaporte">Pasaporte</option>
        </select>
      </div>

      <div class="form-group">
        <label for="estado_civil">Estado civil:</label>
        <select id="estado_civil" name="estado_civil" class="form-select">
          <option value="Soltero">Soltero</option>
          <option value="Casado">Casado</option>
          <option value="Divorciado">Divorciado</option>
          <option value="Viudo">Viudo</option>
        </select>
      </div>

      <div class="form-group">
        <label for="nacionalidad">Nacionalidad:</label>
        <input type="text" id="nacionalidad" name="nacionalidad">
      </div>

      <div class="form-group">
        <label for="direccion">Dirección:</label>
        <textarea id="direccion" name="direccion"></textarea>
      </div>

      <div class="form-group">
        <label for="telefono">Teléfono:</label>
        <input type="number" id="telefono" name="telefono" class="form-control">
      </div>

      <div class="form-group">
        <label for="correo_electronico">Correo electrónico:</label>
        <input type="email" id="correo_electronico" name="correo_electronico">
      </div>

      <h2>Datos laborales</h2>

      <div class="form-group">
        <label for="cargo">Cargo:</label>
        <select type="text" id="cargo" name="cargo" class="form-select">
          <option value="Director General">Director General</option>
          <option value="Gerente">Gerente</option>
          <option value="Jefe de Departamento">Jefe de Departamento</option>
          <option value="Coordinador">Coordinador</option>
          <option value="Empleado">Empleado</option>
          <option value="Asistente">Asistente</option>
          <option value="Practicante">Practicante</option>
          <option value="Becario">Becario</option>
        </select>

      </div>

      <div class="form-group">
        <label for="departamento">Departamento:</label>
        <select type="text" id="departamento" name="departamento" class="form-select">
          <option value="HHRR">HHRR</option>
          <option value="Soporte IT">Soporte IT</option>
          <option value="Contabilidad">Contabilidad</option>
          <option value="Administración">Administración</option>
          <option value="Ventas">Ventas</option>
        </select>
      </div>

      <div class="form-group">
        <label for="fecha_contratacion">Fecha de contratación:</label>
        <input type="date" id="fecha_contratacion" name="fecha_contratacion" class="form-control">
      </div>

      <!-- <div class="form-group">
        <label for="rango">Rango:</label>
        <select id="rango" name="rango" class="form-select">
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
        </select>
      </div> -->

      <div class="form-group">
        <label for="tipo_contrato">Tipo de contrato:</label>
        <select id="tipo_contrato" name="tipo_contrato" class="form-select">
          <option value="Tiempo completo">Tiempo completo</option>
          <option value="Tiempo parcial">Tiempo parcial</option>
        </select>
      </div>

      <div class="form-group">
        <label for="salario">Salario:</label>
        <input type="number" id="salario" name="salario">
      </div>

      <div class="form-group">
        <label for="ubicacion">Ubicación:</label>
        <input type="text" id="ubicacion" name="ubicacion">
      </div>

      <button type="submit" id="submitBtn">Registrar</button>
    </form>
    <a href="../bd/logout.php" class="btn btn-danger btn-lg">Cerrar sesión</a>
  </div>

  <script src="../jquery/jquery-3.7.1.min.js"></script>
  <script src="../bootstrap/js/bootstrap.min.js"></script>
  <script src="../popper/popper.min.js"></script>
  <script src="../pluging/sweetAlert2/sweetalert2.all.min.js"></script>
  <script src="../app.js"></script>
</body>

</html>