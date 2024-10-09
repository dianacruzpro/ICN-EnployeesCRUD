<?php
session_start();
require_once 'conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

// Recepción de datos por método POST desde AJAX
$usuario = (isset($_POST['username'])) ? $_POST['username'] : '';
$password = (isset($_POST['password'])) ? $_POST['password'] : '';

$pass = md5($password); // Encriptando la clave enviada por el usuario, para comparar con la almacenada en la BD

// Consultar si el usuario existe y obtener el id_rol correspondiente
$query = "SELECT u.user, u.password, r.id_rango, ro.nombre as rol 
          FROM users u 
          JOIN roles ro ON u.id_rol = ro.id_rol
          JOIN rango r ON ro.id_rol = r.id_rol
          WHERE u.user = :usuario";

$stmt = $conexion->prepare($query);
$stmt->bindParam(':usuario', $usuario);
$stmt->execute();
$data = $stmt->fetch(PDO::FETCH_ASSOC);

if ($data && $pass == $data['password']) {
    // El usuario existe y la contraseña es correcta
    $_SESSION['usuario'] = $usuario;
    $_SESSION['s_idrango'] = $data['id_rango'];
    $_SESSION['s_rol'] = $data['rol'];

    // Redirigir según el rango del usuario...
    switch ($_SESSION['s_idrango']) {
        case '1':
            echo json_encode(['redirect' => '../vistas/home.php']);
            exit();
        case '2':
            echo json_encode(['redirect' => '../vistas/homeR2.php']);
            exit();
        case '3':
            echo json_encode(['redirect' => '../vistas/homeR3.php']);
            exit();
        default:
            echo json_encode(['redirect' => '../vistas/access_denied.php']);
            exit();
    }
} else {
    // Usuario no existe o contraseña incorrecta
    $_SESSION['usuario'] = null;
    echo json_encode(['redirect' => '../index.php']);
    exit();

}
//print json_encode($data);
$conexion = null;