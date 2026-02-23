<link rel="stylesheet" href="../css/estilos.css">

<?php
include "../header.php";
include "../db/conexion.php";


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

<h2>Listado de teléfonos</h2>

<a href="agregar_telefono.php" class="btn">➕ Agregar teléfono</a>
<a href="exportar_excel_telefonia.php" class="btn">📊 Exportar Excel</a>

<table>
<tr>
  <th>Marca</th>
  <th>Modelo</th>
  <th>IMEI</th>
  <th>Línea</th>
  <th>Ubicación</th>
  <th>Stock</th>
  <th>Stock Actual</th>
  <th>Acciones</th>
</tr>

<?php
$result = $conn->query("SELECT * FROM telefonia");

while ($row = $result->fetch_assoc()) {

    if ($row['stock_actual'] == 0) {
        $clase = 'stock-bajo';
    } elseif ($row['stock_actual'] < $row['stock']) {
        $clase = 'stock-medio';
    } else {
        $clase = 'stock-alto';
    }

    echo "<tr>
        <td>{$row['marca']}</td>
        <td>{$row['modelo']}</td>
        <td>{$row['imei']}</td>
        <td>{$row['linea']}</td>
        <td>{$row['ubicacion']}</td>
        <td>{$row['stock']}</td>
        <td class='$clase'>{$row['stock_actual']}</td>
        <td class='acciones'>
            <a href='detalle_telefono.php?id={$row['id_telefono']}'>👁️ Ver</a>
            <a href='editar_telefono.php?id={$row['id_telefono']}'>✏️ Editar</a>
            <a href='eliminar_telefono.php?id={$row['id_telefono']}'
               onclick=\"return confirm('¿Eliminar teléfono?')\">🗑️</a>
        </td>
    </tr>";
}
?>
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


