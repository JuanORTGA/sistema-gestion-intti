<?php 
/**
 * Actualizacion Dinamica de Empleados y Funcionarios
 *
 * Procesa la modificacion de datos de un empleado. Compara los datos recibidos
 * contra los valores almacenados actualmente en la base de datos y construye
 * una consulta UPDATE dinamica que solo altera aquellos campos que realmente
 * sufrieron variaciones, notificando con precision cuales fueron actualizados.
 *
 * @package INTI\Database
 */

include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit_id'])) {
    $id = trim($_POST['edit_id']);
    $fields = [];
    $params = [':id' => $id];
    $updated_fields = [];

    // 1. Consulta de los valores actuales para comparar
    $sql = "SELECT nombre, apellido, cedula, correo, telefono FROM empleados WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':id' => $id]);
    $current_values = $stmt->fetch(PDO::FETCH_ASSOC);

    // 2. Evaluacion campo por campo
    if (!empty($_POST['renew_name']) && $_POST['renew_name'] !== $current_values['nombre']) {
        $fields[] = 'nombre = :nombre';
        $params[':nombre'] = trim($_POST['renew_name']);
        $updated_fields[] = 'Nombre';
    }
    if (!empty($_POST['renew_apellido']) && $_POST['renew_apellido'] !== $current_values['apellido']) {
        $fields[] = 'apellido = :apellido';
        $params[':apellido'] = trim($_POST['renew_apellido']);
        $updated_fields[] = 'Apellido';
    }
    if (!empty($_POST['renew_cin']) && $_POST['renew_cin'] !== $current_values['cedula']) {
        $fields[] = 'cedula = :cedula';
        $params[':cedula'] = trim($_POST['renew_cin']);
        $updated_fields[] = 'Cedula de Identidad';
    }
    if (!empty($_POST['renew_email']) && $_POST['renew_email'] !== $current_values['correo']) {
        $fields[] = 'correo = :correo';
        $params[':correo'] = trim($_POST['renew_email']);
        $updated_fields[] = 'Correo Electronico';
    }
    if (!empty($_POST['renew_telefono']) && $_POST['renew_telefono'] !== $current_values['telefono']) {
        $fields[] = 'telefono = :telefono';
        $params[':telefono'] = trim($_POST['renew_telefono']);
        $updated_fields[] = 'Numero Telefonico';
    }

    // 3. Ejecucion de la actualizacion solo si hay modificaciones reales
    if (!empty($fields)) {
        $sql = "UPDATE empleados SET " . implode(', ', $fields) . " WHERE id = :id";
        $stmt = $pdo->prepare($sql);

        if ($stmt->execute($params)) {
            $updated_fields_str = implode(', ', $updated_fields);
            echo '<div class="alert alert-success" role="alert">Se han actualizado los siguientes datos con exito: ' . htmlspecialchars($updated_fields_str) . '.</div>';
        } else {
            echo '<div class="alert alert-danger" role="alert">Error al actualizar la informacion del funcionario.</div>';
        }
    } else {
        echo '<div class="alert alert-warning" role="alert">No se detectaron modificaciones en los datos ingresados.</div>';
    }
}
?>
