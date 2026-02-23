<?php
include "header.php";
include "db/conexion.php";


$id     = $_POST['id'];
$marca  = $_POST['marca'];
$modelo = $_POST['modelo'];
$estado = $_POST['estado'];

$sql = "UPDATE camaras 
        SET marca='$marca', modelo='$modelo', estado='$estado'
        WHERE id_camara = $id";

$conn->query($sql);

header("Location: camaras.php");
exit;
