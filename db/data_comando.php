<?php
/**
 * Servicio de Datos Estadisticos: Campesinos por Situacion Juridica
 *
 * Endpoint que calcula la cantidad de usuarios clasificados segun su situacion
 * juridica de tenencia o permanencia en la tierra. Entrega los datos en formato JSON
 * para la renderizacion del grafico tipo dona/pastel con Chart.js.
 *
 * @package INTI\Database
 * @return string JSON con pares [situacion_juridica, canti_juridica]
 */

include 'db.php';

// Conteo agrupado de campesinos por situacion juridica
$sql = "SELECT situacion_juridica, COUNT(*) as canti_juridica FROM usuarios GROUP BY situacion_juridica";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Respuesta en formato JSON
header('Content-Type: application/json; charset=utf-8');
echo json_encode($result);
?>
