<?php
include "db/conexion.php";

$marca  = $_POST['marca'];
$modelo = $_POST['modelo'];
$estado = $_POST['estado'];

$sql = "INSERT INTO camaras (marca, modelo, estado)
        VALUES ('$marca', '$modelo', '$estado')";

$conn->query($sql);

header("Location: camaras.php");
