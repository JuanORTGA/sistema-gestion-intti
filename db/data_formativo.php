<?php
/**
 * Servicio de Datos Estadisticos: Horarios y Dias de Formacion
 *
 * Endpoint que agrupa y totaliza las preferencias de horarios y dias disponibles
 * manifestadas por los productores para sus actividades de capacitacion formativa.
 * Devuelve la estructura en formato JSON para la representacion visual en graficas.
 *
 * @package INTI\Database
 * @return string JSON con combinaciones de [horario_disponible, dias_formacion, cantidad]
 */

include 'db.php';

// Conteo agrupado por horario y dias de formacion seleccionados
$sql = "SELECT horario_disponible, dias_formacion, COUNT(*) as cantidad FROM usuarios GROUP BY horario_disponible, dias_formacion";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Respuesta en formato JSON
header('Content-Type: application/json; charset=utf-8');
echo json_encode($result);
?>
