<?php
include "../db/conexion.php";

// Validar ID
if (!isset($_GET['id'])) {
    header("Location: telefonia.php");
    exit;
}

$id = (int)$_GET['id'];

// Eliminar teléfono
$sql = "DELETE FROM telefonia WHERE id_telefono = $id";

if ($conn->query($sql)) {
    header("Location: telefonia.php?deleted=1");
    exit;
} else {
    echo "❌ Error al eliminar: " . $conn->error;
}
