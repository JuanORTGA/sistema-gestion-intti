<?php 
/**
 * Actualizacion Dinamica de Comandos Campesinos y Ficha Agropecuaria
 *
 * Modifica los datos productivos y juridicos de los campesinos: cosechas,
 * produccion de alimentos, cria de animales, situacion legal del predio,
 * fuentes de ingreso y pertenencia a organizaciones con o sin fines de lucro.
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
    $sql = "SELECT nombres, apellidos, cedula, cosecha, comida, crias, situacion_juridica, fuentes_ingresos, organizacion_campesina, oganizacion_fines_lucro FROM usuarios WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':id' => $id]);
    $current_values = $stmt->fetch(PDO::FETCH_ASSOC);

    // 2. Comparacion campo por campo
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
    if (!empty($_POST['renew_cosecha']) && $_POST['renew_cosecha'] !== $current_values['cosecha']) {
        $fields[] = 'cosecha = :cosecha';
        $params[':cosecha'] = trim($_POST['renew_cosecha']);
        $updated_fields[] = 'Cosecha';
    }
    if (!empty($_POST['renew_comida']) && $_POST['renew_comida'] !== $current_values['comida']) {
        $fields[] = 'comida = :comida';
        $params[':comida'] = trim($_POST['renew_comida']);
        $updated_fields[] = 'Alimentos';
    }
    if (!empty($_POST['renew_crias']) && $_POST['renew_crias'] !== $current_values['crias']) {
        $fields[] = 'crias = :crias';
        $params[':crias'] = trim($_POST['renew_crias']);
        $updated_fields[] = 'Crias de Animales';
    }
    if (!empty($_POST['renew_situacion_juridica']) && $_POST['renew_situacion_juridica'] !== $current_values['situacion_juridica']) {
        $fields[] = 'situacion_juridica = :situacion_juridica';
        $params[':situacion_juridica'] = trim($_POST['renew_situacion_juridica']);
        $updated_fields[] = 'Situacion Juridica';
    }
    if (!empty($_POST['renew_fuentes_ingresos']) && $_POST['renew_fuentes_ingresos'] !== $current_values['fuentes_ingresos']) {
        $fields[] = 'fuentes_ingresos = :fuentes_ingresos';
        $params[':fuentes_ingresos'] = trim($_POST['renew_fuentes_ingresos']);
        $updated_fields[] = 'Fuentes de Ingresos';
    }
    if (!empty($_POST['renew_organizacion_campesina']) && $_POST['renew_organizacion_campesina'] !== $current_values['organizacion_campesina']) {
        $fields[] = 'organizacion_campesina = :organizacion_campesina';
        $params[':organizacion_campesina'] = trim($_POST['renew_organizacion_campesina']);
        $updated_fields[] = 'Organizacion Campesina';
    }
    if (!empty($_POST['renew_oganizacion_fines_lucro']) && $_POST['renew_oganizacion_fines_lucro'] !== $current_values['oganizacion_fines_lucro']) {
        $fields[] = 'oganizacion_fines_lucro = :oganizacion_fines_lucro';
        $params[':oganizacion_fines_lucro'] = trim($_POST['renew_oganizacion_fines_lucro']);
        $updated_fields[] = 'Organizacion con Fines de Lucro';
    }

    // 3. Ejecucion de la actualizacion
    if (!empty($fields)) {
        $sql = "UPDATE usuarios SET " . implode(', ', $fields) . " WHERE id = :id";
        $stmt = $pdo->prepare($sql);

        if ($stmt->execute($params)) {
            $updated_fields_str = implode(', ', $updated_fields);
            echo '<div class="alert alert-success" role="alert">Se han actualizado con exito los siguientes datos: ' . htmlspecialchars($updated_fields_str) . '.</div>';
        } else {
            echo '<div class="alert alert-danger" role="alert">Error al actualizar la informacion del comando campesino.</div>';
        }
    } else {
        echo '<div class="alert alert-warning" role="alert">No se detectaron modificaciones en los datos.</div>';
    }
}
?>
