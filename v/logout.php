<?php 
/**
 * Cierre de Sesion de Funcionario o Personal Administrativo
 *
 * Finaliza la sesion institucional destruyendo las variables de sesion
 * y redirige al formulario de acceso principal.
 *
 * @package INTI\Admin
 */

session_start();
session_destroy();
header("Location: ../index.php");
exit;
?>