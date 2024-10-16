<?php
session_start();
//Verificar si el user esta autenticado
if (!isset($_SESSION['usuario']) || $_SESSION['usuario'] === null) {
  header("Location: ../index.php");
  exit();
}

// Verificar si el usuario tiene el rango adecuado
if ($_SESSION['s_idrango'] != 2) { // Cambia el número según el rango permitido para esta página
  header("Location: ./access_denied.php");
  exit();
}

require_once '../bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

// Consulta para obtener empleados de Rango 2
try {
  $query = "SELECT * FROM empleados";
  $stmt = $conexion->prepare($query);
  $stmt->execute();

  // Almacena el resultado
  $resultado = $stmt->fetchAll();

  if ($resultado) {
    echo "<!DOCTYPE html>
          <html lang='en'>

          <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>Empleados Rango 2</title>

            <link rel='stylesheet' href='../bootstrap/css/bootstrap.min.css'>
            <link rel='stylesheet' href='../styles.css'>
            <link rel='stylesheet' href='../pluging/sweetAlert2/sweetalert2.min.css'>
          </head>

          <body>

                  <header class='d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom container-fluid sticky-top bg-white'>
                      <div class='col-md-3 mb-2 mb-md-0'>
                        <a href='#' class='d-inline-flex link-body-emphasis text-decoration-none'>
                          Empleados Rango 2
                        </a>
                      </div>
                
                      <h2>Visualización y Edición</h2>
                
                      <div class='col-md-3 text-end'>
                        <a href='../bd/logout.php'  type='button' class='btn btn-primary'>Cerrar Sesión</a>
                      </div>
                    </header>

            <div class='container'>
              
              <table class='table table-light'>
                  <thead>
                    <tr>
                      <th scope='col'>ID</th>
                      <th scope='col'>Nombres</th>
                      <th scope='col'>Apellidos</th>
                      <th scope='col'>Puesto</th>
                      <th scope='col'>Departamento</th>
                      <th scope='col'>Telefono</th>
                      <th scope='col'>Acciones</th>
                    </tr>
                  </thead>
                  <tbody id='table-body'>";
    foreach ($resultado as $res) {
      echo "
        <tr>
                            <td>{$res['id_empleado']}</td>
                            <td>{$res['nombre']}</td>
                            <td>{$res['apellidos']}</td>
                            <td>{$res['cargo']}</td>
                            <td>{$res['departamento']}</td>
                            <td>{$res['telefono']}</td>
                            <td>
                                <button type='button' class='btn btn-link p-0' style='background: none' onclick='verEmpleado({$res['id_empleado']})'>
                                  <img src='../res/ver.svg' alt='ver' style='width: 30px; height: 30px;'>
                                </button>
                                <button type='button' class='btn btn-link p-0' style='background: none' onclick='editarEmpleado({$res['id_empleado']})'>
                                  <img src='../res/lapiz.svg' alt='editar' style='width: 30px; height: 30px;'>
                                </button>
                            </td>
                        </tr>";
    }
    echo "
            </tbody>
          </table>
          </div>

          <script src='../jquery/jquery-3.7.1.min.js'></script>
          <script src='../bootstrap/js/bootstrap.min.js'></script>
          <script src='../popper/popper.min.js'></script>
          <script src='../pluging/sweetAlert2/sweetalert2.all.min.js'></script>
          <script src='../app.js'></script>

          <script>
            function verEmpleado(id) {
              // Implementar lógica para ver detalles del empleado
              Swal.fire('Ver Empleado', 'Detalles del empleado con ID: ' + id, 'info');
            }

            function editarEmpleado(id) {
              // Implementar lógica para editar empleado
              Swal.fire({
                title: 'Editar Empleado',
                html: `
                  <input id='nombre' class='swal2-input' placeholder='Nombre'>
                  <input id='apellidos' class='swal2-input' placeholder='Apellidos'>
                  <input id='cargo' class='swal2-input' placeholder='Cargo'>
                  <input id='departamento' class='swal2-input' placeholder='Departamento'>
                  <input id='telefono' class='swal2-input' placeholder='Teléfono'>
                `,
                confirmButtonText: 'Guardar',
                focusConfirm: false,
                preConfirm: () => {
                  // Aquí iría la lógica para guardar los cambios
                  return 'Cambios guardados para empleado ID: ' + id;
                }
              }).then((result) => {
                if (result.value) {
                  Swal.fire('Guardado!', result.value, 'success');
                }
              });
            }
          </script>
        </body>
        </html>
      ";

  } else {
    echo "No hay empleados de Rango 2 disponibles";
  }


} catch (PDOException $e) {
  die("Error al ejecutar la consulta:" . $e->getMessage());
}