<?php 
/**
 * Eliminacion de Registros de Personal Administrativo con Doble Verificacion
 *
 * Procesa la solicitud de baja de un funcionario en la tabla 'empleados'.
 * Exige la confirmacion explícita del numero de cedula de identidad para
 * autorizar la ejecucion del borrado definitivo en el sistema.
 *
 * @package INTI\Database
 */

include 'db.php';

// Validacion de peticion POST con identificador del empleado
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_id'])) {
    $id = trim($_POST['delete_id']);
    $cedula_confirmar = trim($_POST['confirmar_delete']);

    // 1. Obtencion de la cedula actual del empleado desde la base de datos
    $sql = "SELECT cedula FROM empleados WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':id' => $id]);
    $empleado = $stmt->fetch(PDO::FETCH_ASSOC);

    // 2. Comprobacion de coincidencia con la cedula provista en la confirmacion
    if ($empleado && $empleado['cedula'] === $cedula_confirmar) {
        // Ejecucion de la sentencia DELETE
        $sql = "DELETE FROM empleados WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        if ($stmt->execute([':id' => $id])) {
            echo 'Empleado eliminado correctamente.';
        } else {
            echo 'Error al eliminar el empleado.';
        }
    } else {
        // Alerta en caso de no coincidir la confirmacion
        echo 'La cedula no coincide. No se puede eliminar el empleado.';
    }
}
?>
