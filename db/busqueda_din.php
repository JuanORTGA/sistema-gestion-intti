<?php 
/**
 * Busqueda Dinamica de Campesinos y Productores
 *
 * Este script procesa las solicitudes asincronas (AJAX) emitidas desde la interfaz
 * cuando el usuario ingresa un termino en el campo de busqueda. Evalua coincidencias
 * en multiples campos (cedula, nombres, apellidos, correo, estado, municipio, etc.)
 * y genera dinamicamente las filas HTML (<tr>) para actualizar la tabla sin recargar
 * la pagina web.
 *
 * @package INTI\Database
 */

include 'db.php';

// Verificacion de que se haya recibido el parametro de busqueda por metodo GET
if (isset($_GET['datos'])) {
    $datos = trim($_GET['datos']);

    // Construccion de la consulta preparada buscando coincidencias en multiples columnas
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
    // Asignacion del termino con comodines para busqueda parcial
    $stmt->execute(['datos' => '%' . $datos . '%']);
    $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Si existen registros que coincidan, se imprimen las filas para la tabla
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
            
            // Acciones para abrir modales de edicion y confirmacion de borrado
            echo '<td><button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editModal" data-id="' . $campesino['id'] . '">Editar</button></td>';
            echo '<td><button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal" data-id="' . $campesino['id'] . '">Eliminar</button></td>';
            echo '</tr>';
        }
    } else {
        // Mensaje mostrado si la busqueda no arroja ninguna coincidencia
        echo '<tr><td colspan="12" class="text-center">No se encontraron resultados para la busqueda.</td></tr>';
    }
}
?>


