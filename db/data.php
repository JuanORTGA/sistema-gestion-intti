<?php
/**
 * Servicio de Datos Estadisticos: Campesinos por Estado
 *
 * Endpoint que realiza la agrupacion y conteo de productores segun su estado de residencia.
 * Responde con una cabecera de tipo application/json para alimentar los componentes graficos
 * y reportes dinamicos en el panel de administracion.
 *
 * @package INTI\Database
 * @return string JSON con pares [estado, cantidad]
 */

include 'db.php';

// Conteo agrupado de campesinos por estado
$sql = "SELECT estado, COUNT(*) as cantidad FROM usuarios GROUP BY estado ORDER BY cantidad DESC";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Emision de respuesta estructurada en formato JSON
header('Content-Type: application/json; charset=utf-8');
echo json_encode($result);
?>
