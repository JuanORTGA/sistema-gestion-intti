<?php
/**
 * Componente de Tabla y Modales para Comandos Campesinos y Produccion
 *
 * Consulta la base de usuarios para listar su actividad agraria: cosechas,
 * produccion de alimentos, cria de animales, situacion juridica, fuentes de ingreso
 * y afiliacion a organizaciones agrarias. Incluye los modales para actualizar
 * la ficha de produccion y solicitar eliminacion con confirmacion.
 *
 * @package INTI\Database
 */

include 'db.php';

// 1. Consulta de la ficha productiva y legal de los campesinos
$sql = "SELECT id, nombres, apellidos, cedula, cosecha, comida, crias, situacion_juridica, fuentes_ingresos, organizacion_campesina, oganizacion_fines_lucro FROM usuarios ORDER BY id ASC";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$list_campesinos_result = $stmt->fetchAll(PDO::FETCH_ASSOC);

$list_campesinos = '';

// 2. Construccion de filas con escape de entidades HTML
foreach ($list_campesinos_result as $campesino) {
    $list_campesinos .= '<tr>';
    $list_campesinos .= '<th scope="row">' . htmlspecialchars($campesino['id']) . '</th>';
    $list_campesinos .= '<td>' . htmlspecialchars($campesino['nombres']) . '</td>';
    $list_campesinos .= '<td>' . htmlspecialchars($campesino['apellidos']) . '</td>';
    $list_campesinos .= '<td>' . htmlspecialchars($campesino['cedula']) . '</td>';
    $list_campesinos .= '<td>' . htmlspecialchars($campesino['cosecha']) . '</td>';
    $list_campesinos .= '<td>' . htmlspecialchars($campesino['comida']) . '</td>';
    $list_campesinos .= '<td>' . htmlspecialchars($campesino['crias']) . '</td>';
    $list_campesinos .= '<td>' . htmlspecialchars($campesino['situacion_juridica']) . '</td>';
    $list_campesinos .= '<td>' . htmlspecialchars($campesino['fuentes_ingresos']) . '</td>';
    $list_campesinos .= '<td>' . htmlspecialchars($campesino['organizacion_campesina']) . '</td>';
    $list_campesinos .= '<td>' . htmlspecialchars($campesino['oganizacion_fines_lucro']) . '</td>'; 
    $list_campesinos .= '<td><button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editModal" data-id="' . htmlspecialchars($campesino['id']) . '">Editar</button></td>';
    $list_campesinos .= '<td><button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal" data-id="' . htmlspecialchars($campesino['id']) . '">Eliminar</button></td>';
    $list_campesinos .= '</tr>';
}

