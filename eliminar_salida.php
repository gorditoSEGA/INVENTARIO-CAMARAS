<?php
include "db/conexion.php";

/* =====================
   OBTENER DATOS
===================== */
$id_salida = (int)$_GET['id'];
$id_camara = (int)$_GET['id_camara'];

/* =====================
   OBTENER CANTIDAD DE LA SALIDA
===================== */
$res = $conn->query("
    SELECT cantidad 
    FROM salidas 
    WHERE id_salida = $id_salida
");

if ($res->num_rows == 0) {
    die("Salida no encontrada");
}

$salida = $res->fetch_assoc();
$cantidad = (int)$salida['cantidad'];

/* =====================
   DEVOLVER STOCK
===================== */
$conn->query("
    UPDATE camaras
    SET stock_actual = stock_actual + $cantidad
    WHERE id_camara = $id_camara
");

/* =====================
   ELIMINAR SALIDA
===================== */
$conn->query("
    DELETE FROM salidas
    WHERE id_salida = $id_salida
");

/* =====================
   REDIRECCIÓN
===================== */
header("Location: detalle_camara.php?id=$id_camara");
exit;
