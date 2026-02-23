<?php
include "../db/conexion.php";

header("Content-Type: application/vnd.ms-excel; charset=UTF-8");
header("Content-Disposition: attachment; filename=telefonia.xls");

$result = $conn->query("SELECT * FROM telefonia");
?>

<table border="1" style="border-collapse:collapse; font-family:'Arial Nova', Arial;">
<tr style="font-weight:bold; background:#eee;">
  <th>Marca</th>
  <th>Modelo</th>
  <th>IMEI</th>
  <th>Línea</th>
  <th>Ubicación</th>
  <th>Stock</th>
  <th>Stock Actual</th>
</tr>

<?php while ($r = $result->fetch_assoc()) { ?>
<tr>
  <td><?php echo $r['marca']; ?></td>
  <td style="min-width:200px;"><?php echo $r['modelo']; ?></td>
  <td><?php echo $r['imei']; ?></td>
  <td><?php echo $r['numero_linea']; ?></td>
  <td><?php echo $r['ubicacion']; ?></td>
  <td><?php echo $r['stock']; ?></td>
  <td><?php echo $r['stock_actual']; ?></td>
</tr>
<?php } ?>
</table>

