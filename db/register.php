<?php
/**
 * Modulo de Registro Integral de Campesinos y Productores
 *
 * Procesa el formulario de registro por pasos (wizard) de nuevos campesinos.
 * Recopila datos de identificacion personal, ubicacion territorial detallada,
 * participacion en organizaciones comunitarias, preferencias formativas,
 * ficha agropecuaria (cosechas, alimentos, crias), situacion juridica y fuentes de ingreso.
 *
 * Realiza verificacion previa para impedir registros duplicados de cedula,
 * encripta la contrasena con el algoritmo Bcrypt y almacena el registro en 'usuarios'.
 *
 * @package INTI\Database
 */

include 'db.php';

$exito = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 1. Recoleccion y saneamiento de entradas del formulario
    $nombres                 = trim($_POST['nombres']);
    $apellidos               = trim($_POST['apellidos']);
    $cedula                  = trim($_POST['cedula']);
    $sexo                    = trim($_POST['sexo']);
    $fecha_nacimiento        = trim($_POST['fecha_nacimiento']);
    $password                = $_POST['password'];
    $estado                  = trim($_POST['estado']);
    $municipio               = trim($_POST['municipio']);
    $parroquia               = trim($_POST['parroquia']);
    $sector                  = trim($_POST['sector']);
    $telefono                = trim($_POST['telefono']);
    $correo                  = trim($_POST['correo']);
    $pert_organizacion       = trim($_POST['pert_organizacion']);
    $name_org                = trim($_POST['name_org']);
    $fortaleza_org           = trim($_POST['fortaleza_org']);
    $area_formativa          = trim($_POST['area_formativa']);
    $horario_disponible      = trim($_POST['horario_disponible']);
    $dias_formacion          = trim($_POST['dias_formacion']);
    $cosecha                 = trim($_POST['cosecha']);
    $comida                  = trim($_POST['comida']);
    $crias                   = trim($_POST['crias']);
    $situacion_juridica      = trim($_POST['situacion_juridica']);
    $fuentes_ingresos        = trim($_POST['fuentes_ingresos']);
    $organizacion_campesina  = trim($_POST['organizacion_campesina']);
    $oganizacion_fines_lucro = trim($_POST['oganizacion_fines_lucro']);

    // 2. Cifrado seguro de la contrasena mediante Bcrypt
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // 3. Comprobacion de unicidad de la cedula de identidad
    $sql_check = "SELECT COUNT(*) FROM usuarios WHERE cedula = :cedula";
    $stmt_check = $pdo->prepare($sql_check);
    $stmt_check->execute([':cedula' => $cedula]);
    $count = $stmt_check->fetchColumn();

    if ($count > 0) {
        $error = "<span class='error'>La cedula ingresada ya se encuentra registrada en el sistema.</span>";
    } else {
        // 4. Sentencia de insercion parametrizada
        $sql = "INSERT INTO usuarios (nombres, apellidos, cedula, sexo, fecha_nacimiento, password, estado, municipio, parroquia, sector, telefono, correo, pert_organizacion, name_org, fortaleza_org, area_formativa, horario_disponible, dias_formacion, cosecha, comida, crias, situacion_juridica, fuentes_ingresos, organizacion_campesina, oganizacion_fines_lucro)
                VALUES (:nombres, :apellidos, :cedula, :sexo, :fecha_nacimiento, :password, :estado, :municipio, :parroquia, :sector, :telefono, :correo, :pert_organizacion, :name_org, :fortaleza_org, :area_formativa, :horario_disponible, :dias_formacion, :cosecha, :comida, :crias, :situacion_juridica, :fuentes_ingresos, :organizacion_campesina, :oganizacion_fines_lucro)";
        $stmt = $pdo->prepare($sql);

        $stmt->bindParam(':nombres', $nombres);
        $stmt->bindParam(':apellidos', $apellidos);
        $stmt->bindParam(':cedula', $cedula);
        $stmt->bindParam(':sexo', $sexo);
        $stmt->bindParam(':fecha_nacimiento', $fecha_nacimiento);
        $stmt->bindParam(':password', $hashed_password);
        $stmt->bindParam(':estado', $estado);
        $stmt->bindParam(':municipio', $municipio);
        $stmt->bindParam(':parroquia', $parroquia);
        $stmt->bindParam(':sector', $sector);
        $stmt->bindParam(':telefono', $telefono);
        $stmt->bindParam(':correo', $correo);
        $stmt->bindParam(':pert_organizacion', $pert_organizacion);
        $stmt->bindParam(':name_org', $name_org);
        $stmt->bindParam(':fortaleza_org', $fortaleza_org);
        $stmt->bindParam(':area_formativa', $area_formativa);
        $stmt->bindParam(':horario_disponible', $horario_disponible);
        $stmt->bindParam(':dias_formacion', $dias_formacion);
        $stmt->bindParam(':cosecha', $cosecha);
        $stmt->bindParam(':comida', $comida);
        $stmt->bindParam(':crias', $crias);
        $stmt->bindParam(':situacion_juridica', $situacion_juridica);
        $stmt->bindParam(':fuentes_ingresos', $fuentes_ingresos);
        $stmt->bindParam(':organizacion_campesina', $organizacion_campesina);
        $stmt->bindParam(':oganizacion_fines_lucro', $oganizacion_fines_lucro);

        if ($stmt->execute()) {
            $exito = "<span class='exito'>Registro exitoso. Bienvenido al sistema.</span>";
            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }
            $_SESSION["id"] = $pdo->lastInsertId();
            $_SESSION["nombres"] = $nombres;
            $_SESSION["apellidos"] = $apellidos;
            $_SESSION["cedula"] = $cedula;
            $_SESSION["pert_organizacion"] = $pert_organizacion;
            header("Location: ../c/index.php");
            exit;
        } else {
            $error = "<span class='error'>Error al registrar los datos del campesino. Intentalo nuevamente.</span>";
        }
    }
}
?>