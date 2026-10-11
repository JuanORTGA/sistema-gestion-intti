<?php
/**
 * Busqueda y Ficha de Consulta de Empleados por Cedula
 *
 * Este script procesa las busquedas directas de funcionarios en la tabla 'empleados'
 * a traves de su numero de cedula. Si existe coincidencia, estructura una tarjeta
 * visual (card) con los datos del funcionario en modo solo lectura; si no,
 * genera una notificacion de advertencia.
 *
 * @package INTI\Database
 */

include 'db.php';

$usuariolist = '';

// Verificacion de envio del formulario por metodo POST con cedula informada
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['cedula'])) {
    $cedula = trim($_POST['cedula']);

    // Consulta preparada para buscar el empleado por cedula
    $sql = "SELECT id, nombre, apellido, cedula, correo, telefono FROM empleados WHERE cedula = :cedula";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['cedula' => $cedula]);
    $resultados1 = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Si se encuentra el registro, se construye la interfaz de la ficha
    if ($resultados1) {
        foreach ($resultados1 as $noticia) {
            $usuariolist .= '<div class="card shadow mb-4">';
            $usuariolist .= '<div class="card-header py-3">';
            $usuariolist .= '<h6 class="m-0 font-weight-bold text-primary">Informacion del Funcionario:</h6>';
            $usuariolist .= '</div>';

            $usuariolist .= '<div class="card-body">';
            $usuariolist .= '<div class="alert alert-success" role="alert">';
            $usuariolist .= '    Funcionario localizado exitosamente.';
            $usuariolist .= '</div>';

            $usuariolist .= '<div class="info">';
            $usuariolist .= '<label for="">Nombre:</label>';
            $usuariolist .= '<input type="text" class="form-control" value="' . htmlspecialchars($noticia['nombre']) . '" readonly>';
            $usuariolist .= '<br>';
            $usuariolist .= '<label for="">Apellido:</label>';
            $usuariolist .= '<input type="text" class="form-control" value="' . htmlspecialchars($noticia['apellido']) . '" readonly>';
            $usuariolist .= '<br>';
            $usuariolist .= '<label for="">Cedula de Identidad:</label>';
            $usuariolist .= '<input type="text" class="form-control" value="' . htmlspecialchars($noticia['cedula']) . '" readonly>';
            $usuariolist .= '<br>';
            $usuariolist .= '<label for="">Correo Electronico:</label>';
            $usuariolist .= '<input type="text" class="form-control" value="' . htmlspecialchars($noticia['correo']) . '" readonly>';
            $usuariolist .= '<br>';
            $usuariolist .= '<label for="">Telefono:</label>';
            $usuariolist .= '<input type="text" class="form-control" value="' . htmlspecialchars($noticia['telefono']) . '" readonly>';
            $usuariolist .= '</div>';
            $usuariolist .= '</div>';
            $usuariolist .= '</div>';
        }
    } else {
        // Mensaje de alerta en caso de no hallar coincidencias
        $usuariolist .= '<div class="alert alert-danger" role="alert">No se encontro ningun funcionario registrado con esa cedula.</div>';
    }
}
?>
