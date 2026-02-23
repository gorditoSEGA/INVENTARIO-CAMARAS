<?php
include "../db/conexion.php";

/* =====================
   VALIDAR ID
===================== */
if (!isset($_GET['id'])) {
    die("ID no recibido");
}

$id = (int)$_GET['id'];

/* =====================
   BUSCAR TELÉFONO
===================== */
$res = $conn->query("SELECT * FROM telefonia WHERE id_telefono = $id");

if ($res->num_rows == 0) {
    die("Teléfono no encontrado");
}

$telefono = $res->fetch_assoc();
?>

<h2>Editar teléfono</h2>

<form action="guardar_telefono.php" method="POST">

    <input type="hidden" name="id_telefono" value="<?php echo $telefono['id_telefono']; ?>">

    <label>Marca</label><br>
    <input type="text" name="marca" value="<?php echo $telefono['marca']; ?>" required><br><br>

    <label>Modelo</label><br>
    <input type="text" name="modelo" value="<?php echo $telefono['modelo']; ?>" required><br><br>

    <label>IMEI</label><br>
    <input type="text" name="imei" value="<?php echo $telefono['imei']; ?>" required><br><br>

    <label>Línea</label><br>
    <input type="text" name="linea" value="<?php echo $telefono['linea']; ?>"><br><br>

    <label>Ubicación</label><br>
    <input type="text" name="ubicacion" value="<?php echo $telefono['ubicacion']; ?>"><br><br>

    <label>Stock</label><br>
    <input type="number" name="stock" value="<?php echo $telefono['stock']; ?>" required><br><br>

    <label>Stock actual</label><br>
    <input type="number" name="stock_actual" value="<?php echo $telefono['stock_actual']; ?>" required><br><br>

    <button type="submit">Guardar cambios</button>

</form>

<br>
<a href="telefonia.php">⬅ Volver al listado</a>
