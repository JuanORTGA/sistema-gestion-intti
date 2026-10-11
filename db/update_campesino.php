<?php 
/**
 * Actualizacion Dinamica de Datos de Campesinos
 *
 * Procesa las modificaciones de informacion de un usuario campesino.
 * Obtiene los valores actuales registrados, los compara uno a uno contra
 * los campos enviados en el formulario modal y ejecuta un UPDATE dinamico
 * exclusivamente para los campos alterados, informando con detalle los cambios.
 *
 * @package INTI\Database
 */

include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit_id'])) {
    $id = trim($_POST['edit_id']);
    $fields = [];
    $params = [':id' => $id];
    $updated_fields = [];

    // 1. Obtencion de los valores vigentes en la base de datos
    $sql = "SELECT nombres, apellidos, cedula, correo, telefono, sexo, fecha_nacimiento, estado, municipio, parroquia, sector FROM usuarios WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':id' => $id]);
    $current_values = $stmt->fetch(PDO::FETCH_ASSOC);

    // 2. Comprobacion individual de cambios en cada campo
    if (!empty($_POST['renew_name']) && $_POST['renew_name'] !== $current_values['nombres']) {
        $fields[] = 'nombres = :nombres';
        $params[':nombres'] = trim($_POST['renew_name']);
        $updated_fields[] = 'Nombres';
    }
    if (!empty($_POST['renew_apellido']) && $_POST['renew_apellido'] !== $current_values['apellidos']) {
        $fields[] = 'apellidos = :apellidos';
        $params[':apellidos'] = trim($_POST['renew_apellido']);
        $updated_fields[] = 'Apellidos';
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
    if (!empty($_POST['renew_sexo']) && $_POST['renew_sexo'] !== $current_values['sexo']) {
        $fields[] = 'sexo = :sexo';
        $params[':sexo'] = trim($_POST['renew_sexo']);
        $updated_fields[] = 'Sexo';
    }
    if (!empty($_POST['renew_fecha_nacimiento']) && $_POST['renew_fecha_nacimiento'] !== $current_values['fecha_nacimiento']) {
        $fields[] = 'fecha_nacimiento = :fecha_nacimiento';
        $params[':fecha_nacimiento'] = trim($_POST['renew_fecha_nacimiento']);
        $updated_fields[] = 'Fecha de Nacimiento';
    }
    if (!empty($_POST['renew_estado']) && $_POST['renew_estado'] !== $current_values['estado']) {
        $fields[] = 'estado = :estado';
        $params[':estado'] = trim($_POST['renew_estado']);
        $updated_fields[] = 'Estado';
    }
    if (!empty($_POST['renew_municipio']) && $_POST['renew_municipio'] !== $current_values['municipio']) {
        $fields[] = 'municipio = :municipio';
        $params[':municipio'] = trim($_POST['renew_municipio']);
        $updated_fields[] = 'Municipio';
    }
    if (!empty($_POST['renew_parroquia']) && $_POST['renew_parroquia'] !== $current_values['parroquia']) {
        $fields[] = 'parroquia = :parroquia';
        $params[':parroquia'] = trim($_POST['renew_parroquia']);
        $updated_fields[] = 'Parroquia';
    }
    if (!empty($_POST['renew_sector']) && $_POST['renew_sector'] !== $current_values['sector']) {
        $fields[] = 'sector = :sector';
        $params[':sector'] = trim($_POST['renew_sector']);
        $updated_fields[] = 'Sector';
    }

    // 3. Ejecucion de la actualizacion dinamica
    if (!empty($fields)) {
        $sql = "UPDATE usuarios SET " . implode(', ', $fields) . " WHERE id = :id";
        $stmt = $pdo->prepare($sql);

        if ($stmt->execute($params)) {
            $updated_fields_str = implode(', ', $updated_fields);
            echo '<div class="alert alert-success" role="alert">Se han actualizado con exito los siguientes datos: ' . htmlspecialchars($updated_fields_str) . '.</div>';
        } else {
            echo '<div class="alert alert-danger" role="alert">Error al actualizar la informacion del campesino.</div>';
        }
    } else {
        echo '<div class="alert alert-warning" role="alert">No se detectaron modificaciones en los datos del campesino.</div>';
    }
}
?>
