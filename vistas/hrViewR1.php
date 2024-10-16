<?php
session_start();
//Verificar si el user esta auenticado
if (!isset($_SESSION['usuario']) || $_SESSION['usuario'] === null) {
  header("Location: ../index.php");
  exit();
}
// Verificar si el usuario tiene el rango adecuado
if ($_SESSION['s_idrango'] != 1) { // Cambia el número según el rango permitido para esta página
  header("Location: ./access_denied.php");
  exit();
}

require_once '../bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();




//Resepcion de datos por metodo post desde ajax
try {
  $query = "SELECT * FROM empleados;";
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
            <title>Registro de empleados - R1</title>

            <link rel='stylesheet' href='../bootstrap/css/bootstrap.min.css'>
            <link rel='stylesheet' href='../styles.css'>
            <link rel='stylesheet' href='../pluging/sweetAlert2/sweetalert2.min.css'>
          </head>

          <body>

                  <header class='d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom container-fluid sticky-top bg-white'>
                      <div class='col-md-3 mb-2 mb-md-0'>
                        <a href='registro.php' class='d-inline-flex link-body-emphasis text-decoration-none'>
                          Agregar Nuevo Empleado
                        </a>
                      </div>
                
                      <h2>Registro de empleados</h2>
                
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

                                <button type='button' class='btn btn-link p-0' style='background: none' onclick='verEmpleado({$res["id_empleado"]})'>
                                  <img src='../res/ver.svg' alt='ver' style='width: 30px; height: 30px;'>
                                </button>
                                <button type='button' class='btn btn-link p-0' style='background: none' onclick='editarEmpleado({$res['id_empleado']})'>
                                  <img src='../res/lapiz.svg' alt='editar' style='width: 30px; height: 30px;'>
                                </button>
                                <button type='button' class='btn btn-link p-0' style='background: none' onclick='confirmAction()'>
                                <img src='../res/basurero.svg' alt='eliminar' style='width: 30px; height: 30px;'>
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
  function verEmpleado(id_empleado) {
    // Redirige a la página con el ID del empleado
    window.location.href = 'vista_general.php?id_empleado=' + id_empleado;
  }
</script>
<script>
    function confirmAction() {
        // Mostrar cuadro de confirmación
        const userConfirmed = confirm('¿Estás seguro de que deseas eliminar este elemento?');
        
        // Verificar la respuesta del usuario
        if (userConfirmed) {
            // Acción si el usuario hace clic en 'Aceptar'
            alert('El elemento ha sido eliminado.');
            location.reload();
        } else {
            // Acción si el usuario hace clic en 'Cancelar'
            alert('La acción fue cancelada.');
        }
    }
</script>

        </body>
        </html>
      ";

  } else {
    echo "No hay usuarios disponibles";
  }


} catch (PDOException $e) {
  die("Error al ejecutar la consulta:" . $e->getMessage());
}
