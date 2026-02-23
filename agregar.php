<?php
include "header.php";
include "db/conexion.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $stock = $_POST['stock'];
    $stock_actual = $_POST['stock_actual'];

    $conn->query("INSERT INTO camaras (marca, modelo, stock, stock_actual) 
                  VALUES ('$marca', '$modelo', '$stock', '$stock_actual')");

    header("Location: camaras.php?msg=agregada");
    exit;
}

?>

<h2>Agregar cámara</h2>

<form method="POST">
    Marca: <input type="text" name="marca" required><br><br>
    Modelo: <input type="text" name="modelo" required><br><br>
    Stock: <input type="number" name="stock" value="0" required><br><br>
    Stock Actual: <input type="number" name="stock_actual" value="0" required><br><br>
    <button type="submit">Agregar</button>
</form>

<a href="camaras.php">⬅ Volver</a>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Sistema de Cámaras</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
