<?php 
  require '../php/conexion_sql_server.php';
  $sql = "SELECT i.id_inventario AS id_inventario, i.stock AS stock, 
  i.direccion AS direccion, i.telefono AS telefono, v.nombre AS nombre
  FROM inventario i, video_juegos v WHERE i.id_videojuegos = v.id_videojuegos";
  $statement = $conn->prepare($sql);
  $statement->execute();
  $inventarios = $statement->fetchAll(PDO::FETCH_OBJ);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Consultar Inventario</title>
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
      <th>Código de Inventario</th>
      <th>Stock</th>
      <th>Direccion</th>
      <th>Telefono</th>
      <th>Nombre Videojuego</th>
      <th>Editar</th>
      <th>Eliminar</th>
    </tr>
    <?php foreach($inventarios as $inventario): ?>
    <tr>
      <td><?= $inventario->id_inventario; ?></td>
      <td><?= $inventario->stock; ?></td>
      <td><?= $inventario->direccion; ?></td>
      <td><?= $inventario->telefono; ?></td>
      <td><?= $inventario->nombre; ?></td>
      <td> <button type="button" class="btn btn-warning"><a href="editarInventario.php?editar=<?php echo $inventario->id_inventario ?>"> Editar </button></td></a>
      <td> <button type="button" class="btn btn-danger"><a onclick="return confirm('Esta seguro de eliminar el Inventario?')" href="../php/dInventario.php?borrar=<?php echo $inventario->id_inventario ?>"> Eliminar </button>  </td></a>
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