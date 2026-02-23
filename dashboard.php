<?php
include "header.php";
include "db/conexion.php";

/* =====================
   FILTRO POR CARD
===================== */
$filtro = $_GET['filtro'] ?? '';
$where = '';

if ($filtro === 'ok') {
    $where = "WHERE stock_actual = stock";
} elseif ($filtro === 'medio') {
    $where = "WHERE stock_actual > 0 AND stock_actual < stock";
} elseif ($filtro === 'bajo') {
    $where = "WHERE stock_actual = 0";
}

/* =====================
   CONTADORES PARA CARDS
===================== */
$total_ok = $conn->query("SELECT id_camara FROM camaras WHERE stock_actual = stock")->num_rows;
$total_medio = $conn->query("SELECT id_camara FROM camaras WHERE stock_actual > 0 AND stock_actual < stock")->num_rows;
$total_bajo = $conn->query("SELECT id_camara FROM camaras WHERE stock_actual = 0")->num_rows;

/* =====================
   LISTADO DE CAMARAS
===================== */
$sql = "SELECT * FROM camaras $where ORDER BY marca";
$result = $conn->query($sql);
?>

<h2>📊 Dashboard</h2>

<!-- CARDS -->
<div class="cards">

    <a href="dashboard.php?filtro=ok" class="card ok">
        <h3>Stock completo</h3>
        <p><?php echo $total_ok; ?></p>
    </a>

    <a href="dashboard.php?filtro=medio" class="card medio">
        <h3>Stock usado</h3>
        <p><?php echo $total_medio; ?></p>
    </a>

    <a href="dashboard.php?filtro=bajo" class="card bajo">
        <h3>Sin stock</h3>
        <p><?php echo $total_bajo; ?></p>
    </a>

</div>

<?php if ($filtro != ''): ?>
    <a href="dashboard.php" class="btn-volver">⬅ Mostrar todas</a>
<?php endif; ?>

<br><br>

<!-- TABLA -->
<table class="tabla-sistema">

<tr>
    <th>Marca</th>
    <th>Modelo</th>
    <th>Stock</th>
    <th>Stock actual</th>
</tr>

<?php while ($row = $result->fetch_assoc()): ?>

<?php
    if ($row['stock_actual'] == 0) {
        $clase = 'stock-bajo';
    } elseif ($row['stock_actual'] < $row['stock']) {
        $clase = 'stock-medio';
    } else {
        $clase = 'stock-alto';
    }
?>

<tr>
    <td><?php echo $row['marca']; ?></td>
    <td><?php echo $row['modelo']; ?></td>
    <td><?php echo $row['stock']; ?></td>
    <td class="<?php echo $clase; ?>">
        <?php echo $row['stock_actual']; ?>
    </td>
</tr>

<?php endwhile; ?>

</table>
