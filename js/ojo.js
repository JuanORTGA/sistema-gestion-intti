/**
 * Alterna la visibilidad de la contrasena entre tipo 'password' y tipo 'text'
 * al hacer clic sobre el icono de ojo en el formulario de inicio de sesion.
 */
function togglePassVisibility() {
    var pass = document.getElementById('password') || document.getElementById('pass') || document.querySelector('input[type="password"]');
    var icon = document.getElementById('togglePassword');
    if (pass) {
        if (pass.type === 'password') {
            pass.type = 'text';
            if (icon) {
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            }
        } else {
            pass.type = 'password';
            if (icon) {
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        }
    }
}

document.addEventListener('DOMContentLoaded', function () {
    var icon = document.getElementById('togglePassword');
    if (icon) {
        icon.addEventListener('click', function (e) {
            e.preventDefault();
            togglePassVisibility();
        });
    }
});