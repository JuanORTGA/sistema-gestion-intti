<?php
/**
 * Modulo para Agregar Nuevo Personal Administrativo
 *
 * Permite dar de alta a nuevos empleados y funcionarios institucionales en la tabla
 * 'empleados'. Verifica la no existencia previa de la cedula, aplica encriptacion Bcrypt
 * a la contrasena y asigna los datos de contacto y estatus de confirmacion.
 *
 * @package INTI\Database
 */

include 'db.php';

$exito = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 1. Recepcion de campos enviados por el formulario
    $nombre              = trim($_POST['nombre']);
    $apellido            = trim($_POST['apellido']);
    $cedula              = trim($_POST['cedula']);
    $correo              = trim($_POST['correo']);
    $telefono            = trim($_POST['telefono']);
    $personal_confirmado = trim($_POST['personal_confirmado']);
    $password            = $_POST['password'];

    // 2. Cifrado seguro de la credencial de acceso
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // 3. Verificacion de duplicados por cedula de identidad
    $sql_check = "SELECT COUNT(*) FROM empleados WHERE cedula = :cedula";
    $stmt_check = $pdo->prepare($sql_check);
    $stmt_check->execute([':cedula' => $cedula]);
    $count = $stmt_check->fetchColumn();

    if ($count > 0) {
        $error = "<span class='error'>La cedula '" . htmlspecialchars($cedula) . "' ya se encuentra registrada para otro funcionario.</span>";
    } else {
        // 4. Insercion segura mediante sentencia preparada
        $sql = "INSERT INTO empleados (nombre, apellido, cedula, correo, telefono, confirmacion, password)
                VALUES (:nombre, :apellido, :cedula, :correo, :telefono, :confirmacion, :password)";
        $stmt = $pdo->prepare($sql);

        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':apellido', $apellido);
        $stmt->bindParam(':cedula', $cedula);
        $stmt->bindParam(':correo', $correo);
        $stmt->bindParam(':telefono', $telefono);
        $stmt->bindParam(':confirmacion', $personal_confirmado);
        $stmt->bindParam(':password', $hashed_password);

        if ($stmt->execute()) {
            $exito = "<span class='exito'>Funcionario registrado exitosamente.</span>";
            header('Location: ' . $_SERVER['PHP_SELF']);
            exit;
        } else {
            $error = "<span class='error'>Error al registrar el funcionario. Intentalo nuevamente.</span>";
        }
    }
}
?>
