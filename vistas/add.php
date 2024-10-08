<?php
require_once 'conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();
//$resultado = mysqli_query($mysqli, "SELECT * FROM users ORDER BY id DESC");

//Resepcion de datos por metodo post desde ajax
try {
  $query = "SELECT id, user, password FROM users";
  $stmt = $conexion->prepare($query);
  $stmt->execute();

  // Almacena el resultado
  $resultado = $stmt->fetchAll();

  if ($resultado) {
    echo "<html>

          <head>
            Agregar usuario
          </head>

          <body>

            <p>
              <a href='../vistas/add.php'>Agregar Usuario</a>
            </p>
            <table width='80%' border=0>
              <tr bgcolor='pink'>
                <td><strong>ID</strong></td>
                <td><strong>Nombre</strong></td>
                <td><strong>Contrasenia</strong></td>
                <td><strong>Accion</strong></td>
              </tr>";
    foreach ($resultado as $res) {
      echo "
        <tr>
                <td>{$res['id']}</td>
                <td>{$res['user']}</td>
                <td>{$res['password']}</td>
                <td>Editar, Borrar</td>
        </tr>";
    }
    echo "
          </table>
        </body>
        </html>
      ";
  } else {
    echo "No hay usuarios disponibles";
  }
} catch (PDOException $e) {
  die("Error al ejecutar la consulta:" . $e->getMessage());
}
