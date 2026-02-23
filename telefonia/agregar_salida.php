<?php
include "../db/conexion.php";

// Recibir datos del formulario
$id_camara = $_POST['id_camara'];
$salida = $_POST['salida'];
$numero_serie = $_POST['numero_serie'];

// Insertar en la tabla salidas
$sql = "INSERT INTO salidas (id_camara, salida, numero_serie) 
        VALUES ('$id_camara', '$salida', '$numero_serie')";
$conn->query($sql);

// Volver al detalle de la cámara
header("Location: detalle_camara.php?id=$id_camara");
exit;
