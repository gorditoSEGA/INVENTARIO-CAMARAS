<?php
include "../db/conexion.php";

// Evitar acceso directo
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: telefonia.php");
    exit;
}

$id = (int)$_POST['id_telefono'];

$marca        = $_POST['marca'];
$modelo       = $_POST['modelo'];
$imei         = $_POST['imei'];
$linea        = $_POST['linea'];
$ubicacion    = $_POST['ubicacion'];
$stock        = (int)$_POST['stock'];
$stock_actual = (int)$_POST['stock_actual'];

if ($stock_actual > $stock) {
    die("❌ El stock actual no puede ser mayor al stock total");
}

$sql = "
    UPDATE telefonia SET
        marca='$marca',
        modelo='$modelo',
        imei='$imei',
        linea='$linea',
        ubicacion='$ubicacion',
        stock=$stock,
        stock_actual=$stock_actual
    WHERE id_telefono = $id
";

if ($conn->query($sql)) {
    header("Location: telefonia.php?edit=ok");
    exit;
} else {
    echo "❌ Error al actualizar: " . $conn->error;
}
