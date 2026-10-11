<?php
/**
 * Componente de Tabla y Modales para Procesos Formativos
 *
 * Consulta la informacion de participacion organizativa e interes de capacitacion
 * de los campesinos: organizacion de pertenencia, area formativa de preferencia,
 * horario y dias de disponibilidad. Contiene los modales para editar estos datos
 * o eliminar el registro.
 *
 * @package INTI\Database
 */

include 'db.php';

// 1. Consulta de requerimientos formativos y comunitarios
$sql = "SELECT id, nombres, apellidos, cedula, pert_organizacion, name_org, fortaleza_org, area_formativa, horario_disponible, dias_formacion FROM usuarios ORDER BY id ASC";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$list_campesinos_result = $stmt->fetchAll(PDO::FETCH_ASSOC);

$list_campesinos = '';

// 2. Armado de filas de la tabla con sanitizacion XSS
foreach ($list_campesinos_result as $campesino) {
    $list_campesinos .= '<tr>';
    $list_campesinos .= '<th scope="row">' . htmlspecialchars($campesino['id']) . '</th>';
    $list_campesinos .= '<td>' . htmlspecialchars($campesino['nombres']) . '</td>';
    $list_campesinos .= '<td>' . htmlspecialchars($campesino['apellidos']) . '</td>';
    $list_campesinos .= '<td>' . htmlspecialchars($campesino['cedula']) . '</td>';
    $list_campesinos .= '<td>' . htmlspecialchars($campesino['pert_organizacion']) . '</td>';
    $list_campesinos .= '<td>' . htmlspecialchars($campesino['name_org']) . '</td>';
    $list_campesinos .= '<td>' . htmlspecialchars($campesino['fortaleza_org']) . '</td>';
    $list_campesinos .= '<td>' . htmlspecialchars($campesino['area_formativa']) . '</td>';
    $list_campesinos .= '<td>' . htmlspecialchars($campesino['horario_disponible']) . '</td>';
    $list_campesinos .= '<td>' . htmlspecialchars($campesino['dias_formacion']) . '</td>';
    $list_campesinos .= '<td><button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editModal" data-id="' . htmlspecialchars($campesino['id']) . '">Editar</button></td>';
    $list_campesinos .= '<td><button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal" data-id="' . htmlspecialchars($campesino['id']) . '">Eliminar</button></td>';
    $list_campesinos .= '</tr>';
}

if (empty($list_campesinos)) {
    $list_campesinos = '<tr><td colspan="12" class="text-center">No hay registros formativos disponibles.</td></tr>';
}

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
                <h5 class="modal-title" id="editModalLabel">Editar Campesino</h5>
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
                    <label for="renew_email">¿Pertenece a una Organizacion?</label>
                    <input type="text" class="form-control" id="renew_pert_organizacion" name="renew_pert_organizacion">
                    <br>
                    <label for="renew_telefono">Nombre de la Organizacion</label>
                    <input type="text" class="form-control" id="renew_name_org" name="renew_name_org">
                    <br>
                    <label for="renew_email">Fortalezas de la Organizacion</label>
                    <input type="text" class="form-control" id="renew_fortaleza_org" name="renew_fortaleza_org">
                    <br>
                    <label for="renew_email">¿Area donde le guste Profundizar Formativamente?</label>
                    <input type="text" class="form-control" id="renew_area_formativa" name="renew_area_formativa">
                    <br>
                    <label for="renew_email">Horario Disponible</label>
                    <input type="text" class="form-control" id="renew_horario_disponible" name="renew_horario_disponible">
                    <br>
                    <label for="renew_email">¿Dias disponibles para la Formacion?</label>
                    <input type="text" class="form-control" id="renew_dias_formacion" name="renew_dias_formacion">
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
                <h5 class="modal-title" id="deleteModalLabel">Eliminar Campesino</h5>
            </div>
            <div class="modal-body">
                <div class="alert alert-warning" role="alert">
                    ¿Estás completamente seguro que deseas eliminarle la cuenta a <strong><?php echo $campesino['nombres']; ?> <?php echo $campesino['apellidos']; ?>?</strong>
                </div>
                <span>*Para confirmar escriba la cédula de la persona</span>
                <br>
                <form method="post" id="deleteForm">
                    <input type="hidden" name="delete_id" value="<?php echo $campesino['id']; ?>">
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
            // Si es necesario, puedes usar AJAX aquí para obtener más detalles del campesino y rellenar el modal
            var modal = $(this);
            modal.find('.modal-body').text('ID del campesino: ' + id);
        });

        $('#deleteModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget); // Botón que activó el modal
            var id = button.data('id'); // Extraer información de los atributos data-*
            // Si es necesario, puedes usar AJAX aquí para obtener más detalles del campesino y rellenar el modal
            var modal = $(this);
            modal.find('.modal-body').text('ID del campesino: ' + id);
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
                const pert_organizacion = row.children[4].textContent;
                const name_org = row.children[5].textContent;
                const fortaleza_org = row.children[6].textContent;
                const area_formativa = row.children[7].textContent;
                const horario_disponible = row.children[8].textContent;
                const dias_formacion = row.children[9].textContent;

                document.getElementById('edit_id').value = id;
                document.getElementById('renew_name').value = nombre;
                document.getElementById('renew_apellido').value = apellido;
                document.getElementById('renew_cin').value = cedula;
                document.getElementById('renew_pert_organizacion').value = pert_organizacion;
                document.getElementById('renew_name_org').value = name_org;
                document.getElementById('renew_fortaleza_org').value = fortaleza_org;
                document.getElementById('renew_area_formativa').value = area_formativa;
                document.getElementById('renew_horario_disponible').value = horario_disponible;
                document.getElementById('renew_dias_formacion').value = dias_formacion;

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

        fetch('../db/update_formativo.php', {
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

        fetch('../db/delete_campe.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.text())
            .then(data => {
                // Redirigir a la página original con un parámetro de éxito
                window.location.href = 'proceso_formatico.php?delete_status=' + encodeURIComponent(data);
            })
            .catch(error => console.error('Error:', error));
    }
</script>