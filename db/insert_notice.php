<?php
/**
 * Registro y Publicacion de Noticias Institucionales
 *
 * Este script procesa el formulario de creacion de noticias (crear_noticias.php).
 * Permite a los administradores registrar un titulo, contenido descriptivo,
 * estado de boton de participacion y fecha/tiempo limite de la convocatoria
 * en la tabla 'noticias'.
 *
 * @package INTI\Database
 */

include 'db.php';

$exito = '';
$error = '';

// Procesamiento de la solicitud enviada por metodo POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title             = trim($_POST['title']);
    $descripcion       = trim($_POST['descripcion']);
    $participe         = isset($_POST['participe']) ? $_POST['participe'] : 'No';
    $tiempo_finalizado = trim($_POST['tiempo_finalizado']);

    // Insercion con consulta preparada para evitar inyecciones SQL
    $sql = "INSERT INTO noticias (title, descripcion, button_participe, inicio)
            VALUES (:title, :descripcion, :button_participe, :inicio)";
    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':descripcion', $descripcion);
    $stmt->bindParam(':button_participe', $participe);
    $stmt->bindParam(':inicio', $tiempo_finalizado);

    if ($stmt->execute()) {
        $exito = "<span class='exito'>Noticia registrada exitosamente.</span>";
        header("Location: ../v/crear_noticias.php");
        exit;
    } else {
        $error = "<span class='error'>Error al registrar la noticia. Intentalo nuevamente.</span>";
    }
}
?>