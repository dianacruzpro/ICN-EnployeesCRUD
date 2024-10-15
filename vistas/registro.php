<!-- <?php 
session_start();
//Verificar si el user esta auenticado
if(!isset($_SESSION['usuario']) || $_SESSION['usuario'] === null){
  header("Location: ../index.php");
  exit();
}

?>  -->
<!DOCTYPE html>
<html>
<head>
  <title>Registro de nuevo empleado</title>
  <style>
    body 
    {
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
    <h2>Usuario : <span class="badge badge-success"><?php echo $_SESSION['usuario']; ?></span></h2>

    <form>
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
        <input type="text" id="cargo" name="cargo">
      </div>

      <div class="form-group">
        <label for="departamento">Departamento:</label>
        <input type="text" id="departamento" name="departamento">
      </div>

      <div class="form-group">
        <label for="fecha_contratacion">Fecha de contratación:</label>
        <input type="date" id="fecha_contratacion" name="fecha_contratacion" class="form-control">
      </div>

      <div class="form-group">
        <label for="rango">Rango:</label>
        <select id="rango" name="rango" class="form-select">
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
        </select>
      </div>

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

      <button type="submit">Registrar</button>
    </form>
    <a href="../bd/logout.php" class="btn btn-danger btn-lg">Cerrar sesión</a>
  </div>

  <!-- <script src="../jquery/jquery-3.7.1.min.js"></script> -->
  <!-- <script src="../bootstrap/js/bootstrap.min.js"></script> -->
  <!-- <script src="../popper/popper.min.js"></script> -->

  <!-- <script src="../pluging/sweetAlert2/sweetalert2.all.min.js"></script> -->
  <!-- <script src="../app.js"></script> -->
</body>
</html>