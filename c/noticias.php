<?php
/**
 * Vista de Noticias y Novedades para el Campesino
 *
 * Despliega los comunicados, convocatorias y noticias publicadas
 * por los administradores. Comprueba que el usuario mantenga su sesion
 * activa y utiliza db/consult_c.php para obtener el listado.
 *
 * @package INTI\Campesino
 */

session_start();

if (!isset($_SESSION["id"])) {
    header("Location: ../index.php");
    exit;
}

include '../db/consult_c.php';

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenid@ <?php echo $_SESSION['nombres']; ?> a Noticias</title>
    <link rel="shortcut icon" href="/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/noticias.css">
</head>

<body>
    <header>
        <div class="logo"></div>

        <div class="soporte">
            Bienvenid@, <?php echo $_SESSION['nombres']; ?>
            <a href="logout.php">Cerrar Sesión</a>
        </div>
    </header>

    <main>
        <aside>
            <h1>Categorías</h1>
            <br>
            <a href="index.php">Mi Información</a>
            <a href="noticias.php">Noticias</a>
        </aside>

        <div class="container">
            <h1>Enterate de lo Nuevo</h1>
            <hr>
            <br>
            <?php echo $noticialist; ?>
        </div>
    </main>
</body>

</html>