if (empty($list_campesinos)) {
    $list_campesinos = '<tr><td colspan="13" class="text-center">No hay registros de comandos campesinos disponibles.</td></tr>';
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
                    <label for="renew_name">¿Cambio en el Nombre?</label>
                    <input type="text" class="form-control" id="renew_name" name="renew_name" onkeypress="return Solo_Letras(event);">
                    <br>
                    <label for="renew_apellido">¿Cambio en el Apellido?</label>
                    <input type="text" class="form-control" id="renew_apellido" name="renew_apellido" onkeypress="return Solo_Letras(event);">
                    <br>
                    <label for="renew_cin">¿Cambio en la Cedula?</label>
                    <input type="text" class="form-control" id="renew_cin" name="renew_cin" min="3000000" max="30000000" onkeypress="return Solo_Numero(event);" minlength="7" maxlength="8" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                    <br>
                    <label for="renew_cosecha">¿Cambio de Hortalizas?</label>
                    <select class="form-control"id="renew_cosecha" name="renew_cosecha">
                        <option value="Maiz">Maiz</option>
                        <option value="Sorgo">Sorgo</option>
                        <option value="Trigo">Trigo</option>
                        <option value="Soya">Soya</option>
                        <option value="Frijoles">Frijoles</option>
                        <option value="Caraotas">Caraotas</option>
                        <option value="Palma">Palma</option>
                        <option value="Girasol">Girasol</option>
                        <option value="Caña de Azucar">Caña de Azucar</option>
                        <option value="Café">Café</option>
                        <option value="Cacao">Cacao</option>
                    </select>  
                    <br>
                    <label for="renew_comida">¿Cambio de Avicultura?</label>              
                    <select class="form-control" id="renew_comida" name="renew_comida">
                        <option value="Carne">Carne</option>
                        <option value="Huevo">Huevo</option>
                    </select>  
                    <br>
                    <label for="renew_crias">¿Cambio de Crias?</label>
                    <select class="form-control" id="renew_crias" name="renew_crias">
                        <option value="Cria de Ovinos">Cria de Ovinos</option>
                        <option value="Cria de Caprinos">Cria de Caprinos</option>
                        <option value="Cria de Cerdos">Cria de Cerdos</option>
                        <option value="Cunicultura(conejo)">Cunicultura(conejo)</option>
                        <option value="Piscicultura (peces)">Piscicultura (peces)</option>
                        <option value="Cria de Bovinos">Cria de Bovinos</option>
                        <option value="Cria de Bufalinos">Cria de Bufalinos</option>
                    </select>  
                    <br>
                    <label for="renew_situacion_juridica">¿Cambio en la Situacion Juridica del Terreno?</label>
                    <select class="form-control" id="renew_situacion_juridica" name="renew_situacion_juridica">
                        <option value="Propio">Propio</option>
                        <option value="Alquilado">Alquilado</option>
                    </select> 
                    <br>
                    <label for="renew_fuentes_ingresos">¿Cambio en las Fuentes de Ingreso?</label>
                    <select class="form-control" id="renew_fuentes_ingresos" name="renew_fuentes_ingresos">
                        <option value="Venta Directa">Venta Directa</option>
                        <option value="Venta en Consignacion">Venta en Consignacion</option>
                    </select>
                    <br>
                    <label for="renew_organizacion_campesina">¿Pertenece a alguna Organización sin fines de lucro?</label>
                    <select id="renew_organizacion_campesina" name="renew_organizacion_campesina" class="form-control">
                        <option value=""disabled selected hidden>Indique</option>
                        <option value="Si">Si</option>
                        <option value="No">No</option>
                    </select>
                    <br>
                    <label for="renew_oganizacion_fines_lucro">Indique el nombre de la organizacion</label>
                    <input type="text" class="form-control" id="renew_oganizacion_fines_lucro" name="renew_oganizacion_fines_lucro">
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
                const cosecha = row.children[4].textContent;
                const comida = row.children[5].textContent;
                const crias = row.children[6].textContent;
                const situacion_juridica = row.children[7].textContent;
                const fuentes_ingresos = row.children[8].textContent;
                const organizacion_campesina = row.children[9].textContent;
                const oganizacion_fines_lucro = row.children[10].textContent;

                document.getElementById('edit_id').value = id;
                document.getElementById('renew_name').value = nombre;
                document.getElementById('renew_apellido').value = apellido;
                document.getElementById('renew_cin').value = cedula;
                document.getElementById('renew_cosecha').value = cosecha;
                document.getElementById('renew_comida').value = comida;
                document.getElementById('renew_crias').value = crias;
                document.getElementById('renew_situacion_juridica').value = situacion_juridica;
                document.getElementById('renew_fuentes_ingresos').value = fuentes_ingresos;
                document.getElementById('renew_organizacion_campesina').value = organizacion_campesina;
                document.getElementById('renew_oganizacion_fines_lucro').value = oganizacion_fines_lucro;

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
                window.location.href = 'comando_camp_tabla.php?delete_status=' + encodeURIComponent(data);
            })
            .catch(error => console.error('Error:', error));
    }
</script>