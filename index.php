<?php
session_start();
// session_destroy();
// die();



// Verificamos si existe alguna sesión activa (puedes cambiar 'usuario' por la variable que uses en tu sistema)
if (!isset($_SESSION['id_usuario'])) {
    // No hay sesión activa
    header("Location: login.php");
    exit();
} else {
    // Sí hay sesión activa
    header("Location: General/index.php");
    exit();
}