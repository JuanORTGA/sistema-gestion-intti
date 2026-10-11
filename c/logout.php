<?php 
/**
 * Cierre de Sesion de Usuario Campesino
 *
 * Finaliza la sesion activa de PHP destruyendo todas las variables
 * registradas y redirecciona al usuario al acceso principal de la plataforma.
 *
 * @package INTI\Campesino
 */

session_start();
session_destroy();
header("Location: ../index.php");
exit;
?>