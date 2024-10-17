<?php
session_start();

// Verificar si el usuario está autenticado
if (!isset($_SESSION['usuario']) || $_SESSION['usuario'] === null) {
    echo "No autorizado.";
    exit();
}

// Conexión a la base de datos
require_once '../bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

// Verificar si se ha enviado el id_empleado por método POST
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id_empleado'])) {
    $id_empleado = $_POST['id_empleado'];

    try {
        // Eliminar el registro del empleado
        $query = "DELETE FROM empleados WHERE id_empleado = :id_empleado";
        $stmt = $conexion->prepare($query);
        $stmt->bindParam(':id_empleado', $id_empleado);
        $stmt->execute();

        // Responder con éxito
        echo "Eliminación exitosa.";
    } catch (PDOException $e) {
        // Responder con mensaje de error
        echo "Error al eliminar empleado: " . $e->getMessage();
    }
} else {
    echo "Solicitud inválida.";
}
?>