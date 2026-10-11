<?php 
/**
 * Actualizacion Dinamica de Datos de Formacion y Capacitacion
 *
 * Procesa las modificaciones de interes formativo del campesino:
 * pertenencia a organizaciones campesinas, nombre y fortalezas de la organizacion,
 * area formativa de preferencia, horario disponible y dias previstos para capacitacion.
 *
 * @package INTI\Database
 */

include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit_id'])) {
    $id = trim($_POST['edit_id']);
    $fields = [];
    $params = [':id' => $id];
    $updated_fields = [];

    // 1. Obtencion de los valores vigentes
    $sql = "SELECT nombres, apellidos, cedula, pert_organizacion, name_org, fortaleza_org, area_formativa, horario_disponible, dias_formacion FROM usuarios WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':id' => $id]);
    $current_values = $stmt->fetch(PDO::FETCH_ASSOC);

    // 2. Evaluacion de modificaciones campo por campo
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
    if (!empty($_POST['renew_pert_organizacion']) && $_POST['renew_pert_organizacion'] !== $current_values['pert_organizacion']) {
        $fields[] = 'pert_organizacion = :pert_organizacion';
        $params[':pert_organizacion'] = trim($_POST['renew_pert_organizacion']);
        $updated_fields[] = 'Pertenencia a Organizacion';
    }
    if (!empty($_POST['renew_name_org']) && $_POST['renew_name_org'] !== $current_values['name_org']) {
        $fields[] = 'name_org = :name_org';
        $params[':name_org'] = trim($_POST['renew_name_org']);
        $updated_fields[] = 'Nombre de la Organizacion';
    }
    if (!empty($_POST['renew_fortaleza_org']) && $_POST['renew_fortaleza_org'] !== $current_values['fortaleza_org']) {
        $fields[] = 'fortaleza_org = :fortaleza_org';
        $params[':fortaleza_org'] = trim($_POST['renew_fortaleza_org']);
        $updated_fields[] = 'Fortalezas de la Organizacion';
    }
    if (!empty($_POST['renew_area_formativa']) && $_POST['renew_area_formativa'] !== $current_values['area_formativa']) {
        $fields[] = 'area_formativa = :area_formativa';
        $params[':area_formativa'] = trim($_POST['renew_area_formativa']);
        $updated_fields[] = 'Area Formativa';
    }
    if (!empty($_POST['renew_horario_disponible']) && $_POST['renew_horario_disponible'] !== $current_values['horario_disponible']) {
        $fields[] = 'horario_disponible = :horario_disponible';
        $params[':horario_disponible'] = trim($_POST['renew_horario_disponible']);
        $updated_fields[] = 'Horario Disponible';
    }
    if (!empty($_POST['renew_dias_formacion']) && $_POST['renew_dias_formacion'] !== $current_values['dias_formacion']) {
        $fields[] = 'dias_formacion = :dias_formacion';
        $params[':dias_formacion'] = trim($_POST['renew_dias_formacion']);
        $updated_fields[] = 'Dias de Formacion';
    }

    // 3. Ejecucion de la actualizacion dinamica
    if (!empty($fields)) {
        $sql = "UPDATE usuarios SET " . implode(', ', $fields) . " WHERE id = :id";
        $stmt = $pdo->prepare($sql);

        if ($stmt->execute($params)) {
            $updated_fields_str = implode(', ', $updated_fields);
            echo '<div class="alert alert-success" role="alert">Se han actualizado con exito los siguientes datos: ' . htmlspecialchars($updated_fields_str) . '.</div>';
        } else {
            echo '<div class="alert alert-danger" role="alert">Error al actualizar la informacion formativa.</div>';
        }
    } else {
        echo '<div class="alert alert-warning" role="alert">No se detectaron modificaciones en los datos.</div>';
    }
}
?>
