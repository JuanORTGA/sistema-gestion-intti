<?php
/**
 * Componente de Tabla y Modales de Personal Administrativo
 *
 * Consulta la totalidad de funcionarios registrados en la tabla 'empleados',
 * genera las filas dinamicas (<tr>) con acciones de edicion y borrado,
 * e incluye los formularios modales de Bootstrap para actualizar datos y confirmar la baja.
 *
 * @package INTI\Database
 */

include 'db.php';

// 1. Consulta de todos los funcionarios registrados
$sql = "SELECT id, nombre, apellido, cedula, correo, telefono FROM empleados ORDER BY id ASC";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$list_empleados_result = $stmt->fetchAll(PDO::FETCH_ASSOC);

$list_empleados = '';

// 2. Construccion de las filas de la tabla con proteccion contra inyeccion XSS
foreach ($list_empleados_result as $empleado) {
    $list_empleados .= '<tr>';
    $list_empleados .= '<th scope="row">' . htmlspecialchars($empleado['id']) . '</th>';
    $list_empleados .= '<td>' . htmlspecialchars($empleado['nombre']) . '</td>';
    $list_empleados .= '<td>' . htmlspecialchars($empleado['apellido']) . '</td>';
    $list_empleados .= '<td>' . htmlspecialchars($empleado['cedula']) . '</td>';
    $list_empleados .= '<td>' . htmlspecialchars($empleado['correo']) . '</td>';
    $list_empleados .= '<td>' . htmlspecialchars($empleado['telefono']) . '</td>';
    $list_empleados .= '<td><button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editModal" data-id="' . htmlspecialchars($empleado['id']) . '">Editar</button></td>';
    $list_empleados .= '<td><button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal" data-id="' . htmlspecialchars($empleado['id']) . '">Eliminar</button></td>';
    $list_empleados .= '</tr>';
}

// Mensaje en caso de tabla vacia
if (empty($list_empleados)) {
    $list_empleados = '<tr><td colspan="8" class="text-center">No hay empleados registrados en el sistema.</td></tr>';
}

// Notificacion temporal de estatus de borrado si proviene de una redireccion
if (isset($_GET['delete_status'])) {
    echo '<div class="alert alert-success" role="alert">' . htmlspecialchars($_GET['delete_status']) . '</div>';
    echo '<script>
            setTimeout(function() {
                window.location.href = "' . $_SERVER['PHP_SELF'] . '";
            }, 3000);
          </script>';
}
?>

<!-- Modal Edit Admins -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Editar Empleado</h5>
            </div>
            <div class="modal-body">
                <div class="alert alert-info" role="alert">
                    Recuerda estar seguro al cambiar algo de esta cuenta!
                </div>
                <form method="post" id="editForm">
                    <input type="hidden" id="edit_id" name="edit_id">
                    <label for="renew_name">¿Cambio de Nombre?</label>
                    <input type="text" class="form-control" id="renew_name" name="renew_name">
                    <br>
                    <label for="renew_apellido">¿Cambio de Apellido?</label>
                    <input type="text" class="form-control" id="renew_apellido" name="renew_apellido">
                    <br>
                    <label for="renew_cin">¿Cambio de Cédula?</label>
                    <input type="text" class="form-control" id="renew_cin" name="renew_cin">
                    <br>
                    <label for="renew_email">¿Cambio de Correo?</label>
                    <input type="text" class="form-control" id="renew_email" name="renew_email">
                    <br>
                    <label for="renew_telefono">¿Cambio de Celular?</label>
                    <input type="text" class="form-control" id="renew_telefono" name="renew_telefono">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" onclick="submitEditForm()">Guardar cambios</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Delete Admins -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Eliminar Empleado</h5>
            </div>
            <div class="modal-body">
                <div class="alert alert-warning" role="alert">
                    ¿Estás completamente seguro que deseas eliminarle la cuenta a <strong><?php echo $empleado['nombre']; ?> <?php echo $empleado['apellido']; ?>?</strong>
                </div>
                <span>*Para confirmar escriba la cédula de la persona</span>
                <br>
                <form method="post" id="deleteForm">
                    <input type="hidden" name="delete_id" value="<?php echo $empleado['id']; ?>">
                    <input type="text" class="form-control" name="confirmar_delete" id="confirmar_delete" required>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-danger" onclick="submitDeleteForm()">Eliminar</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#editModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget); // Botón que activó el modal
            var id = button.data('id'); // Extraer información de los atributos data-*
            // Si es necesario, puedes usar AJAX aquí para obtener más detalles del empleado y rellenar el modal
            var modal = $(this);
            modal.find('.modal-body').text('ID del empleado: ' + id);
        });

        $('#deleteModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget); // Botón que activó el modal
            var id = button.data('id'); // Extraer información de los atributos data-*
            // Si es necesario, puedes usar AJAX aquí para obtener más detalles del empleado y rellenar el modal
            var modal = $(this);
            modal.find('.modal-body').text('ID del empleado: ' + id);
        });
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('[data-bs-target="#editModal"]').forEach(button => {
            button.addEventListener('click', function() {
                const id = this.getAttribute('data-id');
                const row = this.closest('tr');
                const nombre = row.children[1].textContent;
                const apellido = row.children[2].textContent;
                const cedula = row.children[3].textContent;
                const correo = row.children[4].textContent;
                const telefono = row.children[5].textContent;

                document.getElementById('edit_id').value = id;
                document.getElementById('renew_name').value = nombre;
                document.getElementById('renew_apellido').value = apellido;
                document.getElementById('renew_cin').value = cedula;
                document.getElementById('renew_email').value = correo;
                document.getElementById('renew_telefono').value = telefono;
            });
        });
    });

    function submitEditForm() {
        document.getElementById('editForm').submit();
    }
</script>

<script>
    function submitEditForm() {
        var form = document.getElementById('editForm');
        var formData = new FormData(form);

        fetch('../db/update_personal.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.text())
            .then(data => {
                document.querySelector('.modal-body').innerHTML = data;
            })
            .catch(error => console.error('Error:', error));
    }
</script>

<script>
    function submitDeleteForm() {
        var form = document.getElementById('deleteForm');
        var formData = new FormData(form);

        fetch('../db/delete_person.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.text())
            .then(data => {
                // Redirigir a la página original con un parámetro de éxito
                window.location.href = 'personal_administrativo.php?delete_status=' + encodeURIComponent(data);
            })
            .catch(error => console.error('Error:', error));
    }
</script>