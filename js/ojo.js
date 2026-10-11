/**
 * Alterna la visibilidad de la contrasena entre tipo 'password' y tipo 'text'
 * al hacer clic sobre el icono de ojo en el formulario de inicio de sesion.
 */
const togglePassword = document.querySelector('#togglePassword');
const pass = document.querySelector('#pass');

if (togglePassword && pass) {
    togglePassword.addEventListener('click', function (e) {
        const type = pass.getAttribute('type') === 'password' ? 'text' : 'password';
        pass.setAttribute('type', type);
        this.classList.toggle('fa-eye-slash');
    });
}