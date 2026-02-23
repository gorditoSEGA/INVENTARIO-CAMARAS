<?php
include "db/conexion.php";

header("Content-Type: application/vnd.ms-excel; charset=UTF-8");
header("Content-Disposition: attachment; filename=camaras.xls");
header("Pragma: no-cache");
header("Expires: 0");

$result = $conn->query("SELECT marca, modelo, ubicacion, stock, stock_actual FROM camaras");
?>

<table border="1" style="
    border-collapse: collapse;
    font-family: 'Arial Nova', Arial, sans-serif;
    font-size: 12pt;
">
    <tr style="background-color:#f2f2f2; font-weight:bold;">
        <th style="padding:8px;">Marca</th>
        <th style="padding:8px;">Modelo</th>
        <th style="padding:8px;">Ubicacion</th>
        <th style="padding:8px;">Stock</th>
        <th style="padding:8px;">Stock Actual</th>
    </tr>

<?php while ($row = $result->fetch_assoc()) { ?>
    <tr>
        <td style="padding:8px;"><?php echo $row['marca']; ?></td>
        <td style="padding:8px;"><?php echo $row['modelo']; ?></td>
        <td style="padding:8px;"><?php echo $row['ubicacion']; ?></td>
        <td style="padding:8px; text-align:center;"><?php echo $row['stock']; ?></td>
        <td style="padding:8px; text-align:center;"><?php echo $row['stock_actual']; ?></td>
    </tr>
<?php } ?>
</table>
