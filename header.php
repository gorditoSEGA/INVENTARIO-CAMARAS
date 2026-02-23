<?php
session_start();

if (!isset($_SESSION['logueado'])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Sistema de Cámaras</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>

<header class="topbar">

    <div class="titulo-sistema">
        Sistema de Cámaras
    </div>

    <button class="menu-toggle" onclick="toggleMenu()">☰</button>

    <nav id="menu">
        <a href="dashboard.php">📊 Dashboard</a>
        <a href="camaras.php">📷 Cámaras</a>
        <a href="logout.php">🚪 Salir</a>
    </nav>

</header>

<script>
function toggleMenu() {
    const menu = document.getElementById('menu');
    menu.style.display = (menu.style.display === 'flex') ? 'none' : 'flex';
}
</script>
