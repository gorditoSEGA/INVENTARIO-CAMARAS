<?php
include "db/conexion.php";

if (!isset($_GET['id'])) {
    echo "ID no válido";
    exit;
}

$id = (int)$_GET['id'];

$sql = "SELECT * FROM camaras WHERE id_camara = $id";
$result = $conn->query($sql);

if ($result->num_rows == 0) {
    echo "Cámara no encontrada";
    exit;
}

$row = $result->fetch_assoc();
?>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $ubicacion = $_POST['ubicacion'];
    $stock = $_POST['stock'];
    $stock_actual = $_POST['stock_actual'];

    $sql = "UPDATE camaras SET
            marca='$marca',
            modelo='$modelo',
            ubicacion='$ubicacion',
            stock='$stock',
            stock_actual='$stock_actual'
            WHERE id_camara=$id";

    $conn->query($sql);

    header("Location: camaras.php?msg=editada");
    exit;
}
?>


<h2>Editar cámara</h2>

<form method="POST">
    <label>Marca:</label><input type="text" name="marca" value="<?php echo $row['marca']; ?>" required><br><br>

    <label>Modelo:</label><input type="text" name="modelo" value="<?php echo $row['modelo']; ?>" required><br><br>

    <label>Ubicación:</label><input type="text" name="ubicacion" value="<?php echo $row['ubicacion']; ?>" required><br><br>

    <label>Stock:</label><input type="number" name="stock" value="<?php echo $row['stock']; ?>" required><br><br>

    <label>Stock actual:</label><input type="number" name="stock_actual" value="<?php echo $row['stock_actual']; ?>" required><br><br>

    <button type="submit">Guardar cambios</button>
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
