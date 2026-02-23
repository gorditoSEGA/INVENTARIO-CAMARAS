<?php
include "../header.php";
include "../db/conexion.php";

/* =====================
   VALIDAR ID
===================== */
if (!isset($_GET['id'])) {
    die("ID no válido");
}

$id = (int)$_GET['id'];

/* =====================
   OBTENER CÁMARA
===================== */
$res = $conn->query("SELECT * FROM camaras WHERE id_camara = $id");

if (!$res || $res->num_rows === 0) {
    die("Cámara no encontrada");
}

$camara = $res->fetch_assoc();

/* =====================
   REGISTRAR SALIDA
===================== */
if (isset($_POST['registrar_salida'])) {

    $tecnico = $conn->real_escape_string($_POST['tecnico']);
    $obra = $conn->real_escape_string($_POST['obra']);
    $numero_serie = $conn->real_escape_string($_POST['numero_serie']);
    $cantidad = (int)$_POST['cantidad'];

    if ($cantidad <= 0) {
        $error = "Cantidad inválida";
    } elseif ($cantidad > $camara['stock_actual']) {
        $error = "No hay stock suficiente";
    } else {

        // INSERTAR SALIDA
        $sql_insert = "
            INSERT INTO salidas 
            (id_camara, tecnico, obra, numero_serie, cantidad)
            VALUES ($id, '$tecnico', '$obra', '$numero_serie', $cantidad)
        ";

        if (!$conn->query($sql_insert)) {
            die("Error al registrar salida: " . $conn->error);
        }

        // DESCONTAR STOCK
        $sql_update = "
            UPDATE camaras
            SET stock_actual = stock_actual - $cantidad
            WHERE id_camara = $id
        ";

        if (!$conn->query($sql_update)) {
            die("Error al descontar stock: " . $conn->error);
        }

        // RECARGAR DATOS
        $camara = $conn->query(
            "SELECT * FROM camaras WHERE id_camara = $id"
        )->fetch_assoc();

        $ok = "Salida registrada correctamente";
    }
}

/* =====================
   OBTENER HISTORIAL
===================== */
$salidas = $conn->query("
    SELECT * FROM salidas 
    WHERE id_camara = $id 
    ORDER BY id_salida DESC
");
?>

<h2>Detalle de cámara</h2>

<?php if (isset($error)): ?>
    <div class="msg error"><?php echo $error; ?></div>
<?php endif; ?>

<?php if (isset($ok)): ?>
    <div class="msg ok"><?php echo $ok; ?></div>
<?php endif; ?>

<p><strong>Marca:</strong> <?php echo $camara['marca']; ?></p>
<p><strong>Modelo:</strong> <?php echo $camara['modelo']; ?></p>
<p><strong>Ubicación:</strong> <?php echo $camara['ubicacion']; ?></p>
<p><strong>Stock total:</strong> <?php echo $camara['stock']; ?></p>
<p><strong>Stock actual:</strong> <?php echo $camara['stock_actual']; ?></p>

<hr>

<h3>Registrar salida</h3>

<form method="POST" class="form-vertical">

    <label>Técnico</label>
    <input type="text" name="tecnico" required>

    <label>Obra</label>
    <input type="text" name="obra" required>

    <label>Número de serie</label>
    <input type="text" name="numero_serie">

    <label>Cantidad</label>
    <input type="number" name="cantidad" min="1" required>

    <button type="submit" name="registrar_salida" class="btn btn-eliminar">
        Registrar salida
    </button>

</form>

<hr>

<h3>Historial de salidas</h3>

<table border="1">
<tr>
  <th>Técnico</th>
  <th>Obra</th>
  <th>N° de Serie</th>
  <th>Cantidad</th>
  <th>Acciones</th>
</tr>

<?php while ($s = $salidas->fetch_assoc()) { ?>
<tr>
  <td><?php echo $s['tecnico']; ?></td>
  <td><?php echo $s['obra']; ?></td>
  <td><?php echo $s['numero_serie']; ?></td>
  <td><?php echo $s['cantidad']; ?></td>
  <td>
      <a href="eliminar_salida.php?id=<?php echo $s['id_salida']; ?>&id_camara=<?php echo $id; ?>"
         class="btn btn-eliminar"
         onclick="return confirm('¿Eliminar esta salida y devolver el stock?');">
         🗑️ Eliminar
      </a>
  </td>
</tr>
<?php } ?>

</table>

<br>
<a href="camaras.php">⬅ Volver al listado</a>
