<?php
include "header.php";
include "db/conexion.php";

/* =====================
   PAGINACIÓN
===================== */
$por_pagina = 10; // para probar
$pagina = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
if ($pagina < 1) $pagina = 1;

$inicio = ($pagina - 1) * $por_pagina;


/* =====================
   BUSCADOR
===================== */

$buscar = '';
if (isset($_GET['buscar']) && $_GET['buscar'] != '') {
    $buscar = $_GET['buscar'];
    $sql = "SELECT * FROM camaras 
            WHERE modelo LIKE '%$buscar%' 
               OR marca LIKE '%$buscar%'";
} else {
    $sql = "SELECT * FROM camaras";
}


/* =====================
   ORDENAR COLUMNAS
===================== */
$columnas_validas = ['marca', 'modelo', 'stock_actual'];
$orden = 'marca';
$direccion = 'ASC';

if (isset($_GET['orden']) && in_array($_GET['orden'], $columnas_validas)) {
    $orden = $_GET['orden'];
}

if (isset($_GET['dir']) && in_array($_GET['dir'], ['ASC', 'DESC'])) {
    $direccion = $_GET['dir'];
}


/* =====================
   APLICAR ORDEN
===================== */
$sql_total = $sql;
$total_result = $conn->query($sql_total);
$total_camaras = $total_result->num_rows;
$total_paginas = ceil($total_camaras / $por_pagina);
$sql .= " ORDER BY $orden $direccion LIMIT $inicio, $por_pagina";
$result = $conn->query($sql);

?>


<?php
if (isset($_GET['msg'])) {
    if ($_GET['msg'] == 'agregada') {
        echo "<div class='msg ok'>✅ Cámara agregada correctamente</div>";
    }
    if ($_GET['msg'] == 'editada') {
        echo "<div class='msg ok'>✏️ Cámara editada correctamente</div>";
    }
    if ($_GET['msg'] == 'eliminada') {
        echo "<div class='msg error'>🗑️ Cámara eliminada</div>";
    }
}
?>

<h2>Listado de cámaras</h2>

<a href="exportar_excel.php" class="btn">📊 Exportar a Excel</a>

<form method="GET" action="camaras.php">
    Buscar por modelo: 
    <input type="text" name="buscar" value="<?php echo isset($_GET['buscar']) ? $_GET['buscar'] : ''; ?>">
    <button type="submit">🔍 Buscar</button>
    <a href="camaras.php">Mostrar todas</a>
</form>
<br>

<a href="agregar.php">➕ Agregar cámara</a>
<br><br>

<table border="1">

<tr>
  <th>Marca</th>
  <th>Modelo</th>
  <th>Ubicación</th>
  <th>Stock</th>
  <th>Stock Actual</th>
  <th>Acciones</th>
</tr>

<?php
while ($row = $result->fetch_assoc()) {

    if ($row['stock_actual'] == 0) {
        $clase_stock = 'stock-bajo';
    } elseif ($row['stock_actual'] < $row['stock']) {
        $clase_stock = 'stock-medio';
    } else {
        $clase_stock = 'stock-alto';
    }
?>
<tr>
    <td><?php echo $row['marca']; ?></td>
    <td><?php echo $row['modelo']; ?></td>
    <td><?php echo $row['ubicacion']; ?></td>
    <td><?php echo $row['stock']; ?></td>

    <td class="<?php echo $clase_stock; ?>">
        <?php echo $row['stock_actual']; ?>
    </td>

    <td class="acciones">
        <a href="detalle_camara.php?id=<?php echo $row['id_camara']; ?>">👁️ Ver</a>
        <a href="editar.php?id=<?php echo $row['id_camara']; ?>">✏️ Editar</a>
        <a href="eliminar.php?id=<?php echo $row['id_camara']; ?>"
           onclick="return confirm('¿Seguro que querés eliminar esta cámara?');">
           🗑️ Eliminar
        </a>
    </td>
</tr>
<?php } ?>


</table>
<div class="paginacion">

<?php if ($pagina > 1): ?>
    <a href="?pagina=<?php echo $pagina - 1; ?>&buscar=<?php echo $buscar; ?>&orden=<?php echo $orden; ?>&dir=<?php echo $direccion; ?>">⬅ Anterior</a>
<?php endif; ?>

<?php for ($i = 1; $i <= $total_paginas; $i++): ?>
    <a href="?pagina=<?php echo $i; ?>&buscar=<?php echo $buscar; ?>&orden=<?php echo $orden; ?>&dir=<?php echo $direccion; ?>"
       class="<?php echo ($i == $pagina) ? 'activa' : ''; ?>">
       <?php echo $i; ?>
    </a>
<?php endfor; ?>

<?php if ($pagina < $total_paginas): ?>
    <a href="?pagina=<?php echo $pagina + 1; ?>&buscar=<?php echo $buscar; ?>&orden=<?php echo $orden; ?>&dir=<?php echo $direccion; ?>">Siguiente ➡</a>
<?php endif; ?>

</div>
<!-- MODAL CONFIRMACION -->


<div id="overlay"></div>


<!-- MODAL -->
<div id="modalEliminar" class="modal">
  <div class="modal-contenido">
    <h3>⚠️ Confirmar eliminación</h3>
    <p>¿Estás seguro de que querés eliminar esta cámara?</p>

    <div class="modal-botones">
      <button class="btn btn-cancelar" onclick="cerrarModal()">Cancelar</button>
      <a id="btnConfirmarEliminar" class="btn btn-eliminar">Eliminar</a>
    </div>
  </div>
</div>



<!-- JAVASCRIPT -->
<script>
function abrirModalEliminar(id) {
  const modal = document.getElementById('modalEliminar');
  const btnEliminar = document.getElementById('btnConfirmarEliminar');

  btnEliminar.href = 'eliminar.php?id=' + id;
  modal.classList.add('activo');
}

function cerrarModal() {
  const modal = document.getElementById('modalEliminar');
  modal.classList.remove('activo');
}
</script>


