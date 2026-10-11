<?php
/**
 * Consulta de Noticias y Comunicados para el Portal Campesino
 *
 * Recupera las publicaciones registradas en la tabla 'noticias'
 * ordenadas cronologicamente y genera los bloques HTML que se insertan
 * en la vista publica del campesino (noticias.php).
 *
 * @package INTI\Database
 */

include 'db.php';

// Consulta de publicaciones registradas ordenadas de la mas reciente a la mas antigua
$sql = "SELECT id, title, descripcion, fecha FROM noticias ORDER BY id DESC";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$resultados1 = $stmt->fetchAll(PDO::FETCH_ASSOC);

$noticialist = '';

// Construccion de la tarjeta para cada noticia
foreach ($resultados1 as $noticia) {
    $noticialist .= '<div class="noticia">';
    $noticialist .= '<h3>' . htmlspecialchars($noticia['title']) . '</h3>';
    $noticialist .= '<hr>';
    $noticialist .= '<p>' . nl2br(htmlspecialchars($noticia['descripcion'])) . '</p>';
    $noticialist .= '<small class="text-muted">Publicado el: ' . htmlspecialchars($noticia['fecha']) . '</small>';
    $noticialist .= '</div>';
}

// Mensaje por defecto en caso de no existir comunicados registrados
if (empty($noticialist)) {
    $noticialist .= '<p>Actualmente no hay noticias o comunicados disponibles.</p>';
}
?>