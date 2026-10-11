<?php 
/**
 * Consulta de Datos Territoriales (Estados, Municipios y Parroquias)
 *
 * Este script obtiene los listados unicos de las divisiones politico-territoriales
 * de Venezuela registradas en la base de datos y construye las opciones HTML (<option>)
 * necesarias para poblar los elementos <select> en los formularios de registro y edicion.
 *
 * @package INTI\Database
 */

// 1. Consulta y generacion de opciones para la lista de Estados
$sql = "SELECT DISTINCT estado FROM estados ORDER BY estado ASC";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$resultados1 = $stmt->fetchAll(PDO::FETCH_COLUMN);

$estadoslist = '';
foreach ($resultados1 as $estado) {
    $estadoslist .= '<option>' . htmlspecialchars($estado) . '</option>';
}

// 2. Consulta y generacion de opciones para la lista de Municipios
$sql = "SELECT DISTINCT municipios FROM municipios ORDER BY municipios ASC";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$resultados2 = $stmt->fetchAll(PDO::FETCH_COLUMN);

$municipiolist = '';
foreach ($resultados2 as $municipio) {
    $municipiolist .= '<option>' . htmlspecialchars($municipio) . '</option>';
}

// 3. Consulta y generacion de opciones para la lista de Parroquias
$sql = "SELECT DISTINCT parroquias FROM parroquias ORDER BY parroquias ASC";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$resultados3 = $stmt->fetchAll(PDO::FETCH_COLUMN);

$parroquialist = '';
foreach ($resultados3 as $parroquia) {
    $parroquialist .= '<option>' . htmlspecialchars($parroquia) . '</option>';
}
?>