<?php
include "../header.php";
include "../db/conexion.php";
?>

<h2>Agregar teléfono</h2>

<form action="guardar_telefono.php" method="POST">

    <label>Marca:</label><br>
    <input type="text" name="marca" required><br><br>

    <label>Modelo:</label><br>
    <input type="text" name="modelo" required><br><br>

    <label>IMEI:</label><br>
    <input type="text" name="imei" required><br><br>

    <label>Línea:</label><br>
    <input type="text" name="linea"><br><br>

    <label>Ubicación:</label><br>
    <input type="text" name="ubicacion"><br><br>

    <label>Stock:</label><br>
    <input type="number" name="stock" min="0" required><br><br>

    <label>Stock actual:</label><br>
    <input type="number" name="stock_actual" min="0" required><br><br>

    <button type="submit">Agregar</button>
</form>

<br>
<a href="telefonia.php">⬅ Volver</a>
