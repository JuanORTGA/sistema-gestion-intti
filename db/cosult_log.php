<?php
/**
 * Modulo de Autenticacion e Inicio de Sesion
 *
 * Este script valida las credenciales provistas en el formulario de acceso (login.php).
 * Evalua la existencia del usuario tanto en la tabla 'usuarios' (productores/campesinos)
 * como en la tabla 'empleados' (personal del INTI).
 *
 * Comprueba la contrasena cifrada utilizando password_verify(). En caso de autenticacion
 * valida, inicializa la sesion de PHP, almacena las variables del usuario y redirige segun
 * el rol asignado:
 * - Rol 'Campesino' -> Redireccion a ../c/index.php
 * - Rol 'Empleado' o Administrativo -> Redireccion a ../v/index.php
 *
 * @package INTI\Database
 */

include 'db.php';

$exito = '';
$error = '';

// Procesamiento exclusivo ante solicitudes POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cedula   = trim($_POST['cedula']);
    $nombres  = trim($_POST['nombres']);
    $password = $_POST['password'];

    // 1. Verificacion en la tabla de usuarios (campesinos y productores)
    $sqlUsuarios = "SELECT * FROM usuarios WHERE cedula = ? OR nombres = ?";
    $stmtUsuarios = $pdo->prepare($sqlUsuarios);
    $stmtUsuarios->execute([$cedula, $nombres]);
    $user = $stmtUsuarios->fetch(PDO::FETCH_ASSOC);

    // 2. Verificacion en la tabla de empleados (funcionarios institucionales)
    $sqlEmpleados = "SELECT id, nombre, apellido, cedula, correo, telefono, password, empleado FROM empleados WHERE cedula = ? OR nombre = ?";
    $stmtEmpleados = $pdo->prepare($sqlEmpleados);
    $stmtEmpleados->execute([$cedula, $nombres]);
    $employee = $stmtEmpleados->fetch(PDO::FETCH_ASSOC);

    // Caso A: Coincidencia con usuario campesino y contrasena valida
    if ($user && password_verify($password, $user['password'])) {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        
        // Guardado de informacion de perfil en la sesion
        $_SESSION["id"] = $user['id'];
        $_SESSION["nombres"] = $user['nombres'];
        $_SESSION["apellidos"] = $user['apellidos'];
        $_SESSION["cedula"] = $user['cedula'];
        $_SESSION["sexo"] = $user['sexo'];
        $_SESSION["fecha_nacimiento"] = $user['fecha_nacimiento'];
        $_SESSION["estado"] = $user['estado'];
        $_SESSION["municipio"] = $user['municipio'];
        $_SESSION["parroquia"] = $user['parroquia'];
        $_SESSION["sector"] = $user['sector'];
        $_SESSION["password"] = $user['password'];
        $_SESSION["telefono"] = $user['telefono'];
        $_SESSION["correo"] = $user['correo'];
        $_SESSION["pert_organizacion"] = $user['pert_organizacion'];
        $_SESSION["name_org"] = $user['name_org'];
        $_SESSION["fortaleza_org"] = $user['fortaleza_org'];
        $_SESSION["area_formativa"] = $user['area_formativa'];
        $_SESSION["horario_disponible"] = $user['horario_disponible'];
        $_SESSION["dias_formacion"] = $user['dias_formacion'];
        $_SESSION["cosecha"] = $user['cosecha'];
        $_SESSION["comida"] = $user['comida'];
        $_SESSION["crias"] = $user['crias'];
        $_SESSION["situacion_juridica"] = $user['situacion_juridica'];
        $_SESSION["fuentes_ingresos"] = $user['fuentes_ingresos'];
        $_SESSION["organizacion_campesina"] = $user['organizacion_campesina'];
        $_SESSION["oganizacion_fines_lucro"] = $user['oganizacion_fines_lucro'];

        // Redireccion segun el estatus del usuario
        if ($user['status'] == 'Campesino') {
            header("Location: ../c/index.php");
            exit;
        } else {
            header("Location: ../v/index.php");
            exit;
        }
    // Caso B: Coincidencia con empleado/funcionario y contrasena valida
    } elseif ($employee && password_verify($password, $employee['password'])) {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $_SESSION["id"] = $employee['id'];
        $_SESSION["nombre"] = $employee['nombre'];
        $_SESSION["apellido"] = $employee['apellido'];
        $_SESSION["cedula"] = $employee['cedula'];
        $_SESSION["correo"] = $employee['correo'];
        $_SESSION["telefono"] = $employee['telefono'];

        // Comprobacion de autorizacion del empleado
        if ($employee['empleado'] == 'Si') {
            header("Location: ../v/index.php");
            exit;
        } else {
            $error = "<span class='error'>Funcionario inactivo o no autorizado.</span>";
        }
    } else {
        // Notificacion de credenciales invalidas
        $error = "<span class='error'>Cedula, nombre o contrasena incorrecta.</span>";
    }
}
?>
