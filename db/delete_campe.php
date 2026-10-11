<?php 
/**
 * Eliminacion de Registros de Campesinos con Doble Verificacion
 *
 * Procesa la solicitud de baja de un usuario en la tabla 'usuarios'.
 * Para prevenir eliminaciones accidentales o no autorizadas, el sistema
 * exige que el usuario confirme la cedula de identidad del campesino
 * antes de proceder a ejecutar la sentencia DELETE.
 *
 * @package INTI\Database
 */

include 'db.php';

// Validacion de peticion POST con identificador de registro a eliminar
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_id'])) {
    $id = trim($_POST['delete_id']);
    $cedula_confirmar = trim($_POST['confirmar_delete']);

    // 1. Obtencion de la cedula actual registrada en la base de datos
    $sql = "SELECT cedula FROM usuarios WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':id' => $id]);
    $empleado = $stmt->fetch(PDO::FETCH_ASSOC);

    // 2. Comparacion estricta entre la cedula registrada y la ingresada como confirmacion
    if ($empleado && $empleado['cedula'] === $cedula_confirmar) {
        // Ejecucion de la eliminacion si la comprobacion es exitosa
        $sql = "DELETE FROM usuarios WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        if ($stmt->execute([':id' => $id])) {
            echo 'Campesino eliminado correctamente.';
        } else {
            echo 'Error al eliminar el Campesino.';
        }
    } else {
        // Notificacion de discrepancia en la confirmacion de cedula
        echo 'La cedula no coincide. No se puede eliminar el Campesino.';
    }
}
?>
