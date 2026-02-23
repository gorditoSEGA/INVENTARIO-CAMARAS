<?php
include "header.php";
include "db/conexion.php";


$id = $_GET['id'];

$sql = "DELETE FROM camaras WHERE id_camara = $id";
// Borrar todas las salidas de la cámara
$conn->query("DELETE FROM salidas WHERE id_camara = $id");

// Luego borrar la cámara
$conn->query("DELETE FROM camaras WHERE id_camara = $id");


header("Location: camaras.php?msg=eliminada");
exit;
