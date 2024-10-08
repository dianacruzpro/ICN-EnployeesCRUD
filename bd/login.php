<?php
session_start();
require_once 'conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();
//$resultado = mysqli_query($mysqli, "SELECT * FROM users ORDER BY id DESC");

//Resepcion de datos por metodo post desde ajax
$usuario = (isset($_POST['username'])) ? $_POST['username'] : '';
$password = (isset($_POST['password'])) ? $_POST['password'] : '';

$pass = md5($password); // Encriptando la clave enviada por el usuario, para comparar con la almacenada en la bd 
$query = "SELECT * FROM users WHERE user = :usuario AND password = :pass"; // Usar parámetros
$stmt = $conexion->prepare($query);
$stmt->bindParam(':usuario', $usuario);
$stmt->bindParam(':pass', $pass);
$stmt->execute();

if($stmt->rowCount() >= 1){
  $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
  //Variables de sesion de usuario
  $_SESSION['usuario'] = $usuario; 
}else{
  $_SESSION['usuario'] = null;
  $data = null;
}

print json_encode($data);
$conexion=null;



?>