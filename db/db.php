<?php
/**
 * Conexion a la Base de Datos mediante PDO
 *
 * Este script inicializa y gestiona la conexion con el servidor MySQL/MariaDB.
 * Emplea la interfaz PDO (PHP Data Objects) para ofrecer un canal de comunicacion
 * seguro y desacoplado, habilitando el modo de manejo de excepciones para
 * capturar fallos de conectividad.
 *
 * @package INTI\Database
 */

// Parametros de configuracion del servidor local
$host = "localhost";
$username = "root";
$password = "";
$dbname = "inti";

try {
    // Creacion de la instancia PDO especificando el motor mysql y la base de datos
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);

    // Configuracion de atributos: reportar errores como excepciones para un mejor control
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // En caso de error en la conexion, se interrumpe el script y se informa el motivo
    echo "Fallo de conexion con la base de datos: " . $e->getMessage();
    die();
}
?>