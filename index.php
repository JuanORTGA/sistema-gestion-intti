<?php 
/**
 * Punto de Entrada Principal al Sistema
 *
 * Este script actua como enrutador inicial de la plataforma. Al ser invocado
 * por el servidor web ante una peticion a la raiz del proyecto, redirecciona
 * de forma automatica e inmediata al formulario de inicio de sesion (log/login.php).
 *
 * @package INTI
 */

header("Location: log/login.php");
exit;
?>