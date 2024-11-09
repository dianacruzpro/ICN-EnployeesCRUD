<?php

class Conexion
{
  public static function Conectar()
  {
    $databaseHost = 'localhost:3306';
    $databaseName = 'icnproyect';
    $databaseUsername = 'root';
    $databasePassword = '';

    $opciones = array(
      PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, //Establecer modo de error
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC //Establece modo de recuperacion por defecto
    );

    try {
      $conexion = new PDO("mysql:host=$databaseHost;dbname=$databaseName", $databaseUsername, $databasePassword, $opciones);
      return $conexion;
    } catch (PDOException $e) {
      die("El error de conexion es :" . $e->getMessage());
    }
  }
}


/*

$databaeHost = 'localhost';
$databaseName = 'icnproyect';
$databaseUsername = 'root';
$databasePassword = '';


$mysqli = mysqli_connect($databaeHost, $databaseUsername, $databasePassword, $databaseName);*/
