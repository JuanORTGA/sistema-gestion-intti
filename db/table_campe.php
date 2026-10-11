<?php
/**
 * Componente de Tabla Maestra y Modales para Campesinos
 *
 * Consulta los datos personales, de contacto y de ubicacion territorial
 * de los campesinos registrados en 'usuarios'. Genera las filas HTML
 * para la visualizacion con DataTables y provee los formularios modales
 * para editar y eliminar productores.
 *
 * @package INTI\Database
 */

include 'db.php';

// 1. Consulta de la lista general de campesinos
$sql = "SELECT id, nombres, apellidos, cedula, correo, telefono, sexo, fecha_nacimiento, estado, municipio, parroquia, sector FROM usuarios ORDER BY id ASC";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$list_campesinos_result = $stmt->fetchAll(PDO::FETCH_ASSOC);

$list_campesinos = '';

// 2. Generacion de filas dinamicas con saneamiento htmlspecialchars
foreach ($list_campesinos_result as $campesino) {
    $list_campesinos .= '<tr>';
    $list_campesinos .= '<th scope="row">' . htmlspecialchars($campesino['id']) . '</th>';
    $list_campesinos .= '<td>' . htmlspecialchars($campesino['nombres']) . '</td>';
    $list_campesinos .= '<td>' . htmlspecialchars($campesino['apellidos']) . '</td>';
    $list_campesinos .= '<td>' . htmlspecialchars($campesino['cedula']) . '</td>';
    $list_campesinos .= '<td>' . htmlspecialchars($campesino['correo']) . '</td>';
    $list_campesinos .= '<td>' . htmlspecialchars($campesino['telefono']) . '</td>';
    $list_campesinos .= '<td>' . htmlspecialchars($campesino['sexo']) . '</td>';
    $list_campesinos .= '<td>' . htmlspecialchars($campesino['fecha_nacimiento']) . '</td>';
    $list_campesinos .= '<td>' . htmlspecialchars($campesino['estado']) . '</td>';
    $list_campesinos .= '<td>' . htmlspecialchars($campesino['municipio']) . '</td>';
    $list_campesinos .= '<td>' . htmlspecialchars($campesino['parroquia']) . '</td>';
    $list_campesinos .= '<td>' . htmlspecialchars($campesino['sector']) . '</td>';
    $list_campesinos .= '<td><button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editModal" data-id="' . htmlspecialchars($campesino['id']) . '">Editar</button></td>';
    $list_campesinos .= '<td><button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal" data-id="' . htmlspecialchars($campesino['id']) . '">Eliminar</button></td>';
    $list_campesinos .= '</tr>';
}

// Mensaje en caso de no haber registros
if (empty($list_campesinos)) {
    $list_campesinos = '<tr><td colspan="14" class="text-center">No hay campesinos registrados en el sistema.</td></tr>';
}

// Notificacion de estatus tras una eliminacion
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
                    <input type="text" class="form-control" id="renew_name" name="renew_name" maxlength="20" minlength="3" onkeypress="return Solo_Letras(event);">
                    <br>
                    <label for="renew_apellido">¿Cambio de Apellido?</label>
                    <input type="text" class="form-control" id="renew_apellido" name="renew_apellido" maxlength="20" minlength="3" onkeypress="return Solo_Letras(event);">
                    <br>
                    <label for="renew_cin">¿Cambio de Cédula?</label>
                    <input type="text" class="form-control" id="renew_cin" name="renew_cin" min="3000000" max="30000000" onkeypress="return Solo_Numero(event);" minlength="7" maxlength="8" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" >
                    <br>
                    <label for="renew_email">¿Cambio de Correo?</label>
                    <input type="text" class="form-control" id="renew_email" name="renew_email">
                    <br>
                    <label for="renew_telefono">¿Cambio de Celular?</label>
                    <input type="text" class="form-control" id="renew_telefono" name="renew_telefono" onkeypress="return Solo_Numero(event);">
                    <br>
                    <label for="renew_sexo">¿Cambiar sexo?</label>
                    <select class="form-control" id="renew_sexo" name="renew_sexo" onkeypress="return Solo_Letras(event);">
                        <option value="" disabled selected hidden>Sexo</option>
                        <option value="Hombre">Hombre</option>
                        <option value="mujer">Mujer</option>
                    </select>  
                    <br>
                    <label for="renew_fecha_nacimiento">¿Cambiar Fecha de Nacimiento?</label>
                    <input type="date" class="form-control"  min="1934-12-31-"  max="1994-12-31" id="renew_fecha_nacimiento" name="renew_fecha_nacimiento">
                    <br>
                    <label for="renew_estado">¿Cambiar estado?</label>
                    <input type="text" class="form-control" id="renew_estado" name="renew_estado">
                    <br>
                    <label for="renew_municipio">¿Cambiar municipio?</label>
                    <input type="text" class="form-control" id="renew_municipio" name="renew_municipio">
                    <br>
                    <label for="renew_parroquia">¿Cambiar parroquia?</label>
                    <input type="text" class="form-control" id="renew_parroquia" name="renew_parroquia">
                    <br>
                    <label for="renew_sector">¿Cambiar sector?</label>
                    <input type="text" class="form-control" id="renew_sector" name="renew_sector">
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
                const correo = row.children[4].textContent;
                const telefono = row.children[5].textContent;
                const sexo = row.children[6].textContent;
                const fecha_nacimiento = row.children[7].textContent;
                const estado = row.children[8].textContent;
                const municipio = row.children[9].textContent;
                const parroquia = row.children[10].textContent;
                const sector = row.children[11].textContent;

                document.getElementById('edit_id').value = id;
                document.getElementById('renew_name').value = nombre;
                document.getElementById('renew_apellido').value = apellido;
                document.getElementById('renew_cin').value = cedula;
                document.getElementById('renew_email').value = correo;
                document.getElementById('renew_telefono').value = telefono;
                document.getElementById('renew_sexo').value = sexo;
                document.getElementById('renew_fecha_nacimiento').value = fecha_nacimiento;
                document.getElementById('renew_estado').value = estado;
                document.getElementById('renew_municipio').value = municipio;
                document.getElementById('renew_parroquia').value = parroquia;
                document.getElementById('renew_sector').value = sector;

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

        fetch('../db/update_campesino.php', {
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
                window.location.href = 'campesino_tabla.php?delete_status=' + encodeURIComponent(data);
            })
            .catch(error => console.error('Error:', error));
    }
</script>

<script>

			function Solo_Numero(evt)
			{
				if(Window.event){

					keynum= evt.keyCode;

				}

				else{

					keynum = evt.which;

				}

				if((keynum > 47 && keynum < 58) || keynum == 8 || keynum== 13 ){

					return true;
				}

				else{

					alert("Ingrese solo numeros");

					return false;

				}

			}

			function Solo_Letras(e){

				key= e.keyCode || e.which;
				tecla= String.fromCharCode(key) .toString();
				letras="QWERTYUIOPASDFGHJKLÑZXCVBNMqwertyuiopasdfghjklñzxcvbnm, ' ' ";

				especiales =[8,13];
				tecla_especial = false

				for(var i in especiales){

					if(key == especiales [i]){

						tecla_especial = true;
						break;

					}

				}

				if(letras.indexOf(tecla) == -1 && !tecla_especial){

					alert("Ingrese solo letras");
					return false;

				}

			}
    </script>