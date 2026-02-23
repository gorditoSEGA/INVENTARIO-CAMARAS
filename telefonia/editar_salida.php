<?php
include "../db/conexion.php";

$id_salida = $_GET['id'];

// Tomar los datos actuales
$salida = $conn->query("SELECT * FROM salidas WHERE id_salida = $id_salida")->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nuevo_nombre = $_POST['salida'];
    $nuevo_serie = $_POST['numero_serie'];

    $conn->query("UPDATE salidas 
                  SET salida='$nuevo_nombre', numero_serie='$nuevo_serie' 
                  WHERE id_salida=$id_salida");

    // Volver a la página de detalle de la cámara
    header("Location: detalle_camara.php?id=".$salida['id_camara']);
    exit;
}
?>

<h2>Editar salida</h2>

<form method="POST">
    Salida: <input type="text" name="salida" value="<?php echo $salida['salida']; ?>" required><br><br>
    N° de serie: <input type="text" name="numero_serie" value="<?php echo $salida['numero_serie']; ?>" required><br><br>
    <button type="submit">Actualizar</button>
</form>

<a href="detalle_camara.php?id=<?php echo $salida['id_camara']; ?>">⬅ Volver</a>
