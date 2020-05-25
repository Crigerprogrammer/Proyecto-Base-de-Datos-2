<?php 
  require '../php/conexion_sql_server.php';
  $sql = "SELECT v.Fecha as Fecha_Venta, v.Cantidad as Cantidad, v.Nombre_Cliente as Nombre_Cliente, v.Nit as Nit, g.Nombre as Videojuego, v.total as Total  FROM ventas v, video_juegos g WHERE v.id_videojuegos = g.id_videojuegos";
  $statement = $conn->prepare($sql);
  $statement->execute();
  $ventas = $statement->fetchAll(PDO::FETCH_OBJ);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Consultar Ventas</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/main.css">
</head>
<header>
	<?php
		require 'navbar2.php';
	?>
</header>
<body>
<main>    
  <table class="table table-bordered" style="width: 75% !important; margin:3% auto;">
    <tr>
      <th>Fecha Venta</th>
      <th>Cantidad</th>
      <th>Nombre Cliente</th>
      <th>Nit</th>
      <th>Videojuego</th>
      <th>Total</th>
    </tr>
    <?php foreach($ventas as $venta): ?>
    <tr>
      <td><?= $venta->Fecha_Venta; ?></td>
      <td><?= $venta->Cantidad; ?></td>
      <td><?= $venta->Nombre_Cliente; ?></td>
      <td><?= $venta->Nit; ?></td>
      <td><?= $venta->Videojuego; ?></td>
      <td>Q<?=  number_format($venta->Total , 2); ?></td>
      
    </tr>
    <?php endforeach; ?>
  </table>
    <!-- Final formulario de Proveedor-->
</main>
    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/export.js"></script>
 </body>
</html>