<?php
session_start();
// Incluir todas las partes
include 'vista/includes/header.php';
include 'vista/includes/body.php';

// Verificar si el usuario ha iniciado sesión
if(isset($_SESSION['usuario']) && $_SESSION['usuario'] == 'autenticado') {
    include 'vista/includes/footer.php';
} else {
    include 'vista/includes/footer-alterno.php';
}
?>