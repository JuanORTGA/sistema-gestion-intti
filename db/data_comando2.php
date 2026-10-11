<?php
/**
 * Servicio de Datos Estadisticos: Campesinos por Fuente de Ingresos
 *
 * Endpoint que calcula la distribucion de campesinos segun sus fuentes principales
 * de ingresos economicos. Devuelve la estructura en formato JSON para graficar con Chart.js.
 *
 * @package INTI\Database
 * @return string JSON con pares [fuentes_ingresos, canti_ingreso]
 */

include 'db.php';

// Conteo agrupado de campesinos segun sus fuentes de ingresos
$sql = "SELECT fuentes_ingresos, COUNT(*) as canti_ingreso FROM usuarios GROUP BY fuentes_ingresos";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Respuesta en formato JSON
header('Content-Type: application/json; charset=utf-8');
echo json_encode($result);
?>