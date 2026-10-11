/**
 * Alterna la visibilidad entre el campo de cedula y el campo de nombre
 * en el formulario de acceso, permitiendo iniciar sesion con cualquiera
 * de los dos identificadores.
 */
function toggleNombreField() {
    const cedulaField = document.getElementById('cedula');
    const nombreField = document.getElementById('nombres');
    const nombreLabel = document.getElementById('label');

    if (cedulaField.style.display === 'none') {
        cedulaField.style.display = 'block';
        cedulaField.type = 'text';
        nombreField.style.display = 'none';
    } else {
        cedulaField.style.display = 'none';
        cedulaField.type = 'hidden';
        nombreField.style.display = 'block';
        nombreField.type = 'text';
        nombreLabel.textContent = 'Ingresa tu Nombre:';
    }
}