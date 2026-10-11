<?php 
/**
 * Busqueda Dinamica para el Modulo Formativo
 *
 * Procesa las peticiones asincronas del buscador en la vista del proceso formativo.
 * Evalua las coincidencias en las distintas columnas de informacion del usuario
 * y devuelve la estructura de tabla requerida por la interfaz.
 *
 * @package INTI\Database
 */

include 'db.php';

// Verificacion de la recepcion del parametro de busqueda
if (isset($_GET['datos'])) {
    $datos = trim($_GET['datos']);

    // Consulta de busqueda en campos personales y de ubicacion
    $sql = "SELECT id, nombres, apellidos, cedula, correo, telefono, sexo, fecha_nacimiento, estado, municipio, parroquia, sector 
            FROM usuarios
            WHERE nombres LIKE :datos 
            OR apellidos LIKE :datos 
            OR cedula LIKE :datos 
            OR correo LIKE :datos 
            OR telefono LIKE :datos 
            OR sexo LIKE :datos 
            OR fecha_nacimiento LIKE :datos 
            OR estado LIKE :datos 
            OR municipio LIKE :datos 
            OR parroquia LIKE :datos 
            OR sector LIKE :datos";
            
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['datos' => '%' . $datos . '%']);
    $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Renderizado de resultados en filas HTML
    if ($resultados) {
        foreach ($resultados as $index => $campesino) {
            echo '<tr>';
            echo '<th scope="row">' . $campesino['id'] . '</th>';
            echo '<td>' . htmlspecialchars($campesino['nombres']) . '</td>';
            echo '<td>' . htmlspecialchars($campesino['apellidos']) . '</td>';
            echo '<td>' . htmlspecialchars($campesino['cedula']) . '</td>';
            echo '<td>' . htmlspecialchars($campesino['correo']) . '</td>';
            echo '<td>' . htmlspecialchars($campesino['telefono']) . '</td>';
            echo '<td>' . htmlspecialchars($campesino['sexo']) . '</td>';
            echo '<td>' . htmlspecialchars($campesino['fecha_nacimiento']) . '</td>';
            echo '<td>' . htmlspecialchars($campesino['estado']) . '</td>';
            echo '<td>' . htmlspecialchars($campesino['municipio']) . '</td>';
            echo '<td>' . htmlspecialchars($campesino['parroquia']) . '</td>';
            echo '<td>' . htmlspecialchars($campesino['sector']) . '</td>';
            
            // Botones interactivos para edicion y eliminacion
            echo '<td><button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editModal" data-id="' . $campesino['id'] . '">Editar</button></td>';
            echo '<td><button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal" data-id="' . $campesino['id'] . '">Eliminar</button></td>';
            echo '</tr>';
        }
    } else {
        echo '<tr><td colspan="12" class="text-center">No se encontraron resultados para la busqueda.</td></tr>';
    }
}
?>